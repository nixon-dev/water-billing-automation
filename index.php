<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['message'])) {
    $message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : null;
} elseif (isset($_GET['error'])) {
    $message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : null;
}

if (isset($_GET['r-message'])) {
    $rmessage = isset($_GET['r-message']) ? htmlspecialchars($_GET['r-message']) : null;
} elseif (isset($_GET['r-error'])) {
    $rmessage = isset($_GET['r-error']) ? htmlspecialchars($_GET['r-error']) : null;
}
?>


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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="starter-page-page">

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

    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="changeableLabel">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link <?php echo (!empty($message) || empty($rmessage)) ? 'active' : ''; ?>"
                            data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" id="signinTab">
                            Signin
                        </a>

                        <a class="nav-link <?php echo !empty($rmessage) ? 'active' : ''; ?>" data-bs-toggle="tab"
                            href="#nav-profile" role="tab" aria-controls="nav-profile" id="signupTab">
                            Signup
                        </a>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade <?php echo empty($message) && empty($rmessage) ? 'show active' : ''; ?> <?php echo !empty($message) ? 'show active' : ''; ?>"
                            id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> <br>

                            <?php if (!empty($_GET['message'])): ?>
                                <div class="alert alert-success text-center" role="alert">
                                    <?php echo $_GET['message']; ?>
                                </div>
                            <?php elseif (!empty($_GET['error'])): ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <?php echo $_GET['error']; ?>
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
                            <form class="user needs-validation" action="assets/includes/signin.php" method="POST"
                                novalidate>
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
                                <div class="form-group mb-4 row col-sm-12">
                                    <div class="custom-control custom-checkbox small col-sm-6">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe"
                                            name="rememberMe">
                                        <label class="custom-control-label" for="rememberMe">Remember
                                            Me</label>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <a href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                </div>

                                
                                <div class="form-group mb-4 d-flex justify-content-center">
                                    <button class="btn btn-primary w-50" type="submit" id="loginBtn"
                                        name="loginBtn">Login</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade <?php echo !empty($rmessage) ? 'show active' : ''; ?>"
                            id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <br>
                            <?php if (!empty($_GET['r-error'])): ?>
                                <div class="alert alert-danger snow text-center" role="alert">
                                    <?php echo $_GET['r-error']; ?>
                                </div>
                            <?php elseif (!empty($_GET['r-message'])): ?>
                                <div class="alert alert-success snow text-center" role="alert">
                                    <?php echo $_GET['r-message']; ?>
                                </div>
                            <?php endif; ?>

                            <form class="user needs-validation" action="assets/includes/signup.php" method="POST"
                                needs-validation>

                                <div class="form-group row has-validation mb-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="InputFirstName"
                                            name="InputFirstName" placeholder="First Name" required
                                            oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="InputLastName" name="InputLastName"
                                            placeholder="Last Name" required
                                            oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                                    </div>
                                    <div class="invalid-feedback">Please enter your name!</div>
                                </div>

                                <div class="form-group has-validation mb-4">
                                    <select id="InputAddress" name="InputAddress" placeholder="Search Address" required>
                                        <option value=""></option>
                                        <option value="Aklan Village">Aklan Village</option>
                                        <option value="Andres Bonifacio (Poblacion)">Andres Bonifacio
                                            (Poblacion)</option>
                                        <option value="Aurora East (Poblacion)">Aurora East (Poblacion)</option>
                                        <option value="Aurora West (Poblacion)">Aurora West (Poblacion)</option>
                                        <option value="Baguio Village">Baguio Village</option>
                                        <option value="Balagbag">Balagbag</option>
                                        <option value="Bannawag">Bannawag</option>
                                        <option value="Cajel">Cajel</option>
                                        <option value="Campamento">Campamento</option>
                                        <option value="Diego Silang">Diego Silang</option>
                                        <option value="Sittio Der-an">Sittio Der-an</option>
                                        <option value="Don Mariano Perez, Sr.">Don Mariano Perez, Sr.</option>
                                        <option value="Doña Imelda">Doña Imelda</option>
                                        <option value="Dumanisi">Dumanisi</option>
                                        <option value="Gabriela Silang">Gabriela Silang</option>
                                        <option value="Gulac">Gulac</option>
                                        <option value="Guribang">Guribang</option>
                                        <option value="Ifugao Village">Ifugao Village</option>
                                        <option value="Isidro Paredes">Isidro Paredes</option>
                                        <option value="Rizal (Poblacion)">Rizal (Poblacion)</option>
                                        <option value="Liwayway">Liwayway</option>
                                        <option value="Luttuad">Luttuad</option>
                                        <option value="Magsaysay">Magsaysay</option>
                                        <option value="Makate">Makate</option>
                                        <option value="Maria Clara">Maria Clara</option>
                                        <option value="Rafael Palma (Don Sergio Osm)">Rafael Palma (Don Sergio
                                            Osm)</option>
                                        <option value="Ricarte Norte">Ricarte Norte</option>
                                        <option value="Ricarte Sur">Ricarte Sur</option>
                                        <option value="San Antonio">San Antonio</option>
                                        <option value="San Isidro">San Isidro</option>
                                        <option value="San Pascual">San Pascual</option>
                                        <option value="Villa Pascua">Villa Pascua</option>
                                        <option value="Gregorio Pimentel">Gregorio Pimentel</option>
                                        <option value="Don Faustino Pagaduan">Don Faustino Pagaduan</option>


                                    </select>
                                </div>

                                <!-- <div class="form-group has-validation">
                                            <input type="number" class="form-control" id="InputPhone" name="InputPhone"
                                                placeholder="Phone Number" required minlength="11"
                                                oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11)">
                                            <div class="invalid-feedback">Please enter a valid Phone Number!</div>
                                        </div> -->

                                <div class="form-group has-validation mb-4">
                                    <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                        placeholder="Email Address"
                                        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,63}$" required>
                                    <div class="invalid-feedback">Please enter a valid Email address!</div>

                                </div>

                                <div class="form-group row has-validation mb-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" id="InputPassword"
                                            name="InputPassword" placeholder="Password" minlength="8" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="InputRepeatPassword"
                                            name="InputRepeatPassword" placeholder="Repeat Password" minlength="8" required>
                                    </div>
                                    <div class="invalid-feedback">Please choose your password!</div>
                                </div>
                                <div class="form-group mb-4 d-flex justify-content-center">

                                    <button class="btn btn-primary w-50 btn-block" type="submit" id="signupBtn"
                                        name="signupBtn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                        <h2>Diffun Water District</h2>
                        <p>Safe Water is Life.......</p>
                        <a href="#" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#exampleModal">Get
                            Started</a>
                    </div>
                </div>
            </div>

        </section>



        <section id="starter-section" class="starter-section section">

            <div class="container d-flex justify-content-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-center" data-aos="fade-up">
                        <h2><strong>Vision</strong></h2>
                    </div>
                    <p style="font-size: 20px;">To be the leading Water District in the Province of Quirino in the
                        delivery of safe and potable
                        water, built on sustainable development and competent workforce.</p>


                    <div class="d-flex justify-content-center" data-aos="fade-up">
                        <h2><strong>MISSION</strong></h2>
                    </div>
                    <p style="font-size: 20px;">To provide adequate, potable and affordable water within its coverage
                        area to enhance a healthy
                        environment.</p>

                    <div class="d-flex justify-content-center" data-aos="fade-up">
                        <h2><strong>PERFORMANCE PLEDGE</strong></h2>
                    </div>
                    <p style="font-size: 20px;">We, the Officers and Employee of Diffun Water District (DWD) are
                        DEDICATED to work for the
                        WELFARE
                        of our client and give utmost DILIGENCE to deliver safe and potable water to our valued
                        concessionaires.</p>
                </div>
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

    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#InputAddress").selectize({
            sortField: 'text'
        });
    </script>
    <script>
        <?php if (!empty($message)): ?>
            // Show the modal if the message is not empty
            var messageModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            messageModal.show();
        <?php endif; ?>
        <?php if (!empty($rmessage)): ?>
            // Show the modal if the message is not empty
            var messageModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            messageModal.show();
        <?php endif; ?>

    </script>
    <script>
        const myModal = document.getElementById('exampleModal');
        myModal.addEventListener('shown.bs.modal', () => {
            const myInput = document.querySelector('#exampleModal input'); // Adjust selector if needed
            if (myInput) {
                myInput.focus();
            }
        });


    </script>

    <script>



        const signinTab = document.getElementById('signinTab');
        const signupTab = document.getElementById('signupTab');
        const modalTitle = document.getElementById('changeableLabel');

        document.getElementById('nav-tab').addEventListener('shown.bs.tab', function (event) {
            if (event.target.id === 'signinTab') {
                modalTitle.textContent = 'Login';
            } else if (event.target.id === 'signupTab') {
                modalTitle.textContent = 'Create Account';
            }
        });
    </script>

</body>

</html>