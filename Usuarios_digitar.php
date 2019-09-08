<?php
$ID = $_GET['ID'];

$usuario='';
$senha='';
$codigo=0;
$acao='';

if($ID > 0)
{
    $acao='ALTERAR';

    include('PHP\conexao_bd.php');

    $query = "select * from usuarios where codigo = " . $ID;
    $result = $conn->query($query);   
    
    $row = $result->fetch_assoc();

    $codigo = $row["codigo"];

    $usuario=$row["nome"];
    
    $senha=$row["senha"];    
}
else
{
    $acao='INCLUIR';
}

echo $ID;
?>  

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Gamer Shopping - Produtos</title>
        <meta charset="utf-8"> 

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="JS/login.js"></script>
        <script src="JS/funcoes.js"></script>
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

                        <form action="" method="">

                            <label id='titulo'>Gerenciamento do usuario <?php echo $acao; ?> </label>

                            <div class="form-group">

                                <div>
                                    <label>Código:</label>
                                    <input value = "<?php echo $codigo; ?>" name='txtCODIGO' type="text" class="form-control" id="usuarios_digitar_codigo" aria-describedby="" placeholder="" disabled>
                                </div>
                                
                                <label>Usuário</label>
                                <input value = "<?php echo $usuario; ?>" name='txtDS_LOGIN' type="text" class="form-control" id="usuarios_digitar_login" aria-describedby="" placeholder="Login">
                                
                                <label class="mt-3" >Senha</label>
                                <input value = "<?php echo $senha; ?>" name='txtDS_SENHA' type="password" class="form-control" id="usuarios_digitar_senha" aria-describedby="" placeholder="Senha">
                                <small id="emailHelp" class="form-text text-muted">Senha deve ter, no mínimo 6 caracteres</small>                                
                            </div>
                            
                            <!-- Esse botão usa JavaScript para validar e usa a página php 'novo_user' -->
                            <a id='cmd_gravar' type="button" name="cmd_gravar" class="btn btn-primary btn-lg" onclick="novo_cadastro('cadastro')"> Gravar</a>  
                            
                            <!-- Esse botão chama direto a página php que exibe os usuários -->
                            <a href='Usuarios.php' id='cmd_voltar' type="button" name="cmd_voltar" class="btn btn-primary btn-lg"> Voltar</a>
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