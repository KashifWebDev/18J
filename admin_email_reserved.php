<?php
require 'parts/app.php';
$sql = "SELECT * FROM rooms WHERE bed1=69 OR bed2=69 OR bed3=69 OR bed4=69";
$res = mysqli_query($con, $sql);
if(isset($_GET["email"])){
    $subject = "18 Jorissen Accommodation";
    $txt = "Dear Student<br>
            Thank you for your interest to stay at the most prestigious accommodation residences in Braamfontein. <br>
            To secure your place, please complete your lease agreement. You can down-load it here or complete it online:<br>
            <a href='https://www.18jorissen.co.za/lease-agreement/'>Rental Lease Agreement Form: 18 Jorissen Student Accommodation</a><br>
            Please send proof of payment of your Registration fee to secure your place. Total: R500.<br>
            The banking details are on the lease agreement form.<br>
            We look forward to welcoming you.<br><br>";
    $txt .= "Kind Regards,<br>";
    $txt .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    while($row = mysqli_fetch_array($res)){
        $to = $row["email"];
        mail($to,$subject,$txt,$headers);
    }
    js_redirect("admin_email_reserved.php?success=1");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Reserved Students";
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
                                <strong>Success! </strong> Email was sent to all the reserved students!
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <a href="admin_email_reserved.php?email=1" class="btn btn-primary ml-4 mb-2">Email to all</a>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>ID#</th>
                                        <th>University</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>ID#</th>
                                        <th>University</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $roomid = $row["id"];
                                            $s = "SELECT * FROM students WHERE roomID=$roomid";
                                            $s1 = mysqli_query($con, $s);
                                            if(mysqli_num_rows($s1)){
                                                $row1 = mysqli_fetch_array($s1);
                                            ?>
                                            <tr>
                                                <td><?php echo $row1["id"]; ?></td>
                                                <td><?php echo $row1["name"].' '.$row1["surename"]; ?></td>
                                                <td><?php echo $row1["mobile"]; ?></td>
                                                <td><?php echo $row1["IDnum"]; ?></td>
                                                <td><?php echo $row1["uniName"]; ?></td>
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


    <script src="https://www.google.com/recaptcha/api.js?render=6LfSB9wbAAAAADM-RnT_SVz6w-4rDMtDCHYB6mdT"></script>
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LfSB9wbAAAAADM-RnT_SVz6w-4rDMtDCHYB6mdT', {action: 'submit'}).then(function(token) {
                    // Add your logic to submit to your backend server here.
                });
            });
        }
    </script>
</body>

</html>