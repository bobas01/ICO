// Sélectionner les éléments nécessaires
const hamburger = document.querySelector('.hamburger');
const nav = document.querySelector('nav');

// Ajouter un écouteur d'événement au clic du hamburger
hamburger.addEventListener('click', () => {
  // Ajouter ou retirer la classe 'active' à la navigation
  nav.classList.toggle('active');
});
