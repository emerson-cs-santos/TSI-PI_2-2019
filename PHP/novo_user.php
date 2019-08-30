<?php

$login = $_GET['login'];
$senha = $_GET['senha'];

include('conexao_bd.php');

// VERIFICA SE JÁ EXISTE
$query = "select codigo from usuarios where nome = " . "'" . $login . "'";
$result = $conn->query($query);

if( $result->num_rows > 0 )
{
	echo "existente";
	return;
}

// INSERIR NOVO USUARIO
$query = "INSERT INTO USUARIOS ( codigo, nome, senha ) Values ( " . "0" .  ",'" . $login . "'" . ",'" . $senha . "' )";

if ($conn->query($query) === TRUE) 
{
    $resposta = 'ok';
} 
else 
{
    echo 'erro';
	return;
	//echo "Falha ao executar comando: " . $sql . "<br>" . $conn->error;
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>


