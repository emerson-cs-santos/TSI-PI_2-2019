<?php
    include('PHP/sessao.php');
    include('cabecalho.php');
    include('PHP\conexao_bd.php');

    $ID = $_GET['ID'];

    $query = " select * from produtos where codigo = $ID ";
    $result = $conn->query($query);   
    
    $row = $result->fetch_assoc();

    $imagem     =   $row["imagem"];
    $nome       =   $row["nome"];
    $codigo     =   $row["codigo"];
    $categoria  =   $row["categoria"];
    $preco      =   $row["preco"];
    $desconto   =   $row["desconto"];
    $estoque    =   $row["estoque"];

    $descri     =   $row["descri"];
    
    $status     =   $row["tipo"];
    $ean        =   $row["ean"];  
    
    if($imagem == '')
    {
        $imagem     =   'Imagens/controle.png';
    }    

?>

            <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;"> <?php echo $nome; ?> </h1>
        </div>
    </header>

<main >
    

    <section class="row">

        <div class="col-lg-6 col-sm-12 col-md-7" id="section_img">        
            <img src=<?php echo $imagem; ?> alt="produto" id="show_img">                
        </div>
    
        <div class="section_descricao col-lg-6 col-sm-12 col-md-5">
            
            <h2 style="font-family: Comic Sans MS , cursive, sans-serif;">Informações</h2>
            
            <div class="span_descricao">
                
                <div>
                    <span> Codigo: <?php echo $codigo; ?> </span>
                </div>

                <div>
                    <span> Categoria: <?php echo $categoria; ?> </span>
                </div>

                <div>
                    <span> Preço (R$): <?php echo $preco; ?> </span>
                </div>

                <div>
                    <span> Desconto (R$): <?php echo $desconto; ?> </span>
                <div>

                <div>
                    <span> Estoque: <?php echo $estoque; ?> </span>
                </div>
            </div>         
        </div>
    </section> 

    <section class="row mt-3">
        <span> <?php echo $descri; ?> </span>
    </section>  

    <section class="row mt-3" id="div_buttons">
            <input type="button" value="Ver outro" class="col-lg-3 col-md-12 col-sm-12">
            <input type="button" value="Comprar" class="col-lg-3 col-md-12 col-sm-12">
            <input type="button" value="Add Wish List" class="col-lg-3 col-md-12 col-sm-12"> 
    </section>     

</main>
    <?php
        include('footer.php');
    ?>
    </body>
</html>