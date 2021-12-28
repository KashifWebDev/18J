<?php
require_once "parts/db.php";

//$id = $_GET["id"] ?? null;
//$s = "SELECT * FROM quotations WHERE id = $id";
//$qry = mysqli_query($con, $s);
//$row = mysqli_num_rows($qry) ? mysqli_fetch_array($qry) : array();

$uid = $id = $_GET["uid"];

$date1 = $_GET["start"];
$date2 = $_GET["end"];
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);
$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);
$month1 = date('m', $ts1);
$month2 = date('m', $ts2);
$diff = (($year2 - $year1) * 12) + ($month2 - $month1) +1;

$charges = 0;
$RegCharges = 0;
$DepositCharges = 0;

if($_GET["roomType"]=="Single") $charges = 6000;
if($_GET["roomType"]=="Double") $charges = 4480;
if($_GET["roomType"]=="Triple") $charges = 4000;

if($_GET["registration"]) $RegCharges = 500;
if($_GET["deposit"]) $DepositCharges = 2000;

$s = "SELECT * FROM students WHERE id = $id";
$qry = mysqli_query($con, $s);
$student = mysqli_num_rows($qry) ? mysqli_fetch_array($qry) : array();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="img/logo.png" />


    <title>Quotation | 18 Jorissen</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    <link href="css/custom.css?v=<?php echo rand(); ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css?v=<?php echo rand(); ?>" rel="stylesheet">
    <style>
        table {
            width: 29%;
        }
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        p{
            font-weight: bold;
        }
        p.quoteTotal{
            background: #374f8b;
            margin: 0px;
            color: #e9ebf2;
            padding-left: 10px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <img src="img/quot/1.png" alt="" id="quotationPic1">
    <p><?php echo $_GET["uid"]; ?></p>
    <img src="img/quot/2.png" alt="" id="quotationPic2">
    <p><?php echo date("d M, Y - H:i:s"); ?></p>
    <img src="img/quot/3.png" alt="" id="quotationPic3">
    <table>
        <th>
            <tr class="font-weight-bold">
                <td>Accommodation</td>
                <td>Duration</td>
                <td>Amount</td>
            </tr>
        </th>
        <tbody>
        <tr>
            <td>1x <?php echo $_GET["roomType"]; ?> Room</td>
            <td><?php echo date("M Y", strtotime($_GET["start"])); ?> - <?php echo date("M Y", strtotime($_GET["end"])); ?></td>
            <td>R<?php echo $charges?> x <?php echo $diff; ?></td>
        </tr>
        <tr>
            <td><?php if($_GET["registration"]) echo "Registration"; ?></td>
            <td><?php if($_GET["registration"]) { echo date("M Y", strtotime($_GET["start"])); ?> - <?php echo date("M Y", strtotime($_GET["end"])); } else{ echo "&nbsp;";} ?></td>
            <td><?php if($_GET["registration"]) {echo "500";} else{ echo "&nbsp;";} ?></td>
        </tr>
        <tr>
            <td><?php if($_GET["deposit"]) echo "Security Deposit"; ?></td>
            <td><?php if($_GET["deposit"]) { echo date("M Y", strtotime($_GET["start"])); ?> - <?php echo date("M Y", strtotime($_GET["end"])); } else{ echo "&nbsp;";} ?></td>
            <td><?php if($_GET["deposit"]) { echo "2000";} else{ echo "&nbsp;";} ?></td>
        </tr>
        <tr>
            <td>Prices include Water, Electricity and Wifi</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><p class="quoteTotal">Total</p></td>
            <td><p class="m-0">R<?php echo ($charges*$diff)+$RegCharges+$DepositCharges; ?></p></td>
        </tr>
        </tbody>
    </table>
    <img src="img/quot/4.png" alt="" id="quotationPic4">
</div>

</body>
</html>