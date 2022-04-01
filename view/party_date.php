<!DOCTYPE html>


<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data da Festa</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
    
<section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title is-2 has-text-grey">Data da Festa</h3>
                    <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }
                ?>       
                    <div class="box">
                        <div class="field">
                            <div class="control">
                                <form
                                action="../controller/datetime-local.php"
                                method="post"
                                enctype="multipart/form-data"
                                >
                                    <h3  class="title is-4 has-text-grey">Escolha a data da Festa</h3>
                                    <input type="datetime-local"  name="event_dt" /> 
                              <hr>
                                     <button type="submit" name="save_datetime" class="button is-block is-link is-large is-fullwidth">Proximo</button>

                                    
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