<?php
session_start();
include('../model/conection_DB.php');

if(empty($_POST['user']) || empty($_POST['password'])){
  header('Location: ../view/login_form.php');
  exit();
}

$user = mysqli_real_escape_string($conection, $_POST['user']);
$password = mysqli_real_escape_string($conection, $_POST['password']);

$query = "select nomeUsuario, senha from usuario where nomeUsuario = '$user' and senha = md5('{$password}')";
$result = mysqli_query($conection, $query);

$row = mysqli_num_rows($result);

if($row == 1){
  $_SESSION['user'] = $user;
  header('Location: ../view/main_panel.php');
  exit();
}else{
  $_SESSION['unauthenticated'] = true;
  header('Location: ../view/login_form.php');
  exit();
}