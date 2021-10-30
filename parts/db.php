<?php

$con = mysqli_connect("localhost","root","","project_18j");
//$con = mysqli_connect("localhost","abcdaevx_abc","3}t{Zt?x.Y3)","abcdaevx_abcDatabase");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$GLOBALS["con"] = $con;

?>