<?php
include('verify_login.php');
include('../model/conection_DB.php');
if(isset($_POST['upload_profile'])){   
   
   $userName = $_SESSION['user'];  
   echo $userName;
   $file = $userName."-".$_FILES['profile_img']['name'];
      $file_loc = $_FILES['profile_img']['tmp_name'];
   $file_type = $_FILES['profile_img']['type'];

   // probably going to make an include right here;
   $folder="../uploads/";
   
   // make file name in lower case
   $lowerCase_file_name = strtolower($file);
   
   $final_file=str_replace(' ','-',$lowerCase_file_name);
   
   if(move_uploaded_file($file_loc,$folder.$final_file))
   {
      
   $sql="UPDATE usuario set fotoDePerfilUsuario = '$folder$final_file' where nomeUsuario = '$userName'  ";
   mysqli_query($conection,$sql);
   
   header("Location: ../view/party_form_pictures_background.html");
   exit();
         
   
 }
}
 if(isset($_POST['upload_background']))
      {   
      $userName = $_SESSION['user'];  
      echo $userName;
      $file = $userName."-".$_FILES['background_img']['name'];
         $file_loc = $_FILES['background_img']['tmp_name'];
      $file_type = $_FILES['background_img']['type'];

      // probably going to make an include right here;
      $folder="../uploads/";
      
      // make file name in lower case
      $lowerCase_file_name = strtolower($file);
      
      $final_file=str_replace(' ','-',$lowerCase_file_name);
      
      if(move_uploaded_file($file_loc,$folder.$final_file))
      {
         
      $sql="UPDATE usuario set fotoDePerfilUsuario = '$folder$final_file' where nomeUsuario = '$userName'  ";
      mysqli_query($conection,$sql);
      
      header("Location: ../view/party_register_confimation.html");
      exit();
            
      
      }
      else
      {
      
      header("Location : ../party_form_pictures.html");
      exit();
            
            }
	}
?>