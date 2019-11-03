<?php

// MODO POST
$login = @$_POST['login'];

if(!isset($login))
{
    $login = '';
}

$senha = @$_POST['senha'];

if(!isset($senha))
{
    $senha = '';
}

$senha = md5($senha . "Mutato Muzika");

include('conexao_bd.php');

// Verificar se login e senha estão corretos
$query = " select codigo,tipo from usuarios where nome = ? and senha = ? ";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("ss",$login,$senha);
$querytratada->execute();
$result = $querytratada->get_result();

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

