<?php
    include('cabecalho.php');
?>

                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Gamer Shopping</h1>
                </div> 
            </header>

            <main>
                <section class='row'>

                    <div class='col-12'>

                        <form action="" method="">

                            <label>Gerencimento do Produto (ACAO)</label>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input name='txtDS_PRODUTO' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" placeholder="Nome do produto">
                            </div>

                            <a id='cmd_gravar' type="button" name="cmd_gravar" onclick="cadastro()"> Gravar</a>
                        </form>
                    </div>
                </section>
            </main>

        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>