<?php
  session_start();
    include('../model/conection_DB.php');
    include('verify_login.php');
    $_SESSION['successfully_added_balance'] = false;
    
    if(isset($_POST['add_balance_btn']))
    {
      if(isset($_POST['credit_card_number']) && isset($_POST['balance']))
      { 
        $userName = $_SESSION['user'];

        $credit_card_number = mysqli_real_escape_string($conection, trim($_POST['credit_card_number']));
        $balance = mysqli_real_escape_string($conection, trim($_POST['balance']));
      }
      else{
        $_SESSION['not_allowed_blanc_fields_balance'] = true;
        header("Location: add_balance_form.php");
        exit();
      }
    }
    else{
      header("Location: add_balance_form.php");
      exit();
    }
    

    $sql = "SELECT saldo as balance from usuario where nomeUsuario ='$userName' ";
    $result = mysqli_query($conection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    $balance_to_add_DB = intval($row[0]) + intval($balance);
    
        
    //insert into database
    $sql = "UPDATE usuario set saldo = '$balance_to_add_DB' where nomeUsuario = '$userName' ";

    if($conection->query($sql) === TRUE){
      $_SESSION['last_updated_balance'] = $balance_to_add_DB;
      $_SESSION['successfully_added_balance'] = TRUE;
      header('Location: ../view/add_balance_form.php');
    }
    
    $conection->close();
     
    header("Location: ../view/main_panel.php");
    exit();
    
  

?>