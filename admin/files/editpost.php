<?php 
if(!isset($_SESSION['userid']))
 {
    header('location:index.php?action=login');
 } ?>
 

<?php 
    $postid = isset($_GET['id'])? $_GET['id'] : '';
$article = new Article();
$li = $article->listarticle(true);


 ?>
 
<?php foreach ($li as $k ): ?> 

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
                               <form accept-charset="UTF-8" role="form" id="login" action="index.php?action=controller&id=<?php echo $k['postid'] ?>" method="post">
                                        <div class="form-group">
                                            <label>Post Title</label>
                                            <input class="form-control" name='posttitle' value="<?php echo $k['posttitle']; ?> " required />
                                            <p class="help-block">Enter the Title of the post</p>
                                        </div>
                                                                           
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="ckeditor" rows="3" name='ckeditor' required><?php echo $k['postdescription']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input class="form-control" name='postcategory' value="<?php echo $k['postcategory']; ?>" required/>
                                            <p class="help-block">Enter the category related to the Article</p>
                                        </div>
                                        <div class="form-group">
                                            <img width=200 height=200 src="http://nikeshadhikari.com.np/uploads/<?php echo $k['apic'];?>" />

                                        </div>
                                        <div class="form-group">
                                            <label>Meta Tags</label>
                                            <input class="form-control" name='postmetatag' value="<?php echo $k['postmetatag']; ?>" required/>
                                            <p class="help-block">Enter the meta tags for the Article</p>
                                        </div>
                                        <?php endforeach; ?> 
                                        <input class="btn btn-lg btn-success btn-block" type="submit" name="editarticle" value="editarticle">
                                        
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
       