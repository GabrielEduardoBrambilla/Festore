<?php
session_start();

?>


<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro - PHP + MySQL - Canal TI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Cadastro d'Usuario</h3>
                    
                    <?php
                    if(isset($_SESSION['successfully_registered'])){ 
                    if($_SESSION['successfully_registered'] === TRUE){
                    ?>
                    <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
                    </div>
                    <?php
                    }
                    }
                    unset($_SESSION['successfully_registered']);                    
                    ?>

                    <?php
                    if(isset($_SESSION['username_in_use'])){ 
                        if($_SESSION['username_in_use']){
                    ?>
                    <div class="notification is-info">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                        }
                    }
                    unset($_SESSION['username_in_use'])                    
                    ?>
                   
                    <div class="box">
                        <form action="register_DB.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="userName" type="text" class="input is-large" placeholder="Nome de Usuario" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="dateOfBirth" type="text" class="input is-large" placeholder="Date de Nascimento">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="password" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="profilePicture" class="input is-large" type="update" placeholder="profile picture {LATER}">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                            <hr>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth"><a href="index.php">Pagina de login</a></br></button>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>

</html>