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
// Welkomstbericht op basis van tijdstip van bezoek
$hour = date("H");
if ($hour >= 6 && $hour < 12) {
    $greeting = "Goedemorgen";
} elseif ($hour >= 12 && $hour < 18) {
    $greeting = "Goedemiddag";
} else {
    $greeting = "Goedenavond";
}

echo "<h2>$greeting!</h2>";
echo "<p>Welkom bij onze vragenlijst. Vul alstublieft de onderstaande vragen in:</p>";

// Formulier met minimaal 15 vragen en verplichte velden
echo "<form method='post' action='resultaten.php'>";
$vragen = array(
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
    "Hoe ver wilt u reizen voor uw vakantie?"
);

$opties = array(
    "",
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
    array("0-500 km", "500-1000 km","1000-1500 km"," Verder dan 1500 km")
);

// Vervang enkele vragen door radiobuttons of checkboxes
$vragen[1] = "Hoe vaak boekt u een vakantie? (meerdere antwoorden mogelijk)";
$vragen[8] = "Heeft u ooit een vakantie geboekt via een reisbureau?";

$opties[1] = array("Minder dan eens per jaar", "Eens per jaar", "Meerdere keren per jaar", "Eens per maand");
$opties[8] = array("Ja", "Nee");

foreach ($vragen as $key => $vraag) {
    echo "<p>Vraag " . ($key + 1) . ": " . $vraag . "</p>";
    // Controleer of de vraag opties heeft en toon deze als een selectiemenu
    if (isset($opties[$key]) && is_array($opties[$key])) {
        if ($key == 1 || $key == 8) {
            // Toon radiobuttons voor de vragen waar meerdere antwoorden mogelijk zijn
            foreach ($opties[$key] as $optie) {
                echo "<input type='checkbox' name='antwoord[".$key."][]' value='" . $optie . "'>" . $optie . "<br>";
            }
        } else {
            // Toon een selectiemenu voor andere vragen
            echo "<select name='antwoord[]'>";
            foreach ($opties[$key] as $optie) {
                echo "<option value='" . $optie . "'>" . $optie . "</option>";
            }
            echo "</select><br>";
        }
    } else {
        // Toon een invoerveld voor andere vragen
        echo "<input type='number' name='antwoord[]' min='0' required><br>";
    }
}

// Bereken totaal aantal te behalen punten
$totalPoints = array_reduce($opties, function ($carry, $item) {
    if (is_array($item)) {
        return $carry + count($item);
    }
    return $carry;
}, 0);

echo "<p><strong>Totaal aantal te behalen punten:</strong> " . $totalPoints . "</p>";

echo "<input type='submit' name='submit' value='Verzend'>";
echo "</form>";



// Verdere verwerking van de resultaten komt hier....
?>

</body>
</html>
