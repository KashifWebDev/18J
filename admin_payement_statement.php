<?php
require 'parts/app.php';
if(isset($_GET["email"])){
    $studentID = $_GET["email"];
    $s = "SELECT * FROM students WHERE id=$studentID";
    $s1 = $test =  mysqli_query($con, $s);
    $stdntRow = mysqli_fetch_array($s1);
    $to = $stdntRow["email"];

    $subject = "Payment Statement | 18 Jorissen Accommodation";

    $txt = "Dear student,<br>";
    $txt = "Please follow the bellow link to get your statement. Thank you.<br><br>
            <a href='https://www.18jorissen.co.za/app/admin_print_statement.php?id=$studentID'>Get Statement Now</a>
            ";
    $txt .= "Kind Regards,<br>";
    $txt .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    mail($to,$subject,$txt,$headers);
    js_redirect("admin_payement_statement.php?email=1");
}
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
                                <strong>Success! </strong> Statement was sent to the registered email!
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
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM students";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["name"].$row["surename"]; ?></td>
                                                <td>
                                                    <a target="_blank" href="admin_print_statement.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">
                                                        <span class="text">Get Statement</span>
                                                    </a>
                                                    <a target="_blank" href="admin_print_statement.php?email=<?php echo $row["id"]; ?>" class="btn btn-success">
                                                        <span class="text">Email Statement</span>
                                                    </a>
                                                </td>
<!--                                                <td>-->
<!--                                                    <div class="dropdown mb-4">-->
<!--                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                                            Actions-->
<!--                                                        </button>-->
<!--                                                        <div class="dropdown-menu animated--fade-in text-center bg-gray-200" aria-labelledby="dropdownMenuButton" style="" id="dropdown_a">-->
<!--                                                            <a target="_blank" href="admin_print_invoice.php?id=--><?php //echo $row["id"]; ?><!--" class="btn btn-primary">-->
<!--                                                                <span class="text">Print</span>-->
<!--                                                            </a>-->
<!--                                                            <a href="admin_all_invoices.php?mail=1&id=--><?php //echo $row["id"]; ?><!--&email=--><?php //echo $row["email"]; ?><!--" target="_blank" class="btn btn-info">-->
<!--                                                                <span class="text">Email</span>-->
<!--                                                            </a>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </td>-->
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