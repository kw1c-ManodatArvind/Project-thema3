
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

    // Definieer punten per land voor het reisadvies
    $punten_per_land = array(
        "Frankrijk" => range(1, 44),
        "Thailand" => range(45, 89),
        "Verenigde Staten" => range(90, 134),
        "Kenia" => range(135, 179),
        "Australië" => range(180, 210)
    );

    // Definieer de afbeeldingen voor elk land
    $land_afbeeldingen = array(
        "Frankrijk" => "../images/Frankrijk.jpg",
        "Thailand" => "../images/thailand.jpg",
        "Verenigde Staten" => "../images/Usa.jpg",
        "Kenia" => "../images/Kenia.jpg",
        "Australië" => "../images/Australie.jpg"
    );

    // Definieer de links voor elk land
    $land_links = array(
        "Frankrijk" => "https://www.anwb.nl/vakantie/frankrijk/reisvoorbereiding",
        "Thailand" => "https://www.thuisvaccinatie.nl/bestemmingen/thailand/praktische-info/?msclkid=0c68fb78ddb01887a81e9d772d989fc6&utm_source=bing&utm_medium=cpc&utm_campaign=EFF%20-%20DSA&utm_term=Bestemmingen&utm_content=Bestemmingen",
        "Verenigde Staten" => "https://www.nederlandwereldwijd.nl/reisadvies/verenigde-staten-van-amerika",
        "Kenia" => "https://www.tourcompass.nl/kenia/reizen.htm?msclkid=9ef81f4ce7181c993c5b7943161a8b60&utm_source=bing&utm_medium=cpc&utm_campaign=1%20AFRICA%3A%20Kenya&utm_term=%2Bkenia%20%2Brondreis&utm_content=Kenia%20Rondreis",
        "Australië" => "https://www.tourcompass.nl/australie/reizen/hoogtepunten-van-australie-met-sydney-uluru-en-cairns.htm?msclkid=096b1b439e9b1d42a4f17d4c6fc358f6&utm_source=bing&utm_medium=cpc&utm_campaign=4%20OCEAN%3A%20Australia&utm_term=australi%C3%AB%20reizen&utm_content=Australi%C3%AB%20reizen."
    );

    // Verwerk de ingediende antwoorden en ken punten toe
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $antwoorden = array();
        $totaalPunten = 0;

        for ($i = 0; $i < count($vragen); $i++) {
            if (isset($_POST["antwoord$i"])) {
                $antwoord = $_POST["antwoord$i"];
                if ($i === 14) { // Controleer of het de vraag over het continent is
                    switch ($antwoord) {
                        case "Europa":
                            $punten = 40;
                            break;
                        case "Azië":
                            $punten = 80;
                            break;
                        case "Amerika":
                            $punten = 120;
                            break;
                        case "Afrika":
                            $punten = 160;
                            break;
                        case "Oceanie":
                            $punten = 200;
                            break;
                        default:
                            $punten = 0; // Geen geldig antwoord, dus geen punten
                    }
                } else {
                    $punten = 0; // Elke andere vraag krijgt standaard 0 punten
                }
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

        // Toon het reisadvies met de bijbehorende afbeelding
        echo "<h3>Reisadvies:</h3>";
        echo "<p>Omdat je $totaalPunten punten hebt behaald, is je reisadvies: $reisadvies</p>";
        echo "<p>Klik op het plaatje hieronder voor meer informatie:</p>";
        echo "<a href='" . $land_links[$reisadvies] . "' target='_blank'><img src='" . $land_afbeeldingen[$reisadvies] . "' alt='" . $reisadvies . "' style='max-width: 300px;'></a>";

    } else {
        echo "<p>Er zijn geen antwoorden ontvangen.</p>";
    }
    ?>

</div>

</body>
</html>
