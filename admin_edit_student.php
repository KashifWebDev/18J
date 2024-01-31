<?php
require 'parts/app.php';
$id = $_GET["id"];
$s = "SELECT * FROM students WHERE id = $id";
$qry = mysqli_query($con, $s);
$student = mysqli_num_rows($qry) ? mysqli_fetch_array($qry) : array();
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Edit Student";
require 'parts/head.php';
?>

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
                                <strong>Success! </strong> Student Record updated Successfully!
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Student Details</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST"  enctype="multipart/form-data">
                                <input type="hidden" name="student_ID" value="<?php echo $id; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Name</label>
                                            <input type="text" name="name" class="form-control"  id="email" value="<?php echo $student["name"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Surname:</label>
                                            <input type="text" name="surname" class="form-control" value="<?php echo $student["surename"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Email Address:</label>
                                            <input type="email" name="email" class="form-control" id="pwd"  value="<?php echo $student["email"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Mobile Number:</label>
                                            <input type="text" name="mob" class="form-control"  value="<?php echo $student["mobile"]; ?>">
                                        </div>
<!--                                        <div class="form-group">-->
<!--                                            <label for="exampleFormControlSelect1" class="mr-3">Select Room</label>-->
<!--                                            <select class="songs form-select w-100" name="roomID">-->
<!--                                                --><?php
//                                                $s = "SELECT * FROM rooms WHERE bed1=0 OR bed2=0 OR bed3=0 OR bed4=0";
//                                                $qry = mysqli_query($con, $s);
//                                                while($row = mysqli_fetch_array($qry)){
//                                                    ?>
<!--                                                    <option value="--><?php //echo $row["id"]; ?><!--">Floor: --><?php //echo $row["floor"]; ?><!-- | Room#: --><?php //echo $row["room"]; ?><!-- </option>-->
<!--                                                    --><?php
//                                                }
//                                                ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                        <div class="form-group">-->
<!--                                            <label for="exampleFormControlSelect1" class="mr-3">Select Bed</label>-->
<!--                                            <div class="form-check form-check-inline" id="registration_check">-->
<!--                                                <input class="form-check-input" type="radio" id="bed1" value="1" name="bed">-->
<!--                                                <label class="form-check-label" for="bed1">Bed 1</label>-->
<!--                                            </div>-->
<!--                                            <div class="form-check form-check-inline" id="registration_check">-->
<!--                                                <input class="form-check-input" type="radio" id="bed2" value="2" name="bed">-->
<!--                                                <label class="form-check-label" for="bed2">Bed 2</label>-->
<!--                                            </div>-->
<!--                                            <div class="form-check form-check-inline" id="registration_check">-->
<!--                                                <input class="form-check-input" type="radio" id="bed3" value="3" name="bed">-->
<!--                                                <label class="form-check-label" for="bed3">Bed 3</label>-->
<!--                                            </div>-->
<!--                                            <div class="form-check form-check-inline" id="registration_check">-->
<!--                                                <input class="form-check-input" type="radio" id="bed4" value="4" name="bed">-->
<!--                                                <label class="form-check-label" for="bed4">Bed 4</label>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Link to lease agreement</span>
                                            </div>
                                            <div class="custom-file">
                                                <input class="custom-file-input" id="inputGroupFile01" type="file" name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Select file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">ID Number</label>
                                            <input type="text" name="idNumber" class="form-control"  value="<?php echo $student["IDnum"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">University Name</label>
                                            <input type="text" class="form-control" name="uniName"  value="<?php echo $student["uniName"]; ?>">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="sel1">Room Number</label>
                                            <?php
                                            $roomID = $student["roomID"];
                                            $roomSQL = "SELECT * FROM rooms";
                                            $roomQRY = mysqli_query($con, $roomSQL);
                                            ?>
                                            <select class="form-control" name="roomID" id="sts">
                                                <option value="">-- SELECT --</option>
                                                <?php
                                                while($row = mysqli_fetch_array($roomQRY)){
                                                    ?>
                                                    <option value="<?=$row["id"]?>" <?=$row["id"] == $roomID ? 'selected' : ''?>><?=$row["room"]?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="sel1">Room Type</label>
                                            <select class="form-control" name="roomType" id="sts">
                                                <option value="">-- SELECT --</option>
                                                <option value="Single" <?='Single' == $student['roomType'] ? 'selected' : ''?>>Single Room</option>
                                                <option value="Double" <?='Double' == $student['roomType'] ? 'selected' : ''?>>Double Room</option>
                                                <option value="Triple" <?='Triple' == $student['roomType'] ? 'selected' : ''?>>Triple Room</option>
                                                <option value="Quadruple" <?='Quadruple' == $student['roomType'] ? 'selected' : ''?>>Quadruple Room</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="sel1">Bed Number</label>
                                            <select class="form-control" name="bedNum" id="sts">
                                                <option value="">-- SELECT --</option>
                                                <option value="1" <?=1 == $student['bedID'] ? 'selected' : ''?>>Bed #1</option>
                                                <option value="2" <?=2 == $student['bedID'] ? 'selected' : ''?>>Bed #2</option>
                                                <option value="3" <?=3 == $student['bedID'] ? 'selected' : ''?>>Bed #3</option>
                                                <option value="4" <?=4 == $student['bedID'] ? 'selected' : ''?>>Bed #4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">University Registration Number</label>
                                            <input type="text" class="form-control" name="uniRegistrationNum"  value="<?php echo $student["UniRegNum"]; ?>">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="sel1">Private/Sponsored:</label>
                                            <select class="form-control" name="privateSponsored" >
                                                <option value="">-- SELECT --</option>
                                                <option value="Private" <?php if($student["privateSponsored"]=="Private") echo "selected"; ?>>Private</option>
                                                <option value="Sponsored" <?php if($student["privateSponsored"]=="Sponsored") echo "selected"; ?>>Sponsored</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Sponsored Name:</label>
                                            <input type="text" name="sponsorName" class="form-control" value="<?php echo $student["sponsorName"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Home Address:</label>
                                            <input type="text" name="address" class="form-control" value="<?php echo $student["address"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Guardian Emergency contact#1:</label>
                                            <input type="text" name="contact1" class="form-control" value="<?php echo $student["guardian1"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Guardian Emergency contact#2:</label>
                                            <input type="text" name="contact2" class="form-control" value="<?php echo $student["guardian2"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Move In Date:</label>
                                            <input type="date" name="moveIn" class="form-control" value="<?php echo $student["moveIn"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Move Out Date:</label>
                                            <input type="date" name="moveOut" class="form-control" value="<?php echo $student["moveOut"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Duration of the Lease</label>
                                            <input type="text" class="form-control" name="leaseDuration" value="<?php echo $student["leaseDuration"]; ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-md-10 mx-auto">
                                        <button class="btn btn-primary bg-appColor w-100" type="submit" name="add_student">
                                            <span class="fas fa-edit"></span> Update Details
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST["add_student"])){
//                        print_r($_POST); exit(); die();
                        require 'parts/db.php';
                        $student_ID = $_POST["student_ID"];
                        $name = $_POST["name"];
                        $surname = $_POST["surname"];
                        $email = $_POST["email"];
                        $mob = $_POST["mob"];
                        $roomID = $_POST["roomID"];
                        $roomType = $_POST["roomType"];
                        $bed = $_POST["bedNum"];
                        $idNumber = $_POST["idNumber"];
                        $uniName = $_POST["uniName"];
                        $uniRegistrationNum = $_POST["uniRegistrationNum"];
                        $privateSponsored = $_POST["privateSponsored"];
                        $sponsorName = $_POST["sponsorName"];
                        $address = $_POST["address"];
                        $contact1 = $_POST["contact1"];
                        $contact2 = $_POST["contact2"];
                        $moveIn = $_POST["moveIn"];
                        $pic = "";


                        if (!empty($_FILES["image"]["name"])) {
                            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt', '.docx'); // valid extensions
                            $path = 'leaseAgreement/'; // upload directory

                            $img = $_FILES['image']['name'];
                            $tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
                            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
                            $final_image = rand(1000, 1000000).$img;
// check's valid format
                            if (in_array($ext, $valid_extensions)) {
                                $path = $path . strtolower($final_image);
                                if (move_uploaded_file($tmp, $path)) {
                                    $pic = $final_image;
                                }else{
                                    echo 'File Upload Failure';exit();die();
                                }
                            } else {
                                echo 'invalid file';exit();die();
                            }
                        }
                        $pic = strtolower($pic);

//
//                        $sql = "INSERT INTO students (name, surename, email, mobile, IDnum,
//                                      linkToLease, uniName, UniRegNum, privateSponsored, sponsorName, address, guardian1, guardian2) VALUES
//                                ('$name', '$surname', '$email', '$mob', '$idNumber', '$pic', '$uniName',
//                                 '$uniRegistrationNum', '$privateSponsored', '$sponsorName', '$address', '$contact1', '$contact2')";


                        $sql = "UPDATE students SET name='$name', surename='$surname', email='$email', mobile='$mob', IDnum='$idNumber', linkToLease='$pic',uniName='$uniName',
                                    UniRegNum='$uniRegistrationNum', privateSponsored='$privateSponsored',sponsorName='$sponsorName', address='$address',
                    guardian1='$contact1', guardian2='$contact2', moveIn='$moveIn',roomID = $roomID, bedID=$bed, roomType = '$roomType'
                WHERE  id = $student_ID";


                        if(phpRunSingleQuery($sql)){
                            js_redirect("admin_edit_student.php?success=1&id=$student_ID");
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
        <!-- End of Content Wrapper -->+

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


</body>

</html>