<?php
try {
    // Establish the connection
    $conn = new PDO("sqlsrv:server = tcp:yousraserveur.database.windows.net,1433; Database = yousrabdd", "yousraadmin", "Yousramdp123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
