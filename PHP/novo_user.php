<?php

// MODO POST
$login	= $_POST['login'];
$senha	= $_POST['senha'];
$tipo	= $_POST['tipo'];
$codigo = $_POST['codigo'];
$status	= $_POST['status'];

$senha = md5($senha);

$existe = false;

include('conexao_bd.php');

// Se o código for zero, o cadastro pode vir da tela de login ou cadastro, mas deve-se validar pelo login
if( $codigo==0 )
{
	$query = "select codigo from usuarios where nome = " . "'" . $login . "'";
	$status = 'Ativo'; // Novo cadastro começa como ativo
}

// Se estiver na tela cadastro verifica pelo código
if($tipo=='cadastro' and $codigo > 0)
{
	$query = "select codigo from usuarios where codigo = " . $codigo;
}

// Verifica se cadastro existe
$result = $conn->query($query);

if( $result->num_rows > 0 )
{
	$resposta = "existente";
	$existe = true;
}


// ATUALIZAR USUARIO
// Apenas é possivel atualizar o cadastro pela tela de cadastro, tela de login só é possivel incluir.
if( $tipo =='cadastro' and $existe == true and $codigo > 0 )
{	
	// Prevenção de injection
	$query = " UPDATE USUARIOS SET nome = ?,senha = ?, tipo = ? where codigo = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("sssi",$login,$senha,$status,$codigo);

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
if( $existe == false and $codigo == 0)
{
	
	// Prevenção de injection
	$query = " INSERT INTO USUARIOS ( codigo, nome, senha, tipo ) Values (?, ?, ?, ?)";

	$querytratada = $conn->prepare($query); 
	//$codigo = '0';
	$querytratada->bind_param("isss",$codigo,$login,$senha,$status);

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


