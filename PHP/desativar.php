<?php

$codigo = $_POST['codigo'];

echo $codigo;

include('conexao_bd.php');

// Prevenção de injection
$query = " UPDATE usuarios SET tipo = 'Inativo' WHERE codigo = ? ";

$querytratada = $conn->prepare($query); 
$querytratada->bind_param("i"$codigo);

$querytratada->execute();

if ($querytratada->affected_rows > 0) 
{
    $resposta = 'ok';
} 
else 
{
    $resposta = 'erro';
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;


?>