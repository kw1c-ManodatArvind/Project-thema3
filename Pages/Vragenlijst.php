<!--
Auteur: Danijel Jovanovic en Arvind Manodat
Datum: 9-4-2024
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tui website</title> <!-- Titel van de pagina -->
    <link rel="stylesheet" href="../styles/Vragenlijst.css"> <!-- Koppeling naar CSS-bestand voor vragenlijst -->
    <script src="../scripts/script.js" defer></script> <!-- Koppeling naar JavaScript-bestand met uitstelde uitvoering -->
</head>
<body>
<div class="navbar" style="background-color: #71cbf4;"> <!-- Navigatiebalk met aangepaste achtergrondkleur -->
    <a href="../index.php"><img src="../images/logo.png" alt="Logo" class="logo"></a> <!-- TUI-logo met link naar Home -->
    <button class="menu-toggle" aria-label="Menu openen/sluiten">&#9776;</button> <!-- Knop voor het openen/sluiten van het menu -->
    <ul class="nav-links"> <!-- Navigatielinks -->
        <li><a href="../index.php">Home</a></li> <!-- Link naar Home -->
        <li><a href="resultaten.php">Resultaten</a></li> <!-- Link naar Resultaten -->
        <li><a href="ServiceContact.php">Service & Contact</a></li> <!-- Link naar Service & Contact -->
        <li><a href="Vliegtickets.php">Vliegtickets</a></li> <!-- Link naar Vliegtickets -->
        <li><a href="Vragenlijst.php">Vragenlijst</a></li> <!-- Link naar Vragenlijst -->
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
    // Array met vragen en opties
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

    // Opties voor meerkeuzevragen
    $opties = array(
        "",
        array("1-7 dagen", "8-14 dagen", "15-21 dagen", "Meer dan 21 dagen"),
        array("Minder dan eens per jaar", "Eens per jaar", "Meerdere keren per jaar", "Eens per maand"),
        array("Europa", "Azië", "Amerika", "Afrika", "Oceanië"),
        array("Hotel", "Appartement", "Villa", "Camping"),
        array("Prijs", "Weer", "Cultuur", "Natuur"),
        array("Minder dan een maand", "1-3 maanden", "3-6 maanden", "Meer dan 6 maanden"),
        array("Auto", "Vliegtuig", "Trein", "Boot"),
        array("Minder dan €500", "€500-€1000", "€1000-€2000", "Meer dan €2000"),
        array("Een keertje", "Paar keer", "Meerdere keren per jaar", "Nooit"),
        array("Heel belangrijk", "Redelijk belangrijk", "Niet zo belangrijk", "Niet belangrijk"),
        array("Wandelen", "Strandactiviteiten", "Stadsbezoek", "Avontuurlijke activiteiten"),
        array("Heel belangrijk", "Redelijk belangrijk", "Niet zo belangrijk", "Niet belangrijk"),
        array("Zonnig", "Regen" ,"Bewolkt" ,"Sneeuw"),
        array("Europa", "Azië", "Amerika", "Afrika", "Oceanië"),
        array("0-500 km", "500-1000 km","1000-1500 km"," Verder dan 1500 km"),
        array("Ja", "Nee"),
        array("Ja", "Nee"),
        array("Ja", "Nee"),
        array("Heel belangrijk", "Redelijk belangrijk", "Niet zo belangrijk", "Niet belangrijk"),
        array("Sporten", "Winkelen", "Musea bezoeken", "Uitgaan")

    );

    // Totaal aantal punten
    $totaalPunten = 0;

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
            echo "<select name='antwoord$i' required>";
            echo "<option value='' selected disabled hidden>Klik hier om jouw antwoord te selecteren</option>";
            foreach ($opties[$i] as $optie) {
                echo "<option value='" . $optie . "'>" . $optie . "</option>";
            }

            echo "</select><br>";

        } elseif ($i == 0) {
            // Toon een tekstveld voor de eerste vraag
            echo "<input type='text' name='antwoord$i' required><br>";
        } else {
            // Toon een dropdownmenu voor andere vragen
            echo "<select name='antwoord$i' required>";
            echo "<option value='' selected disabled hidden>Klik hier om jouw antwoord te selecteren</option>";

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

