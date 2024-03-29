<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$url = "https://$_SERVER[HTTP_HOST]";
require 'parts/app.php';
$sql = "SELECT * FROM students WHERE bedID=6969 AND roomID=6969 AND intrestedDeleted = 0";
$res = mysqli_query($con, $sql);
if(isset($_GET["email"])){
    $subject = "18 Jorissen Accommodation";
    $txt = "Dear Student<br>
            Welcome to 18 Jorissen Street Student Residence your home away from home in Braamfontein! You have arrived! Do not look any further for student accommodation!<br><br>
            
            ->	We are a 2-minute walk from the University of Witwatersrand<br>
            ->	Opposite the famous Wits Senate House.<br>
            ->	We offer accommodation to Female students only.<br>
            ->	There are Single or Double rooms fully furnished <br>
            ->	Sealy mattresses for extra support and comfort <br>
            ->	A laundry is available with washing and drying machines as well as the option to hand wash with open washing lines for drying.<br>
            ->	A quiet library <br>
            ->	Uncapped Wi-Fi <br>
            ->	Huge open court-yard for students to relax and get fresh air, keep active and stay in shape.<br>
            ->	Communal kitchens are spaced throughout the residence <br>
            ->	Modern Bathrooms and kitchens are always spotlessly clean.<br>
            ->	Secure 24/7 fingerprint-access<br>
            ->	Let us make your new home away from home a memorable experience. www.18jorissen.co.za<br><br>
            ->	Double: R5200<br><br>
            ->	Single: R7000<br><br>
            ";
    $txt .= "Kind Regards,<br>";
    $txt .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    while($row = mysqli_fetch_array($res)){
        $to = $row["email"];
        mail($to,$subject,$txt,$headers);
    }
    js_redirect("admin_email_interested.php?success=1");
}
if(isset($_GET["IntroEmailAll"])){
    $subject = "18 Jorissen Accommodation";

    $txt = "Dear student,<br>";
    $txt = "You have arrived! Do not look any further for student accommodation! <br>
Welcome to 18 Jorissen Street Student Residence your home away from home in Braamfontein! <br>
Save time and money as our campus is a 2-minute walk from the University of Witwatersrand and located on Jorissen Street and opposite the famous Wits Senate House.<br>
We provide an ideal choice for female only students who want to enjoy student life to the fullest but prefer not to be part of a traditional residence structure. <br>
Our sunny and spacious accommodation has been hosting students since 2016 and is proudly accredited as a Wits Private Housing Provider as well as Nsfas approved. <br>
There is single or double fully furnished luxurious rooms which provide quality hotel branded, Sealy mattresses for extra support and comfort with modern blinds for extra privacy. <br>
We cater for the fashion-conscious student who needs that extra cupboard space to pack and hang their clothes. <br>
A laundry is available with washing and drying machines as well as the option to hand wash with open washing lines for drying. There is 2 free washing loads per month.<br>
A quiet library with uncapped Wi-Fi encourages students to have a dedicated space to study, complete assignments and prepare for exams.<br>
We boast a huge open courtyard for students to relax and get fresh air, keep active and stay in shape.<br>
Communal kitchens are spaced throughout the residence where everyone is welcome to share their daily experiences, support one another, relax and have fun. Bathrooms and kitchens are always spotlessly clean. We have an open courtyard with a garden where you can relax.<br>
Students can explore shopping malls, local markets and enjoy the nightlife all within 1km radius and still have the peace of mind living in a secure 24/7 fingerprint-access residence.<br>
Let us make your new home away from home a memorable experience.<br><br>
            ";
    $txt .= "Kind Regards,<br>";
    $txt .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    while($row = mysqli_fetch_array($res)){
        $to = $row["email"];
        mail($to,$subject,$txt,$headers);
    }
    js_redirect("admin_email_interested.php?introduction_sent=1");
}
if(isset($_POST["view_quote"])){
    $uid = $_POST["uid"];
    $roomType = $_POST["roomType"];
    $start = $_POST["start"].'-01';
    $end = $_POST["end"].'-01';


    $_SESSION["payable"] = $_POST['payable'];
    $reg = $_POST["reg_input"];
    $dep = $_POST["dep_input"];
    $ren = $_POST["rental_input"];
    $top = $_POST["topup_input"];

    $qry = "viewQuotation.php?uid=$uid&roomType=$roomType&start=$start&end=$end";
    $qry .= "&payable=$payable&reg=$reg&dep=$dep&ren=$ren&top=$top";
    js_redirect($qry);
}
if(isset($_GET["intro_email"])){
    $uid = $_GET["intro_email"];

    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);
    $stdntName = $row["name"];
    $stdntemail = isset($row["email"]) ? $row["email"] : 'test@gmail.com';

