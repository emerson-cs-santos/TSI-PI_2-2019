<?php
    
    session_start();

    // Se já iniciou sessão, não precisa logar novamente
    if (isset($_SESSION['controle'])) 
    {
      header('Location: Index.php');
    }     
    
   // include('cabecalho.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Gamer Shopping</title>
    <meta charset="utf-8"> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Manual de uso referente aos alerts customizados "swal": https://sweetalert.js.org/guides/ -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- JQUERY-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>	
    
    <!--Form Modal do Login-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>    

    <link rel="stylesheet" href="css/Login.css">  
    
    <script src="JS/login.js"></script>
    <script src="JS/funcoes.js"></script>    
    <script src="JS/produtos.js"></script>  
    <script src="JS/deletar_ou_ativar.js"></script>
    <script src="JS/filtrar.js"></script>
</head>

<body>
    <div class='container'>
        <header class='row'>
            <div class="col-12">
                <nav id='navbar' class='navbar navbar-expand-lg navbar-light row'>

                    <a class="nav_link col-2" href='Index.php'><img src='Imagens/controle.png' alt='Logo do site' style='height:100px; width:100px;'></a>
                    
                    <a class='navbar-brand p-4 col-3' href='Index.php'>Home</a>

                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>

                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='nav nav-pills'> 

                            <li class='nav-item'>
                                <a class='nav-link' href='Painel.php'>Jogos</a>
                            </li>    

                            <?php

                                if (isset($_SESSION['controle']))
                                {
                                    $user = $_SESSION['controle'];
                                    echo "
                                        <li class='nav-item'>
                                                <a class='nav-link' href='PHP/sair.php'>Bem vindo! $user - Sair </a>
                                        </li>";
                                }
                                else
                                {
                                    echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='Login.php'>Bem vindo!           Entre ou se cadastre-se</a>
                                    </li> ";
                                }

                            ?>

                            <li class='nav-item'>
                                <a class='nav-link' href='Painel.php'>Painel</a>
                            </li>           
                        </ul>
                    </div>
                </nav>
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
                            <input type="text" id="novo_login" class="fadeIn second col-10" name="novo_login" placeholder="Novo Usuário">
                            <input type="email" id="novo_email" class="fadeIn second col-10" name="novo_email" placeholder="nome@server.com.br">
                        </div>
                        <div class="row">
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
                            <span class="glyphicon text-success">&#xe013;</span>
                            <label>Confirmar e-mail</label>
                            <div>
                                <span>Enviar código para o seu e-mail:</span>
                                <button type="button" class="btn btn-primary" data-dismiss="" onclick="teste()" >Enviar</button>                              
                            </div>

                            <span class="glyphicon text-danger">&#xe014;</span>
                            <label class='mt-4'>Confirmar código</label>
                            <div>
                                <span>Digite o código reebido:</span>
                                <input type="text" >
                                <button type="button" class="btn btn-primary" data-dismiss="" onclick="teste()" >Confirmar</button>                              
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
                                <button type="button" class="btn btn-primary" data-dismiss="" onclick="teste()" >Gravar</button>                                                 
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
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