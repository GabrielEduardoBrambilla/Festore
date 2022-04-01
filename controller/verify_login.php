<?php
session_start();
if(!$_SESSION['user']){
  header('Location: ../public_html/view/index.php');
  exit();
}

    