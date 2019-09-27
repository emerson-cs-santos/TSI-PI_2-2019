 <?php
  
  $arquivo_temp   = $_FILES["certificado"]["tmp_name"];
$nome_arquivo   = $_FILES["certificado"]["name"];
$tamanho        = $_FILES["certificado"]["size"];

$extensao       = pathinfo($nome_arquivo, PATHINFO_EXTENSION);


 $novoNome       = $nome_arquivo;
 
 
 if(move_uploaded_file($arquivo_temp, [[NOME_DA_PASTA_DESTINO]].$novoNome)){
	echo true;
 }
 
 
 
							
<?php