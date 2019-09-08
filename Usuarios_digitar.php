<?php
$ID = $_GET['ID'];

//$ID = $_POST['ID'];

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

//echo $ID;
?>  

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