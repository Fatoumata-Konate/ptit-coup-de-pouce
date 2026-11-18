// On récupère les éléments de la page grâce à leur id
const boutonModifier = document.getElementById("bouton-modifier");
const boutonAnnuler = document.getElementById("bouton-annuler");
const formulaire = document.getElementById("formulaire-profil");
const boutonsEnregistrer = document.getElementById("boutons-enregistrer");
const message = document.getElementById("message-confirmation");

// Tous les champs du formulaire (prénom, nom, e-mail, localisation, statut, présentation)
const champs = formulaire.querySelectorAll("input, select, textarea");

// Active ou désactive les champs
function activerChamps(actif) {
  champs.forEach(function (champ) {
    champ.disabled = !actif;
  });
  boutonsEnregistrer.hidden = !actif;
  boutonModifier.hidden = actif;
}

// Clic sur "Modifier mon profil" : on peut écrire dans les champs
boutonModifier.addEventListener("click", function () {
  message.hidden = true;
  activerChamps(true);
});

// Clic sur "Annuler" : on remet les valeurs de départ
boutonAnnuler.addEventListener("click", function () {
  formulaire.reset();
  activerChamps(false);
});

// Clic sur "Enregistrer" : on bloque l'envoi (pas de serveur pour l'instant)
// et on affiche un message de confirmation
formulaire.addEventListener("submit", function (evenement) {
  evenement.preventDefault();
  activerChamps(false);
  message.hidden = false;
});
