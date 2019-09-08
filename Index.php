<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Gamer Shopping</title>
        <meta charset="utf-8"> 

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>                            
    
     <body>
         <div class='container'>
            <header class='row'>
                
                <div class="col-12">
                    <nav id="navbar" class="navbar navbar-expand-lg navbar-light" style="background-color: #ccc;">

                        <a href="Index.php"><img src="Imagens/logo.png" alt="Logo do site" style="height:100px; width:100px;"></a>
                       
                        <a class="navbar-brand p-4" href="Index.php">Home</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav nav-pills">

                                <li class="nav-item">
                                    <a class="nav-link" href="Jogos.php">Jogos</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="Login.php">Bem vindo! Entre ou se cadastre-se</a>
                                </li>

                            </ul>
                        </div>
                    </nav>

                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Gamer Shopping</h1>

                </div> 
            </header>

            <main>
                <section class='row'>

                    <div class='col-12'>

                        <div id="carouselExampleInterval" class="carousel slide mt-3" data-ride="carousel">
                            <div class="carousel-inner">

                                <div class="carousel-item active" data-interval="10000">
                                    <img src="imagens/Carrossel_1.png" class="d-block w-100" alt="Resident Evil 3 for Nintendo Game Cube">
                                </div>

                                <div class="carousel-item" data-interval="2000">
                                    <img src="imagens/Carrossel_2.jpg" class="d-block w-100" alt="Advance Wars for Nintendo DS">
                                </div>

                                <div class="carousel-item" data-interval="3000">
                                    <img src="imagens/Carrossel_3.jpg" class="d-block w-100" alt="Capcom VS SNK for DreamCast">
                                </div> 

                                <div class="carousel-item" data-interval="4000">
                                    <img src="imagens/Carrossel_4.png" class="d-block w-100" alt="MegaMan Zero 3 for Game Boy Advance">
                                </div> 
                                
                                <div class="carousel-item" data-interval="5000">
                                    <img src="imagens/Carrossel_5.jpg" class="d-block w-100" alt="Road Rash 3 for Mega Drive/Genesis">
                                </div>                                  

                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                         </div>                        

                        <div class="jumbotron mt-5">
                                <h2 class="display-4">Os melhores jogos do passado!</h2>
                                <p class="lead">Nossa loja tem a disposição os melhores jogos e todas as suas verões.</p>
                                <hr class="my-4">
                                <a class="btn btn-primary btn-lg" href="Lista.php" role="button">Abrir Catalogo</a>
                        </div>
                    </div>
                </section>
            </main>

        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>