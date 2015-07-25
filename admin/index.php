<?php 

session_start();
include_once 'includes/classes/article.php';   
include_once 'includes/classes/db.php';     
include_once 'includes/classes/user.php';     



?>
 <?php 
$id= $_SESSION['userid'];
$user = new User();

$udetail = $user->edit($id);
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Half Coder</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="assets/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
   
   <!-- ckeditor plugin -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   

       <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
<div id="wrapper">


<?php     
 //include_once 'includes/header.php'; 
 //include_once 'includes/sidebar.php'; ?>


   <?php 
if (($_GET['action'] !='login'))

 { ?>
    
<!-- include the header -->

    
<?php 
  include_once 'includes/header.php'; 
  include_once 'includes/sidebar.php'; 

  ?>
<div name= "dashboard" id="<?php  echo ($_GET['action'] !="login") ? 'page-wrapper' : '' ?>">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
        
    </div> 
    
    <?php }

?>
    
     



        

     <?php


    if (isset($_GET['action']) && !empty($_GET['action'])) {

      $file = "files/" . $_GET['action'] . ".php";

      if (file_exists($file)) {

        include($file);
      } 
      else {
        echo "file not found";
        
      }
    }
     else {
 
    include("files/dashboard.php");
    }
    ?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
                            
                        </div> 

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>
     <script src="assets/js/jquery-2.1.1.min.js"></script>
     
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/jquery.validate.js"></script>

</body>

</html>
