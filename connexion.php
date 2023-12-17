<?php
try {
    // Specify the connection details
    $serverName = "tcp:rdvserveur.database.windows.net,1433";
    $database = "rdv";
    $username = "chorouk.oulahyane@uir.ac.ma";
    $password = NULL;

    // Construct the connection string with Active Directory Integrated Authentication
    $conn = new PDO(
        "sqlsrv:server=$serverName;Database=$database;MultipleActiveResultSets=False;Encrypt=True;TrustServerCertificate=False;Authentication=ActiveDirectoryIntegrated;",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 30, // Set query timeout if needed
        ]
    );
} catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
