// On récupère le bouton et le message grâce à leur id
const bouton = document.getElementById("bouton-aide");
const message = document.getElementById("message-confirmation");

// Quand on clique sur le bouton...
bouton.addEventListener("click", function () {
  message.hidden = false;                 // on affiche le message
  bouton.textContent = "AIDE PROPOSÉE ✓"; // on change le texte du bouton
  bouton.disabled = true;                 // on désactive le bouton
});