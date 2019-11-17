<?php
    
    session_start();

    // Se já iniciou sessão, não precisa logar novamente
    if (isset($_SESSION['controle'])) 
    {
      header('Location: Index.php');
    }     
    
    include('cabecalho.php');
?>

                <h1 id='h1' class="text-center H1_titulo">Acesso restrito</h1>
            </div>
        </header>

        <main>
            <section>

                <div class="wrapper fadeInDown">  

                    <form id="formContent" class='formatarform'>

                        <h2 class='H2_titulo'>Login Gamer</h2>

                        <!-- LOGIN -->
                        <div>
                            <input type="text"      id="login" class="fadeIn first formatar_campo mt-2" name="login" placeholder="Usuário" data-placement="top" data-toggle="tooltip" title="Digite nome do seu login">
                            <input type="password"  id="senha" class="fadeIn second formatar_campo mt-2" name="senha" placeholder="Senha" data-placement="top" data-toggle="tooltip" title="Digite sua senha">
                        </div>
                        
                        <input id='botao' type="button" name="btn_ajax" class="fadeIn third btn btn-primary btn-lg mt-2" Value = "Entrar" data-placement="top" data-toggle="tooltip" title="Acessar Gamer Shopping">

                        <!-- LEMBRAR SENHA -->
                        <div class='mt-2'>
                            <a class="underlineHover fadeIn fourth" href="#" data-toggle="modal" data-target="#myModal" data-placement="top" data-type="tooltip" title="Clique aqui para resetar sua senha">Esqueceu sua senha?</a>
                        </div>

                        <!-- CADASTRAR -->
                        <div>
                            <a class="underlineHover fadeIn fourth" href="#" onclick="abrir_novo_cadastro()" data-placement="top" data-toggle="tooltip" title="Clique para criar um acesso ao site">Não tem cadastro? Cadastre-se!</a>
                        </div>

                    </form>

                    <!-- NOVO CADASTRO -->
                    <form id='form_novo_cadastro' class="formatarform visible" hidden>
                        
                        <label class="font-weight-bold" >Novo Cadastro</label>
                        
                        <div class="mt-1">
                            <input type="text" id="novo_login" class="fadeIn first formatar_campo" name="novo_login" placeholder="Novo Usuário" maxlength="20" data-placement="top" data-toggle="tooltip" title="Digite o novo usuário">
                        </div>
                        
                        <div class="mt-1">
                            <input type="email" id="novo_email" class="fadeIn second formatar_campo" name="novo_email" placeholder="nome@server.com.br" maxlength="200" data-placement="top" data-toggle="tooltip" title="Digite seu e-mail">
                        </div>                        
                        
                        <div class="mt-1">
                            <input type="password" id="nova_senha" class="fadeIn third formatar_campo col-5" name="nova_senha" placeholder="Nova Senha" maxlength="50" data-placement="top" data-toggle="tooltip" title="Defina uma senha">                        
                            <input type="password" id="confirmar_senha" class="fadeIn third formatar_campo col-5 mt-1" name="confirmar_senha" placeholder="Confirmar Senha" maxlength="50" data-placement="top" data-toggle="tooltip" title="Digite novamente a senha">
                            <small class="form-text font-weight-bold fadeIn third" >Senha deve ter no mínimo 6 caracteres</small> 
                        </div>

                    </form>

                    <div class='mt-2' id='div_botao_cadastrar' hidden>
                        <input id='cmd_cadastrar' type="button" name="cmd_cadastrar" class="btn btn-primary btn-lg fadeIn fourth" Value = "Cadastrar!" data-placement="top" data-toggle="tooltip" title="Efeutar cadastro">
                        <input id='cmd_cadastrar_cancelar' type="button" name="cmd_cadastrar_cancelar" class="btn btn-warning btn-lg fadeIn fourth" Value = "Cancelar" data-placement="top" data-toggle="tooltip" title="Cancelar cadastro">
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
                                    <input type="text" id='login_usuario_reset' class='col-8' oninput='login_verif()' maxlength="20" data-placement="top" data-toggle="tooltip" title="Digite o nome do seu login" >
                                </div>                             

                                <div class='mt-2'>
                                    <span class='font-weight-bold'>Status:</span> <span id='passo2' style='color:red;'> Pendente </span>
                                    <div>
                                        <span>2 - Confirmar e-mail, Enviar código para o seu e-mail:</span>
                                        <button type="button" class="btn btn-primary" onclick="enviar_email()" data-placement="top" data-toggle="tooltip" title="Enviar código para o e-mail cadastrado" >Enviar</button>  
                                    </div>
                                </div>
                         
                               
                                <div class='mt-2'>
                                    <span class='font-weight-bold'>Status:</span> <span id='passo3' style='color:red;'> Pendente </span>
                                    <div>
                                        <span>3 - Digite o código recebido:</span>
                                        <input type="text" id='login_codigo_email' class='col-3' maxlength="100" data-placement="top" data-toggle="tooltip" title="Verifique seu e-mail para obter o código" >
                                        <button type="button" class="btn btn-primary" onclick="confimar_codigo()" data-placement="top" data-toggle="tooltip" title="Confirmar código recebido" >Confirmar</button> 
                                    </div>                             
                                </div>       

                                <div class='mt-2'>
                                    <span class='font-weight-bold'>Status:</span> <span id='passo4' style='color:red;'> Pendente </span>
                                    <div>
                                        <span>4 - Digite e confirme a nova senha:</span>
                                        <div>
                                            <input type="password" id="login_reset_senha" disabled maxlength="50" data-placement="top" data-toggle="tooltip" title="Digite a nova senha">                        
                                            <input type="password" id="login_reset_nova_senha" disabled maxlength="50" data-placement="top" data-toggle="tooltip" title="Confirme a nova senha">
                                            <button type="button" class="btn btn-warning" onclick="nova_senha()" data-placement="top" data-toggle="tooltip" title="Resetar senha">Gravar</button>  
                                        </div> 
                                         
                                    </div>                           
                                </div>
                            </div>

                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-placement="top" data-toggle="tooltip" title="Cancelar procedimento de troca de senha">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div> 

            </section>
        </main>

        <script>

        // Adiciona evento de click nos botões
        $('#botao').click(function()
        {
            login();
        })

        // Adiciona evento de click nos botões
        $('#cmd_cadastrar').click(function()
        {
            novo_cadastro('login');
        })
        
        // Adiciona evento de click nos botões
        $('#cmd_cadastrar_cancelar').click(function()
        {
            abrir_novo_cadastro();
        })        
        
        
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