<?php
    include('PHP/sessao.php');
    include('cabecalho.php');
?>
                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Painel de controle</h1>
                </div> 
            </header>

            <main>
                <section class='row justify-content-center'>
                    <div class='row mt-5'>
                        <div class='col-sm-12 col-md-6 m-auto'>
                            <div class="card" style="width: 18rem;">
                            <a href="Usuarios.php"> <img class="card-img-top" src="Imagens/cadastro_usuario.png" alt="Cadastro de Usuários"> 
                                <div class="card-body">
                                    <h2 class="card-title">Usuários</h2>
                                </div>
                            </a>
                            </div>
                        </div> 

                        <div class='col-6'>
                            <div class="card" style="width: 18rem;">
                            <a href="Produtos.php"> <img class="card-img-top" src="Imagens/cadastro_produto.png" alt="Cadastro de Produtos">
                                <div class="card-body">
                                    <h2 class="card-title">Produtos</h2>
                                </div>
                            </a>
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