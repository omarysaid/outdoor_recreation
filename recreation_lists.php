<?php
session_start();
include './connection/connection.php';

$sql = "SELECT recreation_id, name, location, activities, time, cost, image, contact FROM recreation WHERE status = 1";
$result = $connect->query($sql);
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
            <h2>Welcome to ORMS</h2>
        </div>
    </div>
    <!-- end loader -->
  
    <header class="top-header" style="background-color: teal;">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <b style="font-family: Georgia, 'Times New Roman', Times, serif;color:black;">
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
                        <b style="color:black;margin-top:20px; font-size: 20px;">
                            <?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>
                        </b>
                        <li>
                            <a class="nav-link" href="index.php">
                                <button class="btn btn" style="background-color: green;">
                                    <h2 style="color: white;font-size: 13px; margin-top: 10px;"> LOG OUT</h2>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <section class="section layout_padding padding_bottom-0">
        <div class="container" style="background-color:whitesmoke;">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2
                                style="font-size: 20px; font-family:Georgia, 'Times New Roman', Times, serif; margin-top:20px">
                                Available Recreations</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $active = true; // Flag to track active item
                            $count = 0; // Counter to track items

                        
                            while ($row = $result->fetch_assoc()) {
                                $recreation_id = $row['recreation_id'];
                                $name = $row['name'];
                                $location = $row['location'];
                                $activities = $row['activities'];
                                $time = $row['time'];
                                $cost = $row['cost'];
                                $image = $row['image'];
                                $contact = $row['contact'];

                                $active_class = $active ? 'active' : '';

                                if ($count % 2 == 0) {
                                    echo '<div class="carousel-item ' . $active_class . '"><div class="row">';
                                }
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="full blog_img_popular">
                                    <img class="img-responsive" src="./MAINSYSTEM/uploads/<?php echo $image; ?>"
                                        alt="<?php echo $name; ?>" />
                                    <h4 style="text-align: center;"><?php echo $name; ?></h4>
                                    <div style="text-align: left;">
                                        <?php echo $activities; ?>
                                        <hr>
                                        <strong>Location:</strong> <?php echo $location; ?><br>
                                        <strong>Time:</strong> <?php echo $time; ?><br>
                                        <strong>Cost:(Tshs)</strong> <?php echo $cost; ?><br>
                                        <strong>Contact:</strong> <?php echo $contact; ?>
                                        <center>
                                            <div class="button_section">
                                                <a href="#" class="btn btn-success"
                                                    data-recreation-id="<?php echo $recreation_id; ?>">REQUEST</a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <?php
                                if ($count % 2 != 0) {
                                    echo '</div></div>';
                                }

                                $active = false;
                                $count++;
                            }

                            if ($count % 2 != 0) {
                                echo '</div></div>';
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" style="background-color: teal;" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" style="background-color: teal;" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script>
    $(document).ready(function() {
        $('.btn-success').on('click', function() {
            var recreation_id = $(this).data('recreation-id');
            var activity = $(this).closest('.blog_img_popular').find('h4').text();
            $('#activity').val(activity);
            $('#recreation_id').val(recreation_id);
            $('#bookingModal').modal('show');
        });
    });
    </script>

  
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Recreation Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm" action="./MAINSYSTEM/request/add.php" method="POST">
                        <?php if (!empty($userStatus)) : ?>
            <div class="alert <?php echo strpos($Status, 'successfully') !== false ? 'alert-success' : 'alert-primary'; ?>"
                id="successMessage" style="color:white">
                <?php echo $Status; ?>
            </div>
            <?php endif; ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="fullname" name="user_id"
                                value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>" required>
                        </div>
                        <div class="form-group">

                            <input type="hidden" name="recreation_id" class="form-control" id="recreation_id_display"
                                name="recreation_id_display" readonly>
                        </div>

                        <div class="form-group">
                            <label for="activity">Recreation Name</label>
                            <input type="text" class="form-control" id="activity" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <div class="form-group">
                            <label for="participants">Number of Participants</label>
                            <input type="number" class="form-control" id="participants" name="participants" required>
                        </div>
                        <button type="submit" name="add_request" class="btn btn-primary">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.btn-success').on('click', function() {
            var recreation_id = $(this).data('recreation-id');
            var activity = $(this).closest('.blog_img_popular').find('h4').text();

        
            $('#activity').val(activity);
            $('#recreation_id').val(recreation_id);
            $('#recreation_id_display').val(recreation_id); 

         
            $('#bookingModal').modal('show');
        });
    });
    </script>

</body>

</html>

<?php

$connect->close();
?>