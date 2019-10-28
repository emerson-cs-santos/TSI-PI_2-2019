<?php

$login	= @$_POST['login'];

if (!isset($login))
{
    $login = '';
}

if ($login == '')
{
    echo 'erro';
    return false;
}

$senha	= @$_POST['senha'];

if (!isset($senha))
{
    $senha = '';
}

if ($senha == '')
{
    echo 'erro';
    return false;
}

include('conexao_bd.php');

$resposta = '';

$cod_reset = '';

$senha = md5($senha);

// Prevenção de injection
$query = " UPDATE USUARIOS SET cod_reset = ?, senha = ? where nome = ? ";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("sss",$cod_reset,$senha,$login);
$querytratada->execute();

//var_dump($conn->info);
// [info] => Rows matched: 1  Changed: 1  Warnings: 0

preg_match_all ('/(\S[^:]+): (\d+)/', $conn->info, $querytratada);
$info = array_combine ($querytratada[1], $querytratada[2]);	

// Linhas encontradas com base na condição da where
$linhas_encontradas = $info['Rows matched'];

// Linhas que foram alteradas, quando os dados não forem alterados, mesmo o comando estando certo, não é retornado linhas afetadas
$linhas_afetadas = $info['Changed'];

// Avisos de problemas
$avisos_problemas = $info['Warnings'];

//if ($querytratada->affected_rows > 0) 
if ($linhas_encontradas == '1' and $avisos_problemas == '0')
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


