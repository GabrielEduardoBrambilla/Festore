<?php
        include('../controller/verify_login.php');
        $user =  $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local da Festa</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>

<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Local da Festa</h3>
                    
                    
                    <div class="box">
                        <form action="../controller/get_locationByZipCode.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" placeholder="CEP" name="cep" type="text" id="cep" value="" size="10" minlength="8" maxlength="8"
                                      />
                                    </label>
                                                      
                                </div>
                                <br>
                                <input class="input is-large" placeholder="Numero da casa/complemento" name="house_number" type="text" id="" value="" size="10"  maxlength="8"
                                      />
                            </div>
                            <button type="submit" name='second_zip'class="button is-block is-link is-large is-fullwidth">Proximo</button>
                        </form>
                    
                                <small><a href="../view/party_form.php">Voltar</a>
                                </small></br>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>     
</body>
</html>