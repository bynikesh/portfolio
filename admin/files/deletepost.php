<?php 
if(!isset($_SESSION['userid']))
 {
    header('location:index.php?action=login');
 } ?>


 

<?php 
    $postid = isset($_GET['id'])? $_GET['id'] : '';
$article = new Article();
$li = $article->deletearticle($postid);

 ?>