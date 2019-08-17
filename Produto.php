<?php 

    echo('teste');

    $teste = $_POST['txtDS_PRODUTO'];

    echo($teste);

    $dbhost = 	"DESKTOP-2O5UUOI"; 
    $db =		"PI_2";
    $user = 	"DESKTOP-2O5UUOI\Emerson";
    $password = "";
    $dsn = 		"Driver={SQL SERVER};Server=$dbhost;Port=1433;Database=$db;";
    $db = mysqli_connect( $dbhost, $user, $password, $db);

    $serverName = "DESKTOP-2O5UUOI"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"PI_2", "UID"=>"Emerson", "PWD"=>"");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

?>