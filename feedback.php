<?php
session_start();
include './connection/connection.php';
$AddStatus = "";

if (isset($_POST["post_info"])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
     $recreation = $_POST['recreation'];
    $feedback =$_POST['feedback']; 

    if (empty($errors)) {
        $insert_new = "INSERT INTO info (name, phone,recreation,feedback) 
                            VALUES ('$name', '$phone', '$recreation','$feedback')";
        if (mysqli_query($connect, $insert_new)) {
            $AddStatus = "Message sent successfully ";
        } else {
            $AddStatus = "Error occurred while adding infos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ORMS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/pogo-slider.min.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/responsive.css" />
    <link rel="stylesheet" href="./assets/css/custom.css" />
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <h2>Wellcome to ORMS</h2>
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header" style="background-color: white;">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <b style="font-family: Georgia, 'Times New Roman', Times, serif;color:teal;">
                        OUTDOOR RECREATIONS
                    </b>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
                    aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.php">Home</a></li>
                        <li><a class="nav-link" href="about.php">About</a></li>



                        <li><a class="nav-link" href="feedback.php">Feedback</a></li>
                        <li>
                            <a class="nav-link" href="login.php">
                                <button class="btn btn" style="background-color: teal;">
                                    <h2 style="color: white;font-size: 13px; margin-top: 10px;"> SIGN IN</h2>
                                </button></a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <!-- End header -->
    <section class="inner_banner" style="background-color: teal;">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>

    <!-- end section -->
    <div class="alert <?php echo !empty($AddStatus) && strpos($AddStatus, 'successfully') !== false ? 'alert-success' : ''; ?>"
        id="successMessage" style="text-align:center">
        <?php echo $AddStatus; ?>
    </div>
    <!-- section -->
    <div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="full float-right_img">
                        <img src="./assets/images/conta.avif" alt="#">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact_form">
                        <form method="POST">
                            <fieldset>
                                <div class="full field">
                                    <input type="text" required="true" placeholder="Your Name" name="name" />
                                </div>

                                <div class="full field">
                                    <input type="number" required="true" placeholder="Phone Number" name="phone" />
                                </div>
                                <div class="full field">
                                    <input type="text" required="true" placeholder="Enter recreation name"
                                        name="recreation" />
                                </div>
                                <div class="full field">
                                    <textarea name="feedback" required="true"
                                        placeholder="Give your feedback"></textarea>
                                </div>
                                <div class="full field">
                                    <div class="center"><button type="submit" name="post_info"
                                            style="background-color: teal;">Send</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer -->
    <footer class="footer-box" style="background-color: teal;">
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer_blog footer_menu white_fonts">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="#">> Join Us</a></li>
                            <li><a href="#">> Facebook</a></li>
                            <li><a href="#">> Instagram</a></li>
                            <li><a href="#">> Tweeter</a></li>
                            <li><a href="#">> Linked In</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer_blog full white_fonts">
                        <h3>Our Services</h3>
                        <p>Recreation managements and reserves services</p>
                        <ul class="full">
                            <li><span>Hospitality</span></li>
                            <li><span>Tourguides operations</span></li>

                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="footer_blog full white_fonts">
                        <h3>Contact us</h3>
                        <ul class="full">
                            <li><span>Dar Es Salaam-Tanzania</span></li>
                            <li><span>orms.online@gmail.com</span></li>
                            <li><span>+255678767654</span></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- End Footer -->



    <!-- ALL JS FILES -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="./assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./assets/js/jquery.pogo-slider.min.js"></script>
    <script src="./assets/js/slider-index.js"></script>
    <script src="./assets/js/smoothscroll.js"></script>
    <script src="./assets/js/form-validator.min.js"></script>
    <script src="./assets/js/contact-form-script.js"></script>
    <script src="./assets/js/isotope.min.js"></script>
    <script src="./assets/js/images-loded.min.js"></script>
    <script src="./assets/js/custom.js"></script>

</body>

</html>