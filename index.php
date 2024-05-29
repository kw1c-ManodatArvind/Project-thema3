<!--
Auteur: Danijel Jovanovic
Datum: 9-4-2024
-->

<!DOCTYPE html>
<html lang="nl"> <!-- Begint het HTML-document en geeft de taal aan -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tui website</title> <!-- Titel van de pagina -->
    <link rel="stylesheet" href="styles/styles.css"> <!-- Koppelt het CSS-bestand aan -->
</head>

<body>
<div class="navbar"> <!-- Navigatiebalk -->
    <a href="index.php"><img src="images/logo.png" alt="Logo" class="logo"></a> <!-- Logo -->
    <ul class="nav-links"> <!-- Lijst van navigatielinks -->
        <li><a href="index.php">Home</a></li> <!-- Link naar de homepagina -->
        <li><a href="Pages/resultaten.php">Resultaten</a></li> <!-- Link naar de resultatenpagina -->
        <li><a href="Pages/ServiceContact.php">Service & Contact</a></li> <!-- Link naar de service- en contactpagina -->
        <li><a href="Pages/Vliegtickets.php">Vliegtickets</a></li> <!-- Link naar de vliegticketspagina -->
        <li><a href="Pages/Vragenlijst.php">Vragenlijst</a></li> <!-- Link naar de vragenlijstpagina -->
    </ul>
</div>

<img src="images/HeaderPlaatje.jpg" alt="Header Image" class="header-img"> <!-- Header afbeelding -->

<!-- Voeg deze code toe onder de header afbeelding -->

<div class="small-boxes"> <!-- Kleine vakken -->
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
        <p id="rood"> Aanbiedingen</p> <!-- Aanbiedingen in rood -->
    </div>
</div>

<div class="container">
    <div class="square-images"> <!-- Vierkante afbeeldingen -->
        <img src="images/VrouwMetKind.jpg" alt="Image 1">
        <img src="images/Vrouw.jpg" alt="Image 2">
        <img src="images/Familie.jpg" alt="Image 3">
        <img src="images/Logo1.jpg" alt="Image 4">
    </div>
    <a href="Pages/Vragenlijst.php" class="questionnaire-link"> <!-- Link naar de vragenlijst -->
        <img src="images/chatbutton.png" alt="Vragenlijst" class="questionnaire-img">
    </a>
    <p class="description">Relaxed boeken met TUI Garanties en Verzekeringen.</p> <!-- Beschrijving -->
    <div class="blue-boxes"> <!-- Blauwe vakken -->
        <div class="blue-box">Omruilgarantie</div>
        <div class="blue-box">Geld-Terug-Garantie</div>
        <div class="blue-box">Laagste prijs garantie</div>
        <div class="blue-box">Repatriëringsgarantie</div>
    </div>
    <div class="image-columns"> <!-- Afbeeldingskolommen -->
        <div class="column">
            <h2>Onze populairste bestemmingen</h2> <!-- Titel van de kolom -->
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
            <h2>Onze meest geboekte hotels</h2> <!-- Titel van de kolom -->
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
include 'includes/footer.php'; // Voegt de footer toe via PHP
?>
</body>
</html>



