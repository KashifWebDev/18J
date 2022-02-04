<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Shift Students Room";
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
                                <strong>Success! </strong> Student room was shifted successfully!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["removed"]) && $_GET["removed"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Remove reservation was deleted!
                            </div>
                        </div>
                        <?php
                    }
                    if(isset($_GET["assign"]) && $_GET["assign"]){
                        ?>
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body text-success">
                                <strong>Success! </strong> Student room was assigned successfully!
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Page Heading -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal">
                        Empty Reservation
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Empty a reserved bed</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="sel1">Select Room:</label>
                                            <select class="form-control" name="roomId">
                                                <option>-- SELECT --</option>
                                                <?php
                                                $s = "SELECT * FROM rooms";
                                                $s1 = mysqli_query($con, $s);
                                                while($s2 = mysqli_fetch_array($s1)){
                                                    ?>
                                                    <option value="<?php echo $s2["id"]; ?>"><?php echo $s2["room"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Select Bed:</label>
                                            <select class="form-control" name="bedID">
                                                <option>-- SELECT --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5 ">5</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" name="delReservation" class="btn-danger w-100 btn">
                                                    <i class="fas fa-user-times"></i>
                                                    Delete Reservation
                                                </button>
                                                <?php
                                                if(isset($_POST["delReservation"])){
                                                    $room = $_POST["roomId"];
                                                    $bed = $_POST["bedID"];

                                                    $new_bedCol = "";
                                                    if($bed ==1 ) $new_bedCol = "bed1";
                                                    if($bed ==2 ) $new_bedCol = "bed2";
                                                    if($bed ==3 ) $new_bedCol = "bed3";
                                                    if($bed ==4 ) $new_bedCol = "bed4";

                                                    phpRunSingleQuery("UPDATE rooms SET $new_bedCol=69 WHERE id=$room");
                                                    phpRunSingleQuery("UPDATE students SET roomID=6969, roomID=6969 WHERE roomID=$room and bedID=$bed");
                                                    js_redirect("admin_shift_room.php?removed=1");
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Room#</th>
                                        <th>Bed#</th>
                                        <th>University</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Room#</th>
                                        <th>Bed#</th>
                                        <th>University</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM students";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $rand = rand();
                                            if(isset($row["roomID"])){
                                                $roomID = $row["roomID"];
                                                $s = "SELECT * FROM rooms WHERE id=$roomID";
//                                            echo $s;
                                                $s2 = mysqli_query($con, $s);
                                                $s3 = mysqli_fetch_array($s2);
//                                            print_r($s3);
                                                $roomNum = $s3["room"];
                                                $OldRoomID = $s3["id"];
                                            }else{
                                                $roomID = null;
                                                $roomNum = null;
                                                $OldRoomID = null;
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["name"].' '.$row["surename"]; ?></td>
                                                <td><?php echo $roomNum; ?></td>
                                                <td><?php echo $row["bedID"]==6969 ? null : $row["bedID"]; ?></td>
                                                <td><?php echo $row["uniName"]; ?></td>
                                                <td>
                                                    <?php if($row["roomID"]==6969){ ?>
                                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#AssignRoomModal_<?php echo $rand; ?>">
                                                            Reserve Room
                                                        </button>
                                                    <?php }else{ ?>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#shiftRoomModal_<?php echo $rand; ?>">
                                                            Shift Room
                                                        </button>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <!-- Admin Assign room modal -->
                                            <div class="modal show" id="AssignRoomModal_<?php echo $rand; ?>" aria-modal="true" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Student Room Shifting</h4>
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <input type="hidden" name="student_id" value="<?php echo $row["id"]; ?>">
                                                                <div class="form-group">
                                                                    <label for="sel1">Select Room:</label>
                                                                    <select class="form-control" name="roomId">
                                                                        <option>-- SELECT --</option>
                                                                        <?php
                                                                        $s = "SELECT * FROM rooms";
                                                                        $s1 = mysqli_query($con, $s);
                                                                        while($s2 = mysqli_fetch_array($s1)){
                                                                            ?>
                                                                            <option value="<?php echo $s2["id"]; ?>"><?php echo $s2["room"]; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sel1">Select Bed:</label>
                                                                    <select class="form-control" name="bedID">
                                                                        <option>-- SELECT --</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5 ">5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <button type="submit" name="changeRoom" class="btn-primary w-100 btn">
                                                                            <i class="fas fa-plus"></i>
                                                                            Reserve Now
                                                                        </button>
                                                                        <?php
                                                                        if(isset($_POST["changeRoom"])){
                                                                            $student_id = $_POST["student_id"];
                                                                            $room = $_POST["roomId"];
                                                                            $bed = $_POST["bedID"];

                                                                            $new_bedCol = "";
                                                                            if($bed ==1 ) $new_bedCol = "bed1";
                                                                            if($bed ==2 ) $new_bedCol = "bed2";
                                                                            if($bed ==3 ) $new_bedCol = "bed3";
                                                                            if($bed ==4 ) $new_bedCol = "bed4";

                                                                            phpRunSingleQuery("UPDATE rooms SET $new_bedCol=69 WHERE id=$room");
                                                                            phpRunSingleQuery("UPDATE students SET roomID=$room, bedID=$bed WHERE id=$student_id");
                                                                            js_redirect("admin_shift_room.php?assign=1");
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Admin Shift room modal -->
                                            <div class="modal show" id="shiftRoomModal_<?php echo $rand; ?>" aria-modal="true" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Student Room Shifting</h4>
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <input type="hidden" name="student_id" value="<?php echo $row["id"]; ?>">
                                                                <input type="hidden" name="old_room" value="<?php echo $OldRoomID; ?>">
                                                                <input type="hidden" name="old_bed" value="<?php echo $row["bedID"]; ?>">
                                                                <div class="form-group">
                                                                    <label for="sel1">Select Room:</label>
                                                                    <select class="form-control" name="roomId">
                                                                        <option>-- SELECT --</option>
                                                                        <?php
                                                                        $s = "SELECT * FROM rooms";
                                                                        $s1 = mysqli_query($con, $s);
                                                                        while($s2 = mysqli_fetch_array($s1)){
                                                                            ?>
                                                                            <option value="<?php echo $s2["id"]; ?>"><?php echo $s2["room"]; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sel1">Select Bed:</label>
                                                                    <select class="form-control" name="bedID">
                                                                        <option>-- SELECT --</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5 ">5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <button type="submit" name="changeRoom" class="btn-primary w-100 btn">
                                                                            <i class="fas fa-exchange-alt"></i>
                                                                            Change Now
                                                                        </button>
                                                                        <?php
                                                                        if(isset($_POST["changeRoom"])){
                                                                            $student_id = $_POST["student_id"];
                                                                            $room = $_POST["roomId"];
                                                                            $bed = $_POST["bedID"];
                                                                            $oldRoom = $_POST["old_room"];
                                                                            $oldBed = $_POST["old_bed"];

                                                                            $Old_bedCol = "";
                                                                            if($oldBed ==1 ) $Old_bedCol = "bed1";
                                                                            if($oldBed ==2 ) $Old_bedCol = "bed2";
                                                                            if($oldBed ==3 ) $Old_bedCol = "bed3";
                                                                            if($oldBed ==4 ) $Old_bedCol = "bed4";

                                                                            $new_bedCol = "";
                                                                            if($bed ==1 ) $new_bedCol = "bed1";
                                                                            if($bed ==2 ) $new_bedCol = "bed2";
                                                                            if($bed ==3 ) $new_bedCol = "bed3";
                                                                            if($bed ==4 ) $new_bedCol = "bed4";

                                                                            phpRunSingleQuery("UPDATE rooms SET $Old_bedCol=0 WHERE id=$oldRoom");
                                                                            phpRunSingleQuery("UPDATE rooms SET $new_bedCol=1 WHERE id=$room");
                                                                            phpRunSingleQuery("UPDATE students SET roomID=$room, bedID=$bed WHERE id=$student_id");
                                                                            js_redirect("admin_shift_room.php?success=1");
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>