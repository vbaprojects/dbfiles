<?php 
include 'messagebox.php';
include '../validatebuyer.php';

$a =   '<label style="font-size: 12px;font-family: sans-serif;" for="psw"><b>New Vendor</b></label><br>
		<input style="padding: 3px;" id="vendorsalert0015345353" class="form-control" type="text" placeholder="Enter New Vendor" name="psw" required>
		<br>
		<button class="btn btn-primary" style="width:100%;" onclick="myNewVendor()" class="form-control" type="button">Submit</button>';

				
$b =				'<script>
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
				echo normalMessageBox($a, $b);