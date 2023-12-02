<?php
// Include the database connection file
include('connection.php');

// Start a session (if not already started)
session_start();
$loggedIn = isset($_SESSION['U_ID']);

// Check if the user is logged in
if (!$loggedIn) {
    // Redirect the user to the login page if not logged in
    header("Location: auth.php");
    exit();
}

// Get the user's ID from the session
$userId = $_SESSION['U_ID'];
// $receiverName = '';

// Function to fetch the user's name based on their user ID
function fetchUserName($userId, $conn) {
    // Prepare a SQL query to retrieve the user's name
    $sql = "SELECT User_Name FROM users WHERE U_ID = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind the user ID as a parameter
    $stmt->bind_param("i", $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind the result variable
        $stmt->bind_result($userName);

        // Fetch the result
        if ($stmt->fetch()) {
            // Return the user's name
            return $userName;
        }
    }

    // Return a default value or handle errors as needed
    return "User";
}

// Get the user's name
$userName = fetchUserName($userId, $conn);

// Function to fetch a list of users, excluding the logged-in user
function fetchUserList($userId, $conn) {
    // Prepare a SQL query to retrieve the list of users, excluding the logged-in user
    $sql = "SELECT U_ID, User_Name FROM users WHERE U_ID != ?";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind the logged-in user's ID as a parameter
    $stmt->bind_param("i", $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind the result variables
        $stmt->bind_result($userId, $userName);

        $userList = [];

        // Fetch the results
        while ($stmt->fetch()) {
            $userList[] = [
                'U_ID' => $userId,
                'User_Name' => $userName,
            ];
        }

        // Return the list of users
        return $userList;
    }

    // Return an empty array or handle errors as needed
    return [];
}

// Fetch the list of available users for private chat
$usersList = fetchUserList($userId, $conn);

// Check if a receiver is specified (receiver's ID passed via the URL)
if (isset($_GET['receiverUserId'])) {
    $receiverUserId = $_GET['receiverUserId'];

    // Function to fetch the receiver's name based on their user ID
    $receiverName = fetchUserName($receiverUserId, $conn);
}

// Handle incoming POST request to send a private message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendPrivateMessage'])) {
    // Get the private message from the POST data
    $privateMsg = $_POST['privateMessage'];

    // Create a prepared statement to insert the message into the "private_messages" table
    $stmt = $conn->prepare("INSERT INTO private_messages (sender_id, receiver_id, message_content) VALUES (?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("iis", $userId, $receiverUserId, $privateMsg);

    // Execute the statement
    $success = $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Fetch private messages between the sender and receiver
function fetchPrivateMessages($userId, $receiverUserId, $conn) {
    // Prepare a SQL query to retrieve private messages
    $sql = "SELECT sender_id, receiver_id, message_content, timestamp FROM private_messages WHERE
            (sender_id = ? AND receiver_id = ?) OR
            (sender_id = ? AND receiver_id = ?)
            ORDER BY timestamp";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("iiii", $userId, $receiverUserId, $receiverUserId, $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind the result variables
        $stmt->bind_result($senderId, $receiverId, $messageContent, $timestamp);

        $privateMessages = [];

        // Fetch the results
        while ($stmt->fetch()) {
            $messageSender = ($senderId == $userId) ? "You" : (isset($receiverName) ? $receiverName : "Receiver");
            $formattedTimestamp = date('Y-m-d H:i', strtotime($timestamp)); // Format the timestamp
            $privateMessages[] = [
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
                'message_content' => $messageContent,
                'timestamp' => $formattedTimestamp, // Include the formatted timestamp
                'message_sender' => $messageSender,
            ];
        }

        // Return private messages
        return $privateMessages;
    }

    // Return an empty array or handle errors as needed
    return [];
}

