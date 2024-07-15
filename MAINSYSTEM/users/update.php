<?php include '../include/header.php'; ?>
<?php include '.././include/sidebar.php'; ?>
<?php
if (isset($_POST['update_data'])) {
    $user_id = $_GET['user_id'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
       $email = $_POST['email'];
          $password = md5($_POST['password']);
  

   
    if (empty($errors)) {
        $update_student = "UPDATE users SET fullname='$fullname', gender='$gender', country='$country', phone='$phone', email='$email', password='$password'
        WHERE user_id = '$user_id'";

        if (mysqli_query($connect, $update_student)) {
       
            $userStatus = "user updated successfully";
        } else {
           
            $userStatus = "Error occurred while updating User";
        }
    } else {
     
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
}

?>

<div class="content-wrapper" style="margin-top: 70px;">
    <section class="content">
        <div class="container-fluid  bg-info" style="height:50px">
            <div class="row">
                <div class="col-md-12">
                    <h3 style="
                    font-family:Georgia, 'Times New Roman', Times, serif; font-size:20px">Users Updation Form</h3>
                </div>
            </div>
        </div>


        <div class="card card-info shadow">


            <?php if (!empty($userStatus)) : ?>
            <div class="alert <?php echo strpos($userStatus, 'successfully') !== false ? 'alert-success' : 'alert-primary'; ?>"
                id="successMessage" style="color:white">
                <?php echo $userStatus; ?>
            </div>
            <?php endif; ?>

            <form method="POST" onsubmit="return validateForm()">

                <?php
                                        $select_user = "SELECT * FROM users WHERE user_id = '" . $_GET['user_id'] . "'";
                                        $result = mysqli_query($connect, $select_user);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                <div class="card-body ">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" class="form-control" required="true"
                                    style="height:50px" value="<?php echo $row['fullname'] ?>">
                                <div class="error" id="fullnameError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control" required="true" style="height: 50px;">
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male
                                    </option>
                                    <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>
                                        Female</option>
                                </select>
                                <div class="error" id="usernameError"></div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="course">Country</label>
                                <input type="text" name="country" class="form-control" required="true"
                                    style="height:50px" value="<?php echo $row['country'] ?>">
                                <div class="error" id="courseError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Phone</label>
                                <input type="number" name="phone" class="form-control" required="true"
                                    style="height:50px" value="<?php echo $row['phone'] ?>">
                                <div class="error" id="yearError"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>














                    <div class="form-group">
                        <label for="year">Email</label>
                        <input type="email" name="email" class="form-control" required="true" style="height:50px"
                            value="<?php echo $row['email'] ?>">
                        <div class="error" id="yearError"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required="true" style="height:50px"
                            value="<?php echo $row['password'] ?>">
                        <div class="error" id="yearError"></div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" name="update_data" class="btn btn-info">Submit</button>

                </div>
                <?php
                                            }
                                        }
                                        ?>

            </form>
        </div>

</div>

<div class="col-md-6">

</div>

</div>

</div>
</section>

</div>



<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>



<?php include '../include/footer.php'; ?>