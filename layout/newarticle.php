<?php 
include 'messagebox.php';
include '../validatebuyer.php';
				$a =	  '<label style="font-size: 12px;font-family: sans-serif;" ><b>Buyer</b></label><br>
					  <select class="form-control" id="by65466564" name="Buy">';
				$b = $buyerselection;
				$c =  '</select>
					  <label style="font-size: 12px;font-family: sans-serif;" for="psw"><b>New Fabric Article</b></label><br>
					  <input style="padding: 3px;" id="inputfieldsalert0015345353" class="form-control" type="text" placeholder="Enter Fabric Article" name="psw" required>
					  <label style="font-size: 12px;font-family: sans-serif;" ><b>Classification</b></label><br>
					  <select class="form-control" id="Classification" name="Buy">
						<option value="Shell">Shell</option>
						<option value="Lining">Lining</option>
					  </select>
					  <label style="font-size: 12px;font-family: sans-serif;" for="psw"><b>Fabric Content</b></label><br>
					  <input style="padding: 3px;" id="contentfieldsalert0015345353" class="form-control" type="text" placeholder="Enter Fabric Content" name="cont" required>
					  <label style="font-size: 12px;font-family: sans-serif;" for="psw"><b>Color</b></label><br>
					  <input style="padding: 3px;" id="colorfieldsalert0015345353" class="form-control" type="text" placeholder="Fabric Color" name="colour" required>
					  <br>
					  <button class="btn btn-primary" style="width:100%;" onclick="myNewArtcle()" class="form-control" type="button">Submit</button>';
					
				
				$d = '<script>
					function myNewArtcle(){
						
						if($.trim($("#by65466564").val()) == ""){
							alertmsg("Please Select Buyer !","red");
						}else{
							if($.trim($("#inputfieldsalert0015345353").val()) == ""){
								alertmsg("Please Enter Fabric Article !","red");
							}else{
								if($.trim($("#contentfieldsalert0015345353").val()) == ""){
									alertmsg("Please Enter Fabric Content !","red");
								}else{
									var by65466564 = $("#by65466564").val();
									var article0011 = $("#inputfieldsalert0015345353").val();
									var Classification = $("#Classification").val();
									var content0011 = $("#contentfieldsalert0015345353").val();
									var color0011 = $("#colorfieldsalert0015345353").val();
									 $.ajax({url: "layout/phpgetter.php?newarticleadding="+article0011+"&classification="+Classification+"&newarticleaddingbuyer="+by65466564+"&newarticlecontentaddingbuyer="+content0011+"&newarticlecoloraddingbuyer="+color0011, success: function(result){
										
										if(result == "n"){
											alertmsg("Fabric Article already exist !","red");
										}else if(result == "y"){
											alertmsg("Fabric Article added successfully !","green");
											closeMessageBox();
										}
									 }});
								}
							}
					   }
					}
				</script>';
				echo normalMessageBox("$a $b $c", $d);
			