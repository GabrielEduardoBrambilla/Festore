<?php

$_SESSION['unavailable_cep'] = false;
$_SESSION['cep'] = false;
$_SESSION['rua'] = false;
$_SESSION['bairro'] = false;
$_SESSION['cidade'] = false;

function get_endereco($cep){
                            
  //Formata o cep para caracteres nao numericos
  $cep = preg_replace("/[^0-9]/", "", $cep);
  $url = "http://viacep.com.br/ws/$cep/xml/";
  
  $xml = simplexml_load_file($url);
  return $xml;
  
}
if(isset($_POST['second_zip']))
  {
    $cep = $_POST['cep'];
    $endereco = (get_endereco($cep));
   
    if ($endereco->cep = $cep){
    
      $_SESSION['cep'] = $endereco->cep;
      $_SESSION['rua'] = $endereco->logradouro;
      $_SESSION['bairro'] = $endereco->bairro;
      $_SESSION['cidade'] = $endereco->localidade;
      header('Location: ../view/party_form_pictures.html');
      exit();
    }
    else
    { 
      $_SESSION['unavailable_cep'] == TRUE;
      header('Location: ../view/party_form_zipCode.php');
      exit();
    }
  }
?>

