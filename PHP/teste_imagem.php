<?php

// MODO POST
$url = $_POST['url'];

$img = 'teste_gravacao_imagem.png';  
  
// Function to write image into file 
$retorno  = file_put_contents($img, file_get_contents($url)); 

$resposta = 'ok';

// RETORNA RESULTADO
echo $resposta;
return;

?>