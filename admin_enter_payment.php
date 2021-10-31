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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Payment Date</label>
                                            <input type="date" name="date" class="form-control" placeholder="Registration Date" id="email" required>
                                        </div>
<!--                                        <div class="form-group">-->
<!--                                            <label for="pwd">Teacher:</label>-->
<!--                                            <input type="text" name="teacher" placeholder="Teacher Name" class="form-control" value="">-->
<!--                                        </div>-->
                                        <div class="form-group">
                                            <label for="pwd">Student:</label>
<!--                                            <input type="text" name="name" placeholder="Student/Customer Name" class="form-control" value="" required>-->
                                            <select class="songs form-select form-control" name="teacher">
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pwd">Start Date</label>
                                                    <input type="date" name="receipt" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pwd">Start Date</label>
                                                    <input type="date" name="receipt" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Notes #:</label>
                                            <input type="text" name="desc" class="form-control" placeholder="Service Description" id="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Payment Method:</label>
                                            <span class="ml-2" id="payment_methods_list">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="cash1" value="Cash" name="pay" required>
                                                    <label class="form-check-label" for="Registration">Cash</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="cash2" value="Card" name="pay" required>
                                                    <label class="form-check-label" for="Books">Card</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="cash3" value="EFT" name="pay" required>
                                                    <label class="form-check-label" for="Translation">EFT</label>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="row mb-3" id="payment_method">
                                            <div class="col">
                                                <input type="date" class="form-control" placeholder="Date" name="eft_date">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Reference of EFT" name="eft_reference">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="font-weight-bold">Select Services</label>
                                        </div>
                                        <div class="form-check form-check-inline" id="registration_check">
                                            <input class="form-check-input userSelection" type="checkbox" id="" value="Registration fee" name="userSelection[]" onclick="totalAmount()">
                                            <label class="form-check-label" for="Registration">Registration</label>
                                        </div>
                                        <div class="form-check form-check-inline" id="registration_check">
                                            <input class="form-check-input userSelection" type="checkbox" id="RegistrationInputCheck" value="Monthly fee" name="userSelection[]" onclick="totalAmount()">
                                            <label class="form-check-label" for="Registration">Monthly Fee</label>
                                        </div>
                                        <div class="form-check form-check-inline" id="book_check">
                                            <input class="form-check-input userSelection" type="checkbox" id="BooksInput" value="Books" name="userSelection[]" onclick="totalAmount()">
                                            <label class="form-check-label" for="Books">Books</label>
                                        </div>
                                        <div class="form-check form-check-inline" id="lang_check">
                                            <input class="form-check-input userSelection" type="checkbox" id="TranslationInput" value="Translation" name="userSelection[]" onclick="totalAmount()">
                                            <label class="form-check-label" for="Translation">Translation</label>
                                        </div>
                                        <div class="form-check form-check-inline" id="rewrite_check">
                                            <input class="form-check-input userSelection" type="checkbox" id="ReWrite" value="Exam Re-write" name="userSelection[]" onclick="totalAmount()">
                                            <label class="form-check-label" for="ReWrite">Exam Re-write</label>
                                        </div>
                                        <div class="form-group mt-2" id="mnthBox">
                                            <label for="sel1">Select Month:</label>
                                            <select class="form-control" name="month" onchange="totalAmount()">
                                                <option value="">-- SELECT --</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div  id="bookBox">
                                            <div class="form-group mt-2">
                                                <label for="sel1">Select Course:</label>
                                                <select class="form-control" name="course" id="bookChange" onchange="totalAmount()">
                                                    <option value="">-- SELECT --</option>
                                                    <option value="Foundation 1">Foundation 1</option>
                                                    <option value="Foundation 2">Foundation 2</option>
                                                    <option value="Intermediate 1">Intermediate 1</option>
                                                    <option value="Intermediate 2">Intermediate 2</option>
                                                    <option value="Basic 1">Basic 1</option>
                                                    <option value="Basic 2">Basic 2</option>
                                                    <option value="Advance">Advance</option>
                                                    <option value="Reader">English Reader</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="langBox" class=" mt-2">
                                            <div class="form-group">
                                                <label for="pwd">Customer Name:</label>
                                                <input type="text" name="c_name" placeholder="StudentCustomer Name" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Customer Email</label>
                                                <input type="email" name="c_email" class="form-control" placeholder="Customer@email.com" id="pwd">
                                            </div>
                                            <div class="form-group">
                                                <label for="sel1">Select Language:</label>
                                                <select class="form-control" name="lang" id="langSelect">
                                                    <option value="">-- SELECT --</option>
                                                    <option value="French">French</option>
                                                    <option value="Portuguese">Portuguese</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="number" class="form-control" placeholder="No. Of Pages"
                                                           name="numOfPages" id="pagesCount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-5">
                                            <label for="pwd">Balance (<b>If Any</b>):</label>
                                            <input type="number" min="0" name="balance" class="form-control" placeholder="Enter balance, IF ANY" id="pwd" value="0">
                                        </div>
                                        <div class="form-group mt-5">
                                            <label for="pwd">Amount Paid:</label>
                                            <input type="number" min="0" name="amount_paid" class="form-control" placeholder="Amount Received" id="pwd" value="0">
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
                                    <div class="col-md-10 mx-auto">
                                        <button class="btn btn-primary bg-appColor w-100" type="submit" name="add_payment">
                                            <span class="fas fa-save"></span> Save
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="totalAmountToPay" id="totalAmountToPay">
                            </form>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["add_payment"])){
//                        print_r($_POST); exit(); die();
                        require 'parts/db.php';
                        $date = $_POST["date"];
                        $teacher = $_POST["teacher"] ?? '';
                        $name = $_POST["name"];
                        $receipt = $_POST["receipt"];
                        $c_email = $_POST["c_email"] ?? '';
                        $desc = $_POST["desc"] ?? '';
                        $pay = $_POST["pay"];
                        $c_name = $_POST["c_name"];
//                        $eft_date = isset($_POST["eft_date"]) ?? null;
                        $eft_date = $_POST["eft_date"]=="" ? "0000-00-00" : $_POST["eft_date"];
                        $eft_reference = $_POST["eft_reference"] ?? null;
                        $userSelection = implode("|",$_POST["userSelection"]);
                        $month = $_POST["month"] ?? null;
                        $bookBox = $_POST["course"] ?? null;
                        $langBox = $_POST["lang"] ?? null;
                        $numOfPages = !empty($_POST["numOfPages"]) ? $_POST["numOfPages"] : 0;
                        $balance = !empty($_POST["balance"]) ? $_POST["balance"] : 0;
                        $amount = 0;
                        $amount_paid = $_POST["amount_paid"];

                        $s="SELECT * FROM master_registration_list WHERE student_name='$name'";
                        $s1 = mysqli_query($con, $s);
                        if(mysqli_num_rows($s1)){
                            $row = mysqli_fetch_array($s1);
                            $email = $row["email"];
                        }


//                        echo $amount; exit(); die();


                        date_default_timezone_set('Africa/Johannesburg');
                        $timestamp =  date('Y-m-d H:i:s', time());

                        $sql = "INSERT INTO payments (Customer, Invoice_Date, Terms_of_Payment, eft_date, eft_reference, ABC_Receipt_book, ProductService_Description, c_name, c_email,
                                Amount, Course, Teacher, Tranlations_no_of_pages, mnth, lang, userSelection, email, balance, date_time)
                                VALUES ('$name', '$date', '$pay', '$eft_date', '$eft_reference', '$receipt', '$desc', '$c_name', '$c_email', $amount_paid, '$bookBox', '$teacher', $numOfPages,
                                        '$month', '$langBox', '$userSelection', '$email', $balance, '$timestamp')";

