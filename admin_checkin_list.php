<?php
require 'parts/app.php';
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $s = "DELETE FROM checkin WHERE id = $id";
    $qry = mysqli_query($con, $s);
    js_redirect("admin_checkin_list.php?delDone=1");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Check In";
require 'parts/head.php';
?>

<body id="page-top">

<script src="vendor/jquery/jquery.min.js"></script>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require 'parts/side_bar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require 'parts/top_bar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if(isset($_GET["delDone"]) && $_GET["delDone"]){
                    ?>
                    <div class="card mb-4 py-3 border-left-success">
                        <div class="card-body text-success">
                            <strong>Success! </strong> Record was removed.
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                    <button class="btn btn-primary mb-4">
                        <a href="admin_checkIn_enter.php" class="text-white">Add New Entry</a>
                    </button>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?> Record</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tenant Name</th>
                                        <th>Room #</th>
                                        <th>Record Type</th>
                                        <th>Inspection Date</th>
                                        <th>Inspection Time</th>
                                        <th>Landlord Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Tenant Name</th>
                                        <th>Room #</th>
                                        <th>Record Type</th>
                                        <th>Inspection Date</th>
                                        <th>Inspection Time</th>
                                        <th>Landlord Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM checkin";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["tenantName"]; ?></td>
                                                <td><?php echo $row["roomNumber"]; ?></td>
                                                <td><?php echo 'Check '.$row["type"]; ?></td>
                                                <td><?php echo $row["inspectionDate"]; ?></td>
                                                <td><?php echo $row["inspectionTime"]; ?></td>
                                                <td><?php echo $row["landLordName"]; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="admin_checkIn_view.php?id=<?=$row['id']?>">
                                                        View Report
                                                    </a>
                                                    <a class="btn btn-danger" href="admin_checkin_list.php?del=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php require 'parts/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>