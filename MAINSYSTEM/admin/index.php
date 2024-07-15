<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid" style="margin-top: 30px;">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" style="font-family: Georgia, 'Times New Roman', Times, serif;">
                        ADMIN_DASHBOARD </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="margin-top: 30px;">
        <div class="container-fluid shadow">
            <div class="row">

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                            <?php
                            $sql = "SELECT COUNT(*) AS total_users FROM users WHERE role <> 'Admin'";
                            $result = $connect->query($sql);
                            $total_users = 0;
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $total_users = $row["total_users"];
                            }
                            ?>
                            <center><span class="info-box-text">USERS</span></center>
                            <hr>
                            <center><span class="info-box-number">0<?php echo $total_users; ?></span></center>
                        </div>
                    </div>

                </div>

                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sms"></i></span>
                        <div class="info-box-content">
                            <?php
                            $sql = "SELECT COUNT(*) AS total FROM info";
                            $result = $connect->query($sql);
                            $total = 0;
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $total = $row["total"];
                            }
                            ?>
                            <center><span class="info-box-text">FEEDBACKS</span></center>
                            <hr>
                            <center><span class="info-box-number">0<?php echo $total; ?></span></center>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-circle"></i></span>
                        <div class="info-box-content">
                            <?php
                            $sql = "SELECT COUNT(*) AS total FROM recreation";
                            $result = $connect->query($sql);
                            $total = 0;
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $total = $row["total"];
                            }
                            ?>
                            <center><span class="info-box-text">RECREATIONS</span></center>
                            <hr>
                            <center><span class="info-box-number">0<?php echo $total; ?></span></center>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box" style="height: 110px;">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <?php
                            $sql = "SELECT COUNT(*) AS total FROM request";
                            $result = $connect->query($sql);
                            $total_users = 0;
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $total = $row["total"];
                            }
                            ?>
                            <center><span class="info-box-text">REQUESTS</span></center>
                            <hr>
                            <center><span class="info-box-number">0<?php echo $total; ?></span></center>
                        </div>

                    </div>

                </div>




            </div>


        </div>

    </section>
</div>
<?php include '../include/footer.php'; ?>