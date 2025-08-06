<?php
session_start(); // Assurez-vous que la session est démarrée
?>

<div class="container">
    <!-- Message personnalisé si l'utilisateur est connecté -->
    <?php if (isset($_SESSION['loggedUser'])) : ?>
        <div class="alert alert-success mt-4" role="alert">
            Bonjour, <strong><?php echo htmlspecialchars($_SESSION['loggedUser']['fname']); ?></strong> ! Bienvenue sur le site.
        </div>
    <?php else : ?>
        <div class="alert alert-info mt-4" role="alert">
            Vous n'êtes pas connecté. <a href=/connexion>Connectez-vous</a> pour accéder à toutes les fonctionnalités.
        </div>
    <?php endif; ?>
</div>
