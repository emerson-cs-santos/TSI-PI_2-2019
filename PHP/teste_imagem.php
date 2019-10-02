<?php

return $_POST['arquivo'];
return $_FILES["myFile"]["name"];

// MODO POST
$url = $_POST['url'];

$img = 'teste_gravacao_imagem.png';  
  
// Function to write image into file 
$retorno  = file_put_contents($img, file_get_contents($url)); 

$resposta = 'ok';

// RETORNA RESULTADO
echo $resposta;
return;


// $arquivo_temp   = $_FILES["certificado"]["tmp_name"];
// $nome_arquivo   = $_FILES["certificado"]["name"];
// $tamanho        = $_FILES["certificado"]["size"];

// $extensao       = pathinfo($nome_arquivo, PATHINFO_EXTENSION);


//  $novoNome       = $nome_arquivo;
 
 
//  if(move_uploaded_file($arquivo_temp, [[NOME_DA_PASTA_DESTINO]].$novoNome)){
// 	echo true;
//  }
 

?>
