<?php
session_start();
include './connection/connection.php';
$userAddStatus = "";

if (isset($_POST["add_user"])) {
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
     $email = $_POST['email'];
    $password = md5($_POST['password']); 
  $usertype = $_POST['role'];
    if (empty($errors)) {
        $insert_new_user = "INSERT INTO users (fullname, gender, country,phone,email, password,role) 
                            VALUES ('$fullname', '$gender', '$country','$phone', '$email', '$password','$usertype')";

        if (mysqli_query($connect, $insert_new_user)) {
            $userAddStatus = "User Registered successfully";
        } else {
            $userAddStatus = "Error occurred while adding user";
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="./Style/css/bootstrap.min.css" rel="stylesheet">
    <link href="./Style/css/font-awesome.min.css" rel="stylesheet">
    <link href="./Style/css/style.css" rel="stylesheet">

    <title>ORMS</title>
    <style>
    .gender-options input[type="radio"] {
        margin-right: 5px;
    }

    .gender-options label {
        margin-right: 15px;
    }
    </style>
</head>

<body>
    <section class="form-02-main" style="background-image: url(./Style/images/recre5.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main" style="background-color:teal">
                            <div class="logo">
                                <img src="./Style/images/user.png">
                            </div>
                            <form action="" method="POST">
                                <div <?php echo !empty($userAddStatus) && strpos($userAddStatus, 'successfully') !== false ? 'class="alert-success"' : ''; ?>
                                    id="successMessage" style="text-align:center; color: green;">
                                    <?php echo $userAddStatus; ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="fullname" class="form-control _ge_de_ol"
                                                placeholder=" Fullname" required="yes" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <div class="gender-options">
                                                <input type="radio" id="male" name="gender" value="Male" required>
                                                <label for="male">Male</label>
                                                <input type="radio" id="female" name="gender" value="Female">
                                                <label for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="country" class="form-control _ge_de_ol"
                                                placeholder="Enter Country" required="yes" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="phone" class="form-control _ge_de_ol"
                                                placeholder="Enter Phone" required="yes" aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control _ge_de_ol"
                                                placeholder="Enter email" required="yes" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control _ge_de_ol"
                                                placeholder="Enter password" required="yes" aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="role" class="form-control _ge_de_ol"
                                               value="Visitor" >
                                        </div>
                                </div>
                                <div class="form-group">
                                    <button class="_btn_04" style="background-color: teal;" type="submit"
                                        name="add_user">
                                        Register
                                    </button>
                                </div>
                            </form>
                            <div class="form-group nm_lk">
                                <a href="login.php">Already Have an Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>