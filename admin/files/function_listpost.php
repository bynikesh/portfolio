 <?php  
// require '../includes/classes/db.php';
 //require '../includes/classes/article.php';

function listpost(){

 $sql = "SELECT postid, posttitle, postcategory FROM article LIMIT 10";

    $article = new Article();
    $result = $article->listarticle($query);

    if($result->num_rows > 0)
    {
        $data = array();

        while($row = mysqli_fetch_assoc($result))

        {
            array_push($data, $row);

        }
        return $data;
}else{
//else return 0
return 0;
}
echo '<pre>';
print_r($data);
echo '</pre>';
}
?>
       <!-- ================================================================ -->

       <?php 
if (($_GET['action'] !='login'))

 { ?>
    
<!-- include the header -->

    
<?php 
  include_once 'includes/header.php'; 
  include_once 'includes/sidebar.php'; 

  ?>
<div name= "dashboard" id="<?php  ($_GET['action'] !="login") ? 'page-wrapper' : '' ?>">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
        
    </div> 
    
    <?php }

?>