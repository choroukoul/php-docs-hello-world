<?php
try {
    $serverName = "tcp:rdvserveur.database.windows.net,1433";
    $database = "rdv";
    $authentication = "Active Directory Default";  // Specify the authentication method

    $conn = new PDO("sqlsrv:server=$serverName;Database=$database;Authentication=$authentication", null, null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
