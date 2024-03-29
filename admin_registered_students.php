<?php
require 'parts/app.php';

if(isset($_POST["set_lease"])){
    $startMonth = $_POST["startMonth"]."-01";
    $endMonth = $_POST["endMonth"]."-01";
    $userID = $_POST["userID"];

    require_once "parts/db.php";
    $s = "UPDATE students SET start_mnth='$startMonth', end_mnth='$endMonth' WHERE id=$userID";
    if(mysqli_query($con, $s)){
        js_alert("Lease updated");
        js_redirect("admin_registered_students.php");
    }
}

if(isset($_POST["payables"])){
    $registration = isset($_POST["registration"]) ? 1 : 0;
    $rental = isset($_POST["rental"]) ? 1 : 0;
    $userID = $_POST["userID"];

    require_once "parts/db.php";
    $s = "UPDATE students SET registrationCharges=$registration, depositCharges=$rental WHERE id=$userID";
    if(mysqli_query($con, $s)){
        js_alert("Charges updated");
        js_redirect("admin_registered_students.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Registered Students";
require 'parts/head.php';
?>

<body id="page-top">
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

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registered Students</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Room#</th>
                                        <th>Bed#</th>
                                        <th>LeaseAgr.</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Room#</th>
                                        <th>Bed#</th>
                                        <th>LeaseAgr.</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM students";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            if(isset($row["roomID"])){
                                                $roomID = $row["roomID"];
                                                $s = "SELECT * FROM rooms WHERE id=$roomID";
//                                            echo $s;
                                                $s2 = mysqli_query($con, $s);
                                                $s3 = mysqli_fetch_array($s2);
//                                            print_r($s3);
                                                $roomNum = $s3["room"];
                                            }else{
                                                $roomID = null;
                                                $roomNum = null;
                                            }
                                            $rand = rand();
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["name"].' '.$row["surename"]; ?></td>
                                                <td><?php echo $roomNum; ?></td>
                                                <td><?php echo $row["bedID"]; ?></td>
                                                <td><a target="_blank" href="leaseAgreement/<?php echo $row["linkToLease"]; ?>">View/Download</a></td>
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in text-center bg-gray-200" aria-labelledby="dropdownMenuButton" style="" id="dropdown_a">
                                                            <a class="btn btn-primary" data-toggle="modal" data-target="#lease_<?php echo $rand; ?>">
                                                                <span class="text">Lease Time</span>
                                                            </a>
                                                            <a class="btn btn-success" href="admin_edit_student.php?id=<?php echo $row["id"]; ?>">
                                                                <span class="text">Edit</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Lease Time Modal -->
                                            <div class="modal fade" id="lease_<?php echo $rand; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Set Lease time</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="admin_registered_students.php" method="post">
                                                                <input type="hidden" value="<?php echo $row["id"]; ?>" name="userID">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Start Month</label>
                                                                    <input type="month" class="form-control" name="startMonth">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">End Month</label>
                                                                    <input type="month" class="form-control" name="endMonth">
                                                                </div>
                                                                <div class="d-flex justify-content-around my-3">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="set_lease">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Regestration Charges Modal -->
                                            <div class="modal fade" id="registrationCharges_<?php echo $rand; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Extra Payable</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="admin_registered_students.php" method="post">
                                                                <input type="hidden" value="<?php echo $row["id"]; ?>" name="userID">
                                                                <div class="row">
                                                                    <div class="col-md-12 mt-3">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" name="registration" id="a_<?php echo $rand; ?>" value="1" <?php echo $row["registrationCharges"]==1 ? "checked": ""; ?>>
                                                                            <label class="form-check-label" for="a_<?php echo $rand; ?>">Registration Charges</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" name="rental" id="b_<?php echo $rand; ?>" value="1" <?php echo $row["depositCharges"]==1 ? "checked": ""; ?>>
                                                                            <label class="form-check-label" for="b_<?php echo $rand; ?>">Rental Charges</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-around my-3">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="payables">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>
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