//    print_r($row);exit();die();

    date_default_timezone_set('Africa/Johannesburg');
    $timestamp = date('Y-m-d H:i:s', time());



    $body = "Dear $stdntName,<br>";
    $body .= "
            Please find the intro <a href='".$url."/app/files/intro.pdf'>HERE</a><br>
            <a href='https://www.18jorissen.co.za/app/enroll_student.php'>Get yourself Registered Now</a><br><br>
            ";

    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    try{
        mail($stdntemail,"Do not look any further for student accommodation!",$body,$headers);
    }catch (Exception $e){
        print_r($e);
    }


//    $sql = "UPDATE students SET intro_email=1 WHERE id=$uid";
//    mysqli_query($con, $sql);
//    exit(); die();
    js_redirect("admin_email_interested.php?introduction_sent=1");
}
if(isset($_POST["save_quote"])){
    $uid = $_POST["uid"];
    $roomType = $_POST["roomType"];
    $start = $_POST["start"].'-01';
    $end = $_POST["end"].'-01';
    $payable = json_encode($_POST['payable']);
    $reg_input = $_POST["reg_input"];
    $dep_input = $_POST["dep_input"];
    $rental_input = $_POST["rental_input"];
    $topup_input = $_POST["topup_input"];


    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);
    $stdntName = $row["name"];

    date_default_timezone_set('Africa/Johannesburg');
    $timestamp = date('Y-m-d H:i:s', time());


    $PDFfilename = "QUOTE_$stdntName"."_".rand().".pdf";

    $s = "INSERT INTO quotations (userID, start_date, end_date, payable, roomType, pdf, date_time, reg_input, dep_input, rental_input, topup_input) VALUES
        ($uid, '$start', '$end', '$payable', '$roomType', '$PDFfilename', '$timestamp', '$reg_input', '$dep_input', '$rental_input', '$topup_input')";
    $qry = mysqli_query($con, $s);
    if(!$qry){
        echo mysqli_error($con); exit(); die();
    }
    $last_id = mysqli_insert_id($con);

    require 'quoteGeneratePDF.php';

    $body = "Dear $stdntName,<br>";
    $body .= "<b>You have arrived!Do not look any further for Student Accommodation!</b><br><br>
Welcome to 18 Jorissen Street Student Residence  your home away from home in
Braamfontein!<br>
Save me and money as our campus is a 2-minute walk from the University of
Witwatersrand and located on Jorissen Street and opposite the famous Wits Senate
House.<br>
We provide an ideal choice for female only students who want to enjoy their
independent student life to the fullest but prefer not to be part of a tradional
residence structure.<br>
Our sunny and spacious accommodon has been hosng students since 2016 and is
proudly accredited as a Wits Private Housing Provider as well as Nsfas approved.<br>
There is single or double fully furnished luxurious rooms which provide quality hotel
branded, Sealy maresses for extra support and comfort with modern blinds for extra
privacy.<br>
We cater for the fashion-conscious student who needs that extra cupboard space to
pack and hang their clothes.<br>
A laundry is available with washing and drying machines as well as the opon to hand
wash with open washing lines for drying. There are 2 free washing loads per month.<br>
A quiet library with uncapped Wi-Fi encourages students to have a dedicated space to
study, complete assignments and prepare for exams.<br>
We boast a huge open courtyard with a garden for students to relax and get fresh air,
keep acve and stay in shape.<br>
Communal kitchens are spaced throughout the residence where everyone is welcome
to share their daily experiences, support one another, relax and have fun.<br>
Bathrooms and kitchens are always spotlessly clean.<br>
Students can explore shopping malls, local markets and enjoy the nightlife all within
1km radius and stll have the peace of mind living in a secure 24/7 fingerprint-access
residence. There is no curfew
Let us make your new home away from home a memorable experience.<br>
<b>Please find the attached quotation.</b><br>
            <i><b>*Payments are to be made by the 1st of each month. Deposits are refundable at the end of the lease period.</b></i><br><br>
            <br>
            ";

    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";


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
    $msg .= chunk_split(base64_encode($body));
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

    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);

    mail($row["email"],"Quotation for 18 Jorissen Street Student Residence",$msg,$headers);

    js_redirect("admin_email_interested.php?quotation=1");
}
if(isset($_GET["la_mail"])){
    $uid = $_GET["la_mail"];

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);
    $stdntName = $row["name"];

    $body = "Dear $stdntName,<br>";
    $body .= "Please <a href='".$url."/app/files/LeaseAgreement.pdf'>Click here</a> to get the LEASE AGREEMENT<br>";
    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";

    mail($row["email"],"Lease Agreement for 18 Jorissen Street Student Residence",$body,$headers);