// ...

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYU-SYNC</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="chat.css?v=1">
    <link rel="stylesheet" href="css/components.css?v=1">
    <link rel="stylesheet" href="css/icons.css?v=1">
    <link rel="stylesheet" href="css/responsee.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css?v=1">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css?v=1">
    <link rel="stylesheet" href="css/style.css?v=1">
    <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css?v=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">  
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <style>
    /* Add this CSS to your existing styles */
    .chat-container {
        display: flex;
        flex-direction: column;
    }

    .user-list-box {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
        overflow-y: auto; /* Enable vertical scrolling */
        max-height:150px;
    }

    .chat-feed-box {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
        overflow-y: auto; /* Enable vertical scrolling */
        max-height: 400px;
    }

    .chat-feed {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
        overflow-y: auto; /* Enable vertical scrolling */
        max-height: 200px;
    }

    /* Styling for user list and chat feed items */
    .user-list li, .message {
        margin-bottom: 10px;
    }
</style>  
    <style>
        /* Add this CSS to your existing styles */
        .chat-container {
            display: flex;
            flex-direction: column;
        }

        .user-list-box {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-y: auto; /* Enable vertical scrolling */
            max-height: 150px;
        }

        .chat-feed-box {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-y: auto; /* Enable vertical scrolling */
            max-height: 400px;
        }

        .chat-feed {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-y: auto; /* Enable vertical scrolling */
            max-height: 200px;
        }

        /* Styling for user list and chat feed items */
        .user-list li, .message-container {
            margin-bottom: 10px;
        }

        .message {
            padding: 5px;
            background-color: #f1f1f1;
            border-radius: 5px;
            margin-left: 10px;
            display: inline-block;
        }

        .message-header {
            margin-bottom: 5px;
        }

        .created_at {
            color: #888;
            font-size: 0.8em;
        }
    </style>
</head>
<body class="size-1520 primary-color-red background-dark">
    <header class="grid">
        <!-- Top Navigation -->
        <nav class="s-12 grid background-none background-primary-hightlight" style="background-color: aliceblue;">
            <!-- logo -->
            <?php if ($loggedIn) : ?>
                <a href="welcome.php" class="m-12 l-3 padding-2x logo">
            <?php else : ?>
                <a href="index.php" class="m-12 l-3 padding-2x logo">
            <?php endif; ?>
                <div style="display: inline-flex;">
                    <img style="width: 100px; height: 50px; margin-right: 10px;" src="img/logo.jpg">
                    </img>
                    <img style="width: 70px; height: 50px; margin-left: 10px;" src="img/g20.jpg">
                    </img>
                    <h1 style="margin-left: 10px; margin-top: -10px; font-weight: 700; font-size: 40px;">AYUSH</h1>
                </div>
            </a>
            <div class="top-nav s-12 l-9" style="margin-top: 10px;">
                <ul class="top-ul right chevron">
                    <?php if (isset($_SESSION['U_ID'])) : ?>
                        <li><a href="welcome.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="index.php">Home</a></li>
                    <?php endif; ?>
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="schemes.php">Schemes</a></li>
                    <li><a href="clinic.php">Clinics</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if (isset($_SESSION['U_ID'])) : ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else : ?>
                        <li><a href="auth.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Welcome, <?php echo $userName; ?>!</h1>

        <!-- Display the receiver's name if available -->
        <?php if (isset($receiverName)) : ?>
    <h2>Private Chat with <?php echo $receiverName; ?></h2>
<?php else : ?>
    <h2>Select a User to Start Private Chat</h2>
