<?php

$codigo = $_POST['codigo'];
$status='Inativo';

include('conexao_bd.php');

// Ver se já está inativo, se tiver ativar
$query = "select tipo from usuarios where codigo = " . $codigo;

// Verifica se cadastro existe
$result = $conn->query($query);

if( $result->num_rows > 0 )
{
    $row           = $result->fetch_assoc();  
    $status_banco  = $row["tipo"];

    if($status_banco=='Inativo')
    {
        $status = 'Ativo';
    }
    else
    {
        $status = 'Inativo';
    }

}

// Prevenção de injection
$query = " UPDATE usuarios SET tipo = ? WHERE codigo = ? ";

 $querytratada = $conn->prepare($query); 
 $querytratada->bind_param("si",$status,$codigo);

$querytratada->execute();

if ($querytratada->affected_rows > 0) 
{
    $resposta = $status;
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