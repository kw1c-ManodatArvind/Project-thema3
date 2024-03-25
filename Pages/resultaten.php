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
                    echo "<img src='../images/Frankrijk.jpg' alt='Frankrijk' width='500px'>";
                    break;
                case 'Thailand':
                    echo "<img src='../images/Thailand.jpg' alt='Thailand' width='500px'>";
                    break;
                case 'Verenigde Staten':
                    echo "<img src='../images/Usa.jpg' alt='Verenigde Staten' width='500px'>";
                    break;
                case 'Kenia':
                    echo "<img src='../images/Kenia.jpg' alt='Kenia' width='500px'>";
                    break;
                case 'Australië':
                    echo "<img src='../images/Australie.jpg' alt='Australië' width='500px'>";
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
</div>

</body>
</html>
