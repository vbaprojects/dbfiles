<?php  
              session_start();
			  include 'messagebox.php';
			  
			  //image formation
			  $img = 'dist/img/buyer';
			  if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'inventory'){ $src = 'user'; }else{ $src = $_SESSION['mainforbuyer']; }
			  $ext = "png";
			  $ttlimg = $img.'/'.$src.'.'.$ext;
			  
			  //form formation
			  $urn = $_SESSION['user']['username'];
			  $frm = '<label style="font-size: 12px;font-family: sans-serif;" ><b>User Name</b></label><br>
					  <input id="inputfieldsalert00188" type="text" value='.$urn.' disabled><br>
					  <label style="font-size: 12px;font-family: sans-serif;" for="psw"><b>New Password</b></label><br>
					  <input id="inputfieldsalert001" class="alertinputenabled" type="text" placeholder="Enter Password" name="psw" required>
					  <br>
					  <button class="btn btn-primary" style="width:100%;" onclick="myNewPassword()" class="buttonalert001" type="button">Change Password</button>';
					
         
//script formation			
$fun = '<script>
function myNewPassword(){
	var pass = $("#inputfieldsalert001").val();
	if($.trim($("#inputfieldsalert001").val()) == ""){
		alertmsg("Please Enter New Password !","red");
	}else{
		 $.ajax({url: "layout/changepassword.php?pass="+pass, success: function(result){
			alertmsg("Password set successfully !","green");
			closeMessageBox();
		 }});
	}
}
</script>';
	
echo imageMessageBox($frm, $ttlimg, $fun);

?>