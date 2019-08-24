<?php


// Open a Connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
    echo 'errado';
} 

$login = $_GET['login'];
$senha = $_GET['senha'];

// VERIFICA SE JÁ EXISTE
$query = 
    'select 
        codigo
    from
        usuarios
    where
        nome = ' . $login
;

// Executa script
if (! ($conn -> query($query) === TRUE) ) 
{
   echo 'erro';
    // echo "Falha ao executar comando: " . $conn->error;
} 

if(mysqli_num_rows($query) > 0){
    echo "Existente";
}


// INSERIR NOVO USUARIO

$query = 
' INSERT INTO 
	USUARIOS 
	(
		codigo
		,nome
		,senha
	)
Values
    ( ' .
    
    '0' .
    ',' . $login .
    ',' . $senha .
   
    ');'
;

// Executa script
if (! ($conn -> query($query) === TRUE) ) 
{
    echo 'erro';
    //echo "Falha ao executar comando: " . $conn->error;
} 

mysqli_close($conn);

echo 'ok';


?>


