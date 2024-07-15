<?php
session_start();
include './connection/connection.php';

$message = ""; 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if (empty($email) || empty($password)) {
        $message = "Username and password must not be empty.";
    } else {
        $stmt = $connect->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $number = $result->num_rows;

        if ($number > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['role'] = $row['usertype'];

            if ($row['role'] == "Admin") {
                $redirectUrl = './MAINSYSTEM/admin/index.php';
            } elseif ($row['role'] == "Staff") {
                $redirectUrl = './MAINSYSTEM/Staff/view_recreation.php';
            } elseif ($row['role'] == "Visitor") {
                $redirectUrl = './recreation_lists.php';
            }

            header("Location: $redirectUrl");
            exit;
        } else {
            $message = "Wrong username or password. Please try again.";
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
    .error-message {
        margin-top: 10px;
        color: red;
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
                            <!-- Message div -->
                            <?php if (!empty($message)) : ?>
                            <div class="<?php echo $loginSuccess ? 'success-message' : 'error-message'; ?>"
                                style="text-align:center">
                                <?php echo $message; ?>
                            </div>
                            <?php endif; ?>

                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control _ge_de_ol"
                                        placeholder="Enter email" required="" aria-required="true">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control _ge_de_ol" type="text"
                                        placeholder="Enter Password" required="" aria-required="true">
                                </div>

                                <div class="form-group">
                                    <button class="_btn_04" style="background-color: teal;" type="submit" name="login">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <div class="form-group nm_lk">
                                <a href="register.php">Create Account</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>