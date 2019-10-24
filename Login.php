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
            <section>

                <div class="wrapper fadeInDown">  

                    <div id="formContent">

                        <!-- LOGIN -->
                        <form action="" id="form_login" method="get">
                            <input type="text" id="login" class="fadeIn second text_login" name="login" placeholder="Usuário">
                            <input type="password" id="senha" class="fadeIn third formatar_senha" style="text-align: center;" name="senha" placeholder="Senha">
                            
                        </form>
                        <a id='botao' type="button" name="btn_ajax" class="btn btn-primary btn-lg mt-2" onclick="login()">Entrar</a>

                        <!-- LEMBRAR SENHA -->
                        <div class='mt-3' id="formFooter">
                            <a class="underlineHover" href="#" data-toggle="modal" data-target="#myModal">Esqueceu sua senha?</a>
                        </div>

                        <!-- CADASTRAR -->
                        <div id="formFooter2">
                            <a class="underlineHover" href="#" onclick="abrir_novo_cadastro()">Não tem cadastro?
                                Cadastre-se!</a>
                        </div>
                    </div>


                    <!-- NOVO CADASTRO -->
                    <form action="" id='form_novo_cadastro' class="visible mt-5" hidden='true'>
                        <label class="l_novo_cadastro">Novo Cadastro</label>
                        <div class="row">
                            <div class="col-1"></div>
                            <input type="text" id="novo_login" class="fadeIn second col-10" name="novo_login" placeholder="Novo Usuário">
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <input type="password" id="nova_senha" class="fadeIn third formatar_senha col-5" name="nova_senha" placeholder="Nova Senha">                        
                            <input type="password" id="confirmar_senha" class="fadeIn third formatar_senha col-5" name="confirmar_senha" placeholder="Confirmar Senha">
                        </div>
                    </form>

                    <div class='mt-3' id='div_botao_cadastrar' hidden='true'>
                        <a id='cmd_cadastrar' type="button" name="cmd_cadastrar" class="btn btn-primary btn-lg" onclick="novo_cadastro('login')"> Cadastrar! </a>
                        <a id='cmd_cadastrar' type="button" name="cmd_cadastrar" class="btn btn-warning btn-lg" onclick="abrir_novo_cadastro()"> Cancelar </a>
                    </div>

                </div>

                <!-- Modal - Resetar Senha -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title">Siga os 4 passos abaixo para redefinir sua senha:</span>
                        </div>
                        <div class="modal-body">
                            <label>1 - Confirmar E-mail</label>
                            <div>
                                <span>Enviar código para o seu e-mail:</span>
                                <button type="button" class="btn btn-default" data-dismiss="" onclick="teste()" >Enviar</button>                              
                            </div>

                            <label class='mt-4'>2 - Confirmar código</label>
                            <div>
                                <span>Digite o código reebido:</span>
                                <input type="text" >
                                <button type="button" class="btn btn-default" data-dismiss="" onclick="teste()" >Confirmar</button>                              
                            </div>       

                            <label class='mt-4'>3 - Nova senha</label>
                            <div>
                                <span>Digite e confirme a nova senha</span>
                                <div>
                                    <input type="password" id="" class="" name="" placeholder="">                        
                                    <input type="password" id="" class="" name="" placeholder="">
                                </div>                            
                            </div>
                            
                            <label class='mt-4'>4 - Finalização</label>
                            <div>
                                <span>Enviar e salvar a nova senha</span>
                                <button type="button" class="btn btn-default" data-dismiss="" onclick="teste()" >Gravar</button>                                                 
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                        </div>
                    </div>
                </div> 

            </section>
           
        </main>

        <script>

        // Executa o login ao pressionar a tecla enter 
        $(document).ready(function()
        {
            $(document).keypress(function(e)
            {
                if(e.wich == 13 || e.keyCode == 13)
                {
                    if($("#form_novo_cadastro").css("display") == "block")
                    {
                        novo_cadastro('login');
                    }
                    else
                    {
                        login();
                    }
	            }
            })
        })

        function teste()
        {
            alert('teste1');
           
            var parametros = '';
            // Ajax com Jquery e está refazendo apenas a tabela 
			$.post('PHP/PHPMailer.php',parametros, function(data)
				{
					alert(data);
				}
			)            
        }


        </script>

        <?php
            include('footer.php');
        ?>
    </div>
</body>

</html>