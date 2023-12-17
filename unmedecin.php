<?php
include 'connexion.php'; // Include the database connection file

// Récupérer le nom du médecin à partir des paramètres de requête
$medecinName = $_GET['medecinName'];

// Exécuter une requête pour obtenir les détails du médecin
$sql = "SELECT medecinName, disponibilite, specialite, imageDoc FROM medecin WHERE medecinName = :medecinName";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':medecinName', $medecinName);
$stmt->execute();
$medecin = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si le médecin existe
if ($medecin) {
    // Output HTML content
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détails du Médecin</title>
        <link rel="stylesheet" href="bodystyle.css">
    </head>
    
    <body>
        <div>
            <h1>Détails du Médecin</h1>
            <p>Nom du médecin: <?php echo $medecin['medecinName']; ?></p>
            <p>Disponibilité: <?php echo $medecin['dispoinibilite']; ?></p>
            <p>Spécialité: <?php echo $medecin['specialite']; ?></p>
            <img src="<?php echo $room['imagePath'] . '?si=imanee&spr=https&sv=2022-11-02&sr=c&sig=zZGbqUZMIy3SuTjwwfVIkt996nMuPTppsZXGJp5VD0Q%3D'; ?>" alt="Room Image">
            <!-- Afficher l'image du médecin depuis Blob Storage -->
            <img src="<?php echo $medecin['imageDoc']; ?>" alt="Image du Médecin">
        </div>
    </body>
    
    </html>
    <?php
} else {
    // Médecin non trouvé, vous pouvez rediriger l'utilisateur ou afficher un message d'erreur
    echo "Médecin non trouvé.";
}
?>
