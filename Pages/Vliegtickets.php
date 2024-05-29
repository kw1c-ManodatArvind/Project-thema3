
<!--
Auteur: Danijel Jovanovic
Datum: 9-4-2024
-->

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tui Website</title>
    <!-- Link naar externe stylesheet voor vliegticketspagina -->
    <link rel="stylesheet" href="../styles/vliegtickets.css">
    <!-- Uitgesteld laden van het script -->
    <script src="../scripts/script.js" defer></script>
</head>
<body>
<!-- Navbar -->
<div class="navbar">
    <!-- Logo -->
    <img src="../images/logo.png" alt="Logo" class="logo">
    <!-- Navigatielinks -->
    <ul class="nav-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="resultaten.php">Resultaten</a></li>
        <li><a href="ServiceContact.php">Service & Contact</a></li>
        <li><a href="Vliegtickets.php">Vliegtickets</a></li>
        <li><a href="Vragenlijst.php">Vragenlijst</a></li>
    </ul>
</div>
<!-- Header afbeelding -->
<img src="../images/Wolken.jpg" alt="Header Image" class="header-img">
<div class="container">
    <!-- Navigatie sectie -->
    <div class="nav">
        <span>Vlucht boeken</span>
        <span>Bestemmingen</span>
        <span>Zitcomfort en services</span>
        <span>Vluchtstatus</span>
        <span>Vliegen met TUI fly</span>
        <span>Foreign travelers</span>
    </div>
    <hr class="separator">
    <!-- Afbeelding container -->
    <div class="image-container">
        <img src="../images/Stewards.jpg" alt="Afbeelding">
    </div>
    <!-- Titel voor populaire bestemmingen -->
    <h2>Populaire bestemmingen</h2>
    <!-- Grid voor populaire bestemmingen -->
    <div class="popular-destinations">
        <!-- Bestemming 1 -->
        <div class="destination">
            <img src="../images/curacao.jpg" alt="Curaçao">
            <div class="overlay">Curaçao</div>
        </div>
        <!-- Bestemming 2 -->
        <div class="destination">
            <img src="../images/tenerife.jpg" alt="Tenerife">
            <div class="overlay">Tenerife</div>
        </div>
        <!-- Bestemming 3 -->
        <div class="destination">
            <img src="../images/kaapverdie.jpg" alt="Kaapverdië">
            <div class="overlay">Kaapverdië</div>
        </div>
        <!-- Bestemming 4 -->
        <div class="destination">
            <img src="../images/aruba.jpg" alt="Aruba">
            <div class="overlay">Aruba</div>
        </div>
        <!-- Bestemming 5 -->
        <div class="destination">
            <img src="../images/mexico.jpg" alt="Mexico">
            <div class="overlay">Mexico</div>
        </div>
        <!-- Bestemming 6 -->
        <div class="destination">
            <img src="../images/bonaire.jpg" alt="Bonaire">
            <div class="overlay">Bonaire</div>
        </div>
        <!-- Bestemming 7 -->
        <div class="destination">
            <img src="../images/jamaica.jpg" alt="Jamaica">
            <div class="overlay">Jamaica</div>
        </div>
        <!-- Bestemming 8 -->
        <div class="destination">
            <img src="../images/dominican.jpg" alt="Dominicaanse Republiek">
            <div class="overlay">Dominicaanse Republiek</div>
        </div>
    </div>
    <div class="white-space"></div>
    <!-- Opties sectie -->
    <div class="options">
        <div class="option" id="zitcomfort">Zitcomfort & Service TUI fly</div>
        <div class="option" id="over">Over TUI fly</div>
    </div>
    <hr class="separator">
    <!-- Informatie over zitcomfort en services -->
    <div class="service-info">
        <div id="zitcomfort-content">

        </div>
    </div>
</div>
<!-- Footer -->
<div class="footer">
    <!-- Linker deel van de footer -->
    <div class="footer-left">
        <h3>Goed voorbereid op reis</h3>
        <ul>
            <li><a href="#">TUI app</a></li>
            <li><a href="#">Online inchecken Transavia</a></li>
            <li><a href="#">Excursies op de bestemming</a></li>
            <li><a href="#">Goed voorbereid op reis</a></li>
            <li><a href="#">Verzekeringen</a></li>
            <li><a href="#">Autohuur</a></li>
            <li><a href="#">Parkeren op de luchthaven</a></li>
            <li><a href="#">Luchthavenvervoer</a></li>
            <li><a href="#">Visum & vaccinaties</a></li>
            <li><a href="#">Bekijk alle extra's</a></li>
        </ul>
    </div>
    <!-- Middelste deel van de footer -->
    <div class="footer-center">
        <h3>Vliegen met TUI fly</h3>
        <ul>
            <li><a href="#">Online inchecken TUI fly</a></li>
            <li><a href="#">Stoelreservering</a></li>
            <li><a href="#">Bagage</a></li>
            <li><a href="#">Bekijk alle TUI fly services</a></li>
            <li><a href="#">TUI Cargo</a></li>
        </ul>
    </div>
    <!-- Rechter deel van de footer -->
    <div class="footer-right">
        <h3>TUI Nederland</h3>
        <ul>
            <li><a href="#">Over TUI Nederland</a></li>
            <li><a href="#">Pers en media</a></li>
            <li><a href="#">Voorwaarden</a></li>
            <li><a href="#">Disclaimer</a></li>
            <li><a href="#">Copyright</a></li>
            <li><a href="#">Privacy & cookies</a></li>
            <li><a href="#">Klacht?</a></li>
            <li><a href="#">Deel een zorg</a></li>
        </ul

        >
    </div>
    <!-- Onderste deel van de footer -->
    <div class="footer-bottom">
        <div class="work-at-tui">
            <a href="#">Werken bij TUI</a>
        </div>
    </div>
</div>
<!-- Nieuwsbrief sectie -->
<div class="newsletter">
    <span>Nieuwsbrief</span>
    <p>Krijg wekelijks de beste deals in je mailbox.</p>
    <form action="#" method="POST">
        <input type="email" name="email" placeholder="Vul je e-mailadres in" required>
        <button type="submit">Aanmelden</button>
    </form>
</div>
</body>
</html>
