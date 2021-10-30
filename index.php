<?php
require 'parts/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Login";
require 'parts/head.php';
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
<!--                            <div class="col-lg-6 d-none d-lg-block bg-login-image bg_logo"></div>-->
                            <div class="col-lg-10 mx-auto">
                                <div class="p-5">
                                    <?php
                                    if(isset($_GET["err"])){
                                        ?>
                                        <div class="card mb-4 py-3 border-bottom-danger">
                                            <div class="card-body text-danger">
                                                <strong>Error! </strong> Invalid Credentials!
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pswd" class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                                            <i class="fas fa-sign-in-alt"></i> Login
                                        </button>
                                    </form>
                                    <?php
                                    if(isset($_POST["login"])){
                                        $email = $_POST["email"];
                                        $pswd = $_POST["pswd"];

                                        $sql = "SELECT * FROM admin_users WHERE email='$email' AND pass='$pswd'";
                                        $r = mysqli_query($con, $sql);
                                        if(mysqli_num_rows($r)){
                                            $row = mysqli_fetch_array($r);
                                            session_start();
                                            $_SESSION["id"] = $row["id"];
                                            echo "
                                                <script>window.location.replace('admin_dashboard.php');</script>
                                            ";
                                        }else{
                                            echo "
                                                <script>window.location.replace('index.php?err=1');</script>
                                            ";
                                        }

                                    }
                                    ?>
                                    <hr>
                                    <div class="text-center">
<!--                                        <a class="small" href="register.html">Create an Account!</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>