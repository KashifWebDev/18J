<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Paid Report";
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
                    if(isset($_GET["success"]) && $_GET["success"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Course added Successfully!
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Payments Statement</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Invoice#</th>
                                        <th>Student Name</th>
                                        <th>Paid for Month</th>
<!--                                        <th>PDF File</th>-->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Invoice#</th>
                                        <th>Student Name</th>
                                        <th>Paid for Month</th>
<!--                                        <th>PDF File</th>-->
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM invoice";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $userID = $row["userID"];
                                        $s = "SELECT * FROM students WHERE id=$userID";
                                        $s1 = mysqli_query($con, $s);
                                        if(mysqli_num_rows($s1)){
                                        $r = mysqli_fetch_array($s1);
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $r["name"]; ?></td>
                                                <td><?php echo date("M, Y", strtotime($row["startDate"])); ?></td>
<!--                                                <td><a href="generatedPDFs/--><?php //echo $row["pdf"]; ?><!--"><i class="fas fa-file-pdf mr-1"></i>Download</a></td>-->
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in text-center bg-gray-200" aria-labelledby="dropdownMenuButton" style="" id="dropdown_a">
                                                            <a target="_blank" href="admin_print_invoice.php?id=<?php echo $r["id"]; ?>" class="btn btn-primary">
                                                                <span class="text">Print</span>
                                                            </a>
                                                            <a href="admin_all_invoices.php?mail=1&id=<?php echo $r["id"]; ?>&email=<?php echo $row["email"]; ?>" target="_blank" class="btn btn-info">
                                                                <span class="text">Email</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
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
    <script>
        $(document).ready(function() {
            $('#table_2').DataTable();
        });
        $(document).ready(function() {
            $('#table_3').DataTable();
        });
    </script>
</body>

</html>