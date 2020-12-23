            
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/buyer/<?php if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'inventory'){ echo 'user'; }else{ echo $_SESSION['mainforbuyer']; }?>.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"> <?php echo $_SESSION['user']['role']; ?> </span>
                </a>
                <ul class="dropdown-menu" style="box-shadow:0px 1px 14px 4px;">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/buyer/<?php if($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'inventory'){ echo 'user'; }else{ echo $_SESSION['mainforbuyer']; }?>.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $_SESSION['user']['username']; ?>
                    </p>
                  </li>
                  <li id="newpasswordyyy" class="user-footer">
                    <div class="pull-left">
                      <a id="newpassowrd0001" class="btn btn-default btn-flat">New Password</a>
                    </div>
					<div class="pull-right">
                      <a href="layout/logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>	 
