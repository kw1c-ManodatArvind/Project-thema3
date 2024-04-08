//
Auteur: Arvind Manodat
Datum: 9-4-2024.
//
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tui website</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div class="navbar" style="background-color: #71cbf4;">
    <a href="index.php"><img src="images/logo.png" alt="Logo" class="logo"></a>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="Pages/resultaten.php">Resultaten</a></li>
        <li><a href="Pages/ServiceContact.php">Service & Contact</a></li>
        <li><a href="Pages/Vliegtickets.php">Vliegtickets</a></li>
        <li><a href="Pages/Vragenlijst.php">Vragenlijst</a></li>
    </ul>
</div>
<img src="images/HeaderPlaatje.jpg" alt="Header Image" class="header-img">
<!-- Voeg deze code toe onder de header afbeelding -->
<div class="small-boxes">
    <div class="small-box">
        <p>Kindervakantie</p>
    </div>
    <div class="small-box">
        <p>Stedentrips</p>
    </div>
    <div class="small-box">
        <p>Autovakanties</p>
    </div>
    <div class="small-box">
        <p>Vliegvakanties</p>
    </div>
    <div class="small-box">
        <p>Rondreizen</p>
    </div>
    <div class="small-box">
        <p>Wintersport</p>
    </div>
    <div class="small-box">
        <p>Bursreizen</p>
    </div>
    <div class="small-box">
        <p id="rood"> Aanbiedingen</p>
    </div>
</div>
<div class="container">
    <div class="square-images">
        <img src="images/VrouwMetKind.jpg" alt="Image 1">
        <img src="images/Vrouw.jpg" alt="Image 2">
        <img src="images/Familie.jpg" alt="Image 3">
        <img src="images/Logo1.jpg" alt="Image 4">
    </div>
    <a href="Pages/Vragenlijst.php" class="questionnaire-link">
        <img src="images/chatbutton.png" alt="Vragenlijst" class="questionnaire-img">
    </a>
    <p class="description">Relaxed boeken met TUI Garanties en Verzekeringen.</p>
    <div class="blue-boxes">
        <div class="blue-box">Omruilgarantie</div>
        <div class="blue-box">Geld-Terug-Garantie</div>
        <div class="blue-box">Laagste prijs garantie</div>
        <div class="blue-box">Repatriëringsgarantie</div>
    </div>
    <div class="image-columns">
        <div class="column">
            <h2>Onze populairste bestemmingen</h2>
            <div class="image-wrapper">
                <img id="curacao" src="images/curacao.jpg" alt="Curacao">
                <p>Op een vakantie op Curacao zijn de witte stranden met palmbomen in grote getale aanwezig.</p>
            </div>
            <div class="image-wrapper">
                <img src="images/spanje.jpg" alt="Spanje">
                <p>Hét land voor een goedkope en zonnige all inclusive vakanties.</p>
            </div>
            <div class="image-wrapper">
                <img src="images/griekenland.jpg" alt="Griekeland">
                <p>Geniet van een heerlijke zonvakantie aan de Spaanse Costa's of ontdek de temperamentvolle steden.</p>
            </div>
            <div class="image-wrapper">
                <img src="images/turkije2.jpg" alt="Turkije">
                <p>De zon schijnt en de zee is in dit Zuid- Europese land altijd binnen handbereik.</p>
            </div>
            <div class="image-wrapper">
                <img src="images/gran_canaria2.jpg" alt="Gran Canaria">
                <p>Van indrukwekkende vulkaankraters tot prachtige stranden. Op Gran Canaaria vind je het allemaal!</p>
            </div>
        </div>
        <div class="column">
            <h2>Onze meest geboekte hotels</h2>
            <div class="image-wrapper">
                <img src="images/chogogo_resort_bonaire.jpg" alt="Hotel 1">
                <p>Turkse Riviéra, Turkije</p>
            </div>
            <div class="image-wrapper">
                <img src="images/chogogo_resort_curacao.jpg" alt="Hotel 2">
                <p>Jan Thiel Baai, Curacao</p>
            </div>
            <div class="image-wrapper">
                <img src="images/long_beach_alanya.jpg" alt="Hotel 3">
                <p>Turkse Riviéra, Turkije</p>
            </div>
            <div class="image-wrapper">
                <img src="images/sindbad-club-egypte.jpg" alt="Hotel 4">
                <p> Kralendijk, Bonaire</p>
            </div>
            <div class="image-wrapper">
                <img src="images/delphin_imperial.jpg" alt="Hotel 5">
                <p>Hurghada,  Egypte</p>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>

</body>
</html>


