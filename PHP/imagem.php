<?php
// $destino = '../imagens/' . $_FILES['myFile']['name'];
 
// $arquivo_tmp = $_FILES['myFile']['tmp_name'];

// move_uploaded_file( $arquivo_tmp, $destino  );

// CONECTAR AO BANCO DE DADOS E SALVAR CAMINHO GERADO DA IMAGEM

// Controlar o fluxo de imagens
	// Inserir
	// Atualizar
	// Deletar
	
$acao = @$_POST['acao'];
echo $acao;

if($acao == 'ALTERAR')
{
	//return false;
}

// deletar
$deletar = 'C:\xampp\htdocs\TSI-PI_2-2019\Imagens\ 15704529835d9b35f7e6090.jpg';
@unlink($deletar);



//verifica se foi enviado um arquivo
if ( isset( $_FILES[ 'myFile' ][ 'name' ] ) && $_FILES[ 'myFile' ][ 'error' ] == 0 ) {
    echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'myFile' ][ 'name' ] . '</strong><br />';
    echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'myFile' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'myFile' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'myFile' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
    $arquivo_tmp = $_FILES[ 'myFile' ][ 'tmp_name' ];
    $nome = $_FILES[ 'myFile' ][ 'name' ];
 
  //  Pega a extensão
   $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    //Converte a extensão para minúsculo
   $extensao = strtolower ( $extensao );
 
    //Somente imagens, .jpg;.jpeg;.gif;.png
    //Aqui eu enfileiro as extensões permitidas e separo por ';'
    //Isso serve apenas para eu poder pesquisar dentro desta String
   if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
      //  Cria um nome único para esta imagem
       // Evita que duplique as imagens no servidor.
        //Evita nomes com acentos, espaços e caracteres não alfanuméricos
       $novoNome = uniqid ( time () ) . '.' . $extensao;
 
        //Concatena a pasta com o nome
       $destino = '../imagens / ' . $novoNome;
 
        //tenta mover o arquivo para o destino
       if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
           echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
           echo ' < img src = "' . $destino . '" />';
       }
       else
           echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
   }
   else
       echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
   echo 'Você não enviou nenhum arquivo!';

?>