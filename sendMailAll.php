<?php
    require 'parts/db.php';
    $roomType = 'Double';
    $start = '2022-02-01';
    $end = '2022-12-01';
    $registration = 1 ;
    $deposit = 1;


    $sql = "SELECT * FROM students";
    $sql1 = mysqli_query($con, $sql);


    while ($row = mysqli_fetch_array($sql1)){
        $uid = $row["id"];

        echo $uid."<br>";
    }


