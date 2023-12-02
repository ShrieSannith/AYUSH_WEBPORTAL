<?php
// Include the database connection file
include('connection.php');

// Start a session (if not already started)
session_start();
$loggedIn = isset($_SESSION['U_ID']);

// Check if the user is logged in
if (!isset($_SESSION['U_ID'])) {
    // Redirect the user to the login page if not logged in
    header("Location: auth.php");
    exit();
}

// Get the user's ID from the session
$userId = $_SESSION['U_ID'];

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

// Handle incoming POST request to save a new message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    // Get the message from the POST data
    $msg = $_POST['message'];

    // Create a prepared statement to insert the message into the "messages" table
    $stmt = $conn->prepare("INSERT INTO messages (user_name, message) VALUES (?, ?)");

    // Bind parameters
    $stmt->bind_param("ss", $userName, $msg);

    // Execute the statement
    $success = $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Fetch messages from the "messages" table
$query = "SELECT user_name, message, created_at FROM messages";
$result = mysqli_query($conn, $query);

$messages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
}

// Add this code to handle sending personal messages
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendPersonalMessage'])) {
    $receiverUserId = $_POST['receiverUserId'];
    $personalMessage = $_POST['personalMessage'];

    // Create a prepared statement to insert the personal message into the "personal_messages" table
    $stmt = $conn->prepare("INSERT INTO personal_messages (sender_id, receiver_id, message_content) VALUES (?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("iis", $userId, $receiverUserId, $personalMessage);

    // Execute the statement
    $success = $stmt->execute();

    // Close the statement
    $stmt->close();
}

function fetchPersonalMessages($userId, $receiverUserId, $conn) {
    // Prepare a SQL query to retrieve personal messages between two users
    $sql = "SELECT sender_id, receiver_id, message_content, timestamp FROM personal_messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("iiii", $userId, $receiverUserId, $receiverUserId, $userId);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind the result variables
        $stmt->bind_result($senderId, $receiverId, $messageContent, $timestamp);

        $personalMessages = [];

        // Fetch the results
        while ($stmt->fetch()) {
            $personalMessages[] = [
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
                'message_content' => $messageContent,
                'timestamp' => $timestamp
            ];
        }

        // Return personal messages
        return $personalMessages;
    }

    // Return an empty array or handle errors as needed
    return [];
}

// Function to fetch messages with timestamps
function fetchMessagesWithTimestamps($conn) {
    $query = "SELECT user_name, message, created_at FROM messages";
    $result = mysqli_query($conn, $query);

    $messages = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['timestamp'] = date('H:i:s', strtotime($row['created_at'])); // Format timestamp as HH:MM:SS
            $row['date'] = date('Y-m-d', strtotime($row['created_at'])); // Format date as YYYY-MM-DD
            $messages[] = $row;
        }
    }

    return $messages;
}

// Fetch messages with timestamps in reverse order
$messages = fetchMessagesWithTimestamps($conn);

// Reverse the array to display the latest messages at the top
$messages = array_reverse($messages);
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
    /* Chat container */
    .chat-feed {
        max-width: 800px;
        margin: 0 auto;
    }

    /* Message container */
    .message-container {
        position: relative;
        margin-bottom: 15px;
    }

    /* Message content */
    .message {
        background: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
    }

    /* Message header */
    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }

    /* User name in message header */
    .message-header strong {
        color: #3498db;
        font-weight: bold;
    }

    /* Timestamp in message header */
    .message-header .created_at {
        color: #777;
        font-size: 12px;
    }

    /* Date in message header */
    .message-header .date {
        color: #777;
        font-size: 12px;
    }

    /* Reply button */
    .reply-button {
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
    }

    .reply-button:hover {
        background-color: #3178a9;
    }

    /* Reply box */
    .reply-box {
        display: none;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
        padding: 10px;
    }

    /* Quoted message within the reply box */
    .quoted-message {
        font-style: italic;
        color: #555;
        margin-bottom: 10px;
    }

    /* Reply input field */
    .reply-input {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    /* Send reply button */
    .send-reply-button {
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .send-reply-button:hover {
        background-color: #3178a9;
    }

    /* Input box */
    .input-box {
        display: flex;
        align-items: center;
    }

    #message {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #send {
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        margin-left: 10px;
    }

    #send:hover {
        background-color: #3178a9;
    }
