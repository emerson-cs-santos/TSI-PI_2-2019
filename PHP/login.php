<?php

$login = $_GET['login'];
$senha = $_GET['senha'];

include('conexao_bd.php');

// tentar usar o md5
// https://www.php.net/manual/pt_BR/function.md5.php

// Verificar se login e senha estão corretos
$query = "select codigo from usuarios where nome = " . "'" . $login . "'" . ' and senha =' . "'" . $senha . "'";
$result = $conn->query($query);

// Se não for encontrado
if( $result->num_rows > 0 )
{
	echo 'ok';
	return;
}
else
{
	echo 'errado';
}

?>

