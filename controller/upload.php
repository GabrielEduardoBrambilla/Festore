<?php
include('verify_login.php');
include('../model/conection_DB.php');
if(isset($_POST['upload']))
{   
     
 $file = $_SESSION['user']."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_type = $_FILES['file']['type'];

// probably going to make an include right here;
 $folder="../uploads/";
  
 
// make file name in lower case
 $lowerCase_file_name = strtolower($file);
 
 $final_file=str_replace(' ','-',$lowerCase_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO usuario(fotoDePerfilUsuario) VALUES('$folder$final_file')";
  mysqli_query($conection,$sql);
  
 
  echo "File sucessfully upload   ";
  echo "$file_type";
  
 }
 else
 {
  
  echo "Error.Please try again";
		
		}
	}
?>