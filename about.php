<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Change this to the correct title -->
    <title>Diffun Water District - Online Reading Tool</title>

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="service-details-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/dwd-logo.png" alt="Diffun Water District Logo">
                <h1 class="sitename">Diffun Water District</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (!empty($_GET['message'])): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Invalid <strong>email</strong> or <strong>password!</strong>
                        </div>
                    <?php endif; ?>

                    <?php
                    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                        $savedemail = $_COOKIE['email'];
                        $savedpassword = $_COOKIE['password'];
                    } else {
                        $savedemail = "";
                        $savedpassword = "";
                    }
                    ?>
                    <form class="user needs-validation" action="assets/includes/signin.php" method="POST" novalidate>
                        <div class="form-group has-validation mb-4">
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                value="<?php echo $savedemail; ?>" required>
                            <div class="invalid-feedback">Please enter your email.</div>

                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="InputPassword" name="InputPassword"
                                placeholder="Password" value="<?php echo $savedpassword; ?>" required>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="rememberMe" name="rememberMe">
                                <label class="custom-control-label" for="rememberMe">Remember
                                    Me</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 text-left">
                                <a href="forgot-password.php" class="text-primary">Forgot Password?</a>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="register.php" class="text-primary">Create an Account!</a>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="loginBtn" name="loginBtn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main class="main">

        <section id="hero" class="hero section dark-background">

            <img src="assets/img/dwd-bg.jpg" alt="" data-aos="fade-in">

            <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2>About</h2>

                        <h4>Diffun Water District</h4>
                    </div>
                </div>
            </div>

        </section>

        <section class="service-details section">
            <div class="d-flex justify-content-center" data-aos="fade-up">
                <h2><strong>Diffun Water District</strong></h2>
            </div>
            <div class="container" data-aos="fade-up">
                <p style="font-size: 20px;">Water supply system is the process of distributing water from the treatment
                    facility to the
                    concessionaires through pipes which are suited for drinking water. Before transporting water whether
                    it be from the distribution source storage facility, we see to it that it has undergone appropriate
                    processing or treatment to ensure that it is safe for human consumption and the environment as well.
                </p>
                <br>
                <p style="font-size: 20px;">
                    The DWD is mandated to meet the parameters for Drinking Water quality standards to include
                    microbiological, physical, chemical and radiological compositions of water. As such, chlorination is
                    done 24/7 to ensure that the water supply meets the PNSW Reference and should contain no indication
                    of organisms.
                </p>

                <h4><strong>General Information of the Supplier</strong></h4>
                <p style="font-size: 20px;">The Diffun Water District was established by virtue of Section 4 of
                    Presidential Decree (PD) 768 and
                    479 known and referred to as “Local Water District Law” and Provincial Water Utilities Act of 1973,
                    respectively. The Local Water Utilities Administration (LWUA) has awarded The Conditional
                    Certificate of Conformance No. 279 on February 12, 1987. By virtue of this certificate, it has made
                    DWD a bonafide with Section 7 of Presidential Decree 198 as amended. As such, it has become a member
                    of the Philippine Association of Water District (PAWD).</p><br>
                <p style="font-size: 20px;">The Water District operates with the primary objective of giving the best
                    service possible to its
                    concessionaires by providing them with reliable, economically viable and potable water supply. It is
                    one of the leading water service providers in the Province of Quirino. DWD water sources are reliant
                    to ground water. The Diffun Water District is headed by the General Manager who is in charge of the
                    day-to-day operations. The DWD water system facilities include six (6) operational deep wells,
                    network of pipelines, two (2) concrete ground reservoirs. With the current deep well facilities, it
                    serves seven (7) barangays out of the thirty three (33) barangays or barely 22% water service
                    coverage.
                </p>
                <p style="font-size: 20px;">
                    Presently the six (6) operational deep well pumping stations are:
                    <br>
                    <strong>1.</strong> Public Market PS 1<br>
                    <strong>2.</strong> Rizal PS 2<br>
                    <strong>3.</strong> Rizal PS 3<br>
                    <strong>4.</strong> Liwanag PS 4<br>
                    <strong>5.</strong> Maria Clara PS 5<br>
                    <strong>6.</strong> Liwayway PS 6.<br>
                    <br>
                    At present the DWD has 9 regular and 1 Job Order employees serving 1630 concessionaires as of May
                    31, 2024

                </p>

            </div>

        </section>




    </main>


    <footer id="footer" class="footer dark-background">
        <div class="container">
            <h3 class="sitename">Diffun Water District</h3>
            <p>"Stay Hydrated, Stay Healthy"</p>
            <div class="copyright">
                <span>Copyright</span> <strong class="px-1 sitename">Diffun Water District</strong> <span>All Rights
                    Reserved</span>
            </div>
        </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-wEgOoOMUXzHnOaq01SCsMK+u0z41iuV0zFNsGxnHhzzwQtAuU0Q+bT8DyZBOeNyk"
        crossorigin="anonymous"></script>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        const myModal = document.getElementById('exampleModal');
        myModal.addEventListener('shown.bs.modal', () => {
            const myInput = document.querySelector('#exampleModal input'); // Adjust selector if needed
            if (myInput) {
                myInput.focus();
            }
        });


    </script>

</body>

</html>