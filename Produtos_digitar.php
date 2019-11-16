<?php
include('PHP' . DIRECTORY_SEPARATOR . 'sessao.php');
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

    include('PHP' . DIRECTORY_SEPARATOR . 'conexao_bd.php');  

    $query = "select * from produtos where codigo = ?";
    $querytratada = $conn->prepare($query); 
    $querytratada->bind_param("i",$ID);
    $querytratada->execute();
    $result = $querytratada->get_result();   

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
                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Produtos - <?php echo $acao; ?></h1>
                </div> 
            </header>

            <main>
                <section class='row'>

                    <div class='col-12'>

                        <form action="PHP/imagem.php" method="POST" enctype="multipart/form-data">
                           
                            <div class="form-group row Status_Ativo">

                                <!-- 
                                    Controle de exibição de colunas do bootstrap:
                                    12 Colunas distribuidas em:
                                    Código = 6
                                    Status = 6 
                                -->                            
                                <div class='col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-3'>
                                    <label class='badge-pill'>Código</label>
                                    <input value = "<?php echo $codigo; ?>" name='produtos_digitar_codigo' type="text" class="form-control" id="produtos_digitar_codigo" disabled>
                                </div>

                                <div class='col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-3'>
                                    <label class='badge-pill'>Status</label>
                                    <input value = "<?php echo $status; ?>" name='produtos_digitar_status' type="text" class="form-control" id="produtos_digitar_status" disabled>
                                </div>                                 
                                
                                <div class='col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4' >
                                    <label class='badge-pill'>Produto*</label>
                                    <input value = "<?php echo $nome; ?>" name='produtos_digitar_nome' type="text" class="form-control" id="produtos_digitar_nome" maxlength="150" placeholder="Nome">
                                </div> 

                                <!-- 
                                    Controle de exibição de colunas do bootstrap:
                                    12 Colunas distribuidas em:
                                    Categoria = 5
                                    Preço = 3
                                    Desconto = 2
                                    Estoque = 2 
                                -->
                                <div class='col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-4'>
                                    <label>Categoria</label>
                                    <input value = "<?php echo $categoria; ?>" name='produtos_digitar_categoria' type="text" class="form-control" id="produtos_digitar_categoria" maxlength="20" placeholder="Categoria">
                                </div>

                                <div class='col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-4'>
                                    <label>Preço R$</label>
                                    <input value = "<?php echo $preco; ?>" name='produtos_digitar_preco' type="text"  class="form-control" id="produtos_digitar_preco" maxlength="10" placeholder="Preço">
                                </div>  

                                <div class='col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-4'>
                                    <label>Desconto R$</label>
                                    <input value = "<?php echo $desconto; ?>" name='produtos_digitar_desconto' type="text" class="form-control" id="produtos_digitar_desconto" maxlength="10" placeholder="Desconto" >
                                </div>      

							   <div class='col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-4'>
									<label>Estoque</label>
									<input value = "<?php echo $estoque; ?>" name='produtos_digitar_estoque' type="text" class="form-control" id="produtos_digitar_estoque" maxlength="9" placeholder="Quantidade em Estoque" >
								</div>

                                <!-- 
                                    Controle de exibição de colunas do bootstrap:
                                    12 Colunas distribuidas em:
                                    EAN = 12
                                -->                                 
                                <div class='col-sm-12 col-md12 col-lg-12 col-xl-12 mt-4'>
                                    <label>EAN</label>
                                    <input value = "<?php echo $ean; ?>" name='produtos_digitar_ean' type="text" class="form-control" id="produtos_digitar_ean" maxlength="150" placeholder="Código de barras" >
                                </div>  

                                <div class='col-12 col-sm-12 col-md12 col-lg-12 col-xl-12 mt-4'>
                                    <form action="PHP/imagem.php" method="POST" enctype="multipart/form-data" >
                                        <label>Imagem do produto</label>
                                        <input name='acao' value= "<?php echo $acao; ?>" hidden='true'>
                                        <input name='codigo_imagem' value= "<?php echo $codigo; ?>" hidden='true'>
                                        <input id="produtos_digitar_inputfile" class="form-control" type="file" name="myFile" accept="image/png, image/jpeg, image/jpg" onchange="preview_image(event)" >
                                    </form>
                                </div>

                                <div class='col-12 col-sm-12 col-md12 col-lg-12 col-xl-12 mt-4'>
                                    <img id="produtos_digitar_IMG_inputfile" class="form-control rounded mx-auto d-block img_extra_small_prod img_small_prod img_normal_prod" alt="Imagem do Produto" src=<?php echo $imagem; ?> >                                                                                                                                                                                         
                                </div>

                                <div class='col-12 col-sm-12 col-md12 col-lg-12 col-xl-12 mt-4'>
                                    <label>Descrição</label>
                                    <textarea name='produtos_digitar_descri' class="form-control" id="produtos_digitar_descri" maxlength="2300" placeholder = 'Descrição completa do produto'> <?php echo rtrim($descri); ?> </textarea>
                                </div> 

                            </div>
                            
                            <div class='central_botao'>
                                <a id='' type="submit" class="btn btn-primary btn-lg mt-3" onclick="cadastro_produto()"> Gravar</a> 
                                <span class='espaco_objetos' >.......</span>
                                <a href='Produtos.php' id='' type="button" class="btn btn-primary btn-lg mt-3"> Voltar</a>
                            </div>  
                        </form>
                    </div>
                </section>               
            </main>

            <script>

                // Máscara dos valores
                $(document).ready(function()
                {
                   $('#produtos_digitar_preco').mask("#.##0,00", {reverse: true});
                   $('#produtos_digitar_desconto').mask("#.##0,00", {reverse: true});
                   $('#produtos_digitar_estoque').mask("#.##0", {reverse: true});
                })

            </script>            

        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>