//    $sql = "UPDATE students SET la_email=1 WHERE id=$uid";
//    mysqli_query($con, $sql);
    js_redirect("admin_email_interested.php?quotation=1");
}
if(isset($_GET["rp_mail"])){
    $uid = $_GET["rp_mail"];


    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);
    $stdntName = $row["name"];

    $body = "Dear $stdntName,<br>";
    $body .= "Please <a href='".$url."/app/files/Registration_process.docx'>Click here</a> to view the Registration process<br>";
    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    mail($row["email"],"Lease Agreement for 18 Jorissen Street Student Residence",$body,$headers);

//    $sql = "UPDATE students SET rp_email=1 WHERE id=$uid";
//    mysqli_query($con, $sql);
    js_redirect("admin_email_interested.php?quotation=1");
}
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $s = "UPDATE students SET intrestedDeleted = 1 WHERE id = $id";
    $qry = mysqli_query($con, $s);
    js_redirect("admin_email_interested.php?delDone=1");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Interested Students";
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
                                <strong>Success! </strong> Email was sent to all the interested students!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["introduction_sent"]) && $_GET["introduction_sent"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Introduction Email was sent to the interested students!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["quotation"]) && $_GET["quotation"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Quotation was sent to the registered email!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["delDone"]) && $_GET["delDone"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Interested student was removed.
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <a href="admin_email_interested.php?email=1" class="btn btn-primary ml-4 mb-2">Email to all</a>
                    <a href="admin_email_interested.php?email=1" class="btn btn-primary ml-4 mb-2">Introduction Email to all</a>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Interested Students</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $rand = rand();

                                            $sent = false;
                                            $uid = $row["id"];
                                            $s = "SELECT * FROM quotations WHERE userID=$uid";
//                                            echo $s;
                                            $r = mysqli_query($con, $s);
                                            if(mysqli_num_rows($r)){
                                                $ro = mysqli_fetch_array($r);
                                                $sent = true;
                                            }
                                            $s = "SELECT * FROM students WHERE id=$uid";
                                            $r = mysqli_query($con, $s);
                                            $stdnRow = mysqli_fetch_array($r);
                                            ?>
                                            <tr>
                                                <td><?php echo $uid; ?></td>
                                                <td><?php echo $row["name"].' '.$row["surename"]; ?></td>
                                                <td><?php echo $row["mobile"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td>
                                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#quote_<?php echo $rand; ?>">
                                                        Quotation
                                                    </button>
<!--                                                    --><?php
//                                                    $sss = "SELECT * FROM quotations WHERE userID=$uid";
//                                                    $sres = mysqli_query($con, $sss);
//                                                    if(mysqli_num_rows($sres)){
//                                                        while($roo = mysqli_fetch_array($sres)){
//                                                        ?>
<!--                                                        <a class="mr-1" href="generatedPDFs/--><?php //echo $roo["pdf"]; ?><!--" style="text-decoration: none;">-->
<!--                                                            <span class="bg-success text-white px-2 py-1" style="border-radius: 10px;">-->
<!--                                                                <i class="fas fa-file-invoice"></i>-->
<!--                                                            </span>-->
<!--                                                        </a>-->
<!--                                                    --><?php //}
//                                                    } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" href="admin_email_interested.php?intro_email=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Introduction email<?php if(isset($row["intro_email"]) && $row["intro_email"]) echo "<span class='badge bg-white text-info ml-1'>Sent</span>"; ?>
                                                    </a>
                                                    <a class="btn btn-primary" href="admin_email_interested.php?la_mail=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Lease Agr<?php if(isset($row["la_email"]) && $row["la_email"]) echo "<span class='badge bg-white text-info ml-1'>Sent</span>"; ?>
                                                    </a>
                                                    <a class="btn btn-secondary" href="admin_email_interested.php?rp_mail=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Reg Process<?php if(isset($row["rp_email"]) && $row["rp_email"]) echo "<span class='badge bg-white text-info ml-1'>Sent</span>"; ?>
                                                    </a>
                                                    <a class="btn btn-danger" href="admin_email_interested.php?del=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal for quotation -->
                                            <div class="modal fade" id="quote_<?php echo $rand; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Send Quotation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="uid" value="<?php echo $row["id"]; ?>">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1_<?php echo $rand; ?>">Start</label>
                                                                    <input name="start" type="month" class="form-control" id="exampleInputEmail1_<?php echo $rand; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1_<?php echo $rand; ?>">End</label>
                                                                    <input name="end" type="month" class="form-control" id="exampleInputPassword1_<?php echo $rand; ?>">
                                                                </div>
                                                                <p class="m-0 font-weight-bold">Select Room Type</p>
                                                                <div class="form-check form-check-inline mb-3">
                                                                    <input class="form-check-input" type="radio" name="roomType" id="inlineRadio1" value="Single">
                                                                    <label class="form-check-label" for="inlineRadio1">Single</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="roomType" id="inlineRadio2" value="Double">
                                                                    <label class="form-check-label" for="inlineRadio2">Double</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="roomType" id="inlineRadio3" value="Triple">
                                                                    <label class="form-check-label" for="inlineRadio3">Triple</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="roomType" id="inlineRadio3" value="Quadruple">
                                                                    <label class="form-check-label" for="inlineRadio3">Quadruple</label>
                                                                </div>
                                                                <p class="m-0 font-weight-bold">Payable</p>
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="payable[]" class="form-check-input" id="exampleCheck1" value="reg">
                                                                    <label class="form-check-label" for="exampleCheck1">Registration Charges</label>
                                                                    <input type="number" name="reg_input" class="form-control additional-input" style="display: none;" placeholder="Additional Information">
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="payable[]" class="form-check-input" id="exampleCheck2" value="dep">
                                                                    <label class="form-check-label" for="exampleCheck2">Deposit Charges</label>
                                                                    <input type="number" name="dep_input" class="form-control additional-input" style="display: none;" placeholder="Additional Information">
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="payable[]" class="form-check-input" id="exampleCheck3" value="rental">
                                                                    <label class="form-check-label" for="exampleCheck3">Rental Charges</label>
                                                                    <input type="number" name="rental_input" class="form-control additional-input" style="display: none;" placeholder="Additional Information">
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="payable[]" class="form-check-input" id="exampleCheck4" value="topup">
                                                                    <label class="form-check-label" for="exampleCheck4">Top up</label>
                                                                    <input type="number" name="topup_input" class="form-control additional-input" style="display: none;" placeholder="Additional Information">
                                                                </div>

                                                                <script>
                                                                    // Add an event listener to each checkbox
                                                                    document.querySelectorAll('.form-check-input').forEach(function (checkbox) {
                                                                        checkbox.addEventListener('change', function () {
                                                                            // Get the corresponding input box
                                                                            var inputBox = this.parentElement.querySelector('.additional-input');

                                                                            // Toggle the display property based on the checkbox state
                                                                            if (this.checked) {
                                                                                inputBox.style.display = 'block';
                                                                            } else {
                                                                                inputBox.style.display = 'none';
                                                                            }
                                                                        });
                                                                    });
                                                                </script>

                                                                <div class="d-flex justify-content-around mt-4 mb-2">
                                                                    <button type="submit" class="btn btn-primary" name="save_quote">Send</button>
                                                                    <button type="submit" class="btn btn-success" name="view_quote">View</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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