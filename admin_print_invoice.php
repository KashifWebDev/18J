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

    $roomID = $s2["roomID"];
    $s = "SELECT * FROM rooms WHERE id=$roomID";
    $r1 =  mysqli_query($con, $s);
    $r2 = mysqli_fetch_array($r1);
    $roomNum = $r2["room"];

    $studentID = $row["userID"];
    $s = "SELECT * FROM invoice WHERE userID=$studentID";
    $s1  =  mysqli_query($con, $s);
    $monthsPaid = mysqli_num_rows($s1);
    $s3 = mysqli_fetch_array($s1);

    $desc = json_decode($s3['descr']);

?>
<html>
    <head>
        <title>Invoice Details</title>
        <link href="css/sb-admin-2.min.css?v=<?php echo rand(); ?>" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/logo.png" alt="" style="width: 150px;background-color: #000000; border-radius: 20px;">
                        </div>
                        <div class="col-md-9">
                            <b>18 Jorissen Street</b>
                            <p class="m-0">Braamfontein Johannesburg, South Africa</p>
                            <p class="m-0">Tel: (011) 403 2171</p>
                            <p class="m-0">TE -mail: info@18jorissen.co.za</p>
                            <p class="m-0">www.18jorissen.co.za</p>
                        </div>
                    </div>
                    <div class="w-100" style="border-top: .105rem solid #5a5c69!important; height: 10px !important;">&nbsp;</div>
                </div>
                <div class="w-100 py-3">
                    <div class="clearfix">
                        <p class="float-left m-0"><span class="font-weight-bold">Date:</span> <?php echo $row["paymentDate"]; ?></p>
                        <p class="lead text-dark font-weight-bold float-right m-0">
                            Invoice # <span class="font-weight-normal"><?php echo $row["id"]; ?></span>
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-striped text-center">
                        <tbody>
                            <tr class="w-100">
                                <td class="w-50">Name</td>
                                <td class="w-50"><?php echo $s2["name"].' '.$s2["surename"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Email</td>
                                <td class="w-50"><?php echo $s2["email"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Contact #</td>
                                <td class="w-50"><?php echo $s2["mobile"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">University (Reg #)</td>
                                <td class="w-50"><?php echo $s2["uniName"].' '.$s2["UniRegNum"].''; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Room #</td>
                                <td class="w-50"><?php if($s2["roomID"]!="6969") echo $roomNum; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Months Paid</td>
                                <td class="w-50">
                                    <?php
                                    $s = "SELECT * FROM invoice WHERE userID=$studentID";
                                    $test =  mysqli_query($con, $s);
                                    while($record = mysqli_fetch_assoc($test)){
                                        echo date("F", strtotime($record["startDate"])).', ';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Total Months Paid</td>
                                <td class="w-50"><?php echo $monthsPaid; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Room Type</td>
                                <td class="w-50"><?php echo $row["roomType"]; ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Registration / Deposit</td>
                                <td class="w-50"><?php echo status('reg', $desc) ." / ". status('dep', $desc); ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">Rental / Top up</td>
                                <td class="w-50"><?php echo status('rental', $desc) ." / ". status('topup', $desc); ?></td>
                            </tr>
                            <tr class="w-100">
                                <td class="w-50">&nbsp</td>
                                <td class="w-50"><b>Total &nbsp;</b><?php echo $row["totalAmount"]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
function status($status, $desc){
    return in_array($status, $desc) ? "Paid":"Unpaid";
}
?>
