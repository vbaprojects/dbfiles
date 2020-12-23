<header class="main-header" style="z-index: 1000000;">
        <!-- Logo -->
        <a style="background: url(dist/img/logo/logo.png);background-repeat: no-repeat;background-size: auto;" class="logo"><b> </b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
			
			
			<!--  ////////////////////////////////////////////////////////////////////////////////////HIDDEN  -->
			
               <!-- Messages: style can be found in dropdown.less-->
              
               <?php if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'inventory'){ include 'layout/message.php'; } ?>   
				
              <!-- Notifications: style can be found in dropdown.less -->
              
			  <?php // include 'layout/notification.php'; ?>  
			  
              <!-- Tasks: style can be found in dropdown.less -->
              
			  <?php // include 'layout/task.php'; ?>  
			  
			  <!--  ////////////////////////////////////////////////////////////////////////////////////HIDDEN  -->
			 
			  
              <!-- User Account: style can be found in dropdown.less -->
              
			   <?php  include 'layout/user.php'; ?>
			  
			  
            </ul>
          </div>
        </nav>
      </header>
	  <div class="alert alert-success alerter008666"  style="position: fixed;margin: 0;z-index: 10000000;margin-left: 30%;margin-top: 5px;"><strong>Success!</strong> Indicates a successful or positive action.</div>
	  
	  
	  <!-- Left side column. contains the logo and sidebar -->
	  
	  <?php include 'layout/aside.php'; ?>