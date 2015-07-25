<?php ob_start(); ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?action=dashboard">Halfcoder Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <!-- /.dropdown -->
              
                <!-- /.dropdown -->
      
                <!-- /.dropdown -->
                <li><a href="../index.php"> <i class="fa fa-eye"></i>Visit Site</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?action=profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <?php if(isset($_SESSION['userid'])): ?>
             <li><a href="index.php?action=logout" ><i class="fa fa-sign-out fa-fw"></i>Logout</a> </li>
             <?php else: ?>
              <li><a href="admin/index.php?action=login"><span class="glyphicon glyphicon-user"></span>Login</a> </li>
              <?php endif; ?>
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           
        </nav>