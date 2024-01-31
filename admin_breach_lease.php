<?php
require 'parts/app.php';
if(isset($_POST["add"])){
    $id = $_POST["userID"];
    $s = "INSERT INTO breach_lease (stu_id) VALUES ($id)";
    if(mysqli_query($con, $s))
        js_redirect('admin_breach_lease.php?added=1');
}
if(isset($_GET["del"])){
    $id = $_GET["del"];
    $s = "DELETE FROM breach_lease WHERE id=$id";
    if(mysqli_query($con, $s))
        js_redirect('admin_breach_lease.php?deleted=1');
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Breach Lease Students";
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

                    <?php
                    if(isset($_GET["added"]) && $_GET["added"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Student was added into breach list
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["deleted"]) && $_GET["deleted"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Student was removed from breach list
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <a class="btn btn-primary mb-2" data-toggle="modal" data-target="#lease_">
                        <span class="text">Add Student to list</span>
                    </a>

                    <div class="modal fade" id="lease_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add student to breach list</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="pwd">Student:</label>
                                            <!--                                            <input type="text" name="name" placeholder="Student/Customer Name" class="form-control" value="" required>-->
                                            <select class="songs form-select form-control" name="userID">
                                                <?php
                                                $s = "SELECT * FROM students";
                                                $qry = mysqli_query($con, $s);
                                                while($row = mysqli_fetch_array($qry)){
                                                    ?>
                                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"].' '.$row["surename"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-around my-3">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Breach Lease Students</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>LeaseAgr.</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>LeaseAgr.</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM breach_lease";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $id = $row["stu_id"];
                                            $s = "SELECT * FROM students where id=$id";
                                            $q = mysqli_query($con, $s);
                                            $ro = mysqli_fetch_array($q);
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $ro["name"].' '.$ro["surename"]; ?></td>
                                                <td><a target="_blank" href="leaseAgreement/<?php echo $ro["linkToLease"]; ?>">View/Download</a></td>
                                                <td><a class="btn btn-danger" href="admin_breach_lease.php?del=<?php echo $row["id"]; ?>">Delete</a></td>
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