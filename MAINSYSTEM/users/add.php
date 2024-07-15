<?php include '../include/header.php'; ?>
<?php include '.././include/sidebar.php'; ?>

<?php
$userStatus = "";
if (isset($_POST["add_user"])) {
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
     $email = $_POST['email'];
    $password = md5($_POST['password']); 
  $usertype = $_POST['usertype'];
    if (empty($errors)) {
        $insert_new_user = "INSERT INTO users (fullname, gender, country,phone,email, password,usertype) 
                            VALUES ('$fullname', '$gender', '$country','$phone', '$email', '$password','$usertype')";

        if (mysqli_query($connect, $insert_new_user)) {
            $userStatus = "User Registered successfully";
        } else {
            $userStatus = "Error occurred while adding user";
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
                    font-family:Georgia, 'Times New Roman', Times, serif; font-size:20px">Staffs Addition  Form</h3>
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
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" class="form-control" required="true"
                                    style="height:50px">
                                <div class="error" id="fullnameError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control" required="true" style="height: 50px;">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male
                                    </option>
                                    <option value="Female">
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
                                    style="height:50px">
                                <div class="error" id="courseError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Phone</label>
                                <input type="number" name="phone" class="form-control" required="true"
                                    style="height:50px">
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
                        <input type="email" name="email" class="form-control" required="true" style="height:50px">
                        <div class="error" id="yearError"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required="true" style="height:50px">
                        <div class="error" id="yearError"></div>
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="usertype" class="form-control" value="Staff" required="true"
                            style="height:50px">
                        <div class="error" id="yearError"></div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" name="add_user" class="btn btn-info">Submit</button>

                </div>
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