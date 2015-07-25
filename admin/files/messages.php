
<?php 
$message = new Article();
$msg = $message->getmessages(); 
 //var_dump($msg);die;?>






<?php  echo $key['messageid'];?>



<div class="container">
            <div class="row">
                <div class="col-md-6">
                  <div class="page-header">
                    <h3><small class="pull-right"></small> Messages </h3>
                  </div> <?php foreach ($msg as $key): ?>
                   <div class="comments-list">
                       <div class="media">
                           <p class="pull-right"><small><?php  echo $key['email'];?></small></p> 
                             <p class="pull-left"><small><?php  echo $key['phoneno'];?></small></p><br><br>
                            <a class="media-left" href="#">
                              <img height="42" width="42" src="assets/images/avatar.png">
                            </a>
                            <div class="media-body">
                                
                              <h4 class="media-heading user_name"><?php  echo $key['username'];?></h4>
                              <?php  echo $key['messages'];?>
                              <hr class="divider">
                              
                            <!--   <p><small><a href="">More</a> - <a href="">Share</a></small></p> -->
                            </div>
                          </div>
                          <?php endforeach;
?>
                      
                    
                     
                   </div>
                    
                    
                    
                </div>
            </div>
        </div>
        <?php
unset($_SESSION['success']);

?>