<?php endif; ?>
        <div class="chat-container">
        <div class="user-list-box">
            <h3>Users List</h3>
            <input type="text" id="userSearch" placeholder="Search for a user...">
            <ul class="user-list">
                <?php foreach ($usersList as $user) : ?>
                    <li><a href="private_chat.php?receiverUserId=<?php echo $user['U_ID']; ?>"><?php echo $user['User_Name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="chat-feed-box">
            <h3>Chat</h3>
            <div class="chat-feed">
                <?php
                if (isset($receiverUserId)) {
                    $privateMessages = fetchPrivateMessages($userId, $receiverUserId, $conn);
                    $privateMessages = array_reverse($privateMessages); // Reverse the order

                    foreach ($privateMessages as $messageItem) {
                        $messageSender = ($messageItem['sender_id'] == $userId) ? "You" : $receiverName;
                        ?>
                    <div class="message-container">
                        <div class="message">
                            <div class="message-header">
                                <span class="created_at">
                                    <?php 
                                    $timestamp = strtotime($messageItem['timestamp']);
                                    $formattedDate = date('Y-m-d', $timestamp);
                                    $formattedTime = date('H:i', $timestamp);
                                    echo $formattedDate . ' ' . $formattedTime;
                                    ?>
                                </span>
                            </div>
                            <strong><?php echo $messageSender; ?>:</strong> <?php echo $messageItem['message_content']; ?>
                        </div>
                    </div>
                    <?php }
                }
                ?>
            </div>
        </div>

        <!-- Form to send private messages -->
        <?php if (isset($receiverUserId)) : ?>
            <form method="post" action="private_chat.php?receiverUserId=<?php echo $receiverUserId; ?>">
                <div class="input-box">
                    <input type="text" id="privateMessage" name="privateMessage" placeholder="Type your message">
                    <button id="sendPrivateMessage" name="sendPrivateMessage">Send</button>
                </div>
            </form>
        <?php endif; ?>
        </div>
<a class='dropbtn' href='collab.php' style='padding: 10px 0; display: inline-block; background-color: #3498db; color: #fff; text-align: center; text-decoration: none; border: none; border-radius: 5px; width: 150px; font-weight: bold; cursor: pointer; margin-bottom: 10px; margin-top: 10px;'>Public Discussion</a>  
</div>
    </div>
    <footer class="grid">
        <!-- Footer - top -->
        <!-- Image-->
        <div class="s-12 l-3 m-row-3 margin-bottom background-image" style="background-image:url(img/img-04.jpg)"></div>
        
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase">Who We Are?</h2>
           <p>The Ministry of Ayush, established in November 2014, aims to promote ancient healthcare systems. It evolved from the Department of ISM&H in 1995, later focusing on Ayurveda, Yoga, Naturopathy, Unani, Siddha, and Homoeopathy.</p>
        </div>
                
        <div class="s-12 m-9 l-3 padding-2x margin-bottom background-dark">
           <h2 class="text-strong text-uppercase">Contact Us</h2>
           <p><b class="text-primary margin-right-10">P</b> 1800-11-22-02 (9:00 AM to 5:30 PM) (IST)</p>
           <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:contact@sampledomain.com">contact@sampledomain.com</a></p>
           <p><b class="text-primary margin-right-10">M</b> <a class="text-primary-hover" href="mailto:office@sampledomain.com">office@sampledomain.com</a></p>
        </div>
        
        <!-- Footer - bottom -->
        <div class="s-12 text-center margin-bottom">
        <p class="text-size-12">Copyright 2023</p>
          <p class="text-size-12">All Rights Reserved</p>
          
          <p><a class="text-size-12 text-primary-hover" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding by Team THE BOYS</a></p>
        </div>
      </footer> 
      <script type="text/javascript" src="js/responsee.js"></script>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript" src="js/template-scripts.js"></script>
      <script type="text/javascript" src="chat.js"></script>
      <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
      <script src="https://mediafiles.botpress.cloud/c300e6db-bae7-4662-bfbf-24954df767c0/webchat/config.js" defer></script>
      <script>
    // JavaScript function to handle user search
    function searchUsers() {
        // Get the search input value
        var searchInput = document.getElementById('userSearch').value.toLowerCase();

        // Get the user list
        var userList = document.querySelector('.user-list');

        // Get all user list items
        var userItems = userList.getElementsByTagName('li');

        // Loop through the user list items and show/hide based on search input
        for (var i = 0; i < userItems.length; i++) {
            var userName = userItems[i].textContent || userItems[i].innerText;
            userName = userName.toLowerCase();
            if (userName.indexOf(searchInput) > -1) {
                userItems[i].style.display = "";
            } else {
                userItems[i].style.display = "none";
            }
        }
    }

    // Attach the searchUsers function to the input field's keyup event
    document.getElementById('userSearch').addEventListener('keyup', searchUsers);
</script>

</body>
</html>
