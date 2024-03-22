<!DOCTYPE html>
<html>
<head>
    <title>Vragenlijst</title>
</head>
<body>

<h2>Vul de vragenlijst in:</h2>

<form method="post" action="resultaten.php">
    <?php
    // Array met vragen en opties
    $vragen = array(
        "",
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
        "Bent u bereid om lange afstanden te reizen voor uw vakantie?"
    );

    // Opties voor meerkeuzevragen
    $opties = array(
        "",
        array("Minder dan eens per jaar", "Eens per jaar", "Meerdere keren per jaar"),
        array("Europa", "Azië", "Amerika", "Afrika", "Oceanië"),
        array("Hotel", "Appartement", "Villa", "Camping"),
        array("Prijs", "Weer", "Cultuur", "Natuur"),
        array("Minder dan een maand", "1-3 maanden", "3-6 maanden", "Meer dan 6 maanden"),
        array("Auto", "Vliegtuig", "Trein", "Boot"),
        array("Minder dan €500", "€500-€1000", "€1000-€2000", "Meer dan €2000"),
        array("Ja", "Nee"),
        array("Heel belangrijk", "Redelijk belangrijk", "Niet zo belangrijk"),
        array("Wandelen", "Strandactiviteiten", "Stadsbezoek", "Avontuurlijke activiteiten"),
        array("Heel belangrijk", "Redelijk belangrijk", "Niet zo belangrijk"),
        array("Warm", "Koud"),
        array("Europa", "Azië", "Amerika", "Afrika", "Oceanië"),
        array("Ja", "Nee")
    );

    // Loop door de vragen en toon ze met de opties
    foreach ($vragen as $key => $vraag) {
        echo "<p>Vraag " . ($key + 1) . ": " . $vraag . "</p>";
        // Controleer of de vraag opties heeft en toon deze als een selectiemenu
        if (isset($opties[$key]) && is_array($opties[$key])) {
            echo "<select name='antwoord[]'>";
            foreach ($opties[$key] as $optie) {
                echo "<option value='" . $optie . "'>" . $optie . "</option>";
            }
            echo "</select><br>";
        } else {
            // Toon een invoerveld voor andere vragen
            echo "<input type='number' name='antwoord[]' min='0'><br>";
        }
    }
    ?>

    <input type="submit" name="submit" value="Verzend">
</form>

</body>
</html>

