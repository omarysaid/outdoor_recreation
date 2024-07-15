<?php
include '../include/header.php';
include '../include/sidebar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["recreation_id"])) {
    $recreation_id = $_GET["recreation_id"];
    $sql = "SELECT * FROM recreation WHERE recreation_id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $recreation_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $location = $row["location"];
        $activities = $row["activities"];
        $time = $row["time"];
        $cost = $row["cost"];
        $image = $row["image"];
        $contact = $row["contact"];
        $status = $row["status"]; 
    } else {
        echo "No record found with ID: $recreation_id";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $recreation_id = $_POST["recreation_id"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $activities = $_POST["activities"];
    $time = $_POST["time"];
    $cost = $_POST["cost"];
    $contact = $_POST["contact"];
    $status = $_POST["status"]; 

    // Check if a new image is uploaded
    if ($_FILES["new_image"]["name"]) {
        $new_image = $_FILES["new_image"]["name"];
        $temp_image = $_FILES["new_image"]["tmp_name"];
        $image_extension = pathinfo($new_image, PATHINFO_EXTENSION);
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($image_extension, $allowed_extensions)) {
            $unique_image = uniqid("region_") . "." . $image_extension;

            if (move_uploaded_file($temp_image, "../uploads/" . $unique_image)) {
                // Update with new image
                $sql = "UPDATE recreation SET name=?, location=?, activities=?, time=?, cost=?, image=?, contact=?, status=? WHERE recreation_id=?";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("ssssssssi", $name, $location, $activities, $time, $cost, $unique_image, $contact, $status, $recreation_id);
                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Record updated successfully.";
                    header("Location: update.php?recreation_id=$recreation_id");
                    exit();
                } else {
                    echo "Error updating record: " . $stmt->error;
                }
            } else {
                echo "Error uploading new image.";
            }
        } else {
            echo "Invalid file format. Please upload an image.";
        }
    } else {
        // Update without changing the image
        $sql = "UPDATE recreation SET name=?, location=?, activities=?, time=?, cost=?, contact=?, status=? WHERE recreation_id=?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssssssii", $name, $location, $activities, $time, $cost, $contact, $status, $recreation_id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Record updated successfully.";
            header("Location: update.php?recreation_id=$recreation_id");
            exit();
        } else {
            echo "Error updating record: " . $stmt->error;
        }
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
            <?php if (isset($_SESSION['success_message'])) : ?>
            <div class="alert alert-success" style="color:white"><?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <div id="errorMessages" class="alert alert-danger" style="display:none;"></div>

            <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="card-body">
                    <div class="row">
                        <!-- Name field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="<?php echo htmlspecialchars($name); ?>" required="true" style="height:50px">
                                <div class="error" id="nameError"></div>
                            </div>
                        </div>
                        <!-- Location field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" value="<?php echo htmlspecialchars($location); ?>"
                                    class="form-control" required="true" style="height:50px">
                                <div class="error" id="locationError"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Activities field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="activities">Activities</label>
                                <textarea name="activities" class="form-control" rows="3"
                                    required="true"><?php echo htmlspecialchars($activities); ?></textarea>
                                <div class="error" id="activitiesError"></div>
                            </div>
                        </div>

                        <!-- Time field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" name="time" value="<?php echo htmlspecialchars($time); ?>"
                                    class="form-control" required="true" style="height:90px">
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
                                    <input type="number" name="cost" class="form-control" required="true"
                                        style="height:100px" value="<?php echo htmlspecialchars($cost); ?>">
                                </div>
                                <div class="error" id="costError"></div>
                            </div>
                        </div>

                        <!-- Image upload field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="new_image">Image</label>
                                <?php if (!empty($image)) : ?>
                                <img src="../uploads/<?php echo $image; ?>" alt="Current Image"
                                    style="width: 300px; height: 150px;">
                                <input type="hidden" name="current_image" value="<?php echo $image; ?>">
                                <?php endif; ?>
                                <input type="file" name="new_image" class="form-control" accept="image/*"
                                    style="height:50px">
                                <div class="error" id="imageError"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Contact field -->
                            <div class="form-group">
                                <label for="contact">Phone</label>
                                <input type="number" name="contact" class="form-control"
                                    value="<?php echo htmlspecialchars($contact); ?>" required="true"
                                    style="height:50px">
                                <div class="error" id="contactError"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Status field -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required="true" style="height:50px">
                                    <option value="">Select Status</option>
                                    <option value="0" <?php if ($status == 0) echo 'selected'; ?>>Not Approved</option>
                                    <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Approved</option>
                                </select>
                                <div class=" error" id="statusError">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="hidden" name="recreation_id" value="<?php echo $recreation_id; ?>">
                    <button type="submit" name="update" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>

<?php include '../include/footer.php'; ?>