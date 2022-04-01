<?php
    include('../public_html/model/conection_DB.php');
    include('verify_login.php');
    $_SESSION['successfully_added_balance'] = false;

    $userName = $_SESSION['user'];
   
    $sql = "SELECT saldo as balance from usuario where nomeUsuario ='$userName' ";
    $result = mysqli_query($conection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    $balance_to_add_DB = intval($row[0]);
    if($balance_to_add_DB == null|| $balance_to_add_DB < 0 )
    {
      $balance_to_add_DB = 0;
    }else
      $_SESSION['last_updated_balance'] = $balance_to_add_DB;
    
    // to see if the balance have already been taken
    $_SESSION['balance_safe_guard'] = true;
    header('Location: ../public_html/view/main_panel.php');
    exit();

?>