<!--
Auteur: Danijel Jovanovic
Datum: 9-4-2024
-->

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tui website</title>
    <link rel="stylesheet" href="../styles/resultaten.css">
</head>
<body>
<div class="navbar">
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
    $vragen = array(
        "Geef uw naam:",
        // Voeg hier de andere vragen toe
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

    $punten_per_land = array(
        "Frankrijk" => range(40, 60),
        "Thailand" => range(61, 81),
        "Verenigde Staten" => range(82, 102),
        "Kenia" => range(103, 123),
        "Australië" => range(124, 144)
    );

    $land_afbeeldingen = array(
        "Frankrijk" => "../images/Frankrijk.jpg",
        "Thailand" => "../images/thailand.jpg",
        "Verenigde Staten" => "../images/Usa.jpg",
        "Kenia" => "../images/Kenia.jpg",
        "Australië" => "../images/Australie.jpg"
    );

    $land_links = array(
        "Frankrijk" => "https://www.anwb.nl/vakantie/frankrijk/reisvoorbereiding",
        "Thailand" => "https://www.thuisvaccinatie.nl/bestemmingen/thailand/praktische-info/?msclkid=0c68fb78ddb01887a81e9d772d989fc6&utm_source=bing&utm_medium=cpc&utm_campaign=EFF%20-%20DSA&utm_term=Bestemmingen&utm_content=Bestemmingen",
        "Verenigde Staten" => "https://www.nederlandwereldwijd.nl/reisadvies/verenigde-staten-van-amerika",
        "Kenia" => "https://www.tourcompass.nl/kenia/reizen.htm?msclkid=9ef81f4ce7181c993c5b7943161a8b60&utm_source=bing&utm_medium=cpc&utm_campaign=1%20AFRICA%3A%20Kenya&utm_term=%2Bkenia%20%2Brondreis&utm_content=Kenia%20Rondreis",
        "Australië" => "https://www.tourcompass.nl/australie/reizen/hoogtepunten-van-australie-met-sydney-uluru-en-cairns.htm?msclkid=096b1b439e9b1d42a4f17d4c6fc358f6&utm_source=bing&utm_medium=cpc&utm_campaign=4%20OCEAN%3A%20Australia&utm_term=australi%C3%AB%20reizen&utm_content=Australi%C3%AB%20reizen."
    );

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $antwoorden = array();
        $totaalPunten = 0;
        for ($i = 0; $i < count($vragen); $i++) {
            if (isset($_POST["antwoord$i"])) {
                $antwoord = $_POST["antwoord$i"];
                $punten = 1;
                if ($i === 14) {
                    switch ($antwoord) {
                        case "Europa":
                            $punten = 40;
                            break;
                        case "Azië":
                            $punten = 61;
                            break;
                        case "Amerika":
                            $punten = 82;
                            break;
                        case "Afrika":
                            $punten = 103;
                            break;
                        case "Oceanie":
                            $punten = 124;
                            break;
                        default:
                            $punten = 0;
                    }
                } elseif ($i >= 1 && $i <= 16) {
                    $punten = ($antwoord === $_POST["antwoord1"]) ? 0 : 1;
                }
                $antwoorden[] = $antwoord;
                $totaalPunten += $punten;
            }
        }
        $_SESSION['antwoorden'] = $antwoorden;
        $_SESSION['totaalPunten'] = $totaalPunten;
    } elseif (!empty($_SESSION['antwoorden'])) {
        $antwoorden = $_SESSION['antwoorden'];
        $totaalPunten = $_SESSION['totaalPunten'];
    }

    function bepaalReisadvies($punten_per_land, $behaaldePunten) {
        foreach ($punten_per_land as $land => $punten) {
            if (in_array($behaaldePunten, $punten)) {
                return $land;
            }
        }
        return "Geen advies beschikbaar";
    }

    if (!empty($antwoorden)) {
        echo "<h3>Ontvangen antwoorden:</h3>";
        echo "<ul>";
        foreach ($antwoorden as $key => $antwoord) {
            echo "<li>Vraag " . ($key + 1) . ": $antwoord</li>";
        }
        echo "</ul>";
        echo "<h3>Totaal aantal punten:</h3>";
        echo "<p>$totaalPunten</p>";
        if ($totaalPunten < 40) {
            echo "<p>Vul de vragenlijst volledig in om je resultaat te krijgen.</p>";
        } else {
            $reisadvies = bepaalReisadvies($punten_per_land, $totaalPunten);
            echo "<h3>Reisadvies:</h3>";
            echo "<p>Omdat je $totaalPunten punten hebt behaald, is je reisadvies: $reisadvies</p>";
            echo "<p>Klik op het plaatje hieronder voor meer informatie:</p>";
            echo "<a href='" . $land_links[$reisadvies] . "' target='_blank'><img src='" . $land_afbeeldingen[$reisadvies] . "' alt='" . $reisadvies . "' style='max-width: 300px;'></a>";
        }
    } else {
        echo "<p>Er zijn geen antwoorden ontvangen.</p>";
    }
    ?>
</div>
</body>
</html>


