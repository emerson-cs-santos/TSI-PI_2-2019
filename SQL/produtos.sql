-- TABELA DE PRODUTOS
CREATE TABLE IF NOT EXISTS PRODUTOS 
	(
		codigo		INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY
		,nome		VARCHAR(30) NOT NULL
		,descri		VARCHAR(300) NOT NULL
		,categoria	VARCHAR(20) NOT NULL
		,imagem		VARCHAR(200) NOT NULL
		,preco		DECIMAL(8,2) NOT NULL
		,desconto	DECIMAL(8,2) NOT NULL
		,estoque	INTEGER NOT NULL
		,tipo		VARCHAR(20) NOT NULL -- 'ATIVO'
		,ean		VARCHAR(20) NOT NULL
	);

-- insert into PRODUTOS (codigo,nome,descri,categoria,imagem,preco,desconto,estoque,tipo,ean) values (0,'teste','desc','cate','',25.5,2.5,14,'Ativo','eannn');