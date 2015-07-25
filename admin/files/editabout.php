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
                        <label for="concept" class="col-sm-3 control-label">About Me</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="7" name='descriptions' required><?php echo $k['descriptions']; ?></textarea>
                          
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
        </div> <!-- / panel preview -->
       <!--  <div class="col-sm-7">
           <h4>Preview:</h4>
           <div class="row">
               <div class="col-xs-12">
                   <div class="table-responsive">
                       <table class="table preview-table">
                           <thead>
                               <tr>
                                   <th>Concept</th>
                                   <th>Description</th>
                                   <th>Amount</th>
                                   <th>Status</th>
                                   <th>Date</th>
                               </tr>
                           </thead>
                           <tbody></tbody> preview content goes here
                       </table>
                   </div>                            
               </div>
           </div>
           <div class="row text-right">
               <div class="col-xs-12">
                   <h4>Total: <strong><span class="preview-total"></span></strong></h4>
               </div>
           </div>
           <div class="row">
               <div class="col-xs-12">
                   <hr style="border:1px dashed #dddddd;">
                   <button type="button" class="btn btn-primary btn-block">Submit all and finish</button>
               </div>                
           </div>
       </div> -->
  </div>
</div>
 <?php
unset($_SESSION['success']);
unset($_SESSION['error']);

?>