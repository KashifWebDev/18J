<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Payment Entry";
require 'parts/head.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    #hidden{
        display: none;
    }
    #visible{
        display: block;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                <?php $newID = $_GET["last_id"]; ?>
                                <strong>Success! </strong> Payment Inserted! <a target="_blank" href="admin_print_invoice.php?id=<?php echo $newID; ?>">CLICK HERE</a> for details.
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Payment Entry</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" id="myForm">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Payment Date</label>
                                                    <input type="date" name="paymentDate" class="form-control" placeholder="Registration Date" id="email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pwd">Student:</label>
                                                    <!--                                            <input type="text" name="name" placeholder="Student/Customer Name" class="form-control" value="" required>-->
                                                    <select class="songs form-select form-control" name="userID">
                                                        <?php
                                                        $s = "SELECT * FROM students";
                                                        $qry = mysqli_query($con, $s);
                                                        while($row = mysqli_fetch_array($qry)){
                                                            ?>
                                                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"].' '.$row["surename"]; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pwd">Payment For Month</label>
                                                    <input id="first" type="month" name="startDate" class="form-control" onchange="roomTypeFunc()" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Select if paid:</label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="reg" value="reg">Registration
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="dep" value="dep">Deposit
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <label for="" class="mr-3 font-weight-bold">Select Bed Type </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input roomTypeSelection" type="radio" name="roomType" id="inlineRadio1" onclick="roomTypeFunc()" value="Single Room">
                                                    <label class="form-check-label" for="inlineRadio1">Single Room</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input roomTypeSelection" type="radio" name="roomType" id="inlineRadio2" onclick="roomTypeFunc()" value="Double Room">
                                                    <label class="form-check-label" for="inlineRadio2">Double Room</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input roomTypeSelection" type="radio" name="roomType" id="inlineRadio3" onclick="roomTypeFunc()" value="Triple Room">
                                                    <label class="form-check-label" for="inlineRadio3">Triple Room</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="container text-right">
                                        <h3>Total Payable : <span id="charges">0</span></h3>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <div class="col-md-6 mx-auto">
                                        <button class="btn btn-primary bg-appColor w-100" type="submit" name="add_payment">
                                            <span class="fas fa-money-bill-alt"></span> Add a Payment
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="totalAmountToPay" id="totalAmountToPay">
                                <input type="hidden" name="roomType" id="roomType">
                                <input type="hidden" name="days" id="days">
                            </form>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["add_payment"])){
//                        print_r($_POST); exit(); die();
                        require 'parts/db.php';
                        $paymentDate = $_POST["paymentDate"];
                        $userID = $_POST["userID"];
                        $startDate = $_POST["startDate"].'-01';
//                        $endDate = $_POST["endDate"].'-01';
                        $roomType = $_POST["roomType"];
                        $totalAmountToPay = $_POST["totalAmountToPay"];
                        $roomType = $_POST["roomType"];
                        $days = $_POST["days"];
                        $topups = $_POST["topups"];
                        $reg = isset($_POST["topups"]) && $_POST["reg"]=="reg" ? 1 : 0;
                        $dep = isset($_POST["topups"]) && $_POST["dep"]=="dep" ? 1 : 0;

                        date_default_timezone_set('Africa/Johannesburg');
                        $timestamp =  date('Y-m-d H:i:s', time());

                        $sql = "INSERT INTO invoice (userID, paymentDate, startDate, roomType,
                                                    totalAmount, totalDays, date_time, reg, dep)
                                VALUES ($userID, '$paymentDate', '$startDate', '$roomType',
                                        '$totalAmountToPay','$days', '$timestamp', '$reg', '$dep')";

//                        echo $sql; exit(); die();

                        if(mysqli_query($con, $sql)){
                            $last_id = mysqli_insert_id($con);

                            $s = "SELECT * FROM students WHERE id=$userID";
                            $r = mysqli_query($con, $s);
                            $row = mysqli_fetch_array($r);
                            $roomID = $row["roomID"];
                            $bed = $row["bedID"];

                            $new_bedCol = "";
                            if($bed ==1 ) $new_bedCol = "bed1";
                            if($bed ==2 ) $new_bedCol = "bed2";
                            if($bed ==3 ) $new_bedCol = "bed3";
                            if($bed ==4 ) $new_bedCol = "bed4";

                            $s = "UPDATE rooms SET $new_bedCol = 1 WHERE id=$roomID";
//                            echo $s; exit(); die();
                            mysqli_query($con, $s);

                            js_redirect("admin_enter_payment.php?success=1&last_id=$last_id");
                        }else{
                            echo mysqli_error($con); exit(); die();
                        }

                    }
                    ?>
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
    <script src="js/select.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


<!--COuntry-->
    <script src="js/select.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.songs').select2();
        });

        $('body').on('click', '.add-data', function (event) {
            event.preventDefault();
            var name = $('input[name=name]').val();
            var songs = $('.songs').val();
            console.log(songs);
            // $.ajax({
            //     method: 'POST',
            //     url: './database/db.php',
            //     data: {
            //         name: name,
            //         songs: songs,
            //     },
            //     success: function (data) {
            //         console.log(data);
            //         $('.res-msg').css('display', 'block');
            //         $('.alert-success').text(data).show();
            //         $('input[name=name]').val('');
            //         $(".songs").val('').trigger('change');
            //
            //         setTimeout(function () {
            //             $('.alert-success').hide();
            //         }, 3500);
            //     }
            // });
        });

        // $("#myModal > div > div > div.modal-body > form > div > span").addClass("w-100");
        $("#myModal > div > div > div.modal-body > form > div > span").css("width", "100% !important");
        $("#myModal > div > div > div.modal-body > form > div > span").attr('style','width: 100% !important');
        // $("#myModal > div > div > div.modal-body > form > div > span").addClass(".w-100");
    </script>


    <script>

        const monthsBtwnDates = (startDate, endDate) => {
            console.log(startDate);
            console.log(endDate);
            startDate = new Date(startDate);
            endDate = new Date(endDate);
            var output = Math.max((endDate.getFullYear() - startDate.getFullYear()) * 12 + endDate.getMonth() - startDate.getMonth(), 0);
            // console.log("In FUnct: "+output);
            output +=1;
            return output;
        };

        function roomTypeFunc() {
            var roomType = $("input[type='radio'].roomTypeSelection:checked").val();
            var amount = 0;
            // var months = monthsBtwnDates(first.value+"-01",second.value+"-01");
            var months = 1;
            console.log("Mnths: "+months);
            if(roomType==="Single Room") amount = 6000;
            if(roomType==="Double Room") amount = 4480;
            if(roomType==="Triple Room") amount = 4000;
            var totalBill = parseInt(amount*months);
            console.log(totalBill);
            $("#charges").text(totalBill);

            document.getElementById("totalAmountToPay").value = totalBill;
            document.getElementById("roomType").value = roomType;
            document.getElementById("days").value = months;
        }

    </script>
</body>

</html>