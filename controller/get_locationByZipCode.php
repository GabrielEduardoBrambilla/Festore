<?php

include('../public_html/controller/verify_login.php');
$_SESSION['unavailable_cep'] = false;

function get_endereco($cep){
                            
  //Formata o cep para caracteres nao numericos
  $cep = preg_replace("/[^0-9]/", "", $cep);
  $url = "http://viacep.com.br/ws/$cep/xml/";
  
  $xml = simplexml_load_file($url);
  return $xml;
  
}


if(isset($_POST['second_zip']))
  {
    $cep_number = $_POST['cep'];
    if(strlen($cep_number) <= 9 && strlen($cep_number) >= 8){
      $cep = $_POST['cep'];
      $endereco = (get_endereco($cep));
    
      if ($endereco->cep = $cep){ 
        $cep_xml = $endereco->cep;
        $logradouro_xml = $endereco->logradouro;
        $bairro_xml = $endereco->bairro;
        $localidade_xml = $endereco->localidade;
        $estado_xml = $endereco->uf;

        $_SESSION['cep'] = $cep_xml->asXML();
        $_SESSION['rua'] = $logradouro_xml->asXML();
        $_SESSION['bairro'] = $bairro_xml->asXML();
        $_SESSION['cidade'] = $localidade_xml->asXML();
        $_SESSION['estado'] = $estado_xml->asXML();
        $_SESSION['numero_casa'] = $_POST['house_number'];
        header('Location: ../public_html/view/party_form_pictures.html');
        exit();
      }
      else
      { 
        $_SESSION['unavailable_cep'] == TRUE;
        header('Location: ../public_html/view/party_form_zipCode.php');
        exit();
      }  
    } 
  }
?>

