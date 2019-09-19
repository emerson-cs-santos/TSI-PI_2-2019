<?php
$ID = $_GET['ID'];

//$ID = $_POST['ID'];

$acao   = '';

$nome   = '';
$codigo = 0;
$status = '';

if($ID > 0)
{
    $acao='ALTERAR';

    include('PHP\conexao_bd.php');

    $query = "select * from produtos where codigo = " . $ID;
    $result = $conn->query($query);   
    
    $row = $result->fetch_assoc();

    $codigo     =   $row["codigo"];
    $nome       =   $row["nome"];
    $descri     =   $row["descri"];
    $categoria  =   $row["categoria"];
    $imagem     =   $row["imagem"];
    $preco      =   $row["preco"];
    $desconto   =   $row["desconto"];
    $estoque    =   $row["estoque"];
    $status     =   $row["tipo"];
    $ean        =   $row["ean"];
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
                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Produtos</h1>
                </div> 
            </header>

            <main>
                <section class='row'>

                    <div class='col-12'>

                        <form action="" method="">

                            <label id='titulo'>Produtos - <?php echo $acao; ?> </label>

                            <div class="form-group">

                                <div>
                                    <label>Código:</label>
                                    <input value = "<?php echo $codigo; ?>" name='' type="text" class="form-control" id="produtos_digitar_codigo" aria-describedby="" placeholder="" disabled>
                                </div>

                                <div>
                                    <label for=''>Status:</label>
                                    <input value = "<?php echo $status; ?>" name='txtSTATUS' type="text" class="form-control" id="produtos_digitar_status" aria-describedby="" placeholder="" disabled>
                                </div>                                 
                                
                                <label>Produto</label>
                                <input value = "<?php echo $nome; ?>" name='' type="text" class="form-control" id="produtos_digitar_nome" aria-describedby="" placeholder="Nome do Produto">

                                <div>
                                    <label>Descrição</label>
                                    <input value = "<?php echo $descri; ?>" name='' type="text" class="form-control" id="produtos_digitar_descri" aria-describedby="" placeholder="Descrição do Produto">                                
                                </div>                        
                            </div>
                            
                            <!-- Esse botão usa JavaScript para validar e usa a página php 'novo_user' -->
                            <a id='' type="button" name="" class="btn btn-primary btn-lg" onclick="cadastro_produto()"> Gravar</a>  
                            
                            <!-- Esse botão chama direto a página php que exibe os usuários -->
                            <a href='Produtos.php' id='' type="button" name="" class="btn btn-primary btn-lg"> Voltar</a>
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