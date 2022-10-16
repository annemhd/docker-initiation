<header>
    <nav>
        <?php
        if (!isset($_SESSION['username'])) {
        ?>

            <a href="login.php">Se connecter</a>
            <a href="registration.php">S'inscrire</a>

        <?php

        } else {
        ?>
            <a href="index.php">Acceuil</a>
            <a href="post_add.php">Ajouter un article</a>
            <a href="dashboard.php">Tableau de bord</a>
            <a href="logout.php">Déconnexion</a>

        <?php
        }
        ?>
    </nav>
</header>