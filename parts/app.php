<?php

session_start();
require 'db.php';
//checkIfUserLoggedIn();

$GLOBALS["appAddress"] = "http://abcdatabase.online/";

//error_reporting(0);

	function js_alert($msg){
		echo '
			<script>alert("'.$msg.'");</script>;
		';
	}

	function js_console_log($msg){
		echo '
			<script>console.log("'.$msg.'");</script>;
		';
	}

	function js_redirect($url){
		echo '
			<script>window.location.replace("'.$url.'");</script>
		';
//		header('Location: '.$url);
	}

	function phpMysqliFetchAll($sql){
        $output = array();
        $res = mysqli_query($GLOBALS["con"], $sql);
        if(mysqli_num_rows($res)){
            $output = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
        return $output;
    }
	function phpMysqliFetchSingle($sql){
        $output = array();
        if(mysqli_query($GLOBALS["con"], $sql)){
            $res = mysqli_query($GLOBALS["con"], $sql);
            if(mysqli_num_rows($res)){
                $output = mysqli_fetch_array($res, MYSQLI_ASSOC);
            }
            return $output;
        }
        else{
            js_console_log(mysqli_error($GLOBALS["con"]));
        }
    }

    function phpRunSingleQuery($sql){
//	     return mysqli_query($GLOBALS["con"], $sql) ? true : mysqli_error($GLOBALS["con"]);
	     if(mysqli_query($GLOBALS["con"], $sql)){
	         return true;
         }else{
	         ?>
             <div class="card mb-4 py-3 border-left-danger">
                 <div class="card-body text-danger">
                     <strong>Error! </strong> <?php echo mysqli_error($GLOBALS["con"]); ?>
                     <strong><?php echo $sql; ?></strong>
                 </div>
             </div>
            <?php
	         js_console_log(mysqli_error($GLOBALS["con"]));
	         js_console_log($sql);
	         js_console_log("=====================================");
	         exit(); die();
	         return false;
         }
    }

    function getloggedInUserId(){
	    return isset($_SESSION["id"]) ? $_SESSION["id"] : null;
    }

    function checkIfUserLoggedIn(){
        $uid = getloggedInUserId();
        if(!$uid){
            js_redirect("./");
        }
    }
?>