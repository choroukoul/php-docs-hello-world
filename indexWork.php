<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connexion.php'; // Include the database connection file

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Check if the user exists
        $sql = "SELECT idUser FROM user_ WHERE UserName = :username AND pass = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user !== false) {
            $_SESSION['userId'] = $user['idUser'];
            // Redirect to the desired page 
            header("Location: Medecinrdv.php");
            exit();
        } else {
            // Invalid credentials or user not found
            header("Location: Medecinrdv.php"); // You can redirect to a login page or display an error message if needed
            exit();
        }
    } catch (PDOException $e) {
        // Log the error
        error_log("Error checking user credentials: " . $e->getMessage());
        // Return an error response if needed
        http_response_code(500);
        exit();
    }
} else {
    // Invalid request method
    header("Location: Medecinrdv.php");
    exit();
}
?>
