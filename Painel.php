<?php
    include('cabecalho.php');
?>
                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Painel de controle</h1>
                </div> 
            </header>

            <main>
                <section class='row'>
                    <div class='row mt-5'>
                        <div class='col-6'>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="Imagens/cadastro_usuario.png" alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title">Usuários</h2>
                                </div>

                                <div class="card-body">
                                    <a href="Usuarios.php" class="card-link">Abrir</a>
                                </div>
                            </div>
                        </div> 

                        <div class='col-6'>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="Imagens/cadastro_produto.png" alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title">Produtos</h2>
                                </div>

                                <div class="card-body">
                                    <a href="Produtos.php" class="card-link">Abrir</a>
                                </div>
                            </div>
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