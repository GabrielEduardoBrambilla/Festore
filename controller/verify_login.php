<?php
session_start();
if(!$_SESSION['user']){
  header('Location: ../view/login_form.php');
  exit();
}
    