<?php

$cod_random	= @$_POST['cod_random'];

if (!isset($cod_random))
{
    $cod_random = '';
}

if ($cod_random == '')
{
    echo 'erro';
    return false;
}

include('conexao_bd.php');

$resposta = '';

$query = " select cod_reset from usuarios where cod_reset = ? ";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("s",$cod_random);	

$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0 )
{
    $resposta = "ok";
}
else
{
    $resposta = 'nao'; 
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>


