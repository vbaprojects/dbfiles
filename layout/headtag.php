<?php 
//include('C:/xampp/htdocs/dashboard/production/ageingup.php');
include('C:/xampp/htdocs/dbcon.php');
include('C:/xampp/htdocs/session.php'); 
$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
error_reporting(0);
$unn=$row['username'];
?> 
<head>
    <meta charset="UTF-8">
    <title>Upload Orders</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    
	<!-- Theme style -->
    <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<!--  ALERT MESSAGE -->
    <link rel="stylesheet" id="bs-stylesheet" href="plugins/alert/bs3.css">
    <link rel="stylesheet" href="plugins/alert/bundled.css">
    <link rel="stylesheet" type="text/css" href="plugins/alert/jquery-confirm.css"/> 
    <link rel="icon" type="image/ico" href="dist/img/logo/log.png" />
   
	<!--     SPINNER   -->
	<link href="plugins/spin/spin.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="dist/css/alertstyle.css"/> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<style>
	     body { font-size:12px;zoom:80%;}
		 
		.box , .nav-tabs-custom {
		  margin-bottom: 20px;
		  background: #fff;
		  box-shadow: 0 0px 5px 0px rgba(0, 0, 0, 0.52);
		  border-radius: 3px;
		}
		.nav-tabs-custom > .nav-tabs > li.header {
			line-height: 35px;
			padding: 0 10px;
			font-size: 16px;
			color: #444;
		}
		
		
		
		.row {
			margin-right: 0px;
			margin-left: 0px;
		}
		.form-control {
			height: 25px;
		}
		.form-control {
			display: block;
			width: 100%;
			height: 34px;
			padding: 1px 1px;
			font-size: 14px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
			-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
			transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}
		.skin-blue .main-header .navbar {
			background-color: #0a0a19;
		}
		.table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th, .table>tbody>tr>td, .table>tbody>tr>th {
			text-align: left;
			line-height: 1.42857143;
			vertical-align: inherit;
			border-top: 1px solid #ddd;
		}
		.pull-right {
			margin-bottom: 12px;
		}
		.firstcontent>.col-lg-2{
			width:20%;
		}
		
		.footerlink{
			    cursor: context-menu;
		}
		.footerlink:hover{
			text-decoration: none;
		}
		
		.content-wrapper, .right-side {
			min-height: 100%;
			background-color: #ecf0f5;
			z-index: 800;
			padding-bottom: 168px;
		}
		#inputfieldsalert00188 {
		  width: 100%;
		  padding: 6px 10px;
		  margin: 4px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		  font-size: 12px;
		  font-family: sans-serif;		
		}
		.main-header {
			background : black;
			position: fixed;
			width: 100%;
		}
		.main-sidebar {
			position: fixed;
		}
		.content-header > h1 {
			margin-top: 54px;
			font-size: 24px;
			margin-left: 31px;
		}
		.content-header > .breadcrumb {
			    margin-top: 53px;
		}
		.sidebar-menu > li {
			cursor: pointer;
		}
		.content-header > .breadcrumb > li > a  {
			cursor: pointer;
		}
		.skin-blue .main-header li.user-header {
			background-color: #222d32;
		}
		.main-footer {
			bottom: 0;
			position: fixed;
			float:right;
			width: 100%;
		}
		div {
			white-space: nowrap;
		}
		
		.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
			/* background-color: #00a65a !important; */
		}
	/*	.alerter008666{
			background-color: red;
			display: none;
			position: fixed;
			z-index: 10000;
			/* margin: 3%; /*
			width: 100%;
			border: 0px;
			border-radius: unset;
		}	 */

		.sidebar-toggle {
			-webkit-animation: mymove 1s ;
			animation: mymove 1s ;
		}
		
		/* Safari 4.0 - 8.0 */
		@-webkit-keyframes mymove {
		  from {transform:rotate(0deg);}
			to {transform:rotate(360deg);}
		}

		/* Standard syntax */
		@keyframes mymove {
		 from {transform:rotate(0deg);}
			to {transform:rotate(360deg);}
		}
	</style>
  </head>
  
 
   
   
  