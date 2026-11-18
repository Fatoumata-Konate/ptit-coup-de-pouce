P'TIT COUP DE POUCE — PARTIE PERSONNE 2
Pages livrées : Accueil, Connexion, Inscription.

INSTALLATION
1. Décompressez le dossier dans le répertoire de votre serveur local (ex. htdocs avec XAMPP ou MAMP).
2. Démarrez Apache.
3. Ouvrez http://localhost/ptit_coup_de_pouce_personne2/

FONCTIONNEMENT
- L'inscription enregistre un utilisateur dans data/users.json.
- Les mots de passe sont enregistrés avec password_hash().
- La connexion vérifie le mot de passe avec password_verify().
- Une session est créée après connexion.
- La déconnexion est disponible depuis la page d'accueil.

À SAVOIR POUR LE TRAVAIL EN GROUPE
- Le stockage JSON sert de démonstration autonome pour tester les formulaires.
- Si votre équipe utilise MySQL ou une base commune, remplacez get_users()/save_users() dans app.php par les requêtes de votre base.
- Les liens missions.php et associations.php pointent vers les pages réalisées par les autres membres. Ces fichiers ne sont pas inclus dans cette partie.
- Les images sont des recadrages des visuels fournis dans les captures de maquette.
- La page d'accueil reprend les textes visibles sur la maquette. Les pages connexion/inscription reprennent les champs et la structure visibles.

SÉCURITÉ / DÉPLOIEMENT
Ce projet est une base pédagogique locale. Avant toute mise en production, ajoutez notamment une protection CSRF, une limitation des tentatives de connexion et une configuration de stockage adaptée.
