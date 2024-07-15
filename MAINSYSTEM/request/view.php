<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>

<div class="content-wrapper" style="margin-top: 120px;">
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
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Recreation Name</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Participants</th>
                                    <th>Requested Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1; 
                         
                                $select_query =
                                    "SELECT u.fullname, u.country, u.phone, r.name AS recreation_name, r.cost, req.date, req.time, req.participants, req.request_id, req.created
                                    FROM users u
                                    INNER JOIN request req ON u.user_id = req.user_id
                                    INNER JOIN recreation r ON req.recreation_id = r.recreation_id
                                    ORDER BY req.created DESC";

                                $result = mysqli_query($connect, $select_query) or die(mysqli_error($connect));
                                $number = mysqli_num_rows($result);

                                if ($number > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['country']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['recreation_name']; ?></td>
                                    <td><?php echo $row['cost']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['time']; ?></td>
                                    <td><?php echo $row['participants']; ?></td>
                                    <td><?php echo $row['created']; ?></td>


                                    <td>


                                        <span>
                                            <button class="btn btn-danger" style="width: 40px;"
                                                onclick="confirmDelete(<?php echo $row['request_id'] ?>)">
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

<aside class="control-sidebar control-sidebar-dark"></aside>

<?php include '../include/footer.php'; ?>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>


<script>
function confirmDelete(Id) {

    if (confirm("Are you sure you want to delete?")) {

        window.location.href = "./delete.php?request_id=" + Id;
    }
}
</script>


</body>

</html>