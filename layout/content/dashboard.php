<!-- data table JS
		============================================ -->
	<?php 
session_start();
error_reporting(0);
include '../../connection/dbcon.php';
include '../../validatebuyer.php';
?>



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
  
		.pagination {
			display: inline-block;
			padding-left: 0;
			margin: 20px 0;
			border-radius: 4px;
			margin-top: unset;
			margin-bottom: unset;
		}
		.canvasjs-chart-container{
			margin-bottom: 106px;
		}
		.canvasjs-chart-canvas {
			margin-top: -65px;
		}
		.canvasjs-chart-toolbar {
			margin-top: -95px;
			margin-right: 21px;
		}
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
    input#file {
    margin-top: 10px;
    height: 31px;
    border: none;
        width: 257px;
				}
 
    button#btnnn {
     color: #fff;
    background-color: #62cbe0;
    border-color: none;
    margin-top: 10px;
				}
    input#date001 {
    height: 25px;
    width: 134px;
  					}
    .col-md-2 {
    margin-top: 10px;
      		  }
    input#dateert {
    height: 31px;
    width: 140px;
    border:none;
       				}
    input#awbb {
    	 border:none;
		    }
  
   .col-md-2 {
    margin-right: 100px;
    font-size: initial;
			}
   
 
.btn-primary {
    color: #fff;
    background-color: #72d0d0;
    border-color: #72d0d0;
    margin-top: -50px;
    margin-left: 90px;
}
.btn-primary:hover {
    color: #fff;
    background-color: #72d0d0;
    border-color: #72d0d0;
   
}
	</style>
<!-- Right side column. Contains the navbar and content of the page -->
       <div class="content-wrapper" style="padding-bottom: 61px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><i class="fa fa-dashboard"></i>
           Matching Records 
          <small></small>
          </h1>
          <ol class="breadcrumb">
            <li id="bradcrumb0011"><a><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Matching Records </li>
          </ol>
        </section>

        <!-- Main content -->
         <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                
			  <!---////////////////////////////////////////////////////////////////////////////////-->
			  <!-- Input addon -->
				
			 
			  <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                  <form enctype="multipart/form-data" method="POST" role="form">
									   
        <div class="form-group">
		
		<div class="col-md-2">
        
        Enter Date :  <input type="date" class="" name="dateert" id="dateert" required>
         </div>
        <div class="col-md-2">
        
      <input type="text" class="form-control" name="awbb" id="awbb" placeholder="    Enter AWB Number" autocomplete="off" required>
         </div>
			<div class="col-md-3">
	          <input type="file" name="file" class="form-control" id="file" size="100"></br>
    
		    </div>
				 <button type="submit" class="btn" id="btnnn" name="Subit332" value="">Upload</button>
				 <div class="lbr">
					<a class="btn btn-primary"  href = "http://192.168.7.7/scantrail.php" >Scanning Point</a>	
				
        </div>
          </div>
		 
		 
		
	 </form>	
              
                <div class="tab-content no-padding">
				   <div class="box" id="overall_table_data_table">
					
					 <table id="user_data" class="table table-bordered table-striped" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                     data-cookie-id-table="saveId" data-show-export="true" data-export-options='{"fileName": "<?php echo "Lambton-Dispatch-Report";echo date("d-m-Y"); ?>"}' data-click-to-select="true" data-sortable="true">
					
						<thead>
							<tr>
							<!--	<th class="ew"  style="text-align:center">SNO</th>  -->
								<th class="ew"  style="text-align:center">S.No &nbsp;&nbsp;&nbsp;</th>
								<th class="fw"  style="text-align:center">Order Id &nbsp;&nbsp;&nbsp;</th>
                            	<th class="fw"  style="text-align:center">AWB Number &nbsp;&nbsp;&nbsp;</th>
								<th class="fw"  style="text-align:center">Status &nbsp;&nbsp;&nbsp;</th>
								<th class="fw"  style="text-align:center" >Cloth Box No &nbsp;&nbsp;&nbsp;</th>
								<th class="fw"  style="text-align:center" >Garment Type &nbsp;&nbsp;&nbsp;</th>
								<th class="gw"  style="text-align:center">Fullcanvas &nbsp;&nbsp;&nbsp;</th> 
								<th class="gw"  style="text-align:center">Halfcanvas &nbsp;&nbsp;&nbsp;</th> 
								
                              <!--  <th class="gw"  style="text-align:center">Dispatch &nbsp;&nbsp;&nbsp;</th>-->
                                <th class="gw"  style="text-align:center">Error Code &nbsp;&nbsp;&nbsp;</th>
                                <th class="gw"  style="text-align:center">Remarks </th>
							</tr>  	
						</thead>
                     
                     
                     <tbody>
<?php
	
        
		session_start();
   
    error_reporting(0);
	$buy = $_SESSION['mainforbuyer001']; 
                     
                     
	$sqlage="SELECT  `deleted`.`OrderID` as od,`deleted`.`orderstatus` as os,`deleted`.`ClothBox` as clt,`deleted`.`GarmentType` as gt,`deleted`.`Half_Canvas` as hf,
    `deleted`.`HalfMade_FullCanvas` as hff,`deleted`.`GarmentType` as gt,
    `deleted`.`DPDate` as dd,`deleted`.`Remarks` as rm ,`scomdata`.`airno` as aw from `deleted` ,`scomdata` WHERE `deleted`.`OrderID` = `scomdata`.`orderno`";
	 
       $query = mysqli_query($conLogin, $sqlage);
	   $count =1;
	
	   while ($row=mysqli_fetch_array($query))
		{
		//////
	      echo'<tr>
		 <td>'.$count++.'</td>
		 <td nowrap>'.$row['od'].'</td>
       <td >'.$row['aw'].'</td>
		 <td >'.$row['os'].'</td>
		
		 <td >'.$row['clt'].'</td>
          <td >'.$row['gt'].'</td>
         <td >'.$row['hff'].'</td>
         <td >'.$row['hf'].'</td>
         
         <td >'."".'</td>
		 <td >'.$row['rm'].'</td>
		
	    </tr>';
	
	   
	
	
	    }
	?></tbody>
                     
                     
                     
					  </table>
					<!-- /.box-body -->
				  </div><!-- /.box -->
                </div>
              </div><!-- /.nav-tabs-custom -->
			  
			  
			  <!---////////////////////////////////////////////////////////////////////////////////-->
			 
            </section><!-- /.Left col -->
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      <!-- /.content-wrapper -->
      </div>




<script>
/*
		   $(document).ready(function () {
           		
            $('#user_data23432432454544').DataTable({"processing": true,"serverSide": true, "ajax": {url: "layout/fetch_prodstat.php",type: "POST"}});
           */

	$("#bradcrumb0011").click(function(){
		 $.ajax({url: "layout/getbalance.php", success: function(result){
			$("#user_data_list_of_less_20").html(result);
		 }});
		 
		 $.ajax({url: "layout/content/dashboard.php", success: function(result){
			$(".sloader001:eq(0)").html("");
			$(".sloader001:eq(0)").html(result);
			
			$("#dashboard001").addClass("active");
			$("#newstock001").removeClass("active");
			$("#report001").removeClass("active");
			$("#stockinward001").removeClass("active");
			$("#fabricoutward001").removeClass("active");
			$("#fabrichistory001").removeClass("active");
			$("#fabricinspection001").removeClass("active");
			$("#fabricsponging001").removeClass("active");
			$("#overalldata001").removeClass("active");
            $("#ag1").removeClass("active");
		 }});
	});	
          
       
	</script>
