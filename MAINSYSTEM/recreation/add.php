<?php include '../include/header.php'; ?>
<?php include '.././include/sidebar.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_data"])) {
  
    $name = htmlspecialchars($_POST["name"]);
    $location = htmlspecialchars($_POST["location"]);
    $activities = htmlspecialchars($_POST["activities"]);
    $time = htmlspecialchars($_POST["time"]);
    $cost = htmlspecialchars($_POST["cost"]);
    $contact = htmlspecialchars($_POST["contact"]);
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO recreation (name, location, activities, time, cost, image, contact) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("sssssss", $name, $location, $activities, $time, $cost, $fileName, $contact);
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Recreation details added successfully.";
                header("Location: add.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>

<div class="content-wrapper" style="margin-top: 70px;">
    <section class="content">
        <div class="container-fluid bg-info" style="height:50px">
            <div class="row">
                <div class="col-md-12">
                    <h3 style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px">Recreation Form
                    </h3>
                </div>
            </div>
        </div>

        <div class="card card-info shadow">
            <?php
           
            if (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success" style="color:white">' . $_SESSION['success_message'] . '</div>';
                unset($_SESSION['success_message']); 
            }
            ?>
            <!-- Error messages -->
            <div id="errorMessages" class="alert alert-danger" style="display:none;"></div>

            <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="card-body">
                    <div class="row">
                        <!-- Name field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Enter name of recreation" required="true" style="height:50px">
                                <div class="error" id="nameError"></div>
                            </div>
                        </div>
                        <!-- Location field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location"
                                    placeholder="Enter location only based in Dar es salaam" class="form-control"
                                    required="true" style="height:50px">
                                <div class="error" id="locationError"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Activities field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="activities">Activities</label>
                                <textarea name="activities" class="form-control"
                                    placeholder="Enter recretion activities" rows="3" required="true"></textarea>
                                <div class="error" id="activitiesError"></div>
                            </div>
                        </div>

                        <!-- Time field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" name="time" placeholder="Enter Available recreation time"
                                    class="form-control" required="true" style="height:50px">
                                <div class="error" id="timeError"></div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <!-- Cost field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cost">Cost</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tshs:</span>
                                    </div>
                                    <input type="text" name="cost" placeholder="Enter recreation costs"
                                        class="form-control" required="true" style="height:50px">
                                </div>
                                <div class="error" id="costError"></div>
                            </div>
                        </div>

                        <!-- Image upload field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Recreation_Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*" required
                                    style="height:50px">
                                <div class="error" id="imageError"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact field -->
                    <div class="form-group">
                        <label for="contact">Phone</label>
                        <input type="number" name="contact" placeholder="Enter phone number" class="form-control"
                            required="true" style="height:50px">
                        <div class="error" id="contactError"></div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" name="post_data" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>

<aside class="control-sidebar control-sidebar-dark"></aside>

</div>

<?php include '../include/footer.php'; ?>