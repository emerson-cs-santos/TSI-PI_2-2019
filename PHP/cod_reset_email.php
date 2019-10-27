<?php

$login	= @$_POST['login'];

if (!isset($login))
{
    $login = '';
}

include('conexao_bd.php');

$resposta = '';
$email  = '';
$cod_random = '';

$query = " select email from usuarios where nome = ? ";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("s",$login);	

$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0 )
{
    $row        = $result->fetch_assoc();
    $email      = $row["email"];

    $cod_random = '';

	// Prevenção de injection
	$query = " UPDATE USUARIOS SET cod_reset = ? where nome = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("ss",$cod_random,$login);
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
}
else
{
    $resposta = 'nao';
}

$vetor_resposta['status']       = $resposta;
$vetor_resposta['cod_random']   = $cod_random;
$vetor_resposta['email']        = $email;

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo json_encode($vetor_resposta);
return;

?>