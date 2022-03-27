<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php
include('../controller/verify_login.php');
?>

<h2>ola <?php echo $_SESSION['user']?></h2>
<h2><a href="logout.php">logout</a></h2>
</body>
</html>





