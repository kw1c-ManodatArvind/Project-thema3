<!DOCTYPE html>
<html>
<head>
    <title>Resultaten</title>
</head>
<body>

<h2>Resultaten van de vragenlijst:</h2>

<?php
// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de antwoorden zijn ingevuld
    if (isset($_POST['antwoord'])) {
        // Ontvang de antwoorden van het formulier
        $antwoorden = $_POST['antwoord'];

        // Advies op basis van de antwoorden
        $beste_land = adviesVakantiebestemming($antwoorden[13]);
        echo "<h3>Advies voor beste vakantiebestemming:</h3>";
        echo "<p>Op basis van uw voorkeur voor het verkennen van " . $antwoorden[13] . ", raden wij aan om naar " . $beste_land . " te gaan.</p>";

        // Toon afbeelding voor de beste vakantiebestemming
        switch ($beste_land) {
            case 'Frankrijk':
                echo "<img src='../images/tenerife.jpg' alt='Frankrijk'>";
                break;
            case 'Thailand':
                echo "<img src='thailand.jpg' alt='Thailand'>";
                break;
            case 'Verenigde Staten':
                echo "<img src='verenigde_staten.jpg' alt='Verenigde Staten'>";
                break;
            case 'Kenia':
                echo "<img src='kenia.jpg' alt='Kenia'>";
                break;
            case 'Australië':
                echo "<img src='australie.jpg' alt='Australië'>";
                break;
            default:
                break;
        }

    } else {
        echo "<p>Er zijn geen antwoorden ontvangen.</p>";
    }
} else {
    echo "<p>Geen formulier verzonden.</p>";
}

// Functie om advies te geven over de beste vakantiebestemming op basis van het gekozen continent
function adviesVakantiebestemming($continent) {
    // Hier kun je jouw advieslogica toevoegen op basis van het gekozen continent
    // Dit is een eenvoudig voorbeeld, je kunt je eigen voorkeurslanden toevoegen
    switch ($continent) {
        case 'Europa':
            return "Frankrijk";
            break;
        case 'Azië':
            return "Thailand";
            break;
        case 'Amerika':
            return "Verenigde Staten";
            break;
        case 'Afrika':
            return "Kenia";
            break;
        case 'Oceanië':
            return "Australië";
            break;
        default:
            return "geen specifiek advies";
    }
}
?>

</body>
</html>

