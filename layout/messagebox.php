<?php   
error_reporting(0);
// Documentation
/*
     
   1)  >> Include this file as
	 Example  :::::::::::::::::::::::::::::::::
	 
	 include 'messagebox.php';
	 
	 :::::::::::::::::::::::::::::::::::::::::::
	 
	2)  >> To close the Messagebox call this { closeMessageBox(); } in your calling function JS script
	 Example  :::::::::::::::::::::::::::::::::
	 
	 <script>
	    .
		.
		.
	 closeMessageBox();
	    .
		.
		.
	 <script>
	 
	 ::::::::::::::::::::::::::::::::::::::::::: 
   3)  >> Give Form as { $frm } varible
	 Example  :::::::::::::::::::::::::::::::::
	 
			$frm  =   '<label style="font-size: 12px;font-family: sans-serif;" for="psw"><b>New Vendor</b></label><br>
						<input id="vendorsalert0015345353" class="form-control" type="text" placeholder="Enter New Vendor" name="psw" required>
						<br>
						<button class="btn btn-primary" style="width:100%;" onclick="myNewVendor()" class="form-control" type="button">Submit</button>';

	 :::::::::::::::::::::::::::::::::::::::::::

	4) >> Give JS Function as  { $val_JS_fun } varible
	 Example  :::::::::::::::::::::::::::::::::
	 
			$val_JS_fun  =   '<script>
								function myNewVendor(){
								if($.trim($("#vendorsalert0015345353").val()) == ""){
								alertmsg("Please Enter Vendor Name !","red");
								}else{	
								var article0011 = $("#vendorsalert0015345353").val();
								$.ajax({url: "layout/phpgetter.php?newvendoradding="+article0011, success: function(result){

								if(result == "n"){
								alertmsg("This Vendor Name already exist !","red");
								}else if(result == "y"){
								alertmsg("New Vendor added successfully !","green");
								closeMessageBox();
								}
								}});
								}
								}
								</script>';
				 
	 :::::::::::::::::::::::::::::::::::::::::::
	 
   4) >> Then Call the function { addBody() } as
	 
	 Example  :::::::::::::::::::::::::::::::::
	 
	 echo addBody($frm , $val_JS_fun);
	 
	 :::::::::::::::::::::::::::::::::::::::::::
*/        
// Documentation Ends
				
function normalMessageBox($form,$validate_JS_function){
$head  =  '<div id="id01432432432423" class="modalalert001" style="z-index:100000;display:block;" >
			<form class="modal-contentalert001 animatealert001" id="myForm54353789" method="post">
			<div class="imgcontaineralert001">
			<span id="clearfddfdhfjhdfdsfds" style="font-size: 22px;" class="closealert001" id="closerfhfjkdf" title="Close Modal">&times;</span>
			</div>
			<div class="container containeralert001">';
					
$tail = '</div>
		  <div class="container containeralert001" style="background-color:#f1f1f1;padding:20px;">
		  <button id="clearfddfdhfjhf" style="margin-left: -11px;" class="btn btn-danger" type="button" class="cancelbtnalert001 buttonalert001">Cancel</button>
		  </div>
	      </form>
		  </div>';
$clearencevar = '<script>
				$("#clearfddfdhfjhdfdsfds").click(function(){
						$("#id01432432432423").hide();
						document.getElementById("myForm54353789").reset();
					});
					
					$("#clearfddfdhfjhf").click(function(){
						$("#id01432432432423").hide();
						document.getElementById("myForm54353789").reset();
					});
					function closeMessageBox(){
						$("#id01432432432423").hide();
						document.getElementById("myForm54353789").reset();
					}
					
				</script>';
				
	$full = "$head $form $tail $clearencevar $validate_JS_function";
	return $full;
}	


function imageMessageBox($form, $img, $validate_JS_function){
	$head  =  '<div id="id0143243243242311" class="modalalert001" style="z-index:100000;display:block;" >
			<form class="modal-contentalert001 animatealert001" id="myForm5435378911" method="post">
			<div class="imgcontaineralert001"><img src="'.$img.'" alt="Avatar" class="avataralert001">
			<span id="clearfddfdhfjhdfdsfds11" style="font-size: 22px;" class="closealert001" id="closerfhfjkdf" title="Close Modal">&times;</span>
			</div>
			<div class="container containeralert001">';
					
$tail = '</div>
		  <div class="container containeralert001" style="background-color:#f1f1f1;padding:20px;">
		  <button id="clearfddfdhfjhf11" style="margin-left: -11px;" class="btn btn-danger" type="button" class="cancelbtnalert001 buttonalert001">Cancel</button>
		  </div>
	      </form>
		  </div>';
$clearencevar = '<script>
				$("#clearfddfdhfjhdfdsfds11").click(function(){
						$("#id0143243243242311").hide();
						document.getElementById("myForm5435378911").reset();
					});
					
					$("#clearfddfdhfjhf11").click(function(){
						$("#id0143243243242311").hide();
						document.getElementById("myForm5435378911").reset();
					});
					function closeMessageBox(){
						$("#id0143243243242311").hide();
						document.getElementById("myForm5435378911").reset();
					}
					
				</script>';
				
	$full = "$head $form $tail $clearencevar $validate_JS_function";
	return $full;		
}	
	  
				