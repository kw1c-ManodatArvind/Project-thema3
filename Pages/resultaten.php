
<?php
// Start de PHP-sessie om resultaten op te slaan
session_start();

// Definieer de vragen
$vragen = array(
    "Geef uw naam:",
    "Hoeveel dagen gaat u op vakantie?",
    "Hoe vaak boekt u een vakantie?",
    "Wat is uw favoriete vakantiebestemming?",
    "Welk type accommodatie verkiest u tijdens uw vakantie?",
    "Wat is uw belangrijkste factor bij het kiezen van een vakantiebestemming?",
    "Hoe lang van tevoren boekt u meestal uw vakantie?",
    "Wat is uw favoriete vervoermiddel tijdens een vakantie?",
    "Wat is uw budget voor een gemiddelde vakantie?",
    "Heeft u ooit een vakantie geboekt via een reisbureau?",
    "Hoe belangrijk is het voor u om te weten wat anderen van een vakantiebestemming vinden voordat u boekt?",
    "Wat voor soort activiteiten doet u het liefst tijdens uw vakantie?",
    "Hoe belangrijk is het voor u dat de vakantiebestemming kindvriendelijk is?",
    "Welk type weer prefereert u tijdens uw vakantie?",
    "Welk continent zou u graag willen verkennen tijdens uw volgende vakantie?",
    "Hoe ver wilt u reizen voor uw vakantie?",
    "Bent u bereid om een reisverzekering af te sluiten?",
    "Heeft u speciale dieetwensen of voedselrestricties?",
    "Bent u van plan om excursies te boeken tijdens uw vakantie?",
    "Hoe belangrijk is het voor u om lokale gerechten te proberen tijdens uw vakantie?",
    "Wat is uw favoriete vrijetijdsactiviteit?"
);

// Punten per land
$punten_per_land = array(
    "Frankrijk" => range(1, 4),
    "Thailand" => range(5, 8),
    "Verenigde Staten" => range(9, 13),
    "Kenia" => range(14, 17),
    "Australië" => range(18, 21)
);

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

    // Sla de antwoorden op in de sessie
    $_SESSION['antwoorden'] = $antwoorden;
} elseif (!empty($_SESSION['antwoorden'])) {
    // Als er al antwoorden in de sessie zijn opgeslagen, gebruik deze dan
    $antwoorden = $_SESSION['antwoorden'];
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

// Pagina-HTML begint hieronder
?>
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

        // Bereken totaal aantal punten
        $maxPunten = count($vragen);
        $behaaldePunten = count($antwoorden);
        $reisadvies = bepaalReisadvies($punten_per_land, $behaaldePunten);

        echo "<h3>Reisadvies:</h3>";
        echo "<p>Omdat je $behaaldePunten punten hebt behaald, is je reisadvies: $reisadvies</p>";
    } else {
        echo "<p>Er zijn geen antwoorden ontvangen.</p>";
    }
    ?>

</div>

</body>
</html>
