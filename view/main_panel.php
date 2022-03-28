<!DOCTYPE html>
        <?php
        include('../controller/verify_login.php');
        ?>

        <h2>Login realizado com sucesso  <?php echo $_SESSION['user']?></h2>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Festore - Página de Festas</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="navbar_styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a class="logo" href="/"><img src="images/logo.svg" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <ul class="nav__links">
                    <li><a href="add_balance_form.php">SALDO </a></li>
            </ul> -->
            <a class="userprofile" href="#">SALDO</a>
            <a class="userprofile" href="#"><?php echo $_SESSION['user']?></a>
            <p class="menu userprofile">Menu</p>
        </header>

        <!-- mobile version menu overlay -->
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Festas</a>
                <a href="../controller/add_balance_form.php">Saldo</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        


        


        <script type="text/javascript" src="navbar_mobile_view.js"></script>
    </body>
</html>


