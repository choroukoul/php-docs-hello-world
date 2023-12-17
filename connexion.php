<?php
try {
    // Specify the connection details
    $serverName = "tcp:rdvserveur.database.windows.net,1433";
    $database = "rdv";
    $username = "chorouk.oulahyane@uir.ac.ma"; // This should be the Windows username (e.g., domain\username) or a SQL Server login if needed
    //$password = "{your_password}"; // This is optional for Windows authentication

    // Construct the connection string with Active Directory Integrated Authentication
    $conn = new PDO(
        "sqlsrv:server=$serverName;Database=$database;MultipleActiveResultSets=False;Encrypt=True;TrustServerCertificate=False;Authentication=ActiveDirectoryIntegrated;",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
