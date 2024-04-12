<!--
Auteur: Danijel Jovanovic en Arvind Manodat
Datum: 9-4-2024
-->

<!DOCTYPE html> <!-- Definieert het documenttype als HTML -->
<html lang="nl"> <!-- Geeft de taal van de pagina aan -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> apparaten -->
    <title>Tui website</title> <!-- Titel van de pagina -->
    <link rel="stylesheet" href="../styles/resultaten.css"> <!-- Koppelt het CSS-bestand voor de resultatenpagina -->
    <!-- Voeg hier eventuele extra CSS-bestanden toe -->
</head>
<body>
<div class="navbar"> <!-- Navigatiebalk -->
    <a href="../index.php"><img src="../images/logo.png" alt="Logo" class="logo"></a> <!-- Link naar de homepagina met het logo -->
    <ul class="nav-links">
        <li><a href="../index.php">Home</a></li> <!-- Link naar de homepagina -->
        <li><a href="resultaten.php">Resultaten</a></li> <!-- Link naar de resultatenpagina -->
        <li><a href="ServiceContact.php">Service & Contact</a></li> <!-- Link naar de service- en contactpagina -->
        <li><a href="Vliegtickets.php">Vliegtickets</a></li> <!-- Link naar de vliegticketspagina -->
        <li><a href="Vragenlijst.php">Vragenlijst</a></li> <!-- Link naar de vragenlijstpagina -->
        <!-- Voeg hier eventueel extra navigatielinks toe -->
    </ul>
