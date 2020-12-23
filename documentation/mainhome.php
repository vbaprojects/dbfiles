<?php
	session_start(); 
	error_reporting(0);
    if($_SESSION['user']['role'] == null){
		header('location:../index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SCPL System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
  <link rel="icon" type="image/ico" href="log.png" />
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <style>
     .col-sm-3 > .fitter{width:100%;}
	 .btn {width: -webkit-fill-available;}
  </style>
</head>
<body style="background: #d8d8d8;">


<div class="container" style="background: #FFFFFF; box-shadow: 1px 1px 9px 3px;">
  <div class="row" id="maineser">
   <div class="panel panel-default" style="margin-bottom: 0px;border: 0;">
	 <div class="panel-body" style="background: #0b0a1a;padding-bottom: 0px;">
		<div class="col-sm-3"> 
			<img src="RenderDashboardLogo.jpg">
		</div>
		<div class="col-sm-6">
		  <div class="panel panel-default" style="border: 0;">
			<div class="panel-body" style="box-shadow: inset 1px 1px 3px 3px;">
				<div class="row">
					<div class="col-sm-4">
						<div class="fitter">
							<button type="button" id="Inventory" class="btn btn-info"><img src="img/inventory.png" width="25px" height="25px" style="margin-right:3px;">Inventory</button>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="fitter">
							<button type="button" id="Munro" class="btn btn-danger"><img src="img/Munro.png" width="25px" height="25px" style="margin-right:3px;">Munro</button>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="fitter">
							<button type="button" id="LiveTracking" class="btn btn-warning"><img src="img/tracking.png" width="25px" height="25px" style="margin-right:3px;">Live Tracking</button>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
		<div class="col-sm-2" style="float:right;">
		  <div class="panel panel-default" style="border: 0;">
			<div class="panel-body" style="box-shadow: inset 1px 1px 3px 3px;">
				<div class="fitter">
					<button type="button" id="userbutton" class="btn btn-default btn-sm"><img src="img/user.png" width="25px" height="25px" style="margin-right:3px;"><?php echo $_SESSION['user']['username']; ?></button>
				</div>
				<div>
				  <button type="button" id="logoutbutton" class="btn btn-danger btn-sm" style="margin-top:10px;">Logout</button>
				</div>
			</div>
		  </div>
		</div>
	</div>
	</div>
  </div>
  <div class="row sloader001" id="contentttt" style="height: 100%;border: 9px solid #0b0a1a;box-shadow:inset 1px 1px 9px 2px;">
		<iframe id="frame" src="" width="100%"  height="100%" style="border: 0px;">
		</iframe>   
  </div>
</div>
<script>
	$(window).load(function() {
		$subt =  $(window).height() - $('#maineser').height() + 40;
		$('body div#contentttt').height($subt);
		$("#frame").attr("src", "welcomescreen.html");
		$('#logoutbutton').hide();
	});
	
	$(window).resize(function(){
	    $subt =  $(window).height() - $('#maineser').height() + 40;
		$('body div#contentttt').height($subt);
	});
	
	$('#userbutton').click(function() {
		if($("#logoutbutton").is(":hidden")){
			$('#logoutbutton').show();
		}else{
			$('#logoutbutton').hide();
		}
	});
	$('#logoutbutton').click(function() {
		window.location.replace("logout.php");
	});
    
	$("#Inventory").click(function () { 
		$("#frame").attr("src", "newinventory/index.php");
	});
	$("#Munro").click(function () { 
		//$("#frame").attr("src", "dashboard/production/munrocsv.php");
	});
	$("#LiveTracking").click(function () { 
		//$("#frame").attr("src", "dashboard/production/index.php");
	});
</script>
</body>
</html>
