<?php
    $id = $_GET["id"];
    require "parts/db.php";
    $sql = "SELECT * FROM invoice WHERE id = $id";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);


    $studentID = $row["userID"];
    $s = "SELECT * FROM students WHERE id=$studentID";
    $s1 = $test =  mysqli_query($con, $s);
    $s2 = mysqli_fetch_array($s1);

    $studentID = $row["userID"];
    $s = "SELECT * FROM invoice WHERE userID=$studentID";
    $s1  =  mysqli_query($con, $s);
    $monthsPaid = mysqli_num_rows($s1);
    $s3 = mysqli_fetch_array($s1);
?>

<style>
    p{
        margin: 0;
    }
    .center {
        margin-left: auto;
        margin-right: auto;
    }
    tr td:nth-child(2) {
        border-left: 1px solid black;
    }
    td{
        text-align: center;
        border-bottom: 1px solid black;
    }
</style>
<!--Custom Design -->

<div>
    <div style="display: flex; justify-content: center">
        <img src="img/logo_black.png" style=" height: 80px;border-radius: 20px;">
        <div>
            <b>18 Jorissen Street</b>
            <p>Braamfontein Johannesburg, South Africa</p>
            <p>Tel: (011) 403 2171</p>
            <p>TE -mail: info@18jorissen.co.za</p>
            <p>www.18jorissen.co.za</p>
        </div>
    </div>
</div>
    <span>Invoice # <?php echo $row["id"]; ?></span>
    <span>   |    </span>
    <span>Date: <?php echo $row["paymentDate"]; ?></span>
<br>
<hr>
<table class="center">
    <tr>
        <td>Name</td>
        <td><?php echo $s2["name"].' '.$s2["surename"]; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $s2["email"]; ?></td>
    </tr>
    <tr>
        <td>Contact #</td>
        <td><?php echo $s2["mobile"]; ?></td>
    </tr>
    <tr>
        <td>University (Reg #)</td>
        <td><?php echo $s2["uniName"].' ('.$s2["UniRegNum"].')'; ?></td>
    </tr>
    <tr>
        <td>Room #</td>
        <td><?php echo $s2["roomID"]; ?></td>
    </tr>
    <tr>
        <td>Months Paid</td>
        <td>
            <?php
            $s = "SELECT * FROM invoice WHERE userID=$studentID";
            $test =  mysqli_query($con, $s);
            while($record = mysqli_fetch_assoc($test)){
                echo date("F", strtotime($record["startDate"])).', ';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Total Months Paid</td>
        <td><?php echo $monthsPaid; ?></td>
    </tr>
    <tr>
        <td>Room Type</td>
        <td><?php echo $row["roomType"]; ?></td>
    </tr>
    <tr>
        <td style="font-weight: bold">Total</td>
        <td style=""><b><?php echo $row["totalAmount"]; ?></b></td>
    </tr>
</table>
