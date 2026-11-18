<?php
require_once __DIR__ . '/app.php';
$user = current_user();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>P'tit coup de pouce — Ensemble, faisons la différence</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="home-page">
<header class="site-header">
    <a class="brand" href="index.php">P’tit coup de pouce <span>♥</span></a>
    <nav class="main-nav">
        <a class="active" href="index.php">Accueil</a>
        <a href="missions.php">Les missions</a>
        <a href="associations.php">Les associations</a>
    </nav>
    <div class="header-action">
        <?php if ($user): ?>
            <span class="welcome-user">Bonjour <?= h($user['name']) ?></span>
            <a class="pill-button" href="logout.php">Déconnexion</a>
        <?php else: ?>
            <a class="pill-button" href="connexion.php">Connexion</a>
        <?php endif; ?>
    </div>
</header>

<main>
    <section class="hero">
        <div class="hero-copy">
            <p class="eyebrow">La solidarité commence près de chez vous</p>
            <h1>Bienvenue sur p’tit<br>coup de pouce&nbsp;!</h1>
            <p class="hero-description">
                Un peu de temps, une main tendue ou un sourire peuvent faire une vraie différence.
                Avec P’tit Coup de Pouce, trouve facilement une mission solidaire qui te correspond
                et participe à des actions qui ont du sens.
            </p>
            <div class="hero-actions">
                <a class="pill-button large" href="missions.php">Découvrir les missions <span>→</span></a>
                <a class="text-link" href="inscription.php?role=association">Je représente une association</a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-image-wrap">
                <img src="assets/hero-solidarite.png" alt="Des personnes réunies autour de la planète">
            </div>
            <p class="handwritten">Ensemble, faisons la différence</p>
            <span class="doodle doodle-one">♡</span>
            <span class="doodle doodle-two">♥</span>
        </div>
    </section>

    <section class="how-section">
        <h2>Comment ça marche&nbsp;?</h2>
        <div class="steps">
            <article class="step-card step-green">
                <h3>🔎 1. Trouve une mission</h3>
                <p>Découvre des missions solidaires près de chez toi et trouve celle qui correspond à tes envies, tes intérêts et tes disponibilités.</p>
            </article>
            <article class="step-card step-purple">
                <h3>📅 2. Inscris-toi facilement</h3>
                <p>Choisis la mission qui te plaît et inscris-toi en quelques clics pour rejoindre une association et participer à ses actions.</p>
            </article>
            <article class="step-card step-blue">
                <h3>♡ 3. Fais la différence</h3>
                <p>Offre un peu de ton temps, partage tes compétences et contribue à des projets solidaires qui améliorent le quotidien des autres.</p>
            </article>
        </div>
    </section>
</main>
<footer class="site-footer">P’tit coup de pouce <span>♥</span> — Donnez du temps, là où il compte.</footer>
</body>
</html>
