<?php ob_start(); ?>
<?php 
//session_destroy();

 header('location:index.php?action=login');
?>
<?php
unset($_SESSION['success']);

?>