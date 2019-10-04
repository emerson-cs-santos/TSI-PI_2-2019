<?php
    include('PHP/sessao.php');
    include('cabecalho.php');
?>
<h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">"Nome do produto?"</h1>
</div>
</header>
<main >
    <div class="row">
    <section class="col-lg-6 col-sm-12 col-md-7" id="section_img">        
            <img src="Imagens/controle.png" alt="produto" id="show_img">                
    </section>
    <section class="section_descricao col-lg-6 col-sm-12 col-md-5">
        <h2 style="font-family: Comic Sans MS , cursive, sans-serif;">Descrição</h2>
        <div class="span_descricao">
            <div >
                <span>
                    Codigo:
                </span>
                <span>
                    ????????
                </span>
            </div>
            <div>
                <span >
                    Categoria:
                </span>
                <span>
                    ????????
                </span>
            </div>
            <div>
                <span>
                    Preço:
                </span>
                <span>
                    ????????
                </span>
            </div>
            <div>
                <span>
                    Desconto:
                </span>
                <span>
                    ????????
                </span>
                <div>
                    <span>
                        Estoque:
                    </span>
                    <span>
                        ????????
                    </span>
                </div>
            </div>
        </div>         
    </section>
    </div>
    <div class="row" id="div_buttons">
        <input type="button" value="Editar" class="col-lg-3 col-md12 col-sm-12">
        <input type="button" value="Inativar" class="col-lg-3 col-md12 col-sm-12">
        <input type="button" value="Exibir outro" class="col-lg-3 col-md12 col-sm-12"> 
    </div> 

</main>
<?php
include('footer.php');
?>
</body>
</div>
</head>
<!--codigo		INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY
		,nome		VARCHAR(30) NOT NULL
		,descri		VARCHAR(50) NOT NULL
		,categoria	VARCHAR(20) NOT NULL
		,imagem		blob NOT NULL
		,preco		decimal(8,2) NOT NULL
		,desconto	decimal(8,2) NOT NULL
		,estoque	INTEGER NOT NULL
		,tipo		VARCHAR(20) NOT NULL -- 'ATIVO'
        ,ean		VARCHAR(20) NOT NULL
-->

</html>