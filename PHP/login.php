<?php

// MODO POST
$login = $_POST['login'];
$senha = $_POST['senha'];

$senha = md5($senha);

include('conexao_bd.php');

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


// Se login estiver correto, cria a sessão
if($resposta == 'ok')
{
	session_start();
	$_SESSION['controle'] = ucwords($login);
}

// RETORNA RESULTADO
echo $resposta;
return;

?>

