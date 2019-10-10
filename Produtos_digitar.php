<?php
include('PHP/sessao.php');
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

if($imagem == '')
{
    $imagem     =   'Imagens/produto_sem_imagem.jpg';
}

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

                        <form id='form_produtos' action="PHP/imagem.php" method="POST" enctype="multipart/form-data">

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
                                    <input value = "<?php echo $preco; ?>" name='' type="number" min="1" max="999999.99" class="form-control" id="produtos_digitar_preco" placeholder="Preço" >
                                </div>  

                                <div>
                                    <label>Desconto R$</label>
                                    <input value = "<?php echo $desconto; ?>" name='' type="number" min="1" max="999999.99" class="form-control" id="produtos_digitar_desconto" placeholder="Desconto" >
                                </div>      

							   <div class='col-xs-2'>
									<label>Estoque</label>
									<input value = "<?php echo $estoque; ?>" name='' type="number" min="1" max="999999" class="form-control" id="produtos_digitar_estoque" placeholder="Quantidade em Estoque" >
								</div>

                                <div>
                                    <label>EAN</label>
                                    <input value = "<?php echo $estoque; ?>" name='' type="text" class="form-control" id="produtos_digitar_ean" placeholder="Código de barras" >
                                </div>   

                                <form id='form_produtos' action="PHP/imagem.php" method="POST" enctype="multipart/form-data" class='mt-3'>
                                    <label>Imagem</label>
									<input name='acao' value= "<?php echo $acao; ?>" hidden='true'>
                                    <input name='codigo_imagem' value= "<?php echo $codigo; ?>" hidden='true'>
                                    <input id="produtos_digitar_inputfile" class="form-control" type="file" name="myFile" accept="image/png, image/jpeg, image/jpg" onchange="preview_image(event)" >
                                </form>

                                <div class='mt-3'>
                                    <img id="produtos_digitar_IMG_inputfile" class="form-control" style="height:500px; width:500px;" alt="Imagem do Produto" src=<?php echo $imagem; ?> >                                                                                                                                                                                         
                                </div>  
                                
                                <div class='mt-3'>
                                    <label>Descrição</label>
                                    <textarea name='' class="form-control" id="produtos_digitar_descri" placeholder = 'Descrição completa do produto'> <?php echo $descri; ?> </textarea>
                                </div>                     
                            </div>
                            
                            <!-- Esse botão usa JavaScript para validar e usa a página php 'novo_user' -->
                            <a id='' type="submit" name="" class="btn btn-primary btn-lg" onclick="cadastro_produto()"> Gravar</a>  
                            
                            <!-- Esse botão chama direto a página php que exibe os usuários -->
                            <a href='Produtos.php' id='' type="button" name="" class="btn btn-primary btn-lg"> Voltar</a>
                        </form>
                    </div>
                </section>

                <script>
                    // Deixando campo em branco para ser exibido o texto do placeholder
                    var produto_desc = document.getElementById("produtos_digitar_descri");
                   // produto_desc.innerHTML='';
                </script>                  
            </main>

        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>