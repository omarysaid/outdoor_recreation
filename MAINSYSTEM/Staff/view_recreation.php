<?php include '../include/header.php'; ?>
<?php include '../include/staff_sidebar.php'; ?>

<div class="content-wrapper">
    <div class="card-header">
        <a href="./add_recreation.php"><button class="btn btn-success" style="margin-left: 10px;">New
                Recreation</button></a>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Activities</th>
                                    <th>Time</th>
                                    <th>Cost</th>
                                    <th>Image</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $cnt = 1;
        $select_books = "SELECT * FROM recreation";
        $result = mysqli_query($connect, $select_books) or die(mysqli_error($connect));
        $number = mysqli_num_rows($result);
        if ($number > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                                    <td>
                                        <?php 
        $activities = $row['activities'];
        $words = explode(" ", $activities);
        $wordCount = count($words);
        $lines = ceil($wordCount / 10);
        
        for ($i = 0; $i < $lines; $i++) {
            $start = $i * 10;
            $end = min(($i + 1) * 10, $wordCount);
            echo implode(" ", array_slice($words, $start, $end - $start));
            echo "<br>";
        }
    ?>
                                    </td>
                                    <td><?php echo date('d/m/y h:i A', strtotime($row['time'])); ?></td>


                                    <td><?php echo htmlspecialchars($row['cost']); ?></td>
                                    <td><img src="../uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Image"
                                            style="width: 150px; height: 150px;"></td>
                                    <td><?php echo htmlspecialchars($row['contact']); ?></td>
                                    <td>
                                        <span>
                                            <a
                                                href="./update_recreation.php?recreation_id=<?php echo $row['recreation_id'] ?>">
                                                <button class="btn btn-success" style="width: 50px;">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                        </span>
                                        <span>
                                            <button class="btn btn-danger" style="width: 50px;"
                                                onclick="confirmDelete(<?php echo $row['recreation_id'] ?>)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                                <?php
            }
        } else {
            echo "<tr><td colspan='9'>0 results</td></tr>";
        }
        ?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<?php include '../include/footer.php'; ?>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>


<script>
function confirmDelete(Id) {
    if (confirm("Are you sure you want to delete?")) {
        window.location.href = "./delete_recreation.php?recreation_id=" + Id;
    }
}
</script>


</body>

</html>