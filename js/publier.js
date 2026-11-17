// On récupère le formulaire et le message
const formulaire = document.getElementById("formulaire-demande");
const message = document.getElementById("message-publication");

// Quand on envoie le formulaire...
formulaire.addEventListener("submit", function (event) {
  event.preventDefault();   // on empêche la page de se recharger
  message.hidden = false;   // on affiche le message de confirmation
  formulaire.reset();       // on vide tous les champs
});