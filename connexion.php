<?php
try {
    $serverName = "tcp:rdvserveur.database.windows.net,1433";
    $database = "rdv";
    $authentication = "Active Directory Default";  // Specify the authentication method

    $conn = new PDO(
        "sqlsrv:server = tcp:rdvserveur.database.windows.net,1433; Database = rdv",
       "chorouk.oulahyane@uir.ac.ma",
        "Loulouk002"
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
