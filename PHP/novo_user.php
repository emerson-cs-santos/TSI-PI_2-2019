<?php

// MODO POST
$login	= $_POST['login'];
$senha	= $_POST['senha'];
$tipo	= $_POST['tipo'];
$codigo = $_POST['codigo'];
$status	= $_POST['status'];
$md5_alteracao	= $_POST['md5alteracao'];

// Colocando espaço, por conta de um erro do mysql/php, se não houver alguma alteração, o update não funciona.
$status = $status . ' ';

$existe = false;

include('conexao_bd.php');

// Se o código for zero, o cadastro pode vir da tela de login ou cadastro, mas deve-se validar pelo login
if( $codigo==0 )
{
	$query = " select codigo from usuarios where nome = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("s",$login);	
	
	$status = 'Ativo'; // Novo cadastro começa como ativo
}

// Se estiver na tela cadastro verifica pelo código
if($tipo=='cadastro' and $codigo > 0)
{
	$query = " select codigo from usuarios where codigo = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("i",$codigo);	
}

$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0 )
{
	$resposta = "existente";
	$existe = true;
}

// Se for inclusão ou se a senha foi alterada, precisa passar pelo MD5
if($existe == false or $md5_alteracao == 'SIM')
{
	$senha = md5($senha);
}


// ATUALIZAR USUARIO
// Apenas é possivel atualizar o cadastro pela tela de cadastro, tela de login só é possivel incluir.
if( $tipo =='cadastro' and $existe == true and $codigo > 0 )
{	

	// Prevenção de injection
	$query = " UPDATE USUARIOS SET nome = ? ,senha = ? , tipo = ? where codigo = ? ";
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


