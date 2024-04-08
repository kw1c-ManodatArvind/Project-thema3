// Auteur: Danijel Jovanovic
// Datum: 9-4-2024

// Event listener toevoegen aan de menu-toggle knop
    document.querySelector('.menu-toggle').addEventListener('click', function() {
    // Toggle class 'menu-open' op de navbar
    document.querySelector('.navbar').classList.toggle('menu-open');
});

