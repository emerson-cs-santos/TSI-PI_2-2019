<?php
    
    session_start();

    // Se já iniciou sessão, não precisa logar novamente
    if (isset($_SESSION['controle'])) 
    {
      header('Location: Index.php');
    }     
    
    include('cabecalho.php');
?>
                <h1 id='h1' class="text-center" style="font-family: Comic Sans MS , cursive, sans-serif; color:#ffffff;">Acesso restrito</h1>
            </div>
        </header>

        <main>
            <section class="wrapper fadeInDown">
                <div id="formContent">

                    <!-- LOGIN -->
                    <form action="" method="get">
                        <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuário">
                        <input type="password" id="senha" class="fadeIn third" style="text-align: center;" name="senha" placeholder="Senha">
                        
                    </form>
                    <a id='botao' type="button" name="btn_ajax" class="btn btn-primary btn-lg mt-2" onclick="login()">Entrar</a>

                    <!-- LEMBRAR SENHA -->
                    <div class='mt-3' id="formFooter">
                        <a class="underlineHover" href="#">Esqueceu sua senha?</a>
                    </div>

                    <!-- CADASTRAR -->
                    <div id="formFooter2">
                        <a class="underlineHover" href="#" onclick="abrir_novo_cadastro()">Não tem cadastro?
                            Cadastre-se!</a>
                    </div>
                </div>


                <!-- NOVO CADASTRO -->
                <form action="" id='form_novo_cadastro' class="visible mt-5" hidden='true'>
                    <label>Novo Cadastro</label>
                    <div class="row">
                    <input type="text" id="novo_login" class="fadeIn second col-12" name="novo_login" placeholder="Novo Usuário">
                    </div>
                    <div class="row">
                    <input type="password" id="nova_senha" class="fadeIn third col-6" name="nova_senha" placeholder="Nova Senha">
                    <input type="password" id="confirmar_senha" class="fadeIn third col-6" name="confirmar_senha" placeholder="Confirmar Nova Senha">
                    </div>
                </form>

                <div class='mt-3' id='div_botao_cadastrar' hidden='true'>
                    <a id='cmd_cadastrar' type="button" name="cmd_cadastrar" class="btn btn-primary btn-lg" onclick="novo_cadastro('login')"> Cadastrar! </a>
                </div>

            </section>
        </main>

        <?php
            include('footer.php');
        ?>
    </div>
</body>

</html>