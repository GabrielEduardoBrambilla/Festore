<?php
  include('../public_html/controller/verify_login.php');
  include('../public_html/model/conection_DB.php');
  include('../public_html/controller/get_locationByZipCode.php');

  if(isset($_POST['party_confirmed'])){
    // get user id
    $userName = $_SESSION['user'];
    $sql = "SELECT id_Usuario as id_Usuario from usuario where nomeUsuario ='$userName' ";
    $result = mysqli_query($conection, $sql);
    $id_Usuario = mysqli_fetch_array($result, MYSQLI_NUM);
    
    //getting endereco registered and getting endereco_id right after
    $cep = $_SESSION['cep'];
    $rua = $_SESSION['rua'];
    $bairro = $_SESSION['bairro'];
    $cidade = $_SESSION['cidade'];
    $estado = $_SESSION['estado'];
    $numero_casa = $_SESSION['numero_casa'];

    $sql = "Insert into endereco (logradouro, bairro, cidade, estado, CEP, numero_local) values ('$rua','$bairro','$cidade', '$estado','$cep', '$numero_casa')";

    if($conection->query($sql) === TRUE){
      $sql = "SELECT id_Endereco from endereco where CEP = '$cep';";
      $result = mysqli_query($conection, $sql);
      $id_Endereco = mysqli_fetch_array($result, MYSQLI_NUM);
    }
    

    $partyName = $_SESSION['partyName'];
    $description = $_SESSION['description'];
    $ticket_price = $_SESSION['ticket_price'];
    $date = $_SESSION['data'];
    $time = $_SESSION['time'];
    $party_background_img = $_SESSION['party_background_img'];
    $party_profile_img = $_SESSION['party_profile_img'];
    
    $sql = "Insert into party (nomeFesta, descricao, fotoPerfilFesta, fotoBackground, precoIngresso, dono_Festa, dataEhora, id_Endereco) values ('$partyName','$description','$party_profile_img','$party_background_img','$ticket_price','$id_Usuario[0]','$date$time', '$id_Endereco[0]')";

    if($conection->query($sql) === TRUE){
      header('Location: ../public_html/view/main_panel.php');
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

  
      header('Location: ../public_html/view/party_form_zipCode.php');
      exit();
    }
  }else{
    header('Location: ../public_html/view/main_panel.php');
    exit();
  }

?>