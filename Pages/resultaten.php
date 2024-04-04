<?php include('includes/vragen.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tui website</title>
    <link rel="stylesheet" href="../styles/cruises.css">
</head>
<body>
<div class="navbar" style="background-color: #71cbf4;">
    <a href="../index.php"><img src="../images/logo.png" alt="Logo" class="logo"></a>
    <ul class="nav-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="resultaten.php">Resultaten</a></li>
        <li><a href="ServiceContact.php">Service & Contact</a></li>
        <li><a href="Vliegtickets.php">Vliegtickets</a></li>
        <li><a href="Vragenlijst.php">Vragenlijst</a></li>
    </ul>
</div>

<div class="container">
    <h2>Resultaten van de vragenlijst:</h2>

    <?php
    // Controleer of het formulier is ingediend
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialiseer een array om de antwoorden op te slaan
        $antwoorden = array();

        // Loop door de vragen en haal de antwoorden op
        for ($i = 0; $i < count($vragen); $i++) {
            // Controleer of er een antwoord is ingevuld voor de huidige vraag
            if (isset($_POST["antwoord$i"])) {
                // Voeg het antwoord toe aan de array
                $antwoorden[] = $_POST["antwoord$i"];
            }
        }

        // Controleer of er antwoorden zijn ontvangen
        if (!empty($antwoorden)) {
            // Nu kun je de logica voor het verwerken van de antwoorden uitvoeren
            // Hieronder wordt een eenvoudig voorbeeld gegeven
            // Dit kun je aanpassen aan jouw specifieke behoeften
            // In dit voorbeeld worden de antwoorden gewoon weergegeven
            echo "<h3>Ontvangen antwoorden:</h3>";
            echo "<ul>";
            foreach ($antwoorden as $key => $antwoord) {
                echo "<li>Vraag " . ($key + 1) . ": $antwoord</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Er zijn geen antwoorden ontvangen.</p>";
        }
    } else {
        echo "<p>Geen formulier verzonden.</p>";
    }
    ?>

</div>

</body>
</html>
