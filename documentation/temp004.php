<?php
	require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
	$conn = mysqli_connect("localhost","root","","munro");
	$sql1 = "SELECT * FROM special";
	$result1 = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($result1)>0){
		while($row1 = mysqli_fetch_array($result1)){
			$FabricCode[] = $row1['Fabriccode'];
		}
	}
	$sql = "SELECT DISTINCT munrocsv.`cadno`,munrocsv.`Order No`,munrocsv.MarkerName,munrocsv.Expectedshipmentdate, munrocsv.`RackNo`, munrocsv.`SubRackNo`,munrocsv.`Fabricproductioncode`,munrocsv.FLength as FabricLength,munrocsv.FWidth as FabricWidth,munrocsv.Liningproductioncode,munrocsv.`Lining Rackno` as LiningRackNo,munrocsv.`Lining SubRackno` as LiningSubRackNo,munrocsv.LLength as LiningLength,munrocsv.LWidth as Liningwidth,munrocsv.SleeveLining as SleeveLiningcode,munrocsv.SLLength as SleeveLiningLength,munrocsv.SLWidth as SleeveLiningWidth,munrocsv.Satin as SatinCode,munrocsv.SALength as SatinLength,munrocsv.SAWidth as SatinWidth,munrocsv.FabricFamily,munrocsv.Item FROM consumption LEFT JOIN munrocsv ON consumption.`Marext` = munrocsv.MarkerName";
	$result = mysqli_query($conn, $sql);
	$objPHPExcel = new PHPExcel();
	$objWorksheet =$objPHPExcel->getActiveSheet();  
	$title = 'Consumption Report '.date('d-m-Y');
	$objWorksheet->setTitle($title);
	$objWorksheet->SetCellValue('A1', "CAD No");
	$objWorksheet->SetCellValue('B1', "Order No");
	$objWorksheet->SetCellValue('C1', "Marker Name");
	$objWorksheet->SetCellValue('D1', "Expected Shipment Date");
	$objWorksheet->SetCellValue('E1', "Rack No");
	$objWorksheet->SetCellValue('F1', "Sub Rack No");
	$objWorksheet->SetCellValue('G1', "Fabric Production Code");
	$objWorksheet->SetCellValue('H1', "Fabric Length");
	$objWorksheet->SetCellValue('I1', "Fabric Width");
	$objWorksheet->SetCellValue('J1', "Lining Production Code");
	$objWorksheet->SetCellValue('K1', "Lining Rack No");
	$objWorksheet->SetCellValue('L1', "Lining Sub Rack No");
	$objWorksheet->SetCellValue('M1', "Lining Length");
	$objWorksheet->SetCellValue('N1', "Lining Width");
	$objWorksheet->SetCellValue('O1', "SleeveLining Code");
	$objWorksheet->SetCellValue('P1', "SleeveLining Length");
	$objWorksheet->SetCellValue('Q1', "SleeveLining Width");
	$objWorksheet->SetCellValue('R1', "Satin Code");
	$objWorksheet->SetCellValue('S1', "Satin Length");
	$objWorksheet->SetCellValue('T1', "Satin Width");
	$objWorksheet->SetCellValue('U1', "Fabric Family");
	$objWorksheet->SetCellValue('V1', "Item"); 
	$i=2;
	$c = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V');
	while($row=mysqli_fetch_array($result)){
		if(in_array($row['Fabricproductioncode'], $FabricCode)){
			foreach($c as $cl){
				$kl = $cl.''.$i;
				$objWorksheet->getStyle($kl)->applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' => 'D88876')
						)
					)
				);
			}
			$data= array($row['cadno'],$row['Order No'],$row['MarkerName'],$row['Expectedshipmentdate'],$row['RackNo'],$row['SubRackNo'],$row['Fabricproductioncode'],    $row['FabricLength'],$row['FabricWidth'],$row['Liningproductioncode'],$row['LiningRackNo'],$row['LiningSubRackNo'],$row['LiningLength'],$row['Liningwidth'],$row['SleeveLiningcode'],$row['SleeveLiningLength'],$row['SleeveLiningWidth'],$row['SatinCode'],$row['SatinLength'],$row['SatinWidth'],$row['FabricFamily'],$row['Item']);
			$objWorksheet->fromArray($data, ' ', "A".$i);
		}
		else{
			$data= array($row['cadno'],$row['Order No'],$row['MarkerName'],$row['Expectedshipmentdate'],$row['RackNo'],$row['SubRackNo'],$row['Fabricproductioncode'],    $row['FabricLength'],$row['FabricWidth'],$row['Liningproductioncode'],$row['LiningRackNo'],$row['LiningSubRackNo'],$row['LiningLength'],$row['Liningwidth'],$row['SleeveLiningcode'],$row['SleeveLiningLength'],$row['SleeveLiningWidth'],$row['SatinCode'],$row['SatinLength'],$row['SatinWidth'],$row['FabricFamily'],$row['Item']);
			$objWorksheet->fromArray($data, ' ', "A".$i);


			foreach($c as $cl){
					$kl = $cl.''.$i;
					$objWorksheet->getStyle($kl)->applyFromArray(
						array(
							'fill' => array(
								'type' => PHPExcel_Style_Fill::FILL_SOLID,
								'color' => array('rgb' => 'FFFFFF')
							)
						)
					);
			}
		}
		$i++; 
	}
	header('Content-Type: application/vnd.ms-excel'); 
	header('Content-Disposition: attachment;filename="'.$title.'.xls"'); 
	header('Cache-Control: max-age=0'); 
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
	$objWriter->save('php://output');
	exit;
?>