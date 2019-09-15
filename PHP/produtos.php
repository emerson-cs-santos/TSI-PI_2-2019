<?php

// MODO POST
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$status	= $_POST['status'];

$existe = false;

include('conexao_bd.php');

// Novo cadastro começa como ativo
if( $codigo==0 )
{
	$status = 'Ativo'; 
}

// VERIFICA SE JÁ EXISTE
$query = "select codigo from produtos where codigo = " .  $codigo;
$result = $conn->query($query);

if( $result->num_rows > 0)
{
	$existe = true;
}

// ATUALIZAR USUARIO
if( $existe == true )
{	
	// Prevenção de injection
	$query = " UPDATE PRODUTOS SET nome = ?,tipo = ? where codigo = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("ssi",$nome,$status,$codigo);

	$querytratada->execute();
	
	if ($querytratada->affected_rows > 0) 
	{
		$resposta = 'ok';
	} 
	else 
	{
		$resposta = 'erro';
	}

}

// INSERIR NOVO USUARIO
else
{
	// Prevenção de injection
	$query = " INSERT INTO PRODUTOS ( codigo, nome, tipo ) Values (?, ?, ?)";

	$querytratada = $conn->prepare($query); 
	//$codigo = '0';
	$querytratada->bind_param("iss",$codigo,$nome,$status);

	$querytratada->execute();
	
	if ($querytratada->affected_rows > 0) 
	{
		$resposta = 'ok';
	} 
	else 
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


