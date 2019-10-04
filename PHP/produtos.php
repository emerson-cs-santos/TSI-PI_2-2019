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

//$row = $result->fetch_assoc();
//$codigo  = $row["codigo"];	

if( $result->num_rows > 0)
{
	$existe = true;
}

// ATUALIZAR USUARIO
if( $existe == true )
{	
	// Prevenção de injection
	$query = "	UPDATE 
					PRODUTOS 
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
	
	if ($querytratada->affected_rows > 0) 
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
					PRODUTOS
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


