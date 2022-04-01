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
    <title>Confirmar Informações da Festa</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
    
<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title is-2 has-text-grey">Confirmar Informações da Festa</h3>
                                       
                    <div class="box">
                        <div class="field">
                            <div class="control">
                                <form
                                action="../controller/party_register_DB.php"
                                method="post"
                                enctype="multipart/form-data"
                                >
                                    <h3  class="title is-4 has-text-grey">Nome da Festa; <p class="label is-large"> <?php  echo $_SESSION['partyName']?></p></h3>
                                    <h3  class="title is-4 has-text-grey">Local <p class="label is-large"> <?php  echo $_SESSION['cep']?> <br> <?php echo $_SESSION['rua'] .", ". $_SESSION['numero_casa']?> <br> <?php echo $_SESSION['cidade']?> </p></h3>
                                    <h3  class="title is-4 has-text-grey">Descrição; <p class="label is-large"> <?php  echo $_SESSION['description']?></p></h3>
                                    <h3  class="title is-4 has-text-grey">Preco do Ingresso; <p class="label is-large"> <?php  echo "R$ ".$_SESSION['ticket_price']?></p></h3>
                                    <h3  class="title is-4 has-text-grey">Responsavel; <p class="label is-large"> <?php  echo $_SESSION['user']?></p></h3>
                                    <h3  class="title is-4 has-text-grey">Data; <p class="label is-large"> <?php  echo $_SESSION['data']?></p></h3>
                                    <h3  class="title is-4 has-text-grey">Horario; <p class="label is-large"> <?php  echo $_SESSION['time']?></p></h3>
                                    
                                   
                                   
                                    <button type="submit" name="party_confirmed" class="button is-block is-link is-large is-fullwidth">Confirmar</button>

                                </form>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>     
</body>
</html>