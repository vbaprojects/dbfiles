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

					  <table id="user_data" class="table table-bordered table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-export-options='{"fileName": "<?php echo "NEW_STOCK_TABLE-";echo date("d-m-Y"); ?>"}' data-click-to-select="true" data-sortable="true">
						<thead>
							<th>SNO</th>
							<th>Buyer</th>
							<th>Fabric Article</th>
							<th>Fabric Content</th>
							<th>Fabric 	Type</th>
							<th>Lot No</th>
							<th>Po No</th>
							<th>Po Width</th>
							<th>Po Length</th>
							<th>Sponging Width</th>
							<th>After Sponging Length(In Mtr)</th>
							<th>Afterinspec width</th>
							<th>After Inspection Length(In Mtr)</th>	
						</thead>
						<tbody>
							<?php
							    error_reporting(0);
							    include 'function.php';
								include '../connection/dbcon.php';
								include '../validatebuyer.php';
								$quefind ="SELECT * FROM `openingstock` WHERE $openingstock_table";
								$query = mysqli_query($conInventory, $quefind);
								$count=1;	
								while($row=mysqli_fetch_array($query)){
								?>
								<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo getBuyer($row['Warehouse']); ?></td>
								<td><?php echo $row['Refwithlot']; ?></td>
								<td><?php echo $row['FabricContent']; ?></td>
								<td><?php echo $row['Classification']; ?></td>
								<td><?php echo $row['Lotno']; ?></td>
								<td><?php echo $row['PONo']; ?></td>
								<td><?php echo $row['Spec2value']; ?></td>
								<td><?php echo $row['QCPassedqtyprimary']; ?></td>
								<td><?php echo $row['SpongingWidth']; ?></td>
								<td><?php echo $row['SpongingLength']; ?></td>
								<td><?php echo $row['Afterinspecwidth']; ?></td>
								<td><?php echo $row['Afterinspeclength']; ?></td>
								</tr>
							<?php
								
							}
							?>
                        </tbody>
					  </table>
					 