<!DOCTYPE html>
<?php
// Include the database configuration
include('connection.php'); // Assuming you have a connection.php file with database connection code

// Start the session (if not already started)
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['U_ID']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeopathy Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="blog.css?v=1">
    <script src="https://kit.fontawesome.com/d5d77cd114.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="intro">
            <img class="homeimg img-fluid" src="images/h10.jpg" alt="">
            <div class="head text-center">
                <h1>Homeopathy Hub</h1>
                <h6>Your Source for Homeopathic Healing</h6>
                <p>Discover the power of homeopathy in promoting natural healing and wellness.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid container">
                <a class="navbar-brand" href="#">Homeopathy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['U_ID'])) : ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="welcome.php">Home</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <?php endif; ?>  
                        <li class="nav-item">
                            <a class="nav-link" href="#blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">Contact us</a>
                        </li>
                    </ul>
                    <div class="socle">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><i class="fa-brands fa-youtube"></i></li>
                            <li class="nav-item"><i class="fa-brands fa-instagram"></i></li>
                            <li class="nav-item"><i class="fa-brands fa-facebook"></i></li>
                        </ul>
                    </div>
                    <form class="d-flex">
                        <input class="search form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <section class="home container my-5" id="home">
        <h5><strong>Discover Homeopathic Healing</strong></h5>
        <div class="row">
            <!-- Remedies -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h1.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Homeopathic Remedies</p>
                    <h4>Explore the World of Homeopathic Remedies</h4>
                    <h6 id="remediesContent" style="display: none;">
                        Homeopathy offers a vast array of natural remedies that stimulate the body's self-healing abilities. Learn about different remedies and their applications in treating various health conditions.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('remediesContent');">Read more</a>
                </div>
            </div>
    
            <!-- Principles -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h2.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Homeopathic Principles</p>
                    <h4>Understand the Principles of Homeopathy</h4>
                    <h6 id="principlesContent" style="display: none;">
                        Homeopathy follows the principle of "like cures like" and aims to treat the root cause of ailments. Explore the fundamental principles of homeopathic medicine and how they guide the healing process.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('principlesContent');">Read more</a>
                </div>
            </div>
    
            <!-- Benefits -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h3.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Benefits of Homeopathy</p>
                    <h4>Discover the Benefits of Homeopathic Treatment</h4>
                    <h6 id="benefitsContent" style="display: none;">
                        Homeopathy offers a holistic approach to health, addressing physical, emotional, and mental well-being. Explore the numerous benefits of homeopathic treatment, including its gentle and natural approach to healing.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('benefitsContent');">Read more</a>
                </div>
            </div>
            <!-- ... (remaining content) ... -->
        </div>
    </section>
    
    <script>
        // JavaScript function to toggle the visibility of content
        function toggleContent(contentId) {
            var content = document.getElementById(contentId);
            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
    
    <section class="subscription container p-4" id="subscription">
        <div class="row">
            <div class="content col-lg-6 col-md-6 col-12">
                <h3>Stay Informed about Homeopathic Healing</h3>
                <p>Subscribe to our newsletter and receive updates on the latest developments in homeopathy and natural healing.</p>
            </div>
            <div class="sub col-lg-6 col-md-6 col-12">
                <input class="py-2 px-3 col-lg-6 col-md-12 my-2" type="email" name="email" placeholder="Your Email">
                <button class="text-uppercase col-lg-5 col-md-12">Subscribe</button>
            </div>
        </div>
    </section>

    <section class="blog container my-5" id="blog">
        <h5><strong>Explore Homeopathic Insights</strong></h5>

        <div class="row">
            <div class="post col-lg-8 col-md-8 col-12">
                <!-- Blog Post 1 -->
                <div class="blog-post mb-4">
                    <!-- Blog Post Image -->
                    <img class="img-fluid" src="images/h4.jpg" alt="Blog Post 1">
    
                    <!-- Blog Post Title -->
                    <h3>Understanding the Core Principles of Homeopathy</h3>
    
                    <!-- Blog Post Date -->
                    <p class="text-muted">Posted on September 15, 2023</p>
    
                    <!-- Blog Post Content -->
                    <p>
                        Homeopathy is based on several core principles, including the concept of "like cures like" and the use of highly diluted remedies. In this post, we delve into the fundamental principles that underpin homeopathic treatment.
                    </p>
    
                    <!-- Read More Button (Link to Full Post) -->
                    <a class="btn btn-primary">Read More</a>
                </div>
    
                <!-- Blog Post 2 -->
                <div class="blog-post mb-4">
                    <!-- Blog Post Image -->
                    <img class="img-fluid" src="images/h5.jpg" alt="Blog Post 2">
                    <!-- Blog Post Title -->
                    <h3>Top 10 Homeopathic Remedies for Common Ailments</h3>
    
                    <!-- Blog Post Date -->
                    <p class="text-muted">Posted on September 20, 2023</p>
    
                    <!-- Blog Post Content -->
                    <p>
                        Discover some of the most commonly used homeopathic remedies for everyday health issues. From Arnica for bruises to Nux Vomica for digestive troubles, these remedies can be a natural and gentle solution.
                    </p>
    
                    <!-- Read More Button (Link to Full Post) -->
                    <a class="btn btn-primary">Read More</a>
                </div>
    
                <!-- Add more blog posts here -->
                <!-- To add more blog posts, simply copy and paste the blog post HTML structure and modify the content accordingly -->
    
                <!-- Blog Post 3 (Example) -->
                <div class="blog-post mb-4">
                    <!-- Blog Post Image -->
                    <img class="img-fluid" src="images/h6.jpg" alt="Blog Post 3">
                    <!-- Blog Post Title -->
                    <h3>Your New Journey into Homeopathic Remedies</h3>
    
                    <!-- Blog Post Date -->
                    <p class="text-muted">Posted on September 25, 2023</p>
    
                    <!-- Blog Post Content -->
                    <p>
                        Embark on a new journey into the world of homeopathic remedies. Learn about the diverse applications and benefits of homeopathy in various aspects of health and well-being.
                    </p>
    
                    <!-- Read More Button (Link to Full Post) -->
                    <a class="btn btn-primary">Read More</a>
                </div>
                <div class="blog-post mb-4">
                    <!-- Blog Post Image -->
                    <img class="img-fluid" src="images/h13.jpg" alt="Blog Post 3">
                
                    <!-- Blog Post Title -->
                    <h3>The Role of Homeopathy in Stress Management</h3>
                
                    <!-- Blog Post Date -->
                    <p class="text-muted">Posted on October 5, 2023</p>
                
                    <!-- Blog Post Content -->
                    <p>
                        Stress is a common issue in today's fast-paced world. Discover how homeopathic remedies can help manage stress and promote overall well-being. Learn about specific remedies and techniques to find your inner calm.
                    </p>
                
                    <!-- Read More Button (Link to Full Post) -->
                    <a class="btn btn-primary">Read More</a>
                </div>
            </div>
    </section>
    

    <section class="footer" id="footer">
        <!-- Remove the container if you want to extend the Footer to full width. -->
        <div class="my-5">
            <!-- Footer -->
            <footer
                class="text-center text-lg-start text-dark"
                style="background-color: #ECEFF1"
            >
                <!-- Section: Social media -->
                <section
                    class="d-flex justify-content-between p-4 text-white"
                    style="background-color: #21D192"
                >
                    <!-- Left -->
                    <div class="me-5">
                        <span>Connect with us on social media:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                        <a href="#" class="text-white me-4">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white me-4">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-white me-4">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold">Homeopathy Tip</h6>
                                <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px"
                                />
                                <p>
                                    Homeopathic remedies are highly individualized. Consult with a qualified homeopath to find the right remedy and dosage for your specific health concerns.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Useful Links</h6>
                                <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px"
                                />
                                <p>
                                    <a href="ayurveda.php" class="text-dark">Ayurveda</a>
                                </p>
                                <p>
                                    <a href="yoga.php" class="text-dark">Yoga</a>
                                </p>
                                <p>
                                    <a href="naturopathy.php" class="text-dark">Naturopathy</a>
                                </p>
                                <p>
                                    <a href="unani.php" class="text-dark">Unani</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Contact</h6>
                                <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px"
                                />
                                <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                                <p><i class="fas fa-envelope mr-3"></i> info@homeopathyhub.com</p>
                                <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                                <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div
                    class="text-center p-3"
                    style="background-color: rgba(0, 0, 0, 0.2)"
                >
                    © 2023 Homeopathy Hub
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
        <!-- End of .container -->
    </section>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
</body>
</html>
