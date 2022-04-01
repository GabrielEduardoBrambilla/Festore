<?php
  include('../controller/verify_login.php');
  include('../model/conection_DB.php');
  include('../controller/get_locationByZipCode.php');

  if(isset($_POST['party_confirmed'])){

    $userName = $_SESSION['user'];
    $sql = "SELECT id_Usuario as id_Usuario from usuario where nomeUsuario ='$userName' ";
    $result = mysqli_query($conection, $sql);
    $id_Usuario = mysqli_fetch_array($result, MYSQLI_NUM);

    $partyName = $_SESSION['partyName'];
    $description = $_SESSION['description'];
    $ticket_price = $_SESSION['ticket_price'];
    $data = $_SESSION['data'];
    $time = $_SESSION['time'];
    $party_background_img = $_SESSION['party_background_img'];
    $party_profile_img = $_SESSION['party_profile_img'];

    $sql = "Insert into party (nomeFesta, descricao, fotoPerfilFesta, fotoBackground, precoIngresso, dono_Festa, dataEhora) values ('$partyName','$description','$party_profile_img','$party_background_img','$ticket_price','$id_Usuario[0]','$time$time')";

    if($conection->query($sql) === TRUE){
      header('Location: ../view/main_panel.php');
      exit();
    }
  }

  if(isset($_POST['party_register_first_page']) )
  {

    if(isset($_POST['partyName']) && isset($_POST['description']) && isset($_POST['ticket_price']) ){
      $partyName = mysqli_real_escape_string($conection, trim($_POST['partyName']));
      $description = mysqli_real_escape_string($conection, trim($_POST['description']));
      $ticket_price = mysqli_real_escape_string($conection,trim($_POST['ticket_price']));
      
      $_SESSION['partyName'] = $partyName;
      $_SESSION['description'] = $description;
      $_SESSION['ticket_price'] = $ticket_price;

  
      header('Location: ../view/party_form_zipCode.php');
      exit();
    }
  }else{
    header('Location: ../view/main_panel.php');
    exit();
  }

?>