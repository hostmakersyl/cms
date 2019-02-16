<?php require "includes/admin_header.php"; ?>

    <!-- Navigation -->

<?php require "includes/navbar/admin_top_navbar.php"; ?>

<?php
 if(isset($_GET['source'])){
     $source = $_GET['source'];
 } else {
     $source = "";
 }

 switch ($source){
     case "add_post";
     $source = require "includes/post/add_post.php";
         break;
     case "edit_post";
     $source = require "includes/post/edit_post.php";
     break;
     case "update_post";
     $source = require "includes/post/update_post.php";
     break;
     default:
         $source = require "includes/post/view_all_post.php";
 }

?>

    <!-- /#page-wrapper -->

<?php require "includes/admin_footer.php"; ?>