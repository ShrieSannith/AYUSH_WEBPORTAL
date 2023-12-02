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
    <title>Yoga Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="blog.css?v=1">
    <script src="https://kit.fontawesome.com/d5d77cd114.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="intro">
            <img class="homeimg img-fluid" src="images/3.jpg" alt="">
            <div class="head text-center">
                <h1>Yoga Blog</h1>
                <h6>Your source for yoga and wellness</h6>
                <p>Discover the benefits of yoga, meditation, and healthy living.</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid container">
                <a class="navbar-brand" href="#">Yoga</a>
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
        <h5><strong>Meditation Mudras</strong></h5>
        <div class="row">
            <!-- Apaan Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m1.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Apaan Mudra</p>
                    <h4>Benefits of Apaan Mudra</h4>
                    <h6 id="apaanMudraContent" style="display: none;">
                        Apaan Mudra is a powerful hand gesture used in meditation. It helps in promoting digestion, detoxification, and elimination of waste from the body. This mudra can also increase the element of fire in the body and boost metabolism.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('apaanMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Gyan Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m2.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Gyan Mudra</p>
                    <h4>Benefits of Gyan Mudra</h4>
                    <h6 id="gyanMudraContent" style="display: none;">
                        Gyan Mudra, also known as the wisdom gesture, enhances concentration, memory, and knowledge. It can help in reducing stress and anxiety while promoting inner peace and spiritual growth.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('gyanMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Vayu Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m3.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Vayu Mudra</p>
                    <h4>Benefits of Vayu Mudra</h4>
                    <h6 id="vayuMudraContent" style="display: none;">
                        Vayu Mudra, also known as the wind gesture, helps in reducing excessive air in the body, thus relieving problems like bloating and joint pain. It can also calm the mind and reduce anxiety.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('vayuMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Prana Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m4.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Prana Mudra</p>
                    <h4>Benefits of Prana Mudra</h4>
                    <h6 id="pranaMudraContent" style="display: none;">
                        Prana Mudra, also known as the life force gesture, can boost vitality, improve the immune system, and enhance energy levels. It is excellent for overall health and well-being.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('pranaMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Shunya Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m5.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Shunya Mudra</p>
                    <h4>Benefits of Shunya Mudra</h4>
                    <h6 id="shunyaMudraContent" style="display: none;">
                        Shunya Mudra, also known as the empty gesture, can help alleviate ear problems, improve focus, and enhance the sense of emptiness and openness. It's beneficial for mental clarity.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('shunyaMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Apan Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m6.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Apan Mudra</p>
                    <h4>Benefits of Apan Mudra</h4>
                    <h6 id="apanMudraContent" style="display: none;">
                        Apan Mudra, also known as the purification gesture, helps in detoxifying the body, improving digestion, and promoting overall well-being. It can also balance the elements in the body.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('apanMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Surya Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m7.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Surya Mudra</p>
                    <h4>Benefits of Surya Mudra</h4>
                    <h6 id="suryaMudraContent" style="display: none;">
                        Surya Mudra, also known as the sun gesture, can increase the element of fire in the body, improve digestion, and boost metabolism. It is energizing and can enhance enthusiasm.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('suryaMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Varun Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m8.jpg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Varun Mudra</p>
                    <h4>Benefits of Varun Mudra</h4>
                    <h6 id="varunMudraContent" style="display: none;">
                        Varun Mudra, also known as the water gesture, can balance the water element in the body, improve skin health, and promote a sense of calm and openness.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('varunMudraContent');">Read more</a>
                </div>
            </div>
    
            <!-- Linga Mudra -->
            <div class="one col-lg-4 col-md-6 col-12 mb-3">
                <img class="blog-img img-fluid" src="images/m9.jpeg" alt="">
                <div class="text h-52 w-75 p-4">
                    <p>Linga Mudra</p>
                    <h4>Benefits of Linga Mudra</h4>
                    <h6 id="lingaMudraContent" style="display: none;">
                        Linga Mudra, also known as the symbol of power, can increase body heat, boost the immune system, and promote vitality. It's beneficial during cold seasons.
                    </h6>
                    <a href="javascript:void(0);" onclick="toggleContent('lingaMudraContent');">Read more</a>
                </div>
            </div>
            <!-- ... (remaining content) ... -->
        </div>
    </section>
    
    <script>
        // JavaScript function to toggle the visibility of content
        function toggleContent(mudraId) {
            var content = document.getElementById(mudraId);
            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
    

    <section class="subscription container p-4 my-5" id="subscription">
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
        <h5><strong>Posts</strong></h5>
        <div class="row">
            <div class="post col-lg-8 col-md-8 col-12">
                <div class="row">
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/1.jpg" alt="">
                        <h3>5 Essential Yoga Poses for Beginners</h3>
                        <p>If you're new to yoga, these essential yoga poses will help you get started on your yoga journey. These poses are perfect for beginners and provide a solid foundation for your practice.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/2.jpg" alt="">
                        <h3>The Benefits of Yoga and Stress Relief</h3>
                        <p>Discover how practicing yoga can help you manage stress and find inner peace. Learn about the physical and mental benefits of yoga for stress relief.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/4.jpg" alt="">
                        <h3>Yoga for Flexibility: Best Poses and Tips</h3>
                        <p>If you want to improve your flexibility, yoga is a great way to achieve that. Explore the best yoga poses and tips to enhance your flexibility and range of motion.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/5.jpg" alt="">
                        <h3>Yoga and Mindfulness: Finding Inner Balance</h3>
                        <p>Learn how the combination of yoga and mindfulness practices can help you find inner balance and harmony. Discover techniques to stay present and reduce stress.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/6.jpg" alt="">
                        <h3>Yoga and Healthy Living: A Holistic Approach</h3>
                        <p>Explore the holistic approach of yoga towards healthy living. Discover how yoga can benefit your physical, mental, and emotional well-being for a balanced life.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/7.jpg" alt="">
                        <h3>Yoga and Breathing Techniques for Relaxation</h3>
                        <p>Learn about the importance of proper breathing techniques in yoga for relaxation and stress reduction. Discover how pranayama can enhance your yoga practice.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/8.jpg" alt="">
                        <h3>Yoga for Strength: Building a Stronger Body</h3>
                        <p>If you're looking to build strength and tone your muscles, yoga has effective poses for you. Explore yoga poses and routines designed to increase your physical strength.</p>
                        <a href="#">Read more</a>
                    </div>
                    <div class="post1 col-lg-6 col-md-6 col-12 pb-4">
                        <img class="img-fluid pb-3" src="images/9.jpg" alt="">
                        <h3>Yoga and Meditation: A Path to Inner Peace</h3>
                        <p>Discover how the combination of yoga and meditation can lead you on a path to inner peace and self-discovery. Learn techniques to calm your mind and reduce stress.</p>
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
                                    <a href="ayurveda.php" class="text-dark">Ayurveda</a>
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
