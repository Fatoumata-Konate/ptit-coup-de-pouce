<?php
require_once __DIR__ . '/app.php';
$error = '';
$selectedRole = $_POST['role'] ?? ($_GET['role'] ?? 'benevole');
$allowedRoles = ['benevole', 'aide', 'association'];
if (!in_array($selectedRole, $allowedRoles, true)) $selectedRole = 'benevole';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $address = trim($_POST['address'] ?? '');

    if ($name === '' || $email === '' || $password === '' || $address === '') {
        $error = 'Merci de remplir tous les champs obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'L’adresse e-mail n’est pas valide.';
    } elseif (strlen($password) < 8) {
        $error = 'Le mot de passe doit contenir au moins 8 caractères.';
    } elseif ($password !== $confirm) {
        $error = 'Les deux mots de passe ne correspondent pas.';
    } else {
        $users = get_users();
        foreach ($users as $existing) {
            if (strtolower($existing['email']) === $email) {
                $error = 'Un compte existe déjà avec cette adresse e-mail.';
                break;
            }
        }
        if ($error === '') {
            $users[] = [
                'id' => uniqid('user_', true),
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'role' => $selectedRole,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            save_users($users);
            header('Location: connexion.php?created=1');
            exit;
        }
    }
}
function role_label(string $role): string {
    return ['benevole' => 'Je veux aider', 'aide' => 'J’ai besoin d’aide', 'association' => 'Je représente une association'][$role] ?? 'Je veux aider';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription — P'tit coup de pouce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">
<a class="auth-brand" href="index.php">P’tit coup de pouce <span>♥</span></a>
<main class="auth-shell signup-shell">
    <section class="auth-panel signup-panel">
        <div class="auth-heading">
            <p class="eyebrow">Bienvenue dans la communauté</p>
            <h1>Créer un compte</h1>
            <p>Quelques informations et l’aventure solidaire commence&nbsp;!</p>
        </div>

        <?php if ($error): ?><div class="alert"><?= h($error) ?></div><?php endif; ?>

        <form method="post" action="inscription.php" class="auth-form">
            <div class="role-select">
                <label for="role">Je souhaite rejoindre la plateforme en tant que</label>
                <select id="role" name="role">
                    <option value="benevole" <?= $selectedRole === 'benevole' ? 'selected' : '' ?>>Je veux aider</option>
                    <option value="aide" <?= $selectedRole === 'aide' ? 'selected' : '' ?>>J’ai besoin d’aide</option>
                    <option value="association" <?= $selectedRole === 'association' ? 'selected' : '' ?>>Je représente une association</option>
                </select>
            </div>

            <div class="form-field">
                <label for="name">Prénom &amp; nom</label>
                <input id="name" name="name" type="text" placeholder="Julie Diop" value="<?= h($_POST['name'] ?? '') ?>" required>
            </div>
            <div class="form-field">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" placeholder="exemple@gmail.com" value="<?= h($_POST['email'] ?? '') ?>" required>
            </div>
            <div class="form-field">
                <label for="phone">Téléphone</label>
                <input id="phone" name="phone" type="tel" placeholder="06 12 34 56 78" value="<?= h($_POST['phone'] ?? '') ?>">
            </div>
            <div class="form-field">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" type="password" placeholder="8 caractères minimum" required>
            </div>
            <div class="form-field">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input id="confirm_password" name="confirm_password" type="password" placeholder="Répétez votre mot de passe" required>
            </div>
            <div class="form-field">
                <label for="address">Adresse</label>
                <input id="address" name="address" type="text" placeholder="10 rue Victor Schoelcher, 75001" value="<?= h($_POST['address'] ?? '') ?>" required>
            </div>
            <button class="auth-submit" type="submit">S’inscrire</button>
        </form>
        <p class="auth-switch">Déjà inscrit&nbsp;? <a href="connexion.php">Se connecter</a></p>
    </section>
</main>
</body>
</html>
