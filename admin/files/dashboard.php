<?php 
if(!isset($_SESSION['userid']))
 {
 	header('location:index.php?action=login');
 } ?>
