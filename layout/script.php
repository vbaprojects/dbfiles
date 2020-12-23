 <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
	<script src="plugins/canvasjs/jquery.canvasjs.min.js"></script>
    <!-- Spinner -->
	<script src="plugins/spin/spin.min.js"></script>

	<script>
		
		var opts = {
		  lines: 12, // The number of lines to draw
		  length: 13, // The length of each line
		  width: 6, // The line thickness
		  radius: 7, // The radius of the inner circle
		  scale: 1, // Scales overall size of the spinner
		  corners: 0.9, // Corner roundness (0..1)
		  color: '#007bff', // CSS color or array of colors
		  fadeColor: 'transparent', // CSS color or array of colors
		  speed: 1.1, // Rounds per second
		  rotate: 38, // The rotation offset
		  animation: 'spinner-line-shrink', // The CSS animation name for the lines
		  direction: 1, // 1: clockwise, -1: counterclockwise
		  zIndex: 2e9, // The z-index (defaults to 2000000000)
		  className: 'spinner', // The CSS class to assign to the spinner
		  top: '49%', // Top position relative to parent
		  left: '50%', // Left position relative to parent
		  shadow: '0 0 1px transparent', // Box-shadow for the lines
		  position: 'absolute' // Element positioning
		};
			
		

		$(window).load(function() {
			var target = document.getElementById('spinner001');
			var spinner = new Spinner(opts).spin(target);
			
			
			$.ajax({url: "layout/content/dashboard.php", success: function(result){
				$(".sloader001:eq(0)").html("");
				$(".sloader001:eq(0)").html(result);
				
				removeActive();
				$("#dashboard001").addClass("active");
				
					spinner.stop();
				
			 }});
			 
		});
		
		$("#dashboard001").click(function(){
            var target = document.getElementById('spinner001');
			var spinner = new Spinner(opts).spin(target);
			
			 
			 $.ajax({url: "layout/content/dashboard.php", success: function(result){
				$(".sloader001:eq(0)").html("");
				$(".sloader001:eq(0)").html(result);
				
				removeActive();
				$("#dashboard001").addClass("active");
				
				
					spinner.stop();
				
			 }});
		});
		$("#dashboard002").click(function(){
            var target = document.getElementById('spinner001');
			var spinner = new Spinner(opts).spin(target);
			
			 
			 $.ajax({url: "layout/content/not_foud_orders.php", success: function(result){
				$(".sloader001:eq(0)").html("");
				$(".sloader001:eq(0)").html(result);
				
				removeActive();
				$("#dashboard002").addClass("active");
				
				
					spinner.stop();
				
			 }});
		});
		
		
		
	            
				function gotohome(){
					location.reload(true);
				}
				$("#allbuyer00999").click(function(){
					$.ajax({url: "layout/buyerset.php?buyervalueset=Buyers", success: function(result){gotohome();}});
				});
				$("#devered00999").click(function(){
					$.ajax({url: "layout/buyerset.php?buyervalueset=Devered", success: function(result){gotohome();}});
				});
				$("#transglobal00999").click(function(){
					$.ajax({url: "layout/buyerset.php?buyervalueset=Transglobal", success: function(result){gotohome();}});
				});
				$("#lambton00999").click(function(){
					$.ajax({url: "layout/buyerset.php?buyervalueset=Lambton", success: function(result){gotohome();}});
				});
				$("#tailorman00999").click(function(){
					$.ajax({url: "layout/buyerset.php?buyervalueset=Tailorman", success: function(result){gotohome();}});
				});
				$("#munro00999").click(function(){
					$.ajax({url: "layout/buyerset.php?buyervalueset=Munro", success: function(result){gotohome();}});
				});
				
				
				function alertmsg(msg,color){
					$(".alerter008666").css("background-color", color); 
					$(".alerter008666").html(msg);
					$(".alerter008666").show(); 
					setTimeout(function() { $(".alerter008666").fadeOut(1500); }, 2000);
				}
				
				
				//////////////////////////////////////////////////////////////////////////
				//all about MESSAGEBOX
					// Get the modal
					$('#newarticle001').click(function(){
						$.ajax({url: "layout/newarticle.php", success: function(result){
							$(".MessageBox001:eq(0)").html(result);
						 }});
					});
					
					$('#newvendor001').click(function(){
						$.ajax({url: "layout/newvendor.php", success: function(result){
							$(".MessageBox001:eq(0)").html(result);
						 }});
					});
					
					$('#newpassowrd0001').click(function(){
						$.ajax({url: "layout/newpassword.php", success: function(result){
							$(".MessageBox001:eq(0)").html(result);
						 }});
					});
					////////////////////////////////////////////////////////////////////
				function removeActive(){
					$("#dashboard001").removeClass("active");
					$("#dashboard002").removeClass("active");
					$("#indexflag").removeClass("active");
					
					$("#orderbook").removeClass("active");
					
					$("#newstock001").removeClass("active");
					$("#newaddition").removeClass("active");
					$("#stockinward001").removeClass("active");
					$("#report001").removeClass("active");
					$("#fabricoutward001").removeClass("active");
					$("#fabrichistory001").removeClass("active");
					$("#fabricinspection001").removeClass("active");
					$("#fabricsponging001").removeClass("active");
					$("#overalldata001").removeClass("active");
					$("#currentstock001").removeClass("active");
					$("#currentstock001L").removeClass("active");
					$("#currentstock001S").removeClass("active");
					$("#endbits001").removeClass("active");
					$("#itemrequest001").removeClass("active");
					$("#stageuploadformat001").removeClass("active");
				}
	</script>