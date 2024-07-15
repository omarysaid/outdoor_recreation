<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>


<div class="content-wrapper" style="margin-top:120px">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>

                                    <th>Phone</th>
                                    <th>Recreations</th>
                                    <th>Feedbacks</th>
                                    <th>Sent At</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $cnt = 1; 
                                        $select =
                                            "SELECT * FROM info  ";
                                        $result = mysqli_query($connect, $select) or die(mysqli_error($connect));
                                        $number = mysqli_num_rows($result);
                                        if ($number > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['recreation']; ?></td>
                                    <td>
                                        <?php 
        $activities = $row['feedback'];
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
                                    <td><?php echo $row['created']; ?></td>
                                    <td>


                                        <span>
                                            <button class="btn btn-danger" style="width: 40px;"
                                                onclick="confirmDelete(<?php echo $row['info_id'] ?>)">
                                                <i class="fa fa-trash"></i>

                                            </button>
                                        </span>



                                    </td>
                                </tr>
                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>0 results</td></tr>";
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
function confirmDelete(userId) {

    if (confirm("Are you sure you want to delete?")) {

        window.location.href = "./delete.php?info_id=" + userId;
    }
}
</script>

</body>

</html>