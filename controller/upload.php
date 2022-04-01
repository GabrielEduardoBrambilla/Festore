<?php
include('verify_login.php');
include('../model/conection_DB.php');
if(isset($_POST['upload_profile'])){   
   
   $partyName = $_SESSION['partyName'];  
   $file = $partyName."-profile_img"."-".$_FILES['profile_img']['name'];
      $file_loc = $_FILES['profile_img']['tmp_name'];
   $file_type = $_FILES['profile_img']['type'];

   // probably going to make an include right here;
   $folder="../uploads/";
   
   // make file name in lower case
   $lowerCase_file_name = strtolower($file);
   
   $final_file=str_replace(' ','-',$lowerCase_file_name);
   $file_path = $folder.$final_file;
   
   if(move_uploaded_file($file_loc,$file_path))
   {    
    $_SESSION['party_profile_img'] = $file_path;   
    
    header("Location: ../view/party_form_pictures_background.html");
    exit();
   }
}
 if(isset($_POST['upload_background']))
      {   
        $partyName = $_SESSION['partyName'];  
      $file = $partyName."-background_img"."-".$_FILES['background_img']['name'];
         $file_loc = $_FILES['background_img']['tmp_name'];
      $file_type = $_FILES['background_img']['type'];

      // probably going to make an include right here;
      $folder="../uploads/";
      
      // make file name in lower case
      $lowerCase_file_name = strtolower($file);
      
      $final_file=str_replace(' ','-',$lowerCase_file_name);
      $file_path = $folder.$final_file;

      if(move_uploaded_file($file_loc,$file_path))
      {
        $_SESSION['party_background_img'] = $file_path;      
        header("Location: ../view/party_date.php");
        exit();   
      }
      else
      {
        header("Location : ../party_form_pictures.html");
        exit(); 
      }
	}
?>