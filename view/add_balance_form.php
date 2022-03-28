<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar saldo</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  
<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Adicionar Saldo</h3>
                    <?php
                        if(isset($_SESSION['unauthenticated'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['unauthenticated']);
                    ?>
                    <div class="box">
                        <form action="../controller/add_balance.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="balance" type="number" maxlength="3" class="input is-medium" placeholder="Saldo que deseja adicionar" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="credit_card_number" class="input is-medium" type="number" maxlength="3" placeholder="3 numeros do cartao">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Adicionar Saldo</button>
                        </form>
                        <small>
                          <script>
                           document.write('<a href="' + document.referrer + '">Voltar</a>');
                          </script>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>