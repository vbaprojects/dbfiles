<?php
include '../connection/dbcon.php';
include '../validatebuyer.php';
include 'function.php'; ?>
<!-- data table JS
		============================================ -->
	<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="plugins/data-table/bootstrap-table.js"></script>
    <script src="plugins/data-table/tableExport.js"></script>
    <script src="plugins/data-table/data-table-active.js"></script>
    <script src="plugins/data-table/bootstrap-table-editable.js"></script>
    <script src="plugins/data-table/bootstrap-editable.js"></script>
    <script src="plugins/data-table/bootstrap-table-resizable.js"></script>
    <script src="plugins/data-table/bootstrap-table-export.js"></script>
	
	<style>
		
		.bootstrap-table{
			padding : 15px;
		}
		.fixed-table-body{
			width: 100%;
			overflow: scroll;
		}
		.pull-right {
			margin-bottom: 12px;
			margin-top: 0px;
		}
	</style>
<!-- Right side column. Contains the navbar and content of the page -->

					  <table id="user_data" class="table table-bordered table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-export-options='{"fileName": "<?php echo "NEW_STOCK_TABLE-";echo date("d-m-Y"); ?>"}' data-click-to-select="true" data-toolbar="#toolbar">
						<thead>
							<th>SNO</th>
							<th>PONumber</th>
							<th>Buyer</th>
							<th>Vendor Name</th>
							<th>Fabric Type</th>
							<th>Fabric Article</th>
							<th>Mat Name</th>
							<th>Color</th>
							<th>Lot No</th>
							<th>Width(Cm)</th>
							<th>Received Qty(Mtr)</th>
							<th>Rate</th>
							<th>Currency</th>
							<th>Date</th>	
						</thead>
						<tbody>
							<?php
												
							
							$quefind ="SELECT * FROM `openingstock` Where Date = CURDATE() AND $openingstock_table ORDER BY `openingstock`.`Timestamp` DESC";
							$query = mysqli_query($conInventory, $quefind);
							$count=1;	
							while($row=mysqli_fetch_array($query)){
							?>
							<tr>
							
								<td><?php echo $count++; ?></td>
								<td><?php echo $row['PONo']; ?></td>
								<td><?php echo $row['BuyerCode'] ?></td>
								<td align="left"><?php echo $row['Materialsource']; ?></td>
								<td><?php echo $row['Classification']; ?></td>
								<td><?php echo $row['Refwithlot']; ?></td>
								<td><?php echo $row['Material Name']; ?></td>
								<td><?php echo $row['Colour']; ?></td>
								<td><?php echo $row['Lotno']; ?></td>
								<td><?php echo $row['Spec2value']; ?></td>
								<td><?php echo $row['QCPassedqtyprimary']; ?></td>
								<td><?php echo $row['Rate']; ?></td>
								<td><?php echo $row['Currency']; ?></td>
								<td><?php echo $row['Date']; ?></td>
								
							</tr>
							<?php
								
							}
							?>
                        </tbody>
					  </table>