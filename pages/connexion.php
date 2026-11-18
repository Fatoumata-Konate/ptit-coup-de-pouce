<?php
require_once __DIR__ . '/app.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    foreach (get_users() as $user) {
        if (strtolower($user['email']) === $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            header('Location: index.php');
            exit;
        }
    }
    $error = 'Adresse e-mail ou mot de passe incorrect.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion — P'tit coup de pouce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">
<a class="auth-brand" href="accueil.php">P’tit coup de pouce <span>♥</span></a>
<main class="auth-shell login-shell">
    <section class="auth-panel login-panel">
        <div class="auth-heading">
            <p class="eyebrow">Ravie de vous retrouver</p>
            <h1>Bienvenue sur la page de connexion</h1>
            <p>Connectez-vous pour retrouver vos missions solidaires.</p>
        </div>

        <?php if (isset($_GET['created'])): ?><div class="success-message">Votre compte a bien été créé. Vous pouvez vous connecter&nbsp;!</div><?php endif; ?>
        <?php if ($error): ?><div class="alert"><?= h($error) ?></div><?php endif; ?>

        <form method="post" action="connexion.php" class="auth-form login-form">
            <div class="form-field">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" placeholder="exemple@gmail.com" value="<?= h($_POST['email'] ?? '') ?>" required>
            </div>
            <div class="form-field">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" type="password" placeholder="Votre mot de passe" required>
            </div>
            <button class="auth-submit" type="submit">Connexion</button>
        </form>
        <div class="auth-links">
            <a href="mailto:contact@ptitcoupdepouce.fr?subject=Mot%20de%20passe%20oubli%C3%A9">Mot de passe oublié&nbsp;?</a>
            <a href="inscription.php">Créer un compte</a>
        </div>
    </section>
</main>
</body>
</html>
