<?php

// MODO GET
//$login = $_GET['login'];
//$senha = $_GET['senha'];

// MODO POST
$login = $_POST['login'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];
$codigo = $_POST['codigo'];

$existe = false;

include('conexao_bd.php');

// VERIFICA SE JÁ EXISTE
$query = "select codigo from usuarios where nome = " . "'" . $login . "'";
$result = $conn->query($query);

if( $result->num_rows > 0 and $tipo == 'login')
{
	echo "existente";
	return;
}

if( $result->num_rows > 0 )
{
	$existe = true;
}

// ATUALIZAR USUARIO
if($tipo =='cadastro' and $existe = true )
{
	
	//$query = "UPDATE USUARIOS SET nome = '{$login}', senha = '{$senha}'	where codigo = {$codigo}";	

	// Preveção de injection
	$query = " UPDATE USUARIOS SET nome = ?,senha = ? where codigo = ? ";

	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("ssi",$login,$senha,$codigo);

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
	
	$query = "INSERT INTO USUARIOS ( codigo, nome, senha ) Values ( " . "0" .  ",'" . $login . "'" . ",'" . $senha . "' )";

	if ($conn->query($query) === TRUE) 
	{
		$resposta = 'ok';
	} 
	else 
	{
		$resposta = 'erro';
		// echo 'erro';
		//return;
		//echo "Falha ao executar comando: " . $sql . "<br>" . $conn->error;
	}	
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>


