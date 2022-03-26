<?php
session_start();
include("conection_DB.php");
$_SESSION['username_in_use'] = false;
$_SESSION['successfully_registered'] = false;

$userName = mysqli_real_escape_string($conection, trim($_POST['userName']));
$dateOfBirth = mysqli_real_escape_string($conection, trim($_POST['dateOfBirth']));
$password = mysqli_real_escape_string($conection,trim(md5( $_POST['password'])));
$profilePicture = mysqli_real_escape_string($conection, trim($_POST['profilePicture']));

$sql = "SELECT count(*) as total from usuario where nomeUsuario ='$userName' ";
$result = mysqli_query($conection, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1){
  $_SESSION['username_in_use'] = true;
  header("Location: register_form.php");
  exit();
}

// $sql = "insert into usuario (nomeUsuario, dataDeNascimento, senha) values ('$userName','$dateOfBirth', '$password')";


$sql = "insert into usuario (nomeUsuario, senha) values ('$userName', '$password')";

if($conection->query($sql) === TRUE){
  $_SESSION['successfully_registered'] = TRUE;
}

$conection->close();
 
header("Location: register_form.php");
exit();

?>