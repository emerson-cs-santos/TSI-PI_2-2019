<?php  
    session_start();

    if (!isset($_SESSION['controle'])) 
    {
    header('Location: Login.php');
    } 
?>