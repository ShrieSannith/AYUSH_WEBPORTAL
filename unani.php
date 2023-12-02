<?php
// Include the database configuration
include('connection.php'); // Assuming you have a connection.php file with database connection code

// Start the session (if not already started)
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['U_ID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unani Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="blog.css?v=1">
    <script src="https://kit.fontawesome.com/d5d77cd114.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="intro">
            <img class="homeimg img-fluid" src="images/h1.jpg" alt="">
            <div class="head text-center">
                <h1>Unani Blog</h1>
                <h6>Your source for Unani medicine and wellness</h6>
                <p>Discover the principles of Unani medicine, holistic healing, and natural remedies.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid container">
                <a class="navbar-brand" href="#">Unani</a>
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
        <h5><strong>Unani Medicine</strong></h5>
        <div class="row">
            <!-- Unani Principles -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h17.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Unani Principles</p>
                    <h4>Key Principles of Unani Medicine</h4>
                    <h6 id="unaniPrinciplesContent" style="display: none;">
                        Unani medicine is based on the principles of the four humors: blood, phlegm, black bile, and yellow bile. It emphasizes the balance of these humors for good health and focuses on natural remedies and holistic healing.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('unaniPrinciplesContent');">Read more</a>
                </div>
            </div>
    
            <!-- Unani Remedies -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h10.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Unani Remedies</p>
                    <h4>Natural Remedies in Unani Medicine</h4>
                    <h6 id="unaniRemediesContent" style="display: none;">
                        Unani medicine utilizes natural remedies, including herbs, diet, and lifestyle changes, to restore balance and treat various health conditions. It offers a holistic approach to healing.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('unaniRemediesContent');">Read more</a>
                </div>
            </div>
    
            <!-- Unani Wellness -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h3.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Unani Wellness</p>
                    <h4>Wellness Through Unani Practices</h4>
                    <h6 id="unaniWellnessContent" style="display: none;">
                        Unani practices promote overall wellness by focusing on prevention, balance, and natural healing. Learn how Unani can enhance your well-being and vitality.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('unaniWellnessContent');">Read more</a>
                </div>
            </div>
            <!-- ... (remaining content) ... -->
        </div>
    </section>
    
    <script>
        // JavaScript function to toggle the visibility of content
        function toggleContent(unaniId) {
            var content = document.getElementById(unaniId);
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
            <h3>Want to get weekly updates?</h3>
            <p>Sign up and receive notifications when new updates about Unani medicine and holistic wellness are available!</p>
        </div>
        <div class="sub col-lg-6 col-md-6 col-12">
            <input class="py-2 px-3 col-lg-6 col-md-12 my-2" type="email" name="email" placeholder="Your Email">
            <button class="text-uppercase col-lg-5 col-md-12">Subscribe</button>
        </div>
    </div>
</section>

<section class="blog container my-5" id="blog">
    <h5><strong>Unani Blog Posts</strong></h5>
    <div class="row">
        <div class="post col-lg-8 col-md-8 col-12">
            <div class="row">
                <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                    <img class="img-fluid pb-3" src="images/h8.jpg" alt="">
                    <h3>The Four Humors in Unani Medicine</h3>
                    <p>Explore the concept of the four humors in Unani medicine and how they influence your health. Learn how Unani practitioners balance these humors for well-being.</p>
                    <a href="#">Read more</a>
                </div>
                <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                    <img class="img-fluid pb-3" src="images/h9.jpg" alt="">
                    <h3>Herbal Remedies in Unani Medicine</h3>
                    <p>Discover the power of herbs in Unani medicine. Explore common herbs used for healing and maintaining health according to Unani principles.</p>
                    <a href="#">Read more</a>
                </div>
                <!-- Add more Unani blog posts here -->
            </div>
        </div>
        <div class="sidebar col-lg-4 col-md-4 col-12">
            <!-- Your sidebar content can be added here -->
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
                    <span>Get connected with us on social networks:</span>
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
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-white me-4">
                        <i class="fab fa-github"></i>
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
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">Unani Tip</h6>
                            <hr
                                class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px"
                            />
                            <p>
                                Embrace natural healing with Unani medicine. It's a holistic approach that focuses on your unique constitution and aims to restore balance for better health.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
                            <hr
                                class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px"
                            />
                            <p>
                                <a href="homeopathy.php" class="text-dark">Homeopathy</a>
                            </p>
                            <p>
                                <a href="naturopathy.php" class="text-dark">Naturopathy</a>
                            </p>
                            <p>
                                <a href="yoga.php" class="text-dark">Yoga</a>
                            </p>
                            <p>
                                <a href="ayurveda.php" class="text-dark">Ayurveda</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr
                                class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #7c4dff; height: 2px"
                            />
                            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                            <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
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
                © 2023 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/"
                >behealthy.com</a
                >
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

