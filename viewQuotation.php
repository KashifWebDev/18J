<?php
require_once "parts/db.php";

//$id = $_GET["id"] ?? null;
//$s = "SELECT * FROM quotations WHERE id = $id";
//$qry = mysqli_query($con, $s);
//$row = mysqli_num_rows($qry) ? mysqli_fetch_array($qry) : array();

$uid = $id = $_GET["uid"];

$date1 = $_GET["start"];
$date2 = $_GET["end"];
$regCharges = $_GET["regCharges"];
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
if($_GET["roomType"]=="Double") $charges = 4500;
if($_GET["roomType"]=="Triple") $charges = 4000;

if($_GET["registration"]) $RegCharges = $regCharges;
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
        .name_heading{
            font-size: 18px;
            background-color: #374f8b;
            width: 349px;
            color: #ffffff;
            padding-left: 9px;
        }
        .name_value{
            color: black;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <img src="img/quot/1.png" alt="" id="quotationPic1">
    <div style="margin-bottom: 10px;">
        <h1 class="name_heading">User ID</h1>
        <span class="name_value"><?php echo $_GET["uid"]; ?></span>
    </div>
    <div style="margin-bottom: 10px;">
        <h1 class="name_heading">Name</h1>
        <span class="name_value"><?php echo $student["name"].' '.$student["surename"]; ?></span>
    </div>
    <div style="margin-bottom: 10px;">
        <h1 class="name_heading">Student Status</h1>
        <span class="name_value"><?php echo $student["studentStatus"]; ?></span>
    </div>
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
<!--        <tr>-->
<!--            <td>1x --><?php //echo $_GET["roomType"]; ?><!-- Room</td>-->
<!--            <td>--><?php //echo date("M Y", strtotime($_GET["start"])); ?><!-- - --><?php //echo date("M Y", strtotime($_GET["end"])); ?><!--</td>-->
<!--            <td>R--><?php //echo $charges?><!-- x --><?php //echo $diff; ?><!--</td>-->
<!--        </tr>-->
        <tr>
            <td class="roomTypes"><?php echo '1x '.$_GET["roomType"].' Room'; ?></td>
            <td>
                <?php
                $start    = (new DateTime($_GET["start"]))->modify('first day of this month');
                $end      = (new DateTime($_GET["end"]))->modify('first day of next month');
                $interval = DateInterval::createFromDateString('1 month');
                $period   = new DatePeriod($start, $interval, $end);
                $countMustOne = 1;
                foreach ($period as $dt) {
                    ?>
                    <p style="border-bottom: 1px solid black; margin: 0px;">
                        <span></span>
                        <span style="font-weight: normal"><?php echo $dt->format("M, Y"); ?></span>
                    </p>
                    <?php
                }
                ?>
            </td>
            <td>
                <?php
                $perMonth = intval($charges/$diff);
                foreach ($period as $dt) {
                    ?>
                    <p style="border-bottom: 1px solid black; margin: 0px;font-weight: normal">
                        R<?php echo $perMonth; ?>
                    </p>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><?php if($_GET["registration"]) echo "Registration"; ?></td>
            <td><?php if($_GET["registration"]) { echo date("M Y", strtotime($_GET["start"])); ?> - <?php echo date("M Y", strtotime($_GET["end"])); } else{ echo "&nbsp;";} ?></td>
            <td><?php if($_GET["registration"]) {echo $regCharges;} else{ echo "&nbsp;";} ?></td>
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

<form action="admin_email_interested.php" method="post">
    <input type="hidden" name="uid" value="<?php echo $student["id"]; ?>">
    <input name="start" type="hidden" value="<?php echo $_GET["start"]; ?>">
    <input name="end" type="hidden" value="<?php echo $_GET["end"]; ?>">
    <input type="hidden" name="roomType" value="<?php echo $_GET["roomType"]; ?>">
    <input type="hidden" name="registration" value="<?php echo $_GET["registration"]; ?>">
    <input type="hidden" name="deposit" value="<?php echo $_GET["deposit"]; ?>">
    <input type="submit" value="Send Quote" name="save_quote" class="btn btn-primary ml-2 mt-3 mb-4">
</form>

</body>
</html>