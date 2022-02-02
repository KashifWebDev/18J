<?php
require 'parts/app.php';
if(isset($_GET["mail"])){
    $id = $_GET["id"];
    $invoice = $_GET["mail"];

    $PDFfilename = "INVOICE_".rand().".pdf";


    $s = "UPDATE invoice SET pdf='$PDFfilename' WHERE id=$invoice";
    if(!mysqli_query($con, $s)){
        echo mysqli_error($con);
    }

//    $s = "SELECT * FROM invoice SET pdf='$PDFfilename' WHERE id=$invoice";
//    $res = mysqli_query($con, $s);

    require 'invoiceGeneratePDF.php';


    $appAddress = $GLOBALS["appAddress"];
    $path = "$appAddress/admin_print_invoice.php?id=$invoice";

    $subject = "18 Jorissen - Invoice";

    $sql = "SELECT * FROM students WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
    $to = $row["email"];
    $name = $row["name"];

    $txt = "Dear $name,<br>";
    $txt .= "Please click on the following link to get your invoice.
      <br><br>";
    $txt .= "<br><a href='$path' style='text-decoration: none;background: #202a5b;color: white;padding: 5px 10px;border-radius: 10px;font-size: 20px;'>Get your Invoice</a><br><br><br>";
    $txt .= "Should you need any help or support, please do not hesitate to reach out.<br><br>";
    $txt .= "Kind Regards,<br>";
    $txt .= "18 Jorissen Admin Team";

    $boundary = md5("random"); // define boundary with a md5 hashed value
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: info@18jorissen.co.za\r\n"; // Sender Email
    $headers .= "Reply-To: info@18jorissen.co.za\r\n"; // Email address to reach back
    $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
    $headers .= "boundary = $boundary\r\n"; //Defining the Boundary
    $headers .= 'X-Mailer: PHP/' . phpversion();

    //plain text
    $path = "generatedPDFs/".$PDFfilename;
    $msg = "--$boundary\r\n";
    $msg .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $msg .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $msg .= chunk_split(base64_encode($txt));
    $msg .= "--$boundary\r\n";
    $msg .="Content-Type: application/octet-stream; name=$path\r\n";
    $msg .="Content-Disposition: attachment; filename=$path\r\n";
    $msg .="Content-Transfer-Encoding: base64\r\n";
    $msg .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
    $handle = fopen($path, "r");
    $content = fread($handle, filesize($path));
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));
    $msg .= $encoded_content;


    if(mail($to,$subject,$msg,$headers)){
        js_redirect("admin_all_invoices.php?mailSent=1");
    }else{
        echo "============= MAIL WAS NOT SENT =============";
        exit(); die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Invoices";
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
                    if(isset($_GET["mailSent"])){
                    ?>
                    <div class="card mb-4 py-3 border-left-success">
                        <div class="card-body text-success">
                            <strong>Success! </strong> Mail was sent to the registered Email!
                        </div>
                    </div>
                    <?php } ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Invoices Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Start Date</th>
                                        <th>Room Type</th>
                                        <th>No of Days</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Start Date</th>
                                        <th>Room Type</th>
                                        <th>No of Days</th>
                                        <th>Total Amount</th>
                                        <th>Payment Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM invoice";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $studentID = $row["userID"];
                                            $s = "SELECT * FROM students WHERE id=$studentID";
                                            $s1 = mysqli_query($con, $s);
                                            $s2 = mysqli_fetch_array($s1);
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $s2["name"].' '.$s2["surename"]; ?></td>
                                                <td><?php echo $row["startDate"]; ?></td>
                                                <td><?php echo $row["roomType"]; ?></td>
                                                <td><?php echo $row["totalDays"]; ?></td>
                                                <td><?php echo $row["totalAmount"]; ?></td>
                                                <td><?php echo $row["paymentDate"]; ?></td>
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in text-center bg-gray-200" aria-labelledby="dropdownMenuButton" style="" id="dropdown_a">
                                                            <a target="_blank" href="admin_print_invoice.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">
                                                                <span class="text">Print</span>
                                                            </a>
                                                            <a href="admin_all_invoices.php?mail=<?php echo $row["id"]; ?>&id=<?php echo $s2["id"]; ?>"  class="btn btn-info">
                                                                <span class="text">Email</span>
                                                            </a>
<!--                                                            <a href="admin_edit_invoice.php?&id=--><?php //echo $row["Database_Invoice_No"]; ?><!--" target="_blank" class="btn btn-success">-->
<!--                                                                <span class="text">Edit</span>-->
<!--                                                            </a>-->
                                                        </div>
                                                    </div>
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