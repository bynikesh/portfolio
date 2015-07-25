<?php 
   
$article = new Article();
$li = $article->getabout(true);
//var_dump($li);die;

 ?>
<?php  
if(isset($_SESSION['success']))
 {
    echo $_SESSION['success'];
} 
else if (isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
    }

?>

<div class="container">
	<div class="row">
        <div class="col-sm-10">
            <!-- <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">Page Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="concept" name="concept">
                        </div>
                    </div> -->
        </div> <br>
        <!-- panel preview -->
        
        <div class="col-sm-8"><br>
            
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                               <form accept-charset="UTF-8" role="form" id="login" action="index.php?action=controller" method="post">

                    <div class="form-group">
                      <?php foreach ($li as $k ): ?> 
  

 
                        <label for="concept" class="col-sm-3 control-label">Page Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="title" value="<?php echo $k['title']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">Concept</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="7" name='descriptions' required><?php echo $k['aboutinfo']; ?></textarea>
                          
                        </div>
                    </div>
                   
                     <?php endforeach; ?>
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-default preview-add-button" name="editabout"  >
                                <span class="glyphicon glyphicon-plus"></span> Update
                            </button>
                           <!-- <input class="btn btn-lg btn-success btn-block" type="submit" name="editabout" value="editarticle"> -->

                        </div>
                    </div></form>
                </div>
            </div>            
        </div> 
	</div>
</div>
 <?php
unset($_SESSION['success']);

?>
