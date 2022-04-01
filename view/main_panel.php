<!DOCTYPE html>
        <?php
        include('../public_html/controller/verify_login.php');
        include('../public_html/model/conection_DB.php');
        if(! isset($_SESSION['balance_safe_guard']))
        {
            include('../public_html/controller/get_balance.php');
            echo $_SESSION['last_updated_balance'];
            exit();
        }
        ?>
        <h2><center> Login realizado com sucesso  <?php echo $_SESSION['user']?></center></h2>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Festore - Página de Festas</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/navbar_styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a class="logo" href="../public_html/view/main_panel.php"><img src="images/logo_new.png" alt="logo"></a>
            <nav>
                
                <ul class="nav__links">
                    <li><a href="user_profile_pic.php">Perfil</a></li>
                    <li><a href="party_form.php">Criar Festa</a></li>
                    <li><a href="../public_html/view/add_balance_form.php">Adicionar Saldo</a></li>
                    <li><a href="../public_html/controller/logout.php">Logout</a></li>
                </ul>
            </nav> 
            <div>
                <a class="simple_balance" href="add_balance_form.php"><?php echo "R$ " . strtoupper($_SESSION['last_updated_balance'])?></a>
                <a class="userprofile" href="user_profile_pic.php"><?php echo strtoupper($_SESSION['user'])?> </a>
            </div>
            <p class="menu userprofile"><a href="user_profile_pic.php"></a> Menu</p>
        </header>

        <!-- mobile version menu overlay -->
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Perfil</a>
                <a href="#"><?php echo "R$ " . strtoupper($_SESSION['last_updated_balance'])?></a>
                <a href="party_form.php">Criar Festa</a>
                <a href="../public_html/view/add_balance_form.php">Adicionar Saldo</a>
                <a href="../public_html/controller/logout.php">Logout</a>
            </div>
        </div>

    <!-- try to show pictures from data base -->
        <div class="box"> <img src="<?php 
        $userName = $_SESSION['user'];
        $sql = "SELECT id_Usuario as id_Usuario from usuario where nomeUsuario ='$userName' ";
        $result = mysqli_query($conection, $sql);
        $id_Usuario = mysqli_fetch_array($result, MYSQLI_NUM);

        $sql = "SELECT fotoDePerfilUsuario from usuario where nomeUsuario ='$id_Usuario[0]' ";
        $result = mysqli_query($conection, $sql);
        if($row = mysqli_fetch_assoc($result)){
            echo $row["fotoDePerfilUsuario"];
        }       
        echo "uploads/adm-profile_pic-festore.png";
        ?>" alt=""> </div>


        


        <script type="text/javascript" src="js/navbar_mobile_view.js"></script>
    </body>
</html>


