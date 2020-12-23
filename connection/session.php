<?php
//Start session
//session_start();

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("Location: http://192.168.7.7/");
}
$session_id=$_SESSION['user_id'];

?>