</style>

</head>
<body class="size-1520 primary-color-red background-dark">
    <!-- HEADER -->
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
                    <img style="width: 100px; height: 50px; margin-right: 10px;" src="img/logo.jpg"></img>
                    <img style="width: 70px; height: 50px; margin-left: 10px;" src="img/g20.jpg"></img>
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
    <form method="post" action="collab.php">
    <div class="container">
        <h1>Welcome, <?php echo $userName; ?>!</h1>
        <div class="chat-feed">
    <?php
    foreach ($messages as $row) {
        echo '<div class="message-container">';
        echo '<div class="message">';
        echo '<div class="message-header">';
        echo '<strong>' . $row['user_name'] . ':</strong>';
        echo '<span class="created_at">' . date('H:i', strtotime($row['created_at'])) . '</span>';
        echo '<span class="date">' . date('M j, Y', strtotime($row['created_at'])) . '</span>';
        echo '</div>';
        echo '<p>' . $row['message'] . '</p>';
        echo '</div>';
        echo '<button class="reply-button" type="button">Reply</button>';
        echo '<div class="reply-box">';
        echo '<div class="quoted-message"></div>';
        echo '<textarea class="reply-input" placeholder="Your reply..."></textarea>';
        echo '<button class="send-reply-button" type="button">Send</button>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>


<?php
$sql = "SELECT U_ID, User_Name FROM users";
$result = $conn->query($sql);

echo "<a class='dropbtn' href='private_chat.php' style='padding: 10px 0; display: inline-block; background-color: #3498db; color: #fff; text-align: center; text-decoration: none; border: none; border-radius: 5px; width: 150px; font-weight: bold; cursor: pointer; margin-bottom: 10px;'>Direct Messages</a>";
$conn->close(); 
?>

<!-- ... -->

        <div class="input-box">
            <input type="text" id="message" name = "message" placeholder="Type your message">
            <button id="send" name = "send">Send</button>
        </div>
    </div>
    <script src="script.js"></script>
    </form>
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
//             const replyButtons = document.querySelectorAll('.reply-button');

// replyButtons.forEach((button) => {
//     button.addEventListener('click', () => {
//         const replyBox = button.nextElementSibling;
//         const quotedMessage = button.previousElementSibling;
//         const replyInput = replyBox.querySelector('.reply-input');

//         // Show the reply box and quote the selected message
//         replyBox.style.display = 'block';
//         replyBox.querySelector('.quoted-message').innerHTML = quotedMessage.innerHTML;

//         // Handle sending the reply
//         const sendButton = replyBox.querySelector('.send-reply-button');
//         sendButton.addEventListener('click', () => {
//             const replyText = replyInput.value;
//             // Send the reply (you can implement this logic)
//             // ...

//             // Hide the reply box after sending
//             replyBox.style.display = 'none';
//             replyInput.value = '';
//         });
//     });
// });
    document.addEventListener("DOMContentLoaded", function () {
        const replyButtons = document.querySelectorAll(".reply-button");
        const messageInput = document.getElementById("message");

        // Store the original message and username separately
        let originalMessage = "";
        let originalUserName = "";

        replyButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const messageContainer = button.closest(".message-container");
                const messageContent = messageContainer.querySelector(".message").textContent;
                originalUserName = messageContainer.querySelector("strong").textContent;

                // Split the message content by the timestamp
                const messageParts = messageContent.split(":");
                // Join the message parts without the timestamp
                originalMessage = messageParts.slice(1).join(":").trim();
                // Remove the first 5 characters from the original message
                originalMessage = originalMessage.slice(22).trim();

                // Populate the message input box with the username and the original message for the reply
                messageInput.value = `Replying to ${originalUserName}: ${originalMessage}.... Reply: `;
                // Focus on the message input box to allow typing
                messageInput.focus();
            });
        });

        // Add an event listener for when the user types in the message input
        messageInput.addEventListener("input", function () {
            // Check if the "Replying to" tag is already in the message
            if (!messageInput.value.startsWith(`Replying to ${originalUserName}:`)) {
                // Append the original message for the reply
                messageInput.value = `Replying to ${originalUserName}: ${originalMessage}.... Reply: `;
            }
        });
    });
</script>
</body>
</html>

