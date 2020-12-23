<?php
ini_set('display_errors', 0);
session_start();

if($_SESSION['user']['username'] == 'admin' || $_SESSION['user']['username'] == 'inventory'){
	if($_SESSION['adminselectedbuyer'] != null){
		$_SESSION['mainforbuyer'] = $_SESSION['adminselectedbuyer']; 
	}else{
		$_SESSION['adminselectedbuyer'] = 'Buyers';
		$_SESSION['mainforbuyer'] = 'Buyers';
	}			
}else if($_SESSION['user']['username'] == 'Devered'){
	$_SESSION['mainforbuyer'] = 'Devered'; 
}else if($_SESSION['user']['username'] == 'Transglobal'){
	$_SESSION['mainforbuyer'] = 'Transglobal'; 
}else if($_SESSION['user']['username'] == 'Lambton'){
	$_SESSION['mainforbuyer'] = 'Lambton'; 
}else if($_SESSION['user']['username'] == 'Tailorman'){
	$_SESSION['mainforbuyer'] = 'Tailorman'; 
}else if($_SESSION['user']['username'] == 'Munro'){
	$_SESSION['mainforbuyer'] = 'Munro'; 
}else{
	$_SESSION['mainforbuyer'] = 'dfhfhdjkfhdsjf';
}
?>