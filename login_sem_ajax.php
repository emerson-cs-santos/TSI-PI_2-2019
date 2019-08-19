<?php

$login = $_GET['login'];
$senha = $_GET['senha'];

if ($login == 'eu' && $senha =='spy')
{
    header( 'Location: index.html' );
}
else
{
    header( 'Location: login.html' );
}


?>

