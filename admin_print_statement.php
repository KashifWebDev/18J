<?php
    $id =
    require "parts/db.php";


    $studentID = $_GET["id"];
    $s = "SELECT * FROM students WHERE id=$studentID";
    $s1 = $test =  mysqli_query($con, $s);
    $row = mysqli_fetch_array($s1);

    $s = "SELECT * FROM quotations WHERE userID=$studentID";
    $s1  =  mysqli_query($con, $s);
    $quote = mysqli_fetch_array($s1);
?>
<html>
    <head>
        <title>User Statement</title>
        <link href="css/sb-admin-2.min.css?v=<?php echo rand(); ?>" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <style>
            p{
                margin: 0;
            }
        </style>
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
                <div class="col-12">
                    <div class="col-6 float-left">
                        <p class="bg-primary text-white py-1 px-2 w-50">Bill To:</p>
                        <p><?php echo $row["name"].' '.$row["surename"]; ?></p>
                        <p><?php echo $quote["roomType"]; ?></p>
                    </div>
                    <div class="float-right col-6 font-weight-normal">
                        <p class="float-right">
                            <span class="font-weight-bold">Date:</span> <?php echo date("Y-m-d"); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-striped text-center">
                        <tbody>
                        <tr>
                            <td class="font-weight-bolder">DATE OF PAYMENT</td>
                            <td class="font-weight-bolder">AMOUNT</td>
                        </tr>

                        <?php
                        $s = "SELECT * FROM invoice WHERE userID=$studentID";
                        $test =  mysqli_query($con, $s);
                        $total = 0;
                        while($record = mysqli_fetch_assoc($test)){
                            if($record["roomType"]=="Single Room") $charges = 6000;
                            if($record["roomType"]=="Double Room") $charges = 4480;
                            if($record["roomType"]=="Triple Room") $charges = 4000;
                            echo '
                                <tr class="w-100">
                                    <td class="w-50">'.$record["paymentDate"].'</td>
                                    <td class="w-50">'.$charges.'</td>
                                </tr>
                            ';
                            $total +=$charges;
                        }
                        ?>
                        <tr class="w-100">
                            <td class="w-50"><b>Total Paid</b></td>
                            <td class="w-50"><?php echo $total; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                        <table class="table table-striped text-center">
                            <tbody>
                            <tr>
                                <td class="font-weight-bolder">INVOICE</td>
                                <td class="font-weight-bolder">AMOUNT</td>
                            </tr>
                            <?php
                            $start    = (new DateTime($quote["start_date"]))->modify('first day of this month');
                            $end      = (new DateTime($quote["end_date"]))->modify('first day of next month');
                            $interval = DateInterval::createFromDateString('1 month');
                            $period   = new DatePeriod($start, $interval, $end);
                            $countMustOne = 1;
                            $totalQuote = 0;
                            foreach ($period as $dt) {
                                if($quote["roomType"]=="Single") $charges = 6000;
                                if($quote["roomType"]=="Double") $charges = 4480;
                                if($quote["roomType"]=="Triple") $charges = 4000;
                                ?>
                                <tr>
                                    <td><?php echo $dt->format("M, Y"); ?></td>
                                    <td><?php echo $charges; ?></td>
                                </tr>
                                <?php
                                $totalQuote += $charges;
                            }
                            ?>
                            <tr>
                                <td class="w-50"><b>Total Invoice</b></td>
                                <td class="w-50"><?php echo $totalQuote; ?></td>
                            </tr>
                            <tr>
                                <td class="w-50"></td>
                                <td class="w-50"></td>
                            </tr>
                            <tr>
                                <td class="w-50">Total Outstanding</td>
                                <td class="w-50"><?php echo $totalQuote-$total; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <div class="col-md-6">
                    <p class="bg-primary px-2 py-1 w-50 text-white">OTHER COMMENTS</p>
                    <p>Please include your name as reference</p>
                    <p class="font-weight-bolder">Banking Details</p>
                    <p>Standard Bank Bedford Gardens</p>
                    <p>KBW Properties cc</p>
                    <p>Acc No:  401944670</p>
                    <p>Branch Code  051001</p>
                </div>
            </div>
        </div>
    </body>
</html>
