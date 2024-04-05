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
    session_start();

    // Definieer de vragen
    $vragen = array(
        "Geef uw naam:",
        // Voeg hier de andere vragen toe
    );

    // Definieer punten per land voor het reisadvies
    $punten_per_land = array(
        "Frankrijk" => range(1, 44),
        "Thailand" => range(45, 89),
        "Verenigde Staten" => range(90, 134),
        "Kenia" => range(135, 179),
        "Australië" => range(180, 210)
    );

    // Verwerk de ingediende antwoorden en ken punten toe
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $antwoorden = array();
        $totaalPunten = 0;

        for ($i = 0; $i < count($vragen); $i++) {
            if (isset($_POST["antwoord$i"])) {
                $antwoord = $_POST["antwoord$i"];
                $punten = 10; // Elke vraag krijgt standaard 10 punten
                $antwoorden[] = $antwoord;
                $totaalPunten += $punten; // Voeg de punten toe aan het totaal
            }
        }

        $_SESSION['antwoorden'] = $antwoorden;
        $_SESSION['totaalPunten'] = $totaalPunten; // Sla het totaal aantal punten op in de sessie
    } elseif (!empty($_SESSION['antwoorden'])) {
        $antwoorden = $_SESSION['antwoorden'];
        $totaalPunten = $_SESSION['totaalPunten']; // Haal het totaal aantal punten op uit de sessie
    }

    // Functie om het reisadvies te bepalen op basis van behaalde punten
    function bepaalReisadvies($punten_per_land, $behaaldePunten) {
        foreach ($punten_per_land as $land => $punten) {
            if (in_array($behaaldePunten, $punten)) {
                return $land;
            }
        }
        return "Geen advies beschikbaar";
    }
    ?>

    <?php
    // Toon de ontvangen antwoorden
    if (!empty($antwoorden)) {
        echo "<h3>Ontvangen antwoorden:</h3>";
        echo "<ul>";
        foreach ($antwoorden as $key => $antwoord) {
            echo "<li>Vraag " . ($key + 1) . ": $antwoord</li>";
        }
        echo "</ul>";

        // Toon het totaal aantal punten
        echo "<h3>Totaal aantal punten:</h3>";
        echo "<p>$totaalPunten</p>";

        // Bereken het reisadvies
        $reisadvies = bepaalReisadvies($punten_per_land, $totaalPunten);

        // Toon het reisadvies
        echo "<h3>Reisadvies:</h3>";
        echo "<p>Omdat je $totaalPunten punten hebt behaald, is je reisadvies: $reisadvies</p>";
    } else {
        echo "<p>Er zijn geen antwoorden ontvangen.</p>";
    }
    ?>

</div>

</body>
</html>





