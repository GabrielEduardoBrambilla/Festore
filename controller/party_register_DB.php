<?php
  include('../controller/verify_login.php');
  include('../model/conection_DB.php');

  if(isset($_POST['party_register_first_page']) )
  {

    if(isset($_POST['partyName']) && isset($_POST['description']) && isset($_POST['ticket_price']) || $first_page_variable == true){
      $partyName = mysqli_real_escape_string($conection, trim($_POST['partyName']));
      $description = mysqli_real_escape_string($conection, trim($_POST['description']));
      $ticket_price = mysqli_real_escape_string($conection,trim($_POST['ticket_price']));
      echo "inside 2 iF-";

      $first_page_variable = true;
  
      header('Location: ../view/party_form_zipCode.php');
      exit();
    }
  }else{
    header('Location: ../view/main_panel.php');
    exit();
  }
  echo "out iF-";


?>