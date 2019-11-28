 -- BANCO DE DADOS
DROP DATABASE IF EXISTS SENAC_PI;
CREATE DATABASE IF NOT EXISTS SENAC_PI;

USE SENAC_PI;

-- Habilitar update no banco de dados
SET SQL_SAFE_UPDATES = 0;

-- TABELA DE USUARIOS
CREATE TABLE IF NOT EXISTS usuarios 
	(
		codigo		INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY
		,nome		VARCHAR(20) NOT NULL
		,senha		VARCHAR(200) NOT NULL
		,tipo		VARCHAR(20) NOT NULL
		,email		VARCHAR(200) NOT NULL
		,cod_reset	VARCHAR(100) NOT NULL
	);

-- TABELA DE PRODUTOS
CREATE TABLE IF NOT EXISTS produtos 
	(
		codigo		INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY
		,nome		VARCHAR(150) NOT NULL
		,descri		VARCHAR(2500) NOT NULL
		,categoria	VARCHAR(20) NOT NULL
		,imagem		VARCHAR(200) NOT NULL
		,preco		DECIMAL(8,2) NOT NULL
		,desconto	DECIMAL(8,2) NOT NULL
		,estoque	INTEGER NOT NULL
		,tipo		VARCHAR(20) NOT NULL -- 'ATIVO'
		,ean		VARCHAR(150) NOT NULL
	);

-- Inserindo usuarios padrões
    -- Admin
    insert into usuarios ( codigo, nome, senha, tipo, email, cod_reset) values (0, 'Admin', 'e5728637c78232c0e8faff438d5c7127', 'Ativo', 'senacpi2.2019@gmail.com', '' );

    -- Emerson
    insert into usuarios ( codigo, nome, senha, tipo, email, cod_reset) values (0, 'Emerson', 'e5728637c78232c0e8faff438d5c7127', 'Ativo', 'emersoncs@outlook.com.br', '' );

    -- Djalma
    insert into usuarios ( codigo, nome, senha, tipo, email, cod_reset) values (0, 'Djalma', 'e5728637c78232c0e8faff438d5c7127', 'Ativo', 'djalmafreire@outlook.com', '' );


-- Inserindo produtos Modelo
    -- Resident Evil 3
    insert into produtos ( codigo, nome, descri, categoria, imagem, preco, desconto, estoque, tipo, ean ) 
        values (
                    0
                    ,'Resident Evil 3 - NEMESIS'
                    ,'Resident Evil 3: Nemesis, conhecido no Japao como Biohazard 3: Last Escape, sendo um jogo eletronico de survival horror desenvolvido e publicado pela Capcom, disponibilizado originalmente para o PlayStation em 1999. O terceiro jogo da franquia Resident Evil, e ocorre antes e depois dos acontecimentos de Resident Evil 2.'
                    ,'PlayStation' 
                    ,'imagens\\Produto_Modelo_1.png'
                    ,299.99
                    ,80.58
                    ,140
                    ,'Ativo'
                    ,'5901234123457'
                );

    -- Advance Wars 4
    insert into produtos ( codigo, nome, descri, categoria, imagem, preco, desconto, estoque, tipo, ean ) 
        values (
                    0
                    ,'Advance Wars 4'
                    ,'Advance Wars: Days of Ruin, disponibilizado como Advance Wars: Dark Conflict na Europa e na Australia, sendo um videogame de estrategia baseado em turnos para o console portatil Nintendo DS.'
                    ,'Nintendo DS' 
                    ,'imagens\\Produto_Modelo_2.jpg'
                    ,250.85
                    ,10.15
                    ,54
                    ,'Ativo'
                    ,'2301854123414'
                );    

    -- Capcom Vs SNK
    insert into produtos ( codigo, nome, descri, categoria, imagem, preco, desconto, estoque, tipo, ean ) 
        values (
                    0
                    ,'Capcom Vs SNK'
                    ,'Serie que abrange uma vasta gama de personagens de videogames da Capcom e da SNK. A terminologia "serie vs." origina do fato de diversos jogos serem de luta.'
                    ,'Dream Cast' 
                    ,'imagens\\Produto_Modelo_3.jpg'
                    ,450.20
                    ,9.99
                    ,25
                    ,'Ativo'
                    ,'9601234123447'
                );    

    -- Megaman Zero 3
    insert into produtos ( codigo, nome, descri, categoria, imagem, preco, desconto, estoque, tipo, ean ) 
        values (
                    0
                    ,'Megaman Zero 3'
                    ,'Nesta terceira parte da aventura, depois de Zero vencer o comandante Elpizo, o Dark Elf um programa de enorme poder que causou as Elf Wars, ainda pode estar vivo.'
                    ,'Game Boy Advance' 
                    ,'imagens\\Produto_Modelo_4.png'
                    ,99.99
                    ,5.10
                    ,3203
                    ,'Ativo'
                    ,'4151234123895'
                );    

    -- Road Rash 3
    insert into produtos ( codigo, nome, descri, categoria, imagem, preco, desconto, estoque, tipo, ean ) 
        values (
                    0
                    ,'Road Rash 3'
                    ,'Jogo de corrida desenvolvido pela Monkey Do Productions e publicado pela Electronic Arts exclusivamente para a Mega Drive em 1995.'
                    ,'Mega-Drive' 
                    ,'imagens\\Produto_Modelo_5.jpg'
                    ,120
                    ,2.50
                    ,19
                    ,'Ativo'
                    ,'74501234123685'
                );    