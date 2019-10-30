<?php

// MODO POST
$codigo		=	@$_POST['codigo'];

if(!isset($codigo))
{
    $codigo = 0;
}

$resposta = 'ok';

include('conexao_bd.php');

// VERIFICA SE JÁ EXISTE
$query = "select imagem from produtos where codigo = ?";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("i",$codigo);
$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$imagem  = $row["imagem"];

	if($imagem == '')
	{
		$resposta = 'erro';
	}
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>


