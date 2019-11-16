<?php

// MODO POST
$login			= @$_POST['login'];
$senha			= @$_POST['senha'];
$tipo			= @$_POST['tipo'];
$codigo 		= @$_POST['codigo'];
$status			= @$_POST['status'];
$md5_alteracao	= @$_POST['md5alteracao'];
$email			= @$_POST['email'];

if(!isset($login))
{
    $login = '';
}

if(!isset($senha))
{
    $senha = '';
}

if(!isset($tipo))
{
    $tipo = '';
}

if(!isset($codigo))
{
    $codigo = 0;
}

if(!isset($status))
{
    $status = '';
}

if(!isset($md5_alteracao))
{
    $md5_alteracao = '';
}

if(!isset($email))
{
    $email = '';
}

include('funcoes.php');

// Validações de campos

// Tamanho mínimo da senha
if ( strlen($senha) < 6 )
{
	echo "erro";
	return;
}

// Char especial
if ( char_especial($login) )
{
	echo "erro";
	return;	
}

// Espaço
if ( valida_espaco($login) or valida_espaco($senha) or valida_espaco($email))
{
	echo "erro";
	return;	
}

// Campos vazios
if ( $login == '' or $senha == '' or $email == '')
{
	echo "erro";
	return;	
}

// Validar e-mail
if ( validar_email($email) )
{
	echo "erro";
	return;	
}

$existe = false;

// Não pode informar um e-mail já utilizado em outro cadastro
$email_invalido = false;

include('conexao_bd.php');

// Se o código for zero, o cadastro pode vir da tela de login ou cadastro, mas deve-se validar pelo login
if( $codigo==0 )
{
	$query = " select codigo from usuarios where nome = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("s",$login);	
	
	$status = 'Ativo'; // Novo cadastro começa como ativo
}

// Se estiver na tela cadastro verifica pelo código
if($tipo=='cadastro' and $codigo > 0)
{
	$query = " select codigo from usuarios where codigo = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("i",$codigo);	
}

$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0 )
{
	$resposta = "existente";
	$existe = true;
}

// Se for inclusão ou se a senha foi alterada, precisa passar pelo MD5
if($existe == false or $md5_alteracao == 'SIM')
{
	$senha = md5($senha . "Mutato Muzika");
}

// Verifica e-mail pois Não pode informar um e-mail já utilizado em outro cadastro
$query = " select email from usuarios where email = ? and not codigo = ? ";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("si",$email,$codigo);
$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0 )
{
	$resposta = "existente_email";
	$email_invalido = true;
}	


// ATUALIZAR USUARIO
// Apenas é possivel atualizar o cadastro pela tela de cadastro, tela de login só é possivel incluir.
if( $tipo =='cadastro' and $existe == true and $codigo > 0 and $email_invalido == false )
{	

	// Prevenção de injection
	$query = " UPDATE USUARIOS SET nome = ? ,senha = ? , tipo = ?, email = ? where codigo = ? ";
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("ssssi",$login,$senha,$status,$email,$codigo);

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

// INSERIR NOVO USUARIO
if( $existe == false and $codigo == 0 and $email_invalido == false)
{
	// Prevenção de injection
	$query = " INSERT INTO USUARIOS ( codigo, nome, senha, tipo, email ) Values (?, ?, ?, ?, ?)";

	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("issss",$codigo,$login,$senha,$status,$email);

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

// Se login foi cadastrado com sucesso pela tela de login, já pode iniciar sessão
if($tipo == 'login' and $resposta=='ok')
{
	session_start();
	$_SESSION['controle'] = ucwords($login);
}

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>


