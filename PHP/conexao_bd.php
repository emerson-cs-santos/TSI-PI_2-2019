<?php

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

?>