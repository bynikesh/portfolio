<?php $u= $udetail[0]['username'];?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a class="active" href="index.php?action=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Post<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?action=newpost">New Post</a>
                                </li>
                                <li>
                                    <a href="index.php?action=listpost">List Post</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?action=editabout">About Us</a>
                                </li>
                                <li>
                                    <a href="index.php?action=editcontact">Contact Us</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a  href="index.php?action=messages"><i class="fa fa-comments"></i> Messages</a>
                        </li>
                        <?php if($u=="admin"): ?>
                         <li>
                            <a  href="index.php?action=edithome"><i class="fa fa-home fa-fw"></i> Manage Home</a>
                        </li>
                    <?php else: ?>
                         <li class="disabled">
                            <a  class= "disabled"  href="#" title="please login through admin"><i class="fa fa-home fa-fw"></i> Manage Home</a>
                        </li>
                    <?php endif; ?>
                        <li>
                            <a  href="index.php?action=profile" title="Edit Your Personal Profile"><i class="fa fa-user fa-fw"></i> Edit Profile</a>
                        </li>
                     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
          