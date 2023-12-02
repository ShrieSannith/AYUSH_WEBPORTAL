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
    <title>Ayurveda Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="blog.css?v=1">
    <script src="https://kit.fontawesome.com/d5d77cd114.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="intro">
            <img class="homeimg img-fluid" src="images/a13.jpg" alt="">
            <div class="head text-center">
                <h1>Ayurveda Blog</h1>
                <h6>Your source for Ayurveda and holistic wellness</h6>
                <p>Discover the wisdom of Ayurveda for a balanced and healthy life.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid container">
                <a class="navbar-brand" href="#">Ayurveda</a>
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
        <h5><strong>Ayurvedic Wisdom</strong></h5>
        <div class="row">
            <!-- Doshas -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/a2.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Ayurvedic Doshas</p>
                    <h4>Understanding Your Dosha</h4>
                    <h6 id="doshasContent" style="display: none;">
                        Ayurveda categorizes individuals into three primary doshas: Vata, Pitta, and Kapha. Discover your dosha and learn how to maintain balance and harmony in your life.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('doshasContent');">Read more</a>
                </div>
            </div>
    
            <!-- Ayurvedic Diet -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/a1.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Ayurvedic Diet</p>
                    <h4>Balancing Your Health with Food</h4>
                    <h6 id="ayurvedicDietContent" style="display: none;">
                        Learn about the Ayurvedic diet and how it can promote overall well-being. Discover food choices and dietary practices that align with your dosha.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('ayurvedicDietContent');">Read more</a>
                </div>
            </div>
    
            <!-- Ayurvedic Herbs -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/a3.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Ayurvedic Herbs</p>
                    <h4>Natural Remedies and Healing Herbs</h4>
                    <h6 id="ayurvedicHerbsContent" style="display: none;">
                        Explore the world of Ayurvedic herbs and their healing properties. Discover how these natural remedies can address common health issues.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('ayurvedicHerbsContent');">Read more</a>
                </div>
            </div>
    
            <!-- Yoga and Ayurveda -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/a4.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Yoga and Ayurveda</p>
                    <h4>Harmony of Mind and Body</h4>
                    <h6 id="yogaAyurvedaContent" style="display: none;">
                        Discover the connection between yoga and Ayurveda. Learn how combining these ancient practices can lead to a balanced and harmonious life.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('yogaAyurvedaContent');">Read more</a>
                </div>
            </div>
    
            <!-- Ayurvedic Lifestyle -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/a5.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Ayurvedic Lifestyle</p>
                    <h4>Living in Harmony with Nature</h4>
                    <h6 id="ayurvedicLifestyleContent" style="display: none;">
                        Embrace the Ayurvedic lifestyle and its principles for holistic well-being. Discover daily routines, practices, and rituals to align with nature's cycles.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('ayurvedicLifestyleContent');">Read more</a>
                </div>
            </div>
    
            <!-- ... (remaining content) ... -->
        </div>
    </section>
    
    <script>
        // JavaScript function to toggle the visibility of content
        function toggleContent(ayurvedaId) {
            var content = document.getElementById(ayurvedaId);
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
                <p>Sign up and receive notifications when new updates are available!</p>
            </div>
            <div class="sub col-lg-6 col-md-6 col-12">
                <input class="py-2 px-3 col-lg-6 col-md-12 my-2" type="email" name="email" placeholder="Your Email">
                <button class="text-uppercase col-lg-5 col-md-12">Subscribe</button>
            </div>
        </div>
    </section>
    <section class="blog container my-5" id="blog">
        <h5><strong>Ayurveda Blog</strong></h5>
        <div class="row">
            <div class="post col-lg-8 col-md-8 col-12">
                <div class="row">
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/a6.jpg" alt="">
                        <h3>Ayurveda and Yoga: Holistic Wellness</h3>
                        <p>Explore the synergy between Ayurveda and yoga for holistic wellness. Learn how these ancient practices can harmonize your body, mind, and soul.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/a7.jpg" alt="">
                        <h3>Ayurvedic Diet: Eating for Balance</h3>
                        <p>Discover the principles of the Ayurvedic diet and how it can help you achieve balance and well-being. Explore food choices aligned with your dosha.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/a8.jpg" alt="">
                        <h3>Ayurvedic Herbs: Natural Remedies</h3>
                        <p>Learn about the healing power of Ayurvedic herbs and how they can address common health issues. Discover natural remedies to support your well-being.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/a9.jpg" alt="">
                        <h3>Meditation in Ayurveda: Inner Peace</h3>
                        <p>Explore the role of meditation in Ayurveda for achieving inner peace and harmony. Learn techniques to calm your mind and reduce stress the Ayurvedic way.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/a10.jpg" alt="">
                        <h3>Ayurvedic Lifestyle: Balancing Act</h3>
                        <p>Embrace the Ayurvedic lifestyle and its principles for holistic well-being. Discover daily routines, practices, and rituals to align with nature's cycles.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h6.jpg" alt="">
                        <h3>Ayurvedic Detox: Cleansing Your Body</h3>
                        <p>Learn about Ayurvedic detox methods to cleanse your body and rejuvenate your health. Discover the importance of detoxification for overall well-being.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h3.jpg" alt="">
                        <h3>Ayurvedic Massage: Healing Touch</h3>
                        <p>Explore the benefits of Ayurvedic massage and how it can promote relaxation and healing. Learn about different types of Ayurvedic massages and their effects.</p>
                        <a href="#">Read more</a>
                    </div>
                </div>
            </div>
            <div class="sidebar col-lg-4 col-md-4 col-12">
                <!-- ... (sidebar content remains the same) ... -->
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
                                <h6 class="text-uppercase fw-bold">Yoga Tip</h6>
                                <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px"
                                />
                                <p>
                                    Focus on maintaining correct alignment in each yoga pose. Proper alignment ensures you get the maximum benefits from the pose while minimizing the risk of injury. It also helps you build strength and flexibility more effectively.
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Useful links</h6>
                                <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px"
                                />
                                <p>
                                    <a href="unani.php" class="text-dark">Unani</a>
                                </p>
                                <p>
                                    <a href="yoga.php" class="text-dark">Yoga</a>
                                </p>
                                <p>
                                    <a href="naturopathy.php" class="text-dark">Naturopathy</a>
                                </p>
                                <p>
                                    <a href="homeopathy.php" class="text-dark">Homeopathy</a>
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
