<?php
include 'connexion.php'; // Include the database connection file

$sql = "SELECT * FROM medecin";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medecin rendez-vous</title>
    <link rel="stylesheet" href="bodystyle.css">
</head>

<body>
    <div>
        <h1>Bienvenue dans la reservation de medecin</h1>
        <p>choisissez un medecin selon vos besoins:</p>

        <!-- PHP code to fetch and display meds -->
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<div>';
            echo '<p>Nom medecin: ' . $row['medecinName'] . '</p>';
            echo '<p>Disponibilite: ' . $row['disponibilite'] . '</p>';
            echo '<p>specialite: ' . $row['specialite'] . '</p>';
            // Add a link to view med details
            echo '<a href="unmedecin.php?medecinName=' . $row['medecinName'] . '">voir le détail</a>';

            echo '</div>';
        }
        ?>
    </div>
</body>

</html>

