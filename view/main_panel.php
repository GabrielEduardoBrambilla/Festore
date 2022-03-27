<?php
include('verify_login.php');
?>

<h2>ola <?php echo $_SESSION['user']?></h2>
<h2><a href="logout.php">logout</a></h2>