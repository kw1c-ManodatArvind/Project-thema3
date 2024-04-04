<?php include('includes/vragen.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tui website</title>
    <link rel="stylesheet" href="../styles/Vragenlijst.css">
    <script src="../scripts/script.js" defer></script>
</head>
<body>
<div class="navbar" style="background-color: #71cbf4;">
    <a href="../index.php"><img src="../images/logo.png" alt="Logo" class="logo"></a>
    <button class="menu-toggle" aria-label="Menu openen/sluiten">&#9776;</button>
    <ul class="nav-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="resultaten.php">Resultaten</a></li>
        <li><a href="ServiceContact.php">Service & Contact</a></li>
        <li><a href="Vliegtickets.php">Vliegtickets</a></li>
        <li><a href="Vragenlijst.php">Vragenlijst</a></li>
    </ul>
</div>

<?php
// Begroeting op basis van het tijdstip van de dag
date_default_timezone_set('Europe/Amsterdam');
$hour = date('H');
$greeting = '';

if ($hour >= 6 && $hour < 12) {
    $greeting = 'Goedemorgen!';
} elseif ($hour >= 12 && $hour < 18) {
    $greeting = 'Goedemiddag!';
} else {
    $greeting = 'Goedenavond!';
}

echo "<h2>$greeting Vul de vragenlijst in:</h2>";
echo "<p>Bedankt dat je de tijd neemt om onze vragenlijst in te vullen. Jouw feedback is waardevol voor ons!</p>";
?>

<form method="post" action="resultaten.php">
    <?php
    // Loop door de vragen en toon ze met de opties
    for ($i = 0; $i < count($vragen); $i++) {
        echo "<p>Vraag " . ($i + 1) . ": " . $vragen[$i] . "</p>";

        // Controleer of de vraag radiobuttons moet hebben
        if ($i == 16 || $i == 17 || $i == 18 || $i == 19 || $i == 20) {
            // Toon radiobuttons voor specifieke vragen
            foreach ($opties[$i] as $optie) {
                echo "<label><input type='radio' name='antwoord$i' value='$optie' required> $optie</label><br>";
            }
        } elseif ($i == 1) {
            // Toon antwoordopties voor vraag 2
            echo "<select name='antwoord$i'>";
            echo "<option value='' selected>Klik hier om jouw antwoord te selecteren</option>";
            foreach ($opties[$i] as $optie) {
                echo "<option value='" . $optie . "'>" . $optie . "</option>";
            }
            echo "</select><br>";
        } elseif ($i == 0) {
            // Toon een tekstveld voor de eerste vraag
            echo "<input type='text' name='antwoord$i' required><br>";
        } else {
            // Toon een dropdownmenu voor andere vragen
            echo "<select name='antwoord$i'>";
            echo "<option value='' selected>Klik hier om jouw antwoord te selecteren</option>";
            foreach ($opties[$i] as $optie) {
                echo "<option value='" . $optie . "'>" . $optie . "</option>";
            }
            echo "</select><br>";
        }
    }
    ?>

    <input type="submit" name="submit" value="Verzend">
</form>

</body>
</html>
