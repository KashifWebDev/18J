<?php
require 'parts/app.php';

$id = $_GET['id'];
$sql = "SELECT * FROM checkin where id= $id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);


?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Check In/Out List";
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
                    <h1 class="h3 mb-4 text-gray-800">Check <?=$row["type"]?> List Report</h1>

                    <form id="myForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roomNumber">Room Number</label>
                                    <input type="text" name="roomNumber" class="form-control" id="roomNumber" value="<?php echo $row['roomNumber']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inspectionDate">Date of Inspection</label>
                                    <input type="date" name="inspectionDate" class="form-control" id="inspectionDate" value="<?php echo $row['inspectionDate']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inspectionTime">Time of Inspection</label>
                                    <input type="time" name="inspectionTime" class="form-control" id="inspectionTime" value="<?php echo $row['inspectionTime']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tenantName">Tenant Name</label>
                                    <input type="text" name="tenantName" class="form-control" id="tenantName" value="<?php echo $row['tenantName']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="landLordName">Landlord Rep. Name</label>
                                    <input type="text" name="landLordName" class="form-control" id="landLordName" value="<?php echo $row['landLordName']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tenantSignature">Tenant Signature</label>
                                    <input type="text" name="tenantSignature" class="form-control" id="tenantSignature" value="<?php echo $row['tenantSignature']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="landLordSign">Landlord Signature</label>
                                    <input type="text" name="landLordSign" class="form-control" id="landLordSign" value="<?php echo $row['landLordSign']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <input type="text" name="note" class="form-control" id="note" value="<?php echo $row['note']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <h3 class="text-dark">Tenant</h3>
                                    <?php
                                    $tenantCheckBoxValues = explode(",", $row['tenantCheckBox']); // Assuming it's stored as a comma-separated string
                                    $tenantCheckBoxOptions = array(
                                        "Room Key", "Study Desk", "Blinds", "White Unstained Mattress", "2 White Mattress Covers",
                                        "Labeled Chair", "White Clothing Cupboard", "White Clothing Cupboard (Shelfs)",
                                        "White Clothing Cupboard (Hanging Space)", "3 Electrical Plug Points", "One Room Light",
                                        "Open Window", "Electric Blanket"
                                    );

                                    foreach ($tenantCheckBoxOptions as $option) {
                                        $isChecked = in_array($option, $tenantCheckBoxValues) ? "checked" : "";
                                        echo '
                                            <div class="col-md-12">
                                               <div class="form-check-inline">
                                                <label class="form-check-label"><input type="checkbox" class="form-check-input" name="tenantCheckBox[]" value="' . $option . '" ' . $isChecked . '>' . $option . '</label>
                                              </div>
                                              </div>';
                                    }
                                    ?>
                                </div>
                                <!-- ... (other HTML code) ... -->
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <h3 class="text-dark">Landlord</h3>
                                    <?php
                                    $landlordCheckBoxValues = explode(",", $row['landlordCheckBox']); // Assuming it's stored as a comma-separated string
                                    $landlordCheckBoxOptions = array(
                                        "Room Key", "Study Desk", "Blinds", "White Unstained Mattress", "2 White Mattress Covers",
                                        "Labeled Chair", "White Clothing Cupboard", "White Clothing Cupboard (Shelfs)",
                                        "White Clothing Cupboard (Hanging Space)", "3 Electrical Plug Points", "One Room Light",
                                        "Open Window", "Electric Blanket"
                                    );

                                    foreach ($landlordCheckBoxOptions as $option) {
                                        $isChecked = in_array($option, $landlordCheckBoxValues) ? "checked" : "";
                                        echo '
                                        <div class="col-md-12">
                                        <div class="form-check-inline">
                                            <label class="form-check-label"><input type="checkbox" class="form-check-input" name="landlordCheckBox[]" value="' . $option . '" ' . $isChecked . '>' . $option . '</label>
                                          </div>
                                        </div>
                                        
                                        ';
                                    }
                                    ?>
                                </div>
                                <!-- ... (other HTML code) ... -->
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
<script>
    $('input:checkbox').attr('disabled','true');
    var form = document.getElementById("myForm");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].readOnly = true;
    }
</script>

</html>