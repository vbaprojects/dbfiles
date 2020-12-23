<?php	
	session_start();
	if(isset($_GET['buyervalueset'])){
		$_SESSION['adminselectedbuyer'] = $_GET['buyervalueset'];
	}
?>