<?php
require 'parts/app.php';
$sql = "SELECT * FROM students WHERE bedID=6969 AND roomID=6969";
$res = mysqli_query($con, $sql);
if(isset($_GET["email"])){
    $subject = "18 Jorissen Accommodation";
    $txt = "Dear Student<br>
            Welcome to 18 Jorissen Street Student Residence your home away from home in Braamfontein! You have arrived! Do nott look any further for student accommodation!<br><br>
            
            •	We are a 2-minute walk from the University of Witwatersrand<br>
            •	Opposite the famous Wits Senate House.<br>
            •	We offer accommodation to Female students only.<br>
            •	There are Single or Double rooms fully furnished <br>
            •	Sealy mattresses for extra support and comfort <br>
            •	A laundry is available with washing and drying machines as well as the option to hand wash with open washing lines for drying.<br>
            •	A quiet library <br>
            •	Uncapped Wi-Fi <br>
            •	Huge open court-yard for students to relax and get fresh air, keep active and stay in shape.<br>
            •	Communal kitchens are spaced throughout the residence <br>
            •	Modern Bathrooms and kitchens are always spotlessly clean.<br>
            •	Secure 24/7 fingerprint-access<br>
            •	Let us make your new home away from home a memorable experience.<br><br>
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
    $registration = isset($_POST["registration"]) ? 1 : 0;
    $deposit = isset($_POST["deposit"]) ? 1 : 0;


    js_redirect("viewQuotation.php?uid=$uid&roomType=$roomType&start=$start&end=$end&registration=$registration&deposit=$deposit");
}
if(isset($_GET["intro_email"])){
    $uid = $_GET["intro_email"];

    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);
    $stdntName = $row["name"];
    $stdntemail = $row["email"];

//    print_r($row);exit();die();

    date_default_timezone_set('Africa/Johannesburg');
    $timestamp = date('Y-m-d H:i:s', time());



    $body = "Dear $stdntName,<br>";
    $body .= "
            Please find the intro <a href='https://18jorissen.co.za/app/files/intro.pdf'>HERE</a><br>
            <a href='https://www.18jorissen.co.za/app/enroll_student.php'>Get yourself Registered Now</a><br><br>
            ";

    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();


    mail($stdntemail,"Do not look any further for student accommodation!",$body,$headers);


    $sql = "UPDATE students SET intro_email=1 WHERE id=$uid";
    mysqli_query($con, $sql);
    js_redirect("admin_email_interested.php?introduction_sent=1");
}
if(isset($_POST["save_quote"])){
    $uid = $_POST["uid"];
    $roomType = $_POST["roomType"];
    $start = $_POST["start"].'-01';
    $end = $_POST["end"].'-01';
    $registration = isset($_POST["registration"]) ? 1 : 0;
    $deposit = isset($_POST["deposit"]) ? 1 : 0;


    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);
    $stdntName = $row["name"];

    date_default_timezone_set('Africa/Johannesburg');
    $timestamp = date('Y-m-d H:i:s', time());

    $s = "INSERT INTO quotations (userID, start_date, end_date, registration, deposit, roomType, date_time) VALUES
        ($uid, '$start', '$end', $registration, $deposit, '$roomType', '$timestamp')";
    $qry = mysqli_query($con, $s);
    if(!$qry){
        echo mysqli_error($con); exit(); die();
    }
    $last_id = mysqli_insert_id($con);
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
            <b><a href='https://www.18jorissen.co.za/app/getQuotation.php?id=$last_id'>Click here to find your quotation.</a></b><br><br>
            ";

    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);

    mail($row["email"],"Quotation for 18 Jorissen Street Student Residence",$body,$headers);

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
    $body .= "Please <a href='https://www.18jorissen.co.za/18J/files/LeaseAgreement.pdf'>Click here</a> to get the LEASE AGREEMENT<br>";
    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";

    mail($row["email"],"Lease Agreement for 18 Jorissen Street Student Residence",$body,$headers);

    $sql = "UPDATE students SET la_email=1 WHERE id=$uid";
    mysqli_query($con, $sql);
    js_redirect("admin_email_interested.php?quotation=1");
}
if(isset($_GET["rp_mail"])){
    $uid = $_GET["rp_mail"];


    $sql = "SELECT * FROM students WHERE id=$uid";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($sql1);
    $stdntName = $row["name"];

    $body = "Dear $stdntName,<br>";
    $body .= "Please <a href='https://www.18jorissen.co.za/18J/files/Registration_process.docx'>Click here</a> to get the Registration process<br>";
    $body .= "Kind Regards,<br>";
    $body .= "18 Jorissen Street Admin Team";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    mail($row["email"],"Lease Agreement for 18 Jorissen Street Student Residence",$body,$headers);

    $sql = "UPDATE students SET rp_email=1 WHERE id=$uid";
    mysqli_query($con, $sql);
    js_redirect("admin_email_interested.php?quotation=1");
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
                                        <th>ID#</th>
                                        <th>University</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>ID#</th>
                                        <th>University</th>
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
                                                <td><?php echo $row["IDnum"]; ?></td>
                                                <td><?php echo $row["uniName"]; ?></td>
                                                <td>
                                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#quote_<?php echo $rand; ?>">
                                                        Quotation
                                                    </button>
                                                    <?php
                                                    $sss = "SELECT * FROM quotations WHERE userID=$uid";
                                                    $sres = mysqli_query($con, $sss);
                                                    if(mysqli_num_rows($sres)){
                                                        while($roo = mysqli_fetch_array($sres)){
                                                        ?>
                                                        <a class="mr-1" target="_blank" href="getQuotation.php?id=<?php echo $roo["id"]; ?>" style="text-decoration: none;">
                                                            <span class="bg-success text-white px-2 py-1" style="border-radius: 10px;">
                                                                <i class="fas fa-file-invoice"></i>
                                                            </span>
                                                        </a>
                                                    <?php }
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" href="admin_email_interested.php?intro_email=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Introduction email<?php if($row["intro_email"]) echo "<span class='badge bg-white text-info ml-1'>Sent</span>"; ?>
                                                    </a>
                                                    <a class="btn btn-primary" href="admin_email_interested.php?la_mail=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Lease Agr<?php if($row["la_email"]) echo "<span class='badge bg-white text-info ml-1'>Sent</span>"; ?>
                                                    </a>
                                                    <a class="btn btn-secondary" href="admin_email_interested.php?rp_mail=<?php echo $row["id"]; ?>" style="text-decoration: none;">
                                                        Reg Process<?php if($row["rp_email"]) echo "<span class='badge bg-white text-info ml-1'>Sent</span>"; ?>
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
                                                                <p class="m-0 font-weight-bold">Payable</p>
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="registration" class="form-check-input" id="exampleCheck1_<?php echo $rand; ?>" value="1">
                                                                    <label class="form-check-label" for="exampleCheck1_<?php echo $rand; ?>">Registration Charges</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" name="deposit" class="form-check-input" id="exampleCheck2_<?php echo $rand; ?>" value="1">
                                                                    <label class="form-check-label" for="exampleCheck2_<?php echo $rand; ?>">Deposit Charges</label>
                                                                </div>
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