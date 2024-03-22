<!DOCTYPE html>
<html>
<head>
    <title>Vragenlijst</title>
</head>
<body>

<h2>Vul de vragenlijst in:</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php
    // Array met vragen
    $vragen = array(
        "Hoe vaak sport je per week?",
        "Hoeveel uur slaap je gemiddeld per nacht?",
        "Hoeveel groenten eet je per dag?",
        "Hoeveel water drink je per dag (in liters)?",
        "Hoeveel uur besteed je dagelijks aan schermtijd (bijvoorbeeld tv, computer, telefoon)?",
        "Hoe vaak eet je fastfood per week?",
        "Hoeveel alcohol drink je per week?",
        "Hoeveel tijd besteed je aan ontspanning of hobby's?",
        "Hoe vaak voel je je gestrest?",
        "Hoe tevreden ben je over je werk/school?",
        "Hoeveel tijd spendeer je aan sociale activiteiten?",
        "Hoeveel tijd besteed je aan persoonlijke ontwikkeling?",
        "Hoeveel tijd besteed je aan relaties (familie, vrienden)?",
        "Hoeveel tijd besteed je aan het plannen van je dag/week?",
        "Hoe gezond eet je over het algemeen?"
    );

    // Loop door de vragen en toon ze
    foreach ($vragen as $key => $vraag) {
        echo "<p>Vraag " . ($key + 1) . ": " . $vraag . "</p>";
        echo "<input type='number' name='antwoord[]' min='0'><br>";
    }
    ?>

    <input type="submit" name="submit" value="Verzend">
</form>

<?php
// Functie om het advies te berekenen op basis van de antwoorden
function berekenAdvies($antwoorden) {
    // Hier kun je je adviesberekening implementeren op basis van de ingevulde antwoorden
    // Dit is een eenvoudig voorbeeld
    $totaal = array_sum($antwoorden);
    $advies = "";

    if ($totaal < 50) {
        $advies = "Je levensstijl kan wat verbetering gebruiken. Probeer meer aandacht te besteden aan gezondheid en welzijn.";
    } elseif ($totaal >= 50 && $totaal < 100) {
        $advies = "Je levensstijl is redelijk, maar er zijn nog ruimtes voor verbetering. Probeer balans te vinden in je dagelijkse activiteiten.";
    } else {
        $advies = "Je hebt een goede balans in je levensstijl. Blijf zo doorgaan!";
    }

    return $advies;
}

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de antwoorden zijn ingevuld
    if (isset($_POST['antwoord'])) {
        $antwoorden = $_POST['antwoord'];

        // Controleer of er 15 antwoorden zijn ingevuld
        if (count($antwoorden) == 15) {
            // Bereken advies op basis van de ingevulde antwoorden
            $advies = berekenAdvies($antwoorden);
            echo "<h2>Advies:</h2>";
            echo "<p>" . $advies . "</p>";
        } else {
            echo "<p>Vul alle vragen in!</p>";
        }
    }
}

// Toon het totale aantal vragen
echo "<h3>Totaal aantal vragen: " . count($vragen) . "</h3>";
?>

</body>
</html>

