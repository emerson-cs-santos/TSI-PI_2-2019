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

                    <form id="formContent" class='formatarform'>

                        <!-- LOGIN -->
                        <div class="">
                            <input type="text"      id="login" class="fadeIn second formatar_campo mt-2" name="login" placeholder="Usuário">
                            <input type="password"  id="senha" class="fadeIn second formatar_campo mt-2" name="senha" placeholder="Senha">
                        </div>
                        
                        <a id='botao' type="button" name="btn_ajax" class="btn btn-primary btn-lg mt-2" onclick="login()">Entrar</a>

                        <!-- LEMBRAR SENHA -->
                        <div class='mt-2'>
                            <a class="underlineHover" href="#" data-toggle="modal" data-target="#myModal">Esqueceu sua senha?</a>
                        </div>

                        <!-- CADASTRAR -->
                        <div class="">
                            <a class="underlineHover" href="#" onclick="abrir_novo_cadastro()">Não tem cadastro? Cadastre-se!</a>
                        </div>

                    </form>

                    <!-- NOVO CADASTRO -->
                    <form id='form_novo_cadastro' class="formatarform visible" hidden='true'>
                        
                        <label class="font-weight-bold" >Novo Cadastro</label>
                        
                        <div class="mt-1">
                            <input type="text" id="novo_login" class="fadeIn second formatar_campo" name="novo_login" placeholder="Novo Usuário">
                        </div>
                        
                        <div class="mt-1">
                            <input type="email" id="novo_email" class="fadeIn second formatar_campo" name="novo_email" placeholder="nome@server.com.br">
                        </div>                        
                        
                        <div class="mt-1">
                            <input type="password" id="nova_senha" class="fadeIn second formatar_campo col-5" name="nova_senha" placeholder="Nova Senha">                        
                            <input type="password" id="confirmar_senha" class="fadeIn second formatar_campo col-5 mt-1" name="confirmar_senha" placeholder="Confirmar Senha">
                        </div>

                    </form>

                    <div class='mt-2' id='div_botao_cadastrar' hidden='true'>
                        <a id='cmd_cadastrar' type="button" name="cmd_cadastrar" class="btn btn-primary btn-lg" onclick="novo_cadastro('login')"> Cadastrar! </a>
                        <a id='cmd_cadastrar' type="button" name="cmd_cadastrar" class="btn btn-warning btn-lg" onclick="abrir_novo_cadastro()"> Cancelar </a>
                    </div>

                </div>

                <!-- Modal - Resetar Senha -->
                <div id="myModal" class="modal fade" role="dialog">

                    <div class="modal-dialog">

                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <span class="modal-title font-weight-bold">Siga os 4 passos abaixo para redefinir sua senha:</span>
                            </div>

                            <div class="modal-body">
                                <span class='font-weight-bold'>Status:</span> <span id='passo1' style='color:red;'> Pendente </span>
                                <div>
                                    <span>1 - Digite o nome do seu usuário:</span>
                                    <input type="text" id='login_usuario_reset' class='col-8' onblur='login_verif()' >
                                </div>                             

                                <div class='mt-2'>
                                    <span class='font-weight-bold'>Status:</span> <span id='passo2' style='color:red;'> Pendente </span>
                                    <div>
                                        <span>2 - Confirmar e-mail, Enviar código para o seu e-mail:</span>
                                        <button type="button" class="btn btn-primary" onclick="enviar_email()" >Enviar</button>  
                                    </div>
                                </div>
                         
                               
                                <div class='mt-2'>
                                    <span class='font-weight-bold'>Status:</span> <span id='passo3' style='color:red;'> Pendente </span>
                                    <div>
                                        <span>3 - Digite o código recebido:</span>
                                        <input type="text" id='login_codigo_email' class='col-2' >
                                        <button type="button" class="btn btn-primary" onclick="confimar_codigo()" >Confirmar</button> 
                                    </div>                             
                                </div>       

                                <div class='mt-2'>
                                    <span class='font-weight-bold'>Status:</span> <span id='passo4' style='color:red;'> Pendente </span>
                                    <div>
                                        <span>4 - Digite e confirme a nova senha:</span>
                                        <div>
                                            <input type="password" id="login_reset_senha">                        
                                            <input type="password" id="login_reset_nova_senha">
                                            <button type="button" class="btn btn-warning" onclick="nova_senha()" >Gravar</button>  
                                        </div> 
                                         
                                    </div>                           
                                </div>
                            </div>

                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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

        </script>

        <?php
            include('footer.php');
        ?>
    </div>
</body>

</html>