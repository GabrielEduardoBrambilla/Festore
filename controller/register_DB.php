<?php
session_start();
include("../model/conection_DB.php");
$_SESSION['username_in_use'] = false;
$_SESSION['successfully_registered'] = false;

//minimum age to be able to register in the system
$min_age = 18;

if(isset($_POST['register']))
{
  if(isset($_POST['password']) && isset($_POST['age']) && isset($_POST['userName']))
  {
    $userName = mysqli_real_escape_string($conection, trim($_POST['userName']));
    $age = mysqli_real_escape_string($conection, trim(md5($_POST['age'])));
    $password = mysqli_real_escape_string($conection,trim(md5( $_POST['password'])));
  }
  else{
    $_SESSION['not_allowed_blanc_fields'] = true;
    header("Location: register_form.php");
    exit();
  }
}
else{
  header("Location: register_form.php");
  exit();
}

// prepar variable to verify if user name already exist
$sql = "SELECT count(*) as total from usuario where nomeUsuario ='$userName' ";
$result = mysqli_query($conection, $sql);
$row = mysqli_fetch_assoc($result);

//verify if user name already exist
if ($row['total'] == 1){
  $_SESSION['username_in_use'] = true;
  header("Location: ../view/register_form.php");
  exit();
}
if ($age < $min_age){
  $_SESSION['age_not_accepted'] = true;
  header("Location: ../view/register_form.php");
  exit();
}

//insert into database
$sql = "insert into usuario (nomeUsuario, senha, age) values ('$userName', '$password', '$age')";
if($conection->query($sql) === TRUE){
  $_SESSION['successfully_registered'] = TRUE;
  header('Location: ../view/register_form.php');
}

$conection->close();
 
header("Location: ../view/register_form.php");
exit();

?>