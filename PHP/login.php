<?php

// MODO GET
//$login = $_GET['login'];
//$senha = $_GET['senha'];

// MODO POST
$login = $_POST['login'];
$senha = $_POST['senha'];

include('conexao_bd.php');

// tentar usar o md5
// https://www.php.net/manual/pt_BR/function.md5.php

// Verificar se login e senha estão corretos
$query = "select codigo,tipo from usuarios where nome = " . "'" . $login . "'" . ' and senha =' . "'" . $senha . "'";
$result = $conn->query($query);

// Verifica se login e senha existem
if( $result->num_rows > 0 )
{
	$resposta = 'ok';
}
else
{
	$resposta = 'errado';
}

// Verifica se registro está inativo
$row = $result->fetch_assoc(); 
$status = $row["tipo"];

if($status=='Inativo')
{
	$resposta = 'Inativo';
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>

