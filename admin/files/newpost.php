<?php 
if(!isset($_SESSION['userid']))
 {
    header('location:index.php?action=login');
 } ?>

 <?php 
$id= $_SESSION['userid'];
$user = new User();

$udetail = $user->edit($id);
//var_dump($udetail);die;

  ?>


 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <h4 class="com"><?php  
if(isset($_SESSION['success']))
 {
    echo $_SESSION['success'];
} 
else if (isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
    }

?> </h4>


                        <div class="panel-heading">
                            Your New Post
                        </div>

 <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                               <form accept-charset="UTF-8" role="form" id="newpost" action="index.php?action=controller" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Post Title</label>
                                            <input class="form-control" name='posttitle' required/>
                                            <p class="help-block">Enter the Title of the post</p>
                                        </div>
                                                                             
                                        <div class="form-group">
                                            <label>Description</label>

                                            <textarea class="ckeditor" rows="3" id="ckeditor" name='postdescription' required></textarea>
                                        </div>
                                        <div class="form-group">
                                             images: <input type="file" name="avatar" />
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input class="form-control" name='postcategory' required/>
                                            <p class="help-block">Enter the category related to the Article</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Tags</label>
                                            <input class="form-control" name='postmetatag' required/>
                                            <p class="help-block">Enter the meta tags for the Article</p>
                                        </div>
                                        
                                        <input class="btn btn-lg btn-success btn-block" type="submit" name="newarticle" value="newarticle">
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                </div>
                                </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        
                <!-- /.col-lg-12 -->
            </div>
        </div>
        </div>
        </div>


                  <?php
unset($_SESSION['success']);

?>