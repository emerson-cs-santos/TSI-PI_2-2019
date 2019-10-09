<?php

$acao   = @$_POST['acao']; // INCLUIR, ALTERAR OU DELETAR
$codigo = @$_POST['codigo_imagem'];

$arquivo_ok = false;
$destino = '';

// Verifica se um arquivo foi selecionado
if ( isset( $_FILES[ 'myFile' ][ 'name' ] ) && $_FILES[ 'myFile' ][ 'error' ] == 0 )
{
	$arquivo_ok = true;
}

if ($arquivo_ok == false)
{
	return false;
}

// CONECTAR AO BANCO DE DADOS E SALVAR CAMINHO GERADO DA IMAGEM
include('conexao_bd.php');

// Se estiver alterando o cadastro, deleta a imagem anterior e depois vai ser salva uma nova.
if($acao == 'ALTERAR')
{
	$query = "select imagem from produtos where codigo = ?";
    $querytratada = $conn->prepare($query); 
    $querytratada->bind_param("i",$codigo);
    $querytratada->execute();
    $result = $querytratada->get_result();

    if( $result->num_rows > 0)
    {
		$row    = $result->fetch_assoc();
        $imagem = '../' . $row["imagem"];
    }    

    // Deleta imagem do servidor
    @unlink($imagem);
}

// Gravar nova imagem na pasta do servidor
// Verifica se foi enviado um arquivo
$ok = true;
if ( $arquivo_ok == true ) 
{
    // Arquivo              = $_FILES[ 'myFile' ][ 'name' ]
    // Tipo do arquivo      = $_FILES[ 'myFile' ][ 'type' ]
    // Caminho temporário   = $_FILES[ 'myFile' ][ 'tmp_name' ]
    // Tamanho do arquivo   = $_FILES[ 'myFile' ][ 'size' ]
 
    // Arquivo temporário
    $arquivo_tmp = $_FILES[ 'myFile' ][ 'tmp_name' ];
    
    // Arquivo
    $nome = $_FILES[ 'myFile' ][ 'name' ];

    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );

    // Somente imagens, .jpg, .jpeg, .png
    // Pesquisar dentro da String e verificar se o arquivo é um dos tipos aceitos
    if ( strstr ( '.jpg;.jpeg;.png', $extensao ) ) 
    {
        //  Essa parte abaixo:
            // - Cria um nome único para esta imagem
            // - Evita que duplique as imagens no servidor 
            // - Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . '.' . $extensao;

        // Concatena a pasta com o nome
        $destino = '../imagens/' . $novoNome;

        // Tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) 
        {
            // Arquivo salvo com sucesso!
            // $destino
        }
        else
        {
            $ok = false;
            // echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão na pasta de destino.<br />';
        }
    }
    else
    {
        $ok = false;
        // echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    }
}
else
{
    $ok = false;
    // echo 'Você não enviou nenhum arquivo!';
}

// Tirando os 2 pontos da string utilizados para salvar a imagem acima na pasta certa de imagens
$imagem_final = substr($destino,3);

// Se ocorrer algum problema com a gravação da imagem na pasta no servidor, gravar no campo de imagem do banco de dados em branco, pois assim será possivel validar depois e avisar ao usuário
if($ok == false)
{
    $imagem_final = '';
}

// Se for inclusão é preciso pegar último Código incluso
if($acao == 'INCLUIR')
{
    $query = "select max(codigo) as 'codigo' from produtos";
    $result = $conn->query($query);

    if( $result->num_rows > 0)
    {
        $row    = $result->fetch_assoc();
        $codigo = $row["codigo"];
    }
}

// Atualiza caminho da imagem
$query = "  UPDATE 
                PRODUTOS 
            SET 
                imagem = ?
            where 
                codigo = ?	";	
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("si",$imagem_final,$codigo);
$querytratada->execute();

if ($querytratada->affected_rows > 0) 
{
   // echo 'Sucesso ao gravar caminho da imagem no banco de dados!'
} 
else 
{
    // echo 'Falha ao gravar caminho da imagem no banco!'
}

?>