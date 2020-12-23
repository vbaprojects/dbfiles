<?php
session_start();
include '../connection/dbcon.php';
$session_id = $_SESSION['user']['username'];
	if(isset($_GET['pass'])){
		
		
		$check="SELECT * FROM users WHERE username='$session_id'";
		$result=mysqli_query($conLogin,$check);
		if(mysqli_num_rows($result)>0)
		{
			$conLogin = mysqli_connect("localhost","root","","login");
			include('C:/xampp/htdocs/session.php'); 
			$pass = $_GET['pass'];
			$session_id = $_SESSION['user']['username'];
			if(mysqli_query($conLogin, "update users set password='$pass' where username='$session_id'")){
				echo 'Your New Password successfully updated !';
				
			}else{
				echo 'Something went wrong !';
			}
		}else{
			$conLogin = mysqli_connect("localhost","root","","inventory");
			include('C:/xampp/htdocs/session.php'); 
			$pass = $_GET['pass'];
			$session_id = $_SESSION['user']['username'];
			if(mysqli_query($conLogin, "update users set password='$pass' where username='$session_id'")){
				echo 'Your New Password successfully updated !';
				
			}else{
				echo 'Something went wrong !';
			}
		}
	}
?>