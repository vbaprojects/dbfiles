<?php  
include '../connection/dbcon.php'; 
include '../validatebuyer.php';
include 'function.php';

error_reporting(E_ERROR | E_PARSE);

	
if(isset($_GET['newstockercall'])) {
	
	
	if($conInventory === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$date = date('Y-m-d', time());
	$clothno =  $_GET['cloth'];
	$Buyer =  $_GET['Buy'];
	$width =  $_GET['width'];
	$newstock =  $_GET['stock'];
	$number =  $_GET['number'];
	$wid =  $_GET['wid'];
	$ven =  $_GET['vendor'];
	$inno =  $_GET['inno'];
	$indt =  $_GET['indt'];
	$fact =  $_GET['fact'];
	$PONo =  $_GET['PONo'];
	$Lotno =  $_GET['Lotno'];
	$Rate =  $_GET['Rate'];
	$Currency =  $_GET['Currency'];
	//$Roll =  $_GET['Roll'];
	$Remarks =  $_GET['Remarks'];
   // $rol =  $_GET['Rol'];
    $col =  $_GET['color'];
    $fabrictype =  $_GET['type'];
    $fabricclass =  $_GET['class'];
	
	if($Lotno == ''){
		$rwlno = $clothno;
	}else{
		$rwlno=$clothno."-".$Lotno;
	}
	
	
	
	//$cnct = "$clothno" .'-'. "$rol";
	
	 if ($number == "Centimeter"){
		$newstock = $newstock/100;
		
	 } elseif ($number == "Inches") {
		$newstock = $newstock/39.37;
		
	 } elseif ($number == "Yards"){
		$newstock = $newstock/1.094;
	 }else{
		$newstock = $newstock; 
	 }
	 $len=round($newstock,3);
	if ($wid == "cm"){
		$width1 = $width;
		
	 } elseif ($wid == "inches") {
		$width1 = $width*2.54;
		
	 }
	 $len1=round($width1,2);
	 
	 
	 if($_GET['Buy'] == 'Devered')
	{
			$query =  "INSERT INTO `openingstock`(`Refwithlot`,`RefNo`, `BuyerCode`, `Spec2value`, `PONo`,  `Lotno`,  `Rate`,  `Currency`,  `Remarks`, `Warehouse`,  `QCPassedqtyprimary`, `Date`, `Materialsource`, `InvoiceNo`, `InvoiceDate`, `FabricContent`, `Colour`, `Spec2unit`, `Primaryunit`, `Company`, `UOM`, `Material Name`, `Classification`, `Remark`) VALUES ('".$rwlno."','".$clothno."', '".$Buyer."', '".$len1."', '".$PONo."', '".$Lotno."',  '".$Rate."',   '".$Currency."',  '".$Remarks."', 'HO/18', '".$len."', '".$date."', '".$ven."', '".$inno."', '".$indt."', '".$fact."', '".$col."', 'Wid', 'Mts', 'EU/2', 'Mts', '".$fabrictype."', '".$fabricclass."', '".$Remarks."')";
	
	}
	if($_GET['Buy'] == 'TransGlobal')
	{
			$query =  "INSERT INTO `openingstock`(`Refwithlot`,`RefNo`, `BuyerCode`, `Spec2value`, `PONo`,  `Lotno`,  `Rate`,  `Currency`,  `Remarks`, `Warehouse`,  `QCPassedqtyprimary`, `Date`,`Materialsource`, `InvoiceNo`, `InvoiceDate`, `FabricContent`,  `Colour`, `Spec2unit`, `Primaryunit`, `Company`, `UOM`, `Material Name`, `Classification`, `Remark`) VALUES ('".$rwlno."','".$clothno."', '".$Buyer."', '".$len1."', '".$PONo."', '".$Lotno."', '".$Rate."',   '".$Currency."',  '".$Remarks."', 'HO/21', '".$len."', '".$date."', '".$ven."', '".$inno."', '".$indt."', '".$fact."', '".$col."', 'Wid', 'Mts', 'EU/2', 'Mts', '".$fabrictype."', '".$fabricclass."', '".$Remarks."')";
	
	}
	if($_GET['Buy'] == 'Lambton')
	{
			$query =  "INSERT INTO `openingstock`(`Refwithlot`,`RefNo`, `BuyerCode`, `Spec2value`, `PONo`,  `Lotno`,  `Rate`,  `Currency`,  `Remarks`,  `Warehouse`,  `QCPassedqtyprimary`, `Date`,`Materialsource`, `InvoiceNo`, `InvoiceDate`, `FabricContent`,  `Colour`, `Spec2unit`, `Primaryunit`, `Company`, `UOM`, `Material Name`, `Classification`, `Remark`) VALUES ('".$rwlno."','".$clothno."', '".$Buyer."', '".$len1."', '".$PONo."', '".$Lotno."', '".$Rate."',   '".$Currency."',  '".$Remarks."', 'HO/22', '".$len."', '".$date."', '".$ven."', '".$inno."', '".$indt."', '".$fact."', '".$col."', 'Wid', 'Mts', 'EU/2', 'Mts', '".$fabrictype."', '".$fabricclass."', '".$Remarks."')";
	
	}
	if($_GET['Buy'] == 'Tailorman')
	{
			$query =  "INSERT INTO `openingstock`(`Refwithlot`,`RefNo`, `BuyerCode`, `Spec2value`,  `PONo`,  `Lotno`,  `Rate`,  `Currency`,  `Remarks`, `Warehouse`,  `QCPassedqtyprimary`, `Date`,`Materialsource`, `InvoiceNo`, `InvoiceDate`, `FabricContent`,  `Colour`, `Spec2unit`, `Primaryunit`, `Company`, `UOM`, `Material Name`, `Classification`, `Remark`) VALUES ('".$rwlno."','".$clothno."', '".$Buyer."', '".$len1."', '".$PONo."', '".$Lotno."', '".$Rate."',  '".$Currency."',  '".$Remarks."',  'HO/15', '".$len."', '".$date."', '".$ven."', '".$inno."', '".$indt."', '".$fact."', '".$col."', 'Wid', 'Mts', 'EU/2', 'Mts', '".$fabrictype."', '".$fabricclass."', '".$Remarks."')";
	
	}
	if($_GET['Buy'] == 'Munro')
	{
			$query =  "INSERT INTO `openingstock`(`Refwithlot`,`RefNo`, `BuyerCode`, `Spec2value`, `PONo`,  `Lotno`,  `Rate`,  `Currency`, `Remarks`,  `Warehouse`,  `QCPassedqtyprimary`, `Date`,`Materialsource`, `InvoiceNo`, `InvoiceDate`, `FabricContent`,  `Colour`, `Spec2unit`, `Primaryunit`, `Company`, `UOM`, `Material Name`, `Classification`, `Remark`) VALUES ('".$rwlno."','".$clothno."', '".$Buyer."', '".$len1."', '".$PONo."', '".$Lotno."',  '".$Rate."',  '".$Currency."',  '".$Remarks."', 'HO/19', '".$len."', '".$date."', '".$ven."', '".$inno."', '".$indt."', '".$fact."', '".$col."', 'Wid', 'Mts', 'EU/2', 'Mts', '".$fabrictype."', '".$fabricclass."', '".$Remarks."')";
	
	}
	else{
		    $query =  "INSERT INTO `openingstock`(`Refwithlot`,`RefNo`, `BuyerCode`, `Spec2value`, `PONo`,  `Lotno`,  `Rate`,  `Currency`, `Remarks`,  `Warehouse`,  `QCPassedqtyprimary`, `Date`,`Materialsource`, `InvoiceNo`, `InvoiceDate`, `FabricContent`, `Colour`, `Spec2unit`, `Primaryunit`, `Company`, `UOM`, `Material Name`, `Classification`, `Remark`) VALUES ('".$rwlno."','".$clothno."', '".$Buyer."', '".$len1."', '".$PONo."', '".$Lotno."',  '".$Rate."',  '".$Currency."',  '".$Remarks."', '', '".$len."', '".$date."', '".$ven."', '".$inno."', '".$indt."', '".$fact."', '".$col."', 'Wid', 'Mts', 'EU/2', 'Mts', '".$fabrictype."', '".$fabricclass."', '".$Remarks."')";
	}
	
	$checkquery = "SELECT * FROM `openingstock` WHERE  `Refwithlot` = '$rwlno' AND `RefNo` = '$clothno' AND `BuyerCode` = '$Buyer' AND `Spec2value` = '$len1' AND `PONo` = '$PONo' AND `Lotno` = '$Lotno' AND `Rate` = '$Rate' AND `Currency` = '$Currency' AND `Remarks` = '$Remarks' AND  `Warehouse` = '' AND  `QCPassedqtyprimary` = '$len' AND `Date` = '$date' AND  `Materialsource` = '$ven' AND `InvoiceNo` = '$inno' AND `InvoiceDate` = '$indt' AND `FabricContent` = '$fact' AND `Colour` = '$col' AND `Spec2unit` = 'Wid' AND `Primaryunit` = 'Mts' AND `Company` = 'EU/2' AND `UOM` = 'Mts' AND `Material Name` = '$fabrictype' AND `Classification` = '$fabricclass' AND `Remark` = '$Remarks'";
	$rescheck = mysqli_query($conInventory,$checkquery);
	
	$checkquery1 = "SELECT * FROM `openingstock` WHERE `Date` != '$date' AND `InvoiceNo` = '$inno' AND `InvoiceDate` = '$indt' AND `RefNo` = '$clothno' AND `QCPassedqtyprimary` = '$len'";
	$rescheck1 = mysqli_query($conInventory,$checkquery1);
	
	if(mysqli_num_rows($rescheck)>0){
		echo "d";
	}else if(mysqli_num_rows($rescheck1)>0){
		echo "d";
	}
	else{
		if(mysqli_query($conInventory,$query)){
			echo "s";	
		}
		else{
			echo "n";
		}
	}
				
	}
	
	
	if(isset($_GET['submituuuu001d'])) {
		
		include 'function.php';
		$one =  $_GET['std'];
		$two =  $_GET['scd'];
		
		$quefind1 ="SELECT * FROM openingstock WHERE Date >= '".$_GET['std']."' AND Date <= '".$_GET['scd']."'";
		$query = mysqli_query($conInventory, $quefind1);
		$count=1;	
		$number_filter_row = mysqli_num_rows(mysqli_query($conInventory, $query));
		while($row=mysqli_fetch_array($query)){
		
		 $sub_array = array();
         $bal =  getBuyer($row['Warehouse']);
	     $sub_array[] = '<button type="button" name="update" class="btn btn-primary btn-xs updateBtn" data-SNO="' . $row["SNO"] . '"> Save </button>';
		
		 $sub_array[] = '<div contenteditable id="Refwithlot">' . $row["Refwithlot"] . '</div>';
		 $sub_array[] = '<div id="PONo">' . $row["PONo"] . '</div>';
		 $sub_array[] = '<div>' . $bal . '</div>';
		 $sub_array[] = '<div>' . $row["QCPassedqtyprimary"] . '</div>';
		 $sub_array[] = '<div>' . $row["Date"] . '</div>';
		 
		 $data[] = $sub_array;
		}
		
		function get_all_data($conInventory) {
		$query = "SELECT * FROM openingstock";
		$result = mysqli_query($conInventory, $query);
		return mysqli_num_rows($result);
		}

		$output = array(
			"draw" => 1,
			"recordsTotal" => get_all_data($conInventory),
			"recordsFiltered" => get_all_data($conInventory),
			"data" => $data
		);
		echo json_encode($output);
	}
	
	if(isset($_GET['submituuuu001dd'])){
		$one=$_GET['std'];
		$two=$_GET['scd'];
		
		//$quefind ="SELECT * FROM `newclothentry` Where Date = CURDATE() ORDER BY `newclothentry`.`Timestamp` DESC";
		$quefind ="SELECT * FROM input WHERE Date >= '$one' AND Date <= '$two' AND $input_table";

		$query = mysqli_query($conInventory, $quefind);
		$count=1;	
		while($row=mysqli_fetch_array($query)){
		?>
		
		<tr>

		<td><?php  echo $count++; ?></td>
		<td><?php  echo $row['OrderID']; ?></td>
		<td><?php  echo $row['type']; ?></td>
		<td><?php  echo $row['Buyer']; ?></td>
		<td><?php  echo $row['shellarticle']; ?></td>
		<td><?php echo $row['shellused']; ?></td>
		<td><?php echo $row['liningarticle']; ?></td>
		<td><?php echo $row['liningused']; ?></td>
		<td><?php echo $row['mixedarticle']; ?></td>
		<td><?php echo $row['mixedused']; ?></td>
		<td><?php echo $row['Remarks']; ?></td>
		<td><?php  echo $row['Date']; ?></td>
		</tr>  <?php 
	}
	}
	
	if(isset($_GET['submitljsdfjksdjfkds009'])) {
		$art =  $_GET['cloth'];
		
		$sqll = "SELECT * FROM openingstock WHERE Refwithlot='$art' AND $openingstock_table";
		$result33 = mysqli_query($conInventory,$sqll);
		$quat=0;
		if(mysqli_num_rows($result33)>0)
		{
			while($row1=mysqli_fetch_array($result33))
			{
			  $quat += $row1['QCPassedqtyprimary'];
			}
			 $myObj->error = "noerror";
		}
		else{
	   $myObj->error = "error";
		}
	
	
		
		$sqllw = "SELECT * FROM input WHERE $input_table";
		$result33w = mysqli_query($conInventory,$sqllw);
		$used=0;
			while($row1w=mysqli_fetch_array($result33w))
			{
				
				if(strcasecmp($row1w['shellarticle'],$art)==0){
					$used += $row1w['shellused'];
				}
				
				if(strcasecmp($row1w['liningarticle'],$art)==0){
					$used += $row1w['liningused'];
				}
				if(strcasecmp($row1w['mixedarticle'],$art)==0){
					$used += $row1w['mixedused'];
				}
			}
			
		$balance = $quat - $used;
		$remain = $balance - $used;
		
		$myObj->ops =  round($quat,2);
		$myObj->usee = round($used,2); 
		$myObj->sc = round($balance,2);
		
		
		$myJSON = json_encode($myObj);
		echo $myJSON;
	}
	
	if(isset($_GET['getallarticleforthebuyer'])){
		$gallartfrbr = $_GET['getallarticleforthebuyer'];
		$getWarehouse = getWarehouse($gallartfrbr);
		
		$sqlL = "SELECT * FROM openingstock WHERE (BuyerCode = '$gallartfrbr' OR Warehouse = '$getWarehouse')";
		$result33 = mysqli_query($conInventory,$sqlL);
		$quat=0;
		if(mysqli_num_rows($result33)>0)
		{
			while($row1=mysqli_fetch_array($result33))
			{
			  $Refwithlot444 = $row1['Refwithlot'];
			  echo '<option value="'.$Refwithlot444 .'">'.$Refwithlot444 .'</option>';
			}
		}
	}
	
	if(isset($_GET['newarticleadding']) && isset($_GET['classification']) && isset($_GET['newarticleaddingbuyer']) && isset($_GET['newarticlecontentaddingbuyer'])){
		$gallartfrbr = $_GET['newarticleadding'];
		$classification = $_GET['classification'];
		$gallartfrbrbuyer = $_GET['newarticleaddingbuyer'];
		$gallcontentfrbrbuyer = $_GET['newarticlecontentaddingbuyer'];
		$gallcolorfrbrbuyer = $_GET['newarticlecoloraddingbuyer'];
		$date001 = date("Y/m/d");
		$getWarehousebuyer = getWarehouse($gallartfrbrbuyer);
		
		$sqlL = "SELECT * FROM fabricstock WHERE Refwithlot='$gallartfrbr'";
		$result33 = mysqli_query($conInventory,$sqlL);
		$quat=0;
		if(mysqli_num_rows($result33)>0)
		{
			echo 'n';
		}else{
			$query =  "INSERT INTO `fabricstock` (`Refwithlot`, `classification`, `Buyer`, `fabriccontent`, `colour`, `Date`) VALUES ('$gallartfrbr','$classification' ,'$gallartfrbrbuyer', '$gallcontentfrbrbuyer', '$gallcolorfrbrbuyer', '$date001')";
			$result33 = mysqli_query($conInventory,$query);
			echo 'y';
		}
	}
	
	if(isset($_GET['newvendoradding'])){
		$gallartfrbr = $_GET['newvendoradding'];
		
		$sqlL = "SELECT * FROM vendorlist WHERE vendors='$gallartfrbr'";
		$result33 = mysqli_query($conInventory,$sqlL);
		$quat=0;
		if(mysqli_num_rows($result33)>0)
		{
			echo 'n';
		}else{
			$query =  "INSERT INTO `vendorlist` (`vendors`) VALUES ('$gallartfrbr')";
			$result33 = mysqli_query($conInventory,$query);
			echo 'y';
		}
	}
	
	if(isset($_GET['getarticlecontent'])){
		$gallartfrbr = $_GET['getarticlecontent'];
		
		$sqlL = "SELECT * FROM openingstock WHERE Refwithlot='$gallartfrbr' AND statuz='new'";
		$result33 = mysqli_query($conInventory,$sqlL);
		$quat=0;
		if(mysqli_num_rows($result33)>0)
		{
			while($row = mysqli_fetch_array($result33)){
					$myObj->fabcontent = $row['FabricContent']; 
					$myObj->color = $row['Colour'];
			}
			$myJSON = json_encode($myObj);
			echo $myJSON;
		}
	}
	
	if(isset($_GET['newrequestcall'])){
		$fabart = $_GET['fabart'];
		$date = $_GET['date'];
		$issedlength = $_GET['issedlength'];
		$by = $_GET['by'];
		$uom = $_GET['uom'];
		$gartype = $_GET['gartype'];
		$ordertype = $_GET['ordertype'];
		$clsfction = $_GET['clsfction'];
		$remark = $_GET['remark'];
		$getWarehousebuyer = getWarehouse($gallartfrbrbuyer);
		
		$sqlL = "SELECT * FROM openingstock";
		$result33 = mysqli_query($conInventory,$sqlL);
		$quat=0;
		if(mysqli_num_rows($result33)>0)
		{
			while($row=mysqli_fetch_array($result33)){
				$rndm = $row['SNO'];
			}
		}
		$rndm++;
		$reqnum = "by$rndm";
		if ($uom == "cm"){
			$issedlength = $issedlength/100;
		}
			$query =  "INSERT INTO `openingstock` (`request_number`,`Refwithlot`, `Date`, `BuyerCode`, `Warehouse`,`order_type` ,`Classification`,`QCPassedqtyprimary`,`UOM`,`Remarks`,`GarmentType`, `statuz`) VALUES ('$reqnum','$fabart','$date', '$by', '$getWarehousebuyer','$ordertype','$clsfction','$issedlength','meter','$remark','$gartype', 'item_requested')";
			$result33 = mysqli_query($conInventory,$query);
			echo 'y';
	}
?>