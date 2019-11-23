<?php
include('PHP' . DIRECTORY_SEPARATOR . 'sessao.php');
include('cabecalho.php');

include('PHP' . DIRECTORY_SEPARATOR . 'conexao_bd.php');

$ID = $_GET['ID'];

$query = "select * from produtos where codigo = ?";
$querytratada = $conn->prepare($query);
$querytratada->bind_param("i", $ID);
$querytratada->execute();
$result = $querytratada->get_result();

$row = $result->fetch_assoc();

$imagem     =   $row["imagem"];
$nome       =   $row["nome"];
$codigo     =   $row["codigo"];
$categoria  =   $row["categoria"];
$preco      =   $row["preco"];
$desconto   =   $row["desconto"];
$estoque    =   $row["estoque"];

$descri     =   rtrim($row["descri"]);

$status     =   $row["tipo"];
$ean        =   $row["ean"];

if ($imagem == '') {
    $imagem     =   'Imagens/controle.png';
}

$imagem = str_replace('\\','/',$imagem);

?>

<h1 class="text-center H1_titulo mt-3"> <?php echo $nome; ?> </h1>
</div>
</header>

<main>
    <section class="row">
        <div class='col-12'>
    
            <div class="row">

                <div class="col-lg-6 col-sm-12 col-md-7 mt-5" id="section_img">
                    <img src=<?php echo $imagem; ?> alt="produto" class=' form-control rounded mx-auto d-block img_extra_small_show_prod img_small_show_prod img_normal_show_prod'>
                </div>

                <div class="section_descricao col-lg-6 col-sm-12 col-md-5 mt-5 div_border">

                    <h2 class="h2_show H2_titulo">Informações</h2>

                    <div class="span_info_produto">

                        <div>
                            <span> Codigo: <?php echo $codigo; ?> </span>
                        </div>

                        <div>
                            <span> Categoria: <?php echo $categoria; ?> </span>
                        </div>

                        <div>
                            <span class='font-weight-bold'> Preço: <?php echo 'R$' . number_format($preco, 2, ',', '.') ; ?> </span>
                        </div>
                        
                        <div>
                            <span> Desconto: <?php echo 'R$' . number_format($desconto, 2, ',', '.'); ?> </span>
                        </div>

                        <div>
                            <span> Estoque: <?php echo number_format($estoque , 0, ',', '.'); ?> </span>
                        </div>

                    </div>
                    <div class='row produto_descricao campos_div_border'>

                        <div class='col-12'>
                            <h3>Descrição</h3>
                        </div>
                        
                       <div>
                            <span> <?php echo $descri; ?> </span>
                       </div>
                       
                    </div>
                   
                </div>
            </div>

            <div class="row mt-3" id="div_buttons">

                <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                    <input type="button" value="Ver outro" class="btn btn-primary btn_produto" id='botao_show_produtos_ver_outro' data-placement="top" data-toggle="tooltip" title="Voltar a lista de produtos">
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                    <input type="button" value="Comprar" class="btn btn-primary btn_produto" id='botao_show_produtos_comprar' data-placement="top" data-toggle="tooltip" title="Botão apenas demonstrativo">
                </div>
                
                <div class="col-lg-4 col-md-12 col-sm-12 mt-2">
                    <input type="button" value="Add Wish List" class="btn btn-primary btn_produto" id='botao_show_produtos_ver_wishlist' data-placement="top" data-toggle="tooltip" title="Botão apenas demonstrativo">
                </div>

            </div>

        </div>
    </section>
</main>

<script>
    // Adiciona evento de click nos botões
    $('#botao_show_produtos_ver_outro').click(function()
    {
        window.open("Produtos.php",'_self');
    })   
    
    $('#botao_show_produtos_comprar').click(function()
    {
        swal(
                    {
                        title: "Obrigado!",
                        text: "Produto adicionado ao carrinho de compras!",
                        icon: "success",
                        button: "OK",
                    }
                )
    })  
    
    $('#botao_show_produtos_ver_wishlist').click(function()
    {
        swal(
                    {
                        title: "Adicionado!",
                        text: "Produto adicionado na lista de desejos padrão.",
                        icon: "success",
                        button: "OK",
                    }
                )
    })          
</script>

<?php
    include('footer.php');
?>
        </div>
    </body>
</html>