<?php
try {
    // Specify the Azure AD authentication details
    $serverName = "tcp:rdvserveur.database.windows.net,1433";
    $database = "rdv";
    $clientId = "30912fd0-28ef-450c-a43a-c6902b6883a5";
    $clientSecret = "d2d26786-82fa-4764-9aac-f8d2ef7165be";
    $tenantId = "3bd72a86-a8ea-44a6-a899-f3cccbedf027";
    $username = "chorouk.oulahyane@uir.ac.ma";
    $password = "Loulouk002"; // The user's password

    // Construct the connection string with Azure AD authentication
    $conn = new PDO(
        "sqlsrv:server=$serverName;Database=$database;",
        NULL,
        NULL,
        [
            PDO::SQLSRV_ATTR_AUTHENTICATION => PDO::SQLSRV_AUTH_AZURE_AD,
            PDO::SQLSRV_ATTR_CLIENT_ID => $clientId,
            PDO::SQLSRV_ATTR_CLIENT_SECRET => $clientSecret,
            PDO::SQLSRV_ATTR_TENANT_ID => $tenantId,
        ]
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>

