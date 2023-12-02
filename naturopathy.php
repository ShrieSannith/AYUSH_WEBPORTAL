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
    <title>Naturopathy Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="blog.css?v=1">
    <script src="https://kit.fontawesome.com/d5d77cd114.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="intro">
            <img class="homeimg img-fluid" src="images/h11.jpg" alt="">
            <div class="head text-center">
                <h1>Naturopathy Blog</h1>
                <h6>Your source for natural wellness</h6>
                <p>Discover the benefits of naturopathy, holistic health, and natural living.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid container">
                <a class="navbar-brand" href="#">Naturopathy</a>
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
        <h5><strong>Benefits of Naturopathy</strong></h5>
        <div class="row">
            <!-- Natural Diet -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h17.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Natural Diet</p>
                    <h4>Benefits of a Natural Diet</h4>
                    <h6 id="naturalDietContent" style="display: none;">
                        A natural diet focuses on whole, unprocessed foods that are rich in nutrients. It can help improve digestion, boost energy levels, and support overall health. Learn more about the benefits of adopting a natural diet.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('naturalDietContent');">Read more</a>
                </div>
            </div>
    
            <!-- Herbal Remedies -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h16.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Herbal Remedies</p>
                    <h4>Benefits of Herbal Remedies</h4>
                    <h6 id="herbalRemediesContent" style="display: none;">
                        Herbal remedies are a natural way to address various health issues. They can help with stress management, improve immunity, and promote healing. Explore the world of herbal remedies and their benefits.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('herbalRemediesContent');">Read more</a>
                </div>
            </div>
    
            <!-- Holistic Wellness -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h15.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Holistic Wellness</p>
                    <h4>Achieving Holistic Wellness</h4>
                    <h6 id="holisticWellnessContent" style="display: none;">
                        Holistic wellness focuses on treating the whole person, including physical, mental, and emotional aspects. It can lead to a balanced and fulfilling life. Learn how to achieve holistic wellness through natural methods.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('holisticWellnessContent');">Read more</a>
                </div>
            </div>
    
            <!-- Naturopathic Practices -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h14.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Naturopathic Practices</p>
                    <h4>Exploring Naturopathic Practices</h4>
                    <h6 id="naturopathicPracticesContent" style="display: none;">
                        Naturopathic practices encompass a wide range of natural therapies, including acupuncture, herbal medicine, and hydrotherapy. Discover the principles and benefits of naturopathy.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('naturopathicPracticesContent');">Read more</a>
                </div>
            </div>
    
            <!-- Mind-Body Connection -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h13.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Mind-Body Connection</p>
                    <h4>Exploring the Mind-Body Connection</h4>
                    <h6 id="mindBodyConnectionContent" style="display: none;">
                        The mind-body connection plays a vital role in naturopathy. Learn how practices like meditation and yoga can enhance this connection, leading to improved mental and physical health.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('mindBodyConnectionContent');">Read more</a>
                </div>
            </div>
    
            <!-- Natural Remedies -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/h12.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Natural Remedies</p>
                    <h4>Common Natural Remedies</h4>
                    <h6 id="naturalRemediesContent" style="display: none;">
                        Explore common natural remedies that can address everyday health issues. From herbal teas to aromatherapy, discover natural solutions to improve your well-being.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('naturalRemediesContent');">Read more</a>
                </div>
            </div>
            <!-- ... (remaining content) ... -->
        </div>
    </section>
    
    <script>
        // JavaScript function to toggle the visibility of content
        function toggleContent(naturopathyId) {
            var content = document.getElementById(naturopathyId);
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
                <h3>Want to get natural health updates?</h3>
                <p>Sign up and receive notifications when new updates are available!</p>
            </div>
            <div class="sub col-lg-6 col-md-6 col-12">
                <input class="py-2 px-3 col-lg-6 col-md-12 my-2" type="email" name="email" placeholder="Your Email">
                <button class="text-uppercase col-lg-5 col-md-12">Subscribe</button>
            </div>
        </div>
    </section>

    <section class="blog container my-5" id="blog">
        <h5><strong>Naturopathy Blog Posts</strong></h5>
        <div class="row">
            <div class="post col-lg-8 col-md-8 col-12">
                <div class="row">
                    <!-- Naturopathic Diet -->
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h1.jpg" alt="">
                        <h3>The Power of Naturopathic Diet</h3>
                        <p>Discover how a naturopathic diet can enhance your health and well-being. Learn about the principles of natural nutrition and its impact on your vitality.</p>
                        <a href="#">Read more</a>
                    </div>
                    <!-- Holistic Healing -->
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h2.jpg" alt="">
                        <h3>Holistic Healing with Naturopathy</h3>
                        <p>Explore the holistic approach to healing through naturopathy. Learn how natural therapies can address the root causes of health issues and promote long-term well-being.</p>
                        <a href="#">Read more</a>
                    </div>
                    <!-- Natural Detoxification -->
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h3.jpg" alt="">
                        <h3>Natural Detoxification Methods</h3>
                        <p>Discover effective and safe methods of natural detoxification. Cleansing your body can lead to increased energy, improved digestion, and overall vitality.</p>
                        <a href="#">Read more</a>
                    </div>
                    <!-- Mindful Living -->
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h4.jpg" alt="">
                        <h3>Mindful Living with Naturopathy</h3>
                        <p>Learn how to embrace mindful living with the principles of naturopathy. Discover practices that promote mental clarity, emotional balance, and stress reduction.</p>
                        <a href="#">Read more</a>
                    </div>
                    <!-- Herbal Medicine -->
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h5.jpg" alt="">
                        <h3>The Magic of Herbal Medicine</h3>
                        <p>Explore the world of herbal medicine and its healing properties. Learn how different herbs can be used to address common health issues naturally.</p>
                        <a href="#">Read more</a>
                    </div>
                    <!-- Naturopathic Lifestyle -->
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/h6.jpg" alt="">
                        <h3>Embracing a Naturopathic Lifestyle</h3>
                        <p>Discover how to embrace a naturopathic lifestyle for long-term health and well-being. Make natural choices in nutrition, self-care, and daily routines.</p>
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
                                <h6 class="text-uppercase fw-bold">Naturopathy Tip</h6>
                                <hr
                                    class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px"
                                />
                                <p>
                                    Embrace a diet rich in whole foods, fruits, and vegetables. Avoid processed foods and artificial additives to support your body's natural healing processes.
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
                                    <a href="yoga.php" class="text-dark">Yoga</a>
                                </p>
                                <p>
                                    <a href="ayurveda.php" class="text-dark">Ayurveda</a>
                                </p>
                                <p>
                                    <a href="unani.php" class="text-dark">Unani</a>
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
