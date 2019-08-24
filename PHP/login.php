<?php

$login = $_GET['login'];
$senha = $_GET['senha'];

if ($login == 'eu' && $senha =='spy')
{
	echo 'ok';
}
else
{
	echo 'errado';
}

?>

