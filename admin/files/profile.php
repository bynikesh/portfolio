<?php 
if(!isset($_SESSION['userid']))
 {
 	header('location:index.php?action=login');
 } ?>

 <?php 
$id= $_SESSION['userid'];
$user = new User();

$udetail = $user->edit($id);
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
                            Your Profile
                        </div>

 <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                               <form accept-charset="UTF-8" role="form" id="newpost" action="index.php?action=controller" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input class="form-control" name='username' value="<?php echo $udetail[0]['username'];?>" required/>
                                            <p class="help-block">Enter the New username</p>
                                        </div>
                                                                             
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name='email' type="email" value="<?php echo $udetail[0]['email'];?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name='password' type="password" value="<?php echo $udetail[0]['password'];?>" required/>
                                            <p class="help-block">Enter the profile pic</p>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-md btn-primary " type="file" name="avatar" value="upload">
                                        </div>
                                        
                                        <input class="btn btn-lg btn-success btn-block" type="submit" name="editprofile" value="Edit Profile">
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <img src="uploads/<?php echo $udetail[0]['pic'];?>" />
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
        <script>
$("#commentForm").validate();
</script>
<?php
unset($_SESSION['success']);

?>