//                        echo $sql; exit(); die();

                        require 'parts/db.php';
                        if(mysqli_query($con, $sql)){
                            $last_id = mysqli_insert_id($con);
//                            echo "DONE ID: ".$last_id;
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
        $("#bookBox").hide();
        $("#mnthBox").hide();
        $("#langBox").hide();
        $("#payment_method").hide();
        $(function(){
            $('#payment_methods_list').click(function() {
                if(
                    $("#cash3").is(':checked')
                ){
                    $("#payment_method").show();
                    // console.log("in");
                }
                else{
                    console.log("out");
                    $("#payment_method").hide();
                }
            });
            $('#RegistrationInputCheck').click(function() {
                if($("#RegistrationInputCheck").is(':checked')){
                    $("#mnthBox").show();
                }
                else{
                    console.log("out");
                    $("#mnthBox").hide();
                }
            });
            $('#rewrite_check').click(function() {
                if($("#ReWrite").is(':checked')){
                    $("#bookBox").show();
                }
                else{
                    $("#bookBox").hide();
                }
            });
            $('#BooksInput').click(function() {
                if($("#BooksInput").is(':checked')){
                    $("#bookBox").show();
                }
                else{
                    $("#bookBox").hide();
                }
            });
            $('#TranslationInput').click(function() {
                if($("#TranslationInput").is(':checked')){
                    $("#langBox").show();
                }
                else{
                    $("#langBox").hide();
                }
            });
        });

    </script>

    <script>
        var amount = 0;
        var selection;
        var cboxes = document.getElementsByName('userSelection[]');
        var lang = $('#langSelect').find(":selected").text();
        var pagesCount = parseInt($("#pagesCount").val());
        var booksChanged = false;
        var monthlyFeesChanged = false;
        var registrationFeesChanged = false;
        var translationChanged = false;
        var reWriteChanged = false;
        function totalAmount(){
            var len = cboxes.length;
            for (var i=0; i<len; i++) {
                // if(cboxes[i].checked) cboxes[i].value;
                // console.log(i + (cboxes[i].checked?' checked ':' unchecked ') + cboxes[i].value);
                // var selection = $('input[name=userSelection]:checked', '#myForm').val();
                selection = cboxes[i].value;
                if(selection === "Registration fee" && cboxes[i].checked && registrationFeesChanged===false){
                    registrationFeesChanged = true;
                    amount = amount + 1600;
                    console.log(amount + selection);
                }
                if(selection === "Monthly fee" && cboxes[i].checked && monthlyFeesChanged===false){
                    monthlyFeesChanged = true;
                    amount = amount + 2500;
                    console.log(amount + selection);
                }
                if(selection === "Books" && cboxes[i].checked){
                    var bookValue = $('#bookChange').find(":selected").text();
                    console.log(bookValue+" -- "+booksChanged);
                    if(bookValue==="English Reader" && booksChanged===false){
                        booksChanged = true;
                        amount = amount + 30;
                    }
                    if(bookValue!=="English Reader" && bookValue !=="-- SELECT --" && booksChanged===false){
                        booksChanged = true;
                        amount = amount + 600;
                    }
                    // if(bookValue ==="-- SELECT --") isChanged = false;
                    console.log("Books change   "+booksChanged);
                    $("#charges").text(amount);
                    console.log(amount + selection);
                }
                if(selection === "Translation" && cboxes[i].checked){
                    pagesCount = parseInt($("#pagesCount").val());
                    lang = $('#langSelect').find(":selected").text();
                    console.log("HERE IN TRANSLATION");
                    console.log(pagesCount);
                    lang = $('#langSelect').find(":selected").text();
                    pagesCount = parseInt($("#pagesCount").val());
                    console.log("pages: "+pagesCount+" Lang: "+lang);
                    if(Number.isFinite(pagesCount) && translationChanged===false){
                        if(lang==="French"){
                            amount  = amount + (150 * pagesCount);
                        }else{
                            amount = amount + (200 * pagesCount);
                        }
                        console.log(amount + selection);
                        // $("#charges").text(amount);
                    }
                }
                if(selection === "Exam Re-write" && cboxes[i].checked && reWriteChanged==false){
                    reWriteChanged = true;
                    amount = amount + 300;
                    console.log(amount + selection);
                }
            }

            $("#charges").text(amount);
        }
        $("#langSelect").change(function (){
            totalAmount();
        });
        $("#pagesCount").change(function (){
            if(translationChanged===false && Number.isFinite(pagesCount)){
                if(lang==="French"){
                    amount  = amount + (150 * pagesCount);
                }else{
                    amount = amount + (200 * pagesCount);
                }
                translationChanged = true;
            }
            $("#charges").text(amount);
            totalAmount();
        });
    </script>
</body>

</html>