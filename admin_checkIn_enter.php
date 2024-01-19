<?php
require 'parts/app.php';

if(isset($_POST['submit'])){
    print_r($_POST);
    $inspectionDate = $_POST['inspectionDate'];
    $inspectionTime = $_POST['inspectionTime'];
    $tenantName = $_POST['tenantName'];
    $landLordName = $_POST['landLordName'];
    $tenantSignature = $_POST['tenantSignature'];
    $landLordSign = $_POST['landLordSign'];
    $note = $_POST['note'];
    $roomNumber = $_POST['roomNumber'];

    $tenantCheckBox = join(",", $_POST['tenantCheckBox']);
    $landlordCheckBox = join(",", $_POST['landlordCheckBox']);

//    foreach($_POST['checkbox'] as $checkbox){
//        echo $checkbox . ' ';
//    }

    $sql = "INSERT INTO checkin 
        (inspectionDate, inspectionTime, tenantName, landLordName, tenantSignature, landLordSign, 
        note, tenantCheckBox, landlordCheckBox, roomNumber)
        VALUES 
        ('$inspectionDate', '$inspectionTime', '$tenantName', '$landLordName', '$tenantSignature', '$landLordSign', 
        '$note', '$tenantCheckBox', '$landlordCheckBox', '$roomNumber')";

    if ($con->query($sql) === TRUE) {
        js_redirect("admin_checkIn_list.php?success=1");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Check In List";
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
                                <strong>Success! </strong> Check In record was stored successfully.
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Check In List</h1>

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roomNumber">Room Number</label>
                                    <input type="text" name="roomNumber" class="form-control" id="roomNumber">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inspectionDate">Date of Inspection</label>
                                    <input type="date" name="inspectionDate" class="form-control" id="inspectionDate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inspectionTime">Date of Inspection</label>
                                    <input type="time" name="inspectionTime" class="form-control" id="inspectionTime">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tenantName">Tenant Name</label>
                                    <input type="text" name="tenantName" class="form-control" id="tenantName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="landLordName">Landlord Rep. Name Name</label>
                                    <input type="text" name="landLordName" class="form-control" id="landLordName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tenantSignature">Tenant Signature</label>
                                    <input type="text" name="tenantSignature" class="form-control" id="tenantSignature">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="landLordSign">Landlord Signature</label>
                                    <input type="text" name="landLordSign" class="form-control" id="landLordSign">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <input type="text" name="note" class="form-control" id="note">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <h3 class="text-dark">Tenant</h3>
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="Room Key">Room Key</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="Study Desk">Study Desk</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="Blinds">Blinds</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="White Unstained Mattress">White Unstained Mattress</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="2 White Mattress Covers">2 White Mattress Covers</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="Labeled Chair">Labeled Chair</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="White Clothing Cupboard">White Clothing Cupboard</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="White Clothing Cupboard (Shelfs)">White Clothing Cupboard (Shelfs)</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="White Clothing Cupboard (Hanging Space)">White Clothing Cupboard (Hanging Space)</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="3 Electrical Plug Points">3 Electrical Plug Points</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="One Room Light">One Room Light</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="Open Window">Open Window</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="Electric Blanket">Electric Blanket</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="col-md-12">
                                    <h3 class="text-dark">Landlord</h3>
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="Room Key">Room Key</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="Study Desk">Study Desk</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="Blinds">Blinds</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="White Unstained Mattress">White Unstained Mattress</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="2 White Mattress Covers">2 White Mattress Covers</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="Labeled Chair">Labeled Chair</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="White Clothing Cupboard">White Clothing Cupboard</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="White Clothing Cupboard (Shelfs)">White Clothing Cupboard (Shelfs)</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="White Clothing Cupboard (Hanging Space)">White Clothing Cupboard (Hanging Space)</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="3 Electrical Plug Points">3 Electrical Plug Points</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="One Room Light">One Room Light</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="Open Window">Open Window</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="Electric Blanket">Electric Blanket</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100" name="submit">
                                    Save Form
                                </button>
                            </div>
                        </div>
                    </form>

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

</body>

</html>