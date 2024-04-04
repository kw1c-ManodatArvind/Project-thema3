<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vragenlijst Resultaten</title>
    <link rel="stylesheet" href="../styles/Vragenlijst.css"> <!-- Gebruik dezelfde CSS als de vragenlijst -->
    <style>
        /* Footer stijl */
        .footer {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: #71cbf4;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer-logo {
            height: 30px; /* Pas dit aan aan de gewenste hoogte */
            margin-right: 20px;
        }

        .footer p {
            margin: 0;
            color: white;
        }
    </style>
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
    // PHP-code voor het tonen van resultaten
    // Controleer of het formulier is ingediend
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Controleer of de antwoorden zijn ingevuld
        if (isset($_POST['antwoord'])) {
            // Ontvang de antwoorden van het formulier
            $antwoorden = $_POST['antwoord'];

            // Bepaal het behaalde puntenaantal op basis van de antwoorden
            $behaalde_punten = array_sum(array_map('intval', $antwoorden));

            // Array met vakantiebestemmingen en de bijbehorende puntenaantallen
            $vakantiebestemmingen = array(
                20 => "Thailand",
                40 => "Frankrijk",
                60 => "Verenigde Staten",
                80 => "Kenia",
                100 => "Australië"
            );

            // Advies op basis van het behaalde puntenaantal
            $advies = "geen specifiek advies";
            foreach ($vakantiebestemmingen as $punten => $bestemming) {
                if ($behaalde_punten >= $punten) {
                    $advies = $bestemming;
                } else {
                    break;
                }
            }

            // Toon het advies voor de beste vakantiebestemming
            echo "<h3>Advies voor beste vakantiebestemming:</h3>";
            echo "<p>Op basis van uw behaalde punten, raden wij aan om naar " . $advies . " te gaan.</p>";

        } else {
            echo "<p>Er zijn geen antwoorden ontvangen.</p>";
        }
    } else {
        echo "<p>Geen formulier verzonden.</p>";
    }


    session_start(); // Start de sessie

    // Naam van de potentiele student
    $student_name = "John Doe";

    // Huidige datum en tijd
    $current_datetime = date("Y-m-d H:i:s");

    // Controleer of het formulier is ingediend en verwerk de resultaten
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Controleer of de antwoorden zijn ingevuld
        if (isset($_POST['antwoord'])) {
            // Ontvang de antwoorden van het formulier
            $antwoorden = $_POST['antwoord'];

            // Sla de resultaten op in de sessie
            $_SESSION['resultaten'] = $antwoorden;
        }
    }

    // Controleer of er resultaten beschikbaar zijn in de sessie
    if (isset($_SESSION['resultaten'])) {
        $antwoorden = $_SESSION['resultaten'];

        // Vervolg van PHP-code om resultaten weer te geven en advies te tonen...

        // Voorbeeld van het tonen van de vragen en ingevulde antwoorden
        echo "<h3>Overzicht van vragen en ingevulde antwoorden:</h3>";
        foreach ($vragen as $key => $vraag) {
            echo "<p>Vraag " . ($key + 1) . ": " . $vraag . "</p>";
            echo "<p>Antwoord: " . $antwoorden[$key] . "</p>";
        }
    } else {
        // Als er geen resultaten zijn, doorverwijzen naar de formulierpagina
        header("Location: Vragenlijst.php");
        exit(); // Zorg ervoor dat er geen code meer wordt uitgevoerd na de doorverwijzing
    }


    ?>
</div>

<footer class="footer">
    <img src="../images/logo.png" alt="Logo" class="footer-logo">
    <p>&copy; 2024 Tui. Alle rechten voorbehouden.</p>
</footer>

</body>
</html>

