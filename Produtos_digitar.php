<?php
$ID = $_GET['ID'];

//$ID = $_POST['ID'];

$acao   = '';

$codigo     =   0;
$nome       =   '';
$descri     =   '';
$categoria  =   '';
$imagem     =   '';
$preco      =   '';
$desconto   =   '';
$estoque    =   '';
$status     =   '';
$ean        =   '';

$descri = '';

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
    $acao       =   'INCLUIR';
    $status     =   'Ativo';
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
                                    <label class='badge-pill'>Código:</label>
                                    <input value = "<?php echo $codigo; ?>" name='' type="text" class="form-control" id="produtos_digitar_codigo" disabled>
                                </div>

                                <div>
                                    <label for=''>Status:</label>
                                    <input value = "<?php echo $status; ?>" name='txtSTATUS' type="text" class="form-control" id="produtos_digitar_status" disabled>
                                </div>                                 
                                
                                <div>
                                    <label>Produto</label>
                                    <input value = "<?php echo $nome; ?>" name='' type="text" class="form-control" id="produtos_digitar_nome" placeholder="Nome">
                                </div> 

                                <div>
                                    <label>Categoria</label>
                                    <input value = "<?php echo $categoria; ?>" name='' type="text" class="form-control" id="produtos_digitar_categoria" placeholder="Categoria">
                                </div>

                                <div>
                                    <label>Preço R$</label>
                                    <input value = "<?php echo $preco; ?>" name='' type="text" class="form-control" id="produtos_digitar_preco" placeholder="Preço" >
                                </div>  

                                <div>
                                    <label>Desconto R$</label>
                                    <input value = "<?php echo $desconto; ?>" name='' type="text" class="form-control" id="produtos_digitar_desconto" placeholder="Desconto" >
                                </div>      

                                <div>
                                    <label>Estoque</label>
                                    <input value = "<?php echo $estoque; ?>" name='' type="text" class="form-control" id="produtos_digitar_estoque" placeholder="Quantidade em Estoque" >
                                </div>        

                                <div>
                                    <label>EAN</label>
                                    <input value = "<?php echo $estoque; ?>" name='' type="text" class="form-control" id="produtos_digitar_estoque" placeholder="Código de barras" >
                                </div>   

                                <div class='mt-3'>
                                    <label>Imagem</label>
                                    <input id="produtos_digitar_inputfile" class="form-control" type="file" name="myFile" enctype="multipart/form-data"  accept="image/png, image/jpeg" >


                                    <a id='' type="button" name="" class="btn btn-primary btn-lg" onclick="tratar_imagem()"> Testar imagem com PHP ajax</a>  

                                    
                                    <img id="produtos_digitar_IMG_inputfile" class="form-control" src="Imagens/Car_1.png" style="height:40%;" alt="Imagem do Produto">
                                </div>                                                                                                                                                                                           
                               
                                <div class='mt-3'>
                                    <label>Descrição</label>
                                    <textarea rows="5" cols="50" value = "<?php echo $descri; ?>" name='' class="form-control" id="produtos_digitar_descri" placeholder = 'Descrição completa do  produto'> </textarea>
                                </div>

                                                       
                            </div>
                            
                            <!-- Esse botão usa JavaScript para validar e usa a página php 'novo_user' -->
                            <a id='' type="button" name="" class="btn btn-primary btn-lg" onclick="cadastro_produto()"> Gravar</a>  
                            
                            <!-- Esse botão chama direto a página php que exibe os usuários -->
                            <a href='Produtos.php' id='' type="button" name="" class="btn btn-primary btn-lg"> Voltar</a>
                        </form>
                    </div>
                </section>

                <script>
                    // Deixando campo em branco para ser exibido o texto do placeholder
                    var produto_desc = document.getElementById("produtos_digitar_descri");
                    produto_desc.innerHTML='';
                </script>                  
            </main>

        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>