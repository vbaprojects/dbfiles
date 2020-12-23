<!DOCTYPE html>
<html>

  <?php 
	session_start(); 
	error_reporting(0);
    if($_SESSION['user']['username'] == null){
		header('location:../index.php');
	}else{ 
		include 'initializing.php'; 
  ?>
  <style>
  
   html{
          zoom: 1; /* all browsers */
         -moz-transform: scale(1); /* Firefox */
      }
  
  </style>
  <!-- Head Tag -->
   <?php include 'connection/dbcon.php'; ?>
  <?php include 'layout/headtag.php'; ?>
  
  <body class="skin-blue" style="background: #ecf0f5;">
    <div class="wrapper">
      
	  <!-- Header -->
	  <?php include 'layout/function.php'; ?>
      <?php include 'layout/header.php'; ?>
	  
      <!--  / Header Ends -->
     
      <!-- Right side column. Contains the navbar and content of the page -->
           <div id="spinner001" style="position: fixed;margin-left: 50%;margin-top: 20%;z-index:1000;"></div>
           <div class="MessageBox001" style="position: fixed;margin-left: 50%;margin-top: 20%;z-index:1000;"></div>
		   
		   <div class="sloader001">
		   </div>
		   
	      
	   
	   
	   <!-- Script -->
	
	   <?php include 'layout/script.php'; ?>
	   
	  <!-- Footer -->
	  
  <?php include 'layout/footer.php'; 
  
   require_once('php-excel-reader/excel_reader2.php');
     require_once('SpreadsheetReader.php');
   if (isset($_POST["Subit332"]))
	{
    $awb1=$_POST["awbb"];
    $awb=preg_replace('/\s+/','',$awb1);
	
    $dt=$_POST["dateert"];
	$date=date("Y-m-d");
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','text/csv','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $orderno = "";
                if(isset($Row[0])) {
                    $orderno = mysqli_real_escape_string($conLogin,$Row[0]);
                }
                
               
				if (!empty($orderno)){
					$s111 = "SELECT * FROM `scomdata` WHERE `orderno`='$orderno'";
		            $r111 = mysqli_query($conLogin, $s111);
		            if(mysqli_num_rows($r111) > 0)
					{
                    $awupp="UPDATE `scomdata` SET `airno` ='$awb' WHERE `orderno`='$orderno'"; 	
                     $resAWU = mysqli_query($conLogin, $awupp);					
					}
					else{
                    $query21212 ="INSERT INTO `scomdata`( `orderno`,`airno`,`date`,`todaydate`) VALUES ('".$orderno."','".$awb."','".$dt."','".$date."')";
                    $result = mysqli_query($conLogin, $query21212);
                
                    if (!empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                        } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                               }
					 
					}
				}
				
				
             }
			
		 }
		  
     }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
  
 
  
      }

    
  
  } 
  
  
  
 $conn = mysqli_connect("localhost","root","","login");
	if ( $conn == false )
	{
		die ("ERROR").mysqli_error();
	}
	$s = "SELECT * FROM `scomdata` WHERE `todaydate`='$date' ";
	$r = mysqli_query($conn, $s);
	$count = 0;
	while ( $row = mysqli_fetch_array($r))
	{
		$count++;
		$oid[] =  $row['orderno'];
		$dppdate=$row['date'];
	}
	for ($i = 0; $i < $count; $i++)
	{
		$o = $oid[$i];
		$ddpdate=$dppdate[$i];
		$s1 = "SELECT * FROM `DELETED` WHERE `OrderID`='$o'";
		$r1 = mysqli_query($conn, $s1);
		if(mysqli_num_rows($r1) > 0)
		{
		
		  
		
			
		}
		else{
		    $s2 = "SELECT * FROM `overall` WHERE `OrderID`='$o'";
		    $r2 = mysqli_query($conn, $s2);
			while ( $row = mysqli_fetch_array($r2))
	             {
		         $gt=$row['GarmentType'];
		         $si=$row['SIStatus'];
		         $sdd=$row['SIDate'];
		         $stt=$row['SITime'];
		         $ci=$row['CIStatus'];
		         $cidd=$row['CIDate'];
		         $citt=$row['CITime'];
		         $co=$row['COStatus'];
		         $codd=$row['CODate'];
		         $cott=$row['COTime'];
		         $ls=$row['LStatus'];
		         $lsdd=$row['LDate'];
		         $lstt=$row['LTime'];
		         $sb=$row['SBStatus'];
		         $sbdd=$row['SBDate'];
		         $sbtt=$row['SBTime'];
		         $jp=$row['JPStatus'];
		         $jpdd=$row['JPDate'];
		         $jptt=$row['JPTime'];
		         $ss=$row['SSStatus'];
		         $ssdd=$row['SSDate'];
		         $sstt=$row['SSTime'];
		         $wh=$row['WHStatus'];
		         $whdd=$row['WHDate'];
		         $whtt=$row['WHTime'];
		         $dp=$row['DPStatus'];
		         $dpdd=$row['DPDate'];
		         $dptt=$row['DPTime'];
				 	
				 }
	
		     if(mysqli_num_rows($r2) > 0)
		       {
				   
				   if ($si="0") {
					$SIDATE=date('Y-m-d', strtotime($ddpdate .' -1 day'));
					$SITIME="09:10:00"; 
                    $SIDATETIME=$SIDATE.$SITIME;
				   }ELSE {$SIDATE=$sdd;$SITIME=$stt; $SIDATETIME=$SIDATE.$SITIME;}
				   if ($ci="0") {
					$CIDATE=date('Y-m-d', strtotime($ddpdate .' -1 day'));
					$CITIME="10:10:00"; 
                    $CIDATETIME=$CIDATE.$CITIME;
				   }ELSE {$CIDATE=$cidd;$CITIME=$citt; $CIDATETIME=$CIDATE.$CITIME;}
				   if ($co="0") {
					$CODATE=date('Y-m-d', strtotime($ddpdate .' -1 day'));
					$COTIME="12:10:00"; 
                    $CODATETIME=$CODATE.$COTIME;
				   }ELSE {$CODATE=$codd;$COTIME=$cott;$CODATETIME=$CODATE.$COTIME;}
				   if ($ls="0") {
					$LSDATE=date('Y-m-d', strtotime($ddpdate .' -1 day'));
					$LSTIME="13:10:00"; 
                    $LSDATETIME=$LSDATE.$LSTIME;
				   }ELSE {$LSDATE=$lsdd;$LSTIME=$lstt;$LSDATETIME=$LSDATE.$LSTIME;}
				   if ($sb="0") {
					$SBDATE=date('Y-m-d', strtotime($ddpdate .' -1 day'));
					$SBTIME="13:50:00"; 
                    $SBDATETIME=$SBDATE.$SBTIME;
				   }ELSE {$SBDATE=$sbdd;$SBTIME=$sbtt;$SBDATETIME=$SBDATE.$SBTIME;}
				   if ($jp="0") {
					$JPDATE=date('Y-m-d', strtotime($ddpdate .' -1 day'));
					$JPTIME="14:10:00"; 
                    $JPDATETIME=$JPDATE.$JPTIME;
				   }ELSE {$JPDATE=$jpdd;$JPTIME=$jptt; $JPDATETIME=$JPDATE.$JPTIME;;}
				   if ($ss="0") {
					$SSDATE=date('Y-m-d', strtotime($ddpdate .' -1 day'));
					$SSTIME="15:10:00"; 
                    $SSDATETIME=$SSDATE.$SSTIME;
				   }ELSE {$SSDATE=$ssdd;$SSTIME=$sstt; $SSDATETIME=$SSDATE.$SSTIME;}
				   if ($wh="0") {
					$WHDATE=$ddpdate;
					$WHTIME="16:10:00"; 
                    $WHDATETIME=$WHDATE.$WHTIME;
				   }ELSE {$WHDATE=$whdd;$WHTIME=$whtt;$WHDATETIME=$WHDATE.$WHTIME;}
				   if ($dp="0") {
					$DPDATE=$ddpdate ;
					$DPTIME="17:00:00"; 
                    $DPDATETIME=$DPDATE.$DPTIME;
				   }ELSE {$DPDATE=$dpdd;$DPTIME=$dptt;$DPDATETIME=$DPDATE.$DPTIME;}
				   
				   IF($gt='Jacket')
				   {
					 $jup="UPDATE `overall` SET `SIDate`='$SIDATE',`SITime`='$SITIME',`SIDateTime`='$SIDATETIME',`SIStatus='1',`CIDate`='$CIDATE',`CITime`='$CITIME',`CIDateTime`='$CIDATETIME',`CIStatus`='1',`CODate`='$CODATE',`COTime`='$COTIME',`CODateTime`='$CODATETIME',`COStatus`='1',`LDate`='$LSDATE',`LTime`='$LSTIME',`LDateTime`='$LSDATETIME',`LStatus`='1',`SBDate`='$SBDATE',`SBTime`='$SBTIME',`SBDateTime`='$SBDATETIME',`SBStatus`='1',`JPDate`='$JPDATE',`JPTime`='$JPTIME',`JPDateTime`='$JPDATETIME',`JPStatus`='1',
					 `WHDate`='$WHDATE',`WHTime`='$WHTIME',`WHDateTime`='$WHDATETIME',`WHStatus`='1',`DPDate`='$DPDATE',`DPTime`='$DPTIME',`DPDateTime`='$DPDATETIME',`DPStatus`='1' WHERE `OrderID`='$o'";
					 $resj = mysqli_query($conn,$jup);
				   }
				   elseif($gt='Trouser')
				   {
					  $tup="UPDATE `overall` SET `SIDate`='$SIDATE',`SITime`='$SITIME',`SIDateTime`='$SIDATETIME',`SIStatus='1',`CIDate`='$CIDATE',`CITime`='$CITIME',`CIDateTime`='$CIDATETIME',`CIStatus`='1',`CODate`='$CODATE',`COTime`='$COTIME',`CODateTime`='$CODATETIME',`COStatus`='1',`SSDate`='$SSDATE',`SSTime`='$SSTIME',`SSDateTime`='$SSDATETIME',`SSStatus`='1',
					 `WHDate`='$WHDATE',`WHTime`='$WHTIME',`WHDateTime`='$WHDATETIME',`WHStatus`='1',`DPDate`='$DPDATE',`DPTime`='$DPTIME',`DPDateTime`='$DPDATETIME',`DPStatus`='1' WHERE `OrderID`='$o'";
					 $rest = mysqli_query($conn,$tup); 
				   }
				   elseif($gt='Vestcoat')
				   {
					  $vup="UPDATE `overall` SET `SIDate`='$SIDATE',`SITime`='$SITIME',`SIDateTime`='$SIDATETIME',`SIStatus='1',`CIDate`='$CIDATE',`CITime`='$CITIME',`CIDateTime`='$CIDATETIME',`CIStatus`='1',`CODate`='$CODATE',`COTime`='$COTIME',`CODateTime`='$CODATETIME',`COStatus`='1',
					 `WHDate`='$WHDATE',`WHTime`='$WHTIME',`WHDateTime`='$WHDATETIME',`WHStatus`='1',`DPDate`='$DPDATE',`DPTime`='$DPTIME',`DPDateTime`='$DPDATETIME',`DPStatus`='1' WHERE `OrderID`='$o'";
					 $resv = mysqli_query($conn,$vup); 
				   }
				   
				  $sqld="INSERT INTO DELETED (`OrderID`,`GarmentType`,`Buyer`,`SIDate`,`SITime`,`SIDateTime`,`SIStatus`,`SRemarks`,`CIName`,`CIDate`,`CITime`,`CIDateTime`,`CIStatus`,`SI&CI Time`,`COName`,`CODate`,`COTime`,`CODateTime`,`COStatus`,`CRemarks`,`CI&CO Time`,`LName`,`LDate`,`LTime`,`LDateTime`,`LStatus`,`LRemarks`,`CO&L Time`,`FName`,`FDate`,`FTime`,`FDateTime`,`FStatus`,`FRemarks`,`L&F Time`,`SBName`,`SBDate`,`SBTime`,`SBDateTime`,`SBStatus`,`SBRemarks`,`F&SB Time`,`JPName`,`JPDate`,`JPTime`,`JPDateTime`,`JPStatus`,`JPRemarks`,`SB&JP Time`,`SSName`,`SSDate`,`SSTime`,`SSDateTime`,`SSStatus`,`SSRemarks`,`CO&SS Time`,`TPName`,`TPDate`,`TPTime`,`TPDateTime`,`TPStatus`,`TPRemarks`,`SS&TP Time`,`VOName`,`VODate`,`VOTime`,`VODateTime`,`VOStatus`,`VORemarks`,`CO&VO Time`,`WHName`,`WHDate`,`WHTime`,`WHDateTime`,`WHStatus`,`WHRemarks`,`QC&WH Time`,`DPName`,`DPDate`,`DPTime`,`DPDateTime`,`DPStatus`,`DPRemarks`,`WH&DP Time`,`AGarmentType`,`ClothBox`,`Cloth_at_Store`,`HalfMade_FullCanvas`,`Half_Canvas`,`Remarks`,`Pending`,`Days`,`Total`)
SELECT `OrderID`,`GarmentType`,`Buyer`,`SIDate`,`SITime`,`SIDateTime`,`SIStatus`,`SRemarks`,`CIName`,`CIDate`,`CITime`,`CIDateTime`,`CIStatus`,`SI&CI Time`,`COName`,`CODate`,`COTime`,`CODateTime`,`COStatus`,`CRemarks`,`CI&CO Time`,`LName`,`LDate`,`LTime`,`LDateTime`,`LStatus`,`LRemarks`,`CO&L Time`,`FName`,`FDate`,`FTime`,`FDateTime`,`FStatus`,`FRemarks`,`L&F Time`,`SBName`,`SBDate`,`SBTime`,`SBDateTime`,`SBStatus`,`SBRemarks`,`F&SB Time`,`JPName`,`JPDate`,`JPTime`,`JPDateTime`,`JPStatus`,`JPRemarks`,`SB&JP Time`,`SSName`,`SSDate`,`SSTime`,`SSDateTime`,`SSStatus`,`SSRemarks`,`CO&SS Time`,`TPName`,`TPDate`,`TPTime`,`TPDateTime`,`TPStatus`,`TPRemarks`,`SS&TP Time`,`VOName`,`VODate`,`VOTime`,`VODateTime`,`VOStatus`,`VORemarks`,`CO&VO Time`,`WHName`,`WHDate`,`WHTime`,`WHDateTime`,`WHStatus`,`WHRemarks`,`QC&WH Time`,`DPName`,`DPDate`,`DPTime`,`DPDateTime`,`DPStatus`,`DPRemarks`,`WH&DP Time`,`AGarmentType`,`ClothBox`,`Cloth_at_Store`,`HalfMade_FullCanvas`,`Half_Canvas`,`Remarks`,`Pending`,`Days`,`Total` FROM overall
WHERE `OrderID`='$o'";
mysqli_query($conn, $sqld);

			////////////////////////////////////////-->
			/*$conr = mysqli_connect("localhost","root","","login");
			$resultr = mysqli_query($conr, "SELECT * FROM `overall` WHERE  OrderID='$o'");
			$fp = fopen('filelambton_single_item.csv', 'w');
			while($rowr=mysqli_fetch_array($resultr)){
				fputcsv($fp, $rowr);
			}
			fclose($fp);
			$kkkk =  str_replace('"','\"',file_get_contents('filelambton_single_item.csv'));
			?>
			<textarea style="display: none;" name="data" id="texter" rows="4" cols="50" onchange="submitform()"><?php echo $kkkk; ?></textarea>
			<script src="..\plugins\jquery\jquery.js"></script>
			<script src="..\vendor\jquery-3.2.1.min.js"></script>
			<script>
			var data = $("#texter").val();
			$.ajax({  
			type: "POST",  
			url: "https://mtm.silvercrest.in/s1/connection/localremoteplugin/singleaccepter.php",  
			data: {'data': data},  
			success: function(dataString) {  
			}  
			});  
			</script>;
			<?php */
			////////////////////////////////////////-->
					
					
			$s2 = "DELETE FROM `overall` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s2);
		    $s3 = "DELETE FROM `orderdetails` WHERE `OrderNo` = '$o'";
			mysqli_query($conn, $s3);
			$s4 = "DELETE  FROM `storein` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s4);
			$s5 = "DELETE FROM `cuttingin` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s5);
			$s6 = "DELETE FROM `cuttingout` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s6);
			$s7 = "DELETE FROM `lining` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s7);
			$s8 = "DELETE FROM `lining` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s8);
			$s9 = "DELETE FROM `front` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s9);
			$s10 = "DELETE FROM `sleevebundling` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s10);
			$s11 = "DELETE FROM `jacketprepressing` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s11);
			$s12 = "DELETE FROM `sideseam` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s12);
			$s13 = "DELETE FROM `warehouse` WHERE `OrderID` = '$o'";
			mysqli_query($conn, $s13);
							
			
				   
			   }  
				else
				{  
				   
				  $up ="UPDATE `scomdata` SET `status`='1' WHERE `orderno`='$o'"; 
				  $ress = mysqli_query($conn,$up);
	
			   }
		}
	} 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  ?>
      
	 
	  
    </div><!-- ./wrapper -->
	
  </body>
</html>