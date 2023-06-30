<?php
 
session_start();

session_destroy();
 header('location:login.php');
if (!isset($_SESSION['Username'])) {
  header('location:login.php');
  echo "you are logout";
  }
 ?>