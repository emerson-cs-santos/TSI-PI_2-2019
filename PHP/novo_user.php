<?php

$login = $_GET['login'];
$senha = $_GET['senha'];

// Open a Connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SENAC_PI";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
    echo 'errado';
	return;
} 

// SELECIONAR BANCO QUE VAMOS TRABALHAR
$query = 'use SENAC_PI';
$result = $conn->query($query);

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


