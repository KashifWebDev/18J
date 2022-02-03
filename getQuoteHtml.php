<?php
require_once "parts/db.php";
$id = $_GET["id"] ?? null;
$s = "SELECT * FROM quotations WHERE id = $id";
$qry = mysqli_query($con, $s);
$row = mysqli_num_rows($qry) ? mysqli_fetch_array($qry) : array();
$uid = $row["userID"];

$date1 = $row["start_date"];
$date2 = $row["end_date"];
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

if($row["roomType"]=="Single") $charges = 6000;
if($row["roomType"]=="Double") $charges = 4480;
if($row["roomType"]=="Triple") $charges = 4000;

if($row["registration"]) $RegCharges = 500;
if($row["deposit"]) $DepositCharges = 2000;

$s = "SELECT * FROM students WHERE id = $uid";
$qry = mysqli_query($con, $s);
$student = mysqli_num_rows($qry) ? mysqli_fetch_array($qry) : array();
?>
<style>
    .mainClr{
        color: #35508c;
    }
    #quotationPic1{
        height: 270px;
    }
    #quotationPic2{
        height: 133px;
    }
    #quotationPic3{
        height: 30px;
    }
    #quotationPic4{
        height: 142px;
        margin-top: 8px;
    }
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    p{
        font-weight: bold;
        margin: 0px;
    }
    p.quoteTotal{
        /*background: #374f8b;*/
        margin: 0px;
        color: #020202;
        padding-left: 10px;
    }
    .name_heading{
        font-size: 20px;
        background-color: #374f8b;
        width: fit-content;
        color: #e9ebf2;
        padding-left: 5px;
        padding-right: 10px;
    }
    .name_value{
        color: black;
        font-weight: 600;
    }
    .roomTypes{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100;
    }
    #value{
        font-size: larger;
    }
</style>
<div class="container-fluid">
    <img src="img/quot/1.png" alt="">
    <h2>KBW PROPERTIES</h2>
    <h2 class="mainClr">QUOTATION</h2>
    <p class="name_heading">Quotation Number</p>
    <p id="value"><?php echo $row["id"]; ?></p>
    <div style="margin-bottom: 10px;">
        <h1 class="name_heading">Name</h1>
        <span class="name_value" id="value"><?php echo $student["name"].' '.$student["surename"]; ?></span>
    </div>


    <h2 class="mainClr name_heading">Company Details</h2>
    <p class="value">18 Jorissen Street, Braamfontein</p>
    <p class="value">Johannesburg, Tel: 011 403 2171</p>
    <p class="value">Website: www.18jorissen.co.za</p>
    <p class="value">Email: info@18jorissen.co.za</p>


    <h2 class="mainClr name_heading">Date:</h2>
    <p><?php echo date("d M, Y - H:i:s", strtotime($row["date_time"])); ?></p>


    <h2 class="mainClr name_heading">Tenant Details:</h2>
    <table>
        <tr>
            <td style="font-weight: bold; text-align: center">Services</td>
            <td style="font-weight: bold; text-align: center">Date</td>
            <td style="font-weight: bold; text-align: center">Amount</td>
        </tr>
        <tr>
            <td class="roomTypes"><?php echo '1x '.$row["roomType"].' Room'; ?></td>
            <td>
            <?php
            $start    = (new DateTime($row["start_date"]))->modify('first day of this month');
            $end      = (new DateTime($row["end_date"]))->modify('first day of next month');
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
            foreach ($period as $dt) {
                ?>
                <p style="border-bottom: 1px solid black; margin: 0px;font-weight: normal">
                    R<?php echo $charges; ?>
                </p>
            <?php
            }
            ?>
            </td>
        </tr>
        <tr>
            <td><?php if($row["registration"]) echo "Registration"; ?></td>
            <td><?php if($row["registration"]) { echo date("M Y", strtotime($row["start_date"])); ?> - <?php echo date("M Y", strtotime($row["end_date"])); } else{ echo "&nbsp;";} ?></td>
            <td><?php if($row["registration"]) {echo "500";} else{ echo "&nbsp;";} ?></td>
        </tr>
        <tr>
            <td><?php if($row["deposit"]) echo "Security Deposit"; ?></td>
            <td><?php if($row["deposit"]) { echo date("M Y", strtotime($row["start_date"])); ?> - <?php echo date("M Y", strtotime($row["end_date"])); } else{ echo "&nbsp;";} ?></td>
            <td><?php if($row["deposit"]) { echo "2000";} else{ echo "&nbsp;";} ?></td>
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
    </table>

    <h2 class="mainClr name_heading">Banking Details</h2>
    <p class="value">KBW Properties PTY LTD</p>
    <p class="value">Registration Number: 2017/488671/07</p>
    <p class="value">VAT Number: 4040220750</p>
    <p class="value">Standard Bank (Bedford Gardens)</p>
    <p class="value">Acc No: 401944670</p>
    <p class="value">Branch Code: 051001</p>
</div>