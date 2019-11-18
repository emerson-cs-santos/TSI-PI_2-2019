<?php  

session_start();
session_destroy();
header('Location: ..' . DIRECTORY_SEPARATOR . 'Index.php');

?>