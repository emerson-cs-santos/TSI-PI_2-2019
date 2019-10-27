<?php

$login	= @$_POST['login'];

if (!isset($login))
{
    $login = '';
}

include('conexao_bd.php');

$resposta = 'nao';

$query = " select codigo from usuarios where nome = ? ";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("s",$login);	

$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0 )
{
	$resposta = "existente";
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>


