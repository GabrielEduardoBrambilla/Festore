<?php
        include('../controller/verify_login.php');
        $user =  $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina de Criação de Festas</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript" src="js/cep_api.js"></script>
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Publicação de Festas</h3>
                    
                    <div class="box">
                        <form action="../controller/party_register_DB.php" method="POST" >
                            <div class="field">
                                <div class="control">
                                    <input name="partyName" type="text" class="input is-large" placeholder="Nome da Festa" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="description" type="text" class="input is-large" placeholder="Descrição da Festa">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="ticket_price" class="input is-large" type="number" maxlength="3" placeholder="Preço do Ingresso">
                                </div>
                            </div>

                        </from>
                            <button type="submit" name="party_register_first_page" class="button is-block is-link is-large is-fullwidth">Proximo</button>
                            
                            <hr>

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">
                                <small><a href="../view/main_panel.php">Voltar</a>                                   
                                </small></br>
                            </button>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>

</html>