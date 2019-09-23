<?php
include('cabecalho.php');
?>
<h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">"Nome do produto?"</h1>
</div>
</header>
<main class="row">
    <section class="col-6">
        <img src="Imagens/controle.png" alt="produto">
    </section>
    <section class="col-6">
        <h2 style="font-family: Comic Sans MS , cursive, sans-serif;" class="section_descricao">Descrição</h2>
        <div class="span_descricao">
            <span>
                Codigo do produto:
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
    </section>

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