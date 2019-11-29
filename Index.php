<?php
    session_start();
    include('cabecalho.php');
?>
                    <h1 class="text-center H1_titulo mt-3">Gamer Shopping</h1>
                </div> 
            </header>

            <main>
                <section class='row'>

                    <div class='col-12'>

                        <div id="carouselExampleInterval" class="carousel slide mt-3" data-ride="carousel">
                            <div class="carousel-inner">

                                <div class="carousel-item active tamanho_igual_carrossel" data-interval="10000" >
                                    <img src="Imagens/Carrossel_1.png" class="d-block w-100 img_carrossel img-thumbnail" alt="Resident Evil 3 for Nintendo Game Cube">
                                </div>

                                <div class="carousel-item" data-interval="2000">
                                    <img src="Imagens/Carrossel_2.jpg" class="d-block w-100 img_carrossel img-thumbnail" alt="Advance Wars for Nintendo DS">
                                </div>

                                <div class="carousel-item" data-interval="3000">
                                    <img src="Imagens/Carrossel_3.jpg" class="d-block w-100 img_carrossel img-thumbnail" alt="Capcom VS SNK for DreamCast">
                                </div> 

                                <div class="carousel-item" data-interval="4000">
                                    <img src="Imagens/Carrossel_4.png" class="d-block w-100 img_carrossel img-thumbnail" alt="MegaMan Zero 3 for Game Boy Advance">
                                </div> 
                                
                                <div class="carousel-item" data-interval="5000">
                                    <img src="Imagens/Carrossel_5.jpg" class="d-block w-100 img_carrossel img-thumbnail" alt="Road Rash 3 for Mega Drive/Genesis">
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
                                <p class="lead">Nossa loja tem a disposição os melhores jogos!.</p>
                                <hr class="my-4">
                                <a class="btn btn-primary btn-lg" href="Jogos.php" role="button">Abrir Catalogo</a>
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