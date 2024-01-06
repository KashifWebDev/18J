<?php

//$con = mysqli_connect("localhost","root","","projects_18j");
$con = mysqli_connect("localhost","u953547654_18j","9oqRR0=~gp>J","u953547654_18j");

// Check connections
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$GLOBALS["con"] = $con;

?>