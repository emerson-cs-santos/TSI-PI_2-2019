<?php

// MODO POST
$codigo		=	@$_POST['codigo'];
$nome		=	@$_POST['nome'];
$status		=	@$_POST['status'];
$categoria	=	@$_POST['categoria'];
$preco		=	@$_POST['preco'];
$desconto	=	@$_POST['desconto'];
$estoque	=	@$_POST['estoque'];
$ean		=	@$_POST['ean'];
$descri		=	@$_POST['descri'];

if(!isset($codigo))
{
    $codigo = 0;
}

if(!isset($nome))
{
    $nome = '';
}

if(!isset($status))
{
    $status = '';
}

if(!isset($categoria))
{
    $categoria = '';
}

if(!isset($preco))
{
    $preco = 0;
}

if(!isset($desconto))
{
    $desconto = 0;
}

if(!isset($estoque))
{
    $estoque = 0;
}

if(!isset($ean))
{
    $ean = '';
}

if(!isset($descri))
{
    $descri = '';
}

include('funcoes.php');

// Validações de campos

// Char especial
if ( char_especial($codigo) or char_especial($nome) )
{
	echo "erro";
	return;	
}

// Campos vazios
if ( $nome == '' )
{
	echo "erro";
	return;	
}

$existe = false;

include('conexao_bd.php');

// Novo cadastro começa como ativo
if( $codigo==0 )
{
	$status = 'Ativo'; 
}

// VERIFICA SE JÁ EXISTE
$query = "select codigo from produtos where codigo = ?";
$querytratada = $conn->prepare($query); 
$querytratada->bind_param("i",$codigo);
$querytratada->execute();
$result = $querytratada->get_result();

if( $result->num_rows > 0)
{
	$existe = true;
}

if( $existe == true )
{	
	// Prevenção de injection
	$query = "	UPDATE 
					produtos 
				SET 
					nome		= ?
					,tipo		= ? 
					,categoria	= ?
					,preco		= ?
					,desconto	= ?
					,estoque	= ?
					,ean		= ?
					,descri		= ?
				where 
					codigo = ?	";	
	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("sssddissi",$nome,$status,$categoria,$preco,$desconto,$estoque,$ean,$descri,$codigo);

	$querytratada->execute();
	
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
else
{
	// Prevenção de injection
	$query = " INSERT INTO 
					produtos
					( 
						codigo
						,nome
						,tipo 
						,categoria
						,preco
						,desconto
						,estoque
						,ean
						,descri
					) 
				Values
					(
						?
						,?
						,?
						,?
						,?
						,?
						,?
						,?
						,?
					)";

	$querytratada = $conn->prepare($query); 
	$querytratada->bind_param("isssddiss",$codigo,$nome,$status,$categoria,$preco,$desconto,$estoque,$ean,$descri);

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

// FECHA CONEXAO
mysqli_close($conn);

// RETORNA RESULTADO
echo $resposta;
return;

?>


