<?php
    require 'parts/db.php';
    $roomType = 'Double';
    $start = '2022-02-01';
    $end = '2022-12-01';
    $registration = 1 ;
    $deposit = 1;


    $sql = "SELECT * FROM students";
    $sql1 = mysqli_query($con, $sql);


    while ($row = mysqli_fetch_array($sql1)){
        $uid = $row["id"];
        $stdntName = $row["name"];
        date_default_timezone_set('Africa/Johannesburg');
        $timestamp = date('Y-m-d H:i:s', time());

        $PDFfilename = "QUOTE_$stdntName"."_".rand().".pdf";

        $s = "INSERT INTO quotations (userID, start_date, end_date, registration, deposit, roomType, pdf, date_time) VALUES
        ($uid, '$start', '$end', $registration, $deposit, '$roomType', '$PDFfilename', '$timestamp')";
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
//    js_redirect("admin_email_interested.php?quotation=1");
        echo $uid."<br>";
    }


