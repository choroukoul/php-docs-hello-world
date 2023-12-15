<?php
try {
    // Establish the connection
    $conn = new PDO("sqlsrv:server = tcp:rdvserveur.database.windows.net,1433; Database = rdv", "hopital", "Vos51627");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