</div>
<div class="container"> <!-- Hoofdcontainer van de pagina -->
    <h2>Resultaten van de vragenlijst:</h2> <!-- Titel van de resultaten -->
    <?php
    session_start(); // Start de PHP-sessie

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


    $punten_per_land = array(
        "Frankrijk" => range(40, 60),
        "Thailand" => range(61, 81),
        "Verenigde Staten" => range(82, 102),
        "Kenia" => range(103, 123),
        "Australië" => range(124, 144),

    );

    $land_afbeeldingen = array(
        "Frankrijk" => "../images/Frankrijk.jpg",
        "Thailand" => "../images/thailand.jpg",
        "Verenigde Staten" => "../images/Usa.jpg",
        "Kenia" => "../images/Kenia.jpg",
        "Australië" => "../images/Australie.jpg",

    );

    $land_links = array(
        "Frankrijk" => "https://www.anwb.nl/vakantie/frankrijk/reisvoorbereiding",
        "Thailand" => "https://www.thuisvaccinatie.nl/bestemmingen/thailand/praktische-info/?msclkid=0c68fb78ddb01887a81e9d772d989fc6&utm_source=bing&utm_medium=cpc&utm_campaign=EFF%20-%20DSA&utm_term=Bestemmingen&utm_content=Bestemmingen",
        "Verenigde Staten" => "https://www.nederlandwereldwijd.nl/reisadvies/verenigde-staten-van-amerika",
        "Kenia" => "https://www.tourcompass.nl/kenia/reizen.htm?msclkid=9ef81f4ce7181c993c5b7943161a8b60&utm_source=bing&utm_medium=cpc&utm_campaign=1%20AFRICA%3A%20Kenya&utm_term=%2Bkenia%20%2Brondreis&utm_content=Kenia%20Rondreis",
        "Australië" => "https://www.tourcompass.nl/australie/reizen/hoogtepunten-van-australie-met-sydney-uluru-en-cairns.htm?msclkid=096b1b439e9b1d42a4f17d4c6fc358f6&utm_source=bing&utm_medium=cpc&utm_campaign=4%20OCEAN%3A%20Australia&utm_term=australi%C3%AB%20reizen&utm_content=Australi%C3%AB%20reizen.",

    );

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Controleert of het verzoekstype POST is
        $antwoorden = array(); // Initialiseert een array voor de antwoorden
        $totaalPunten = 0; // Initialiseert de variabele voor het totale aantal punten
        for ($i = 0; $i < count($vragen); $i++) { // Itereert over alle vragen
            if (isset($_POST["antwoord$i"])) { // Controleert of het antwoord is ingestuurd
                $antwoord = $_POST["antwoord$i"]; // Haalt het antwoord op uit het formulier
                $punten = 1; // Initialiseert de punten voor de vraag
                if ($i === 14) { // Controleert of de vraag over het continent gaat
                    switch ($antwoord) { // Bepaalt het aantal punten op basis van het continent
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
                        // Voeg hier andere continenten en bijbehorende punten toe
                        default:
                            $punten = 0; // Standaardwaarde voor ongeldige antwoorden
                    }
                } elseif ($i >= 1 && $i <= 16) { // Controleert of de vraag betrekking heeft op de eerste 16 vragen
                    $punten = ($antwoord === $_POST["antwoord1"]) ? 0 : 1; // Controleert of het antwoord overeenkomt met het eerste antwoord
                }
                $antwoorden[] = $antwoord; // Voegt het antwoord toe aan de array
                $totaalPunten += $punten; // Telt de punten op bij het totale aantal punten
            }
        }
        $_SESSION['antwoorden'] = $antwoorden; // Slaat de antwoorden op in de sessie
        $_SESSION['totaalPunten'] = $totaalPunten; // Slaat het totale aantal punten op in de sessie
    } elseif (!empty($_SESSION['antwoorden'])) { // Controleert of er antwoorden zijn opgeslagen in de sessie
        $antwoorden = $_SESSION['antwoorden']; // Haalt de antwoorden op uit de sessie
        $totaalPunten = $_SESSION['totaalPunten']; // Haalt het totale aantal punten op uit de sessie
    }

    function bepaalReisadvies($punten_per_land, $behaaldePunten) { // Functie om het reisadvies te bepalen op basis van behaalde punten
        foreach ($punten_per_land as $land => $punten) { // Itereert over alle landen en bijbehorende punten
            if (in_array($behaaldePunten, $punten)) { // Controleert of het aantal behaalde punten binnen het bereik van het land valt
                return $land; // Geeft het land terug als reisadvies
            }
        }
        return "Geen advies beschikbaar"; // Geeft deze boodschap terug als er geen overeenkomend land is gevonden
    }

    if (!empty($antwoorden)) { // Controleert of er antwoorden zijn ingediend
        echo "<h3>Ontvangen antwoorden:</h3>"; // Geeft een kop weer voor de ontvangen antwoorden
        echo "<ul>"; // Opent een ongenummerde lijst voor de antwoorden
        foreach ($antwoorden as $key => $antwoord) { // Itereert over alle antwoorden
            echo "<li>Vraag " . ($key + 1) . ": $antwoord</li>"; // Geeft elk antwoord weer als een lijstitem met het bijbehorende vraagnummer
        }
        echo "</ul>"; // Sluit de lijst af
        echo "<h3>Totaal aantal punten:</h3>"; // Geeft een kop weer voor het totale aantal punten
        echo "<p>$totaalPunten</p>"; // Geeft het totale aantal punten weer
        if ($totaalPunten < 40) { // Controleert of het totale aantal punten lager is dan 40
            echo "<p>Vul de vragenlijst volledig in om je resultaat te krijgen.</p>"; // Geeft een bericht weer om de vragenlijst volledig in te vullen
        } else { // Als het totale aantal punten 40 of hoger is
            $reisadvies = bepaalReisadvies($punten_per_land, $totaalPunten); // Bepaalt het reisadvies op basis van het totale aantal punten
            echo "<h3>Reisadvies:</h3>"; // Geeft een kop weer voor het reisadvies
            echo "<p>Omdat je $totaalPunten punten hebt behaald, is je reisadvies: $reisadvies</p>"; // Geeft het reisadvies weer op basis van het aantal behaalde punten
            echo "<p>Klik op het plaatje hieronder voor meer informatie:</p>"; // Geeft instructies weer om op de afbeelding te klikken voor meer informatie
            echo "<a href='" . $land_links[$reisadvies] . "' target='_blank'><img src='" . $land_afbeeldingen[$reisadvies] . "' alt='" . $reisadvies . "' style='max-width: 300px;'></a>"; // Geeft een link naar meer informatie over de bestemming met een afbeelding van het land
        }
    } else { // Als er geen antwoorden zijn ingediend
        echo "<p>Er zijn geen antwoorden ontvangen.</p>"; // Geeft een bericht weer dat er geen antwoorden zijn ontvangen
    }
    ?>
</div>
</body>
</html>



