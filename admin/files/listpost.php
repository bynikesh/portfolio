<?php 
if(!isset($_SESSION['userid']))
 {
    header('location:index.php?action=login');
 } ?>
 

<?php 

 $article = new Article();
 $alist = $article->listarticle(false);
 
 //var_dump($alist['postid']);die;
 ?>

 <!-- /.row -->
 

   

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
                            <a href="pdfreport.php"><i class="fa fa-file-pdf-o fa-1x"></i> Export As PDF</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>post Id</th>
                                            <th style= 'padding-right: 180px;'>Post name</th>
                                            <th>Category</th>
                                                                                     
                                            <th>Edit/Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php foreach ($alist as $i):?>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i['postid'];?></td>
                                            <td><?php echo $i['posttitle'];?></td>
                                            <td><?php echo $i['postcategory'];?></td>
                                            <td class="center">
                                                <a href="index.php?action=editpost&amp;id=<?php echo $i['postid']; ?>">Edit</a> 
            <a href="index.php?action=deletepost&amp;id=<?php echo $i['postid']; ?>">Delete</a></td>
                                        </tr>
                                     </tbody>
                                     <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12              </div>
            <!-- /.row -->


            <?php
unset($_SESSION['success']);

?>