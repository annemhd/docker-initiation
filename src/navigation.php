<div class="">
    <header class="d-flex flex-wrap justify-content-end py-3 mb-4 border-bottom">
        <ul class="nav nav-pills">
            <?php
            if (!isset($_SESSION['username'])) {
            ?>

                <li class="nav-item"><a href="login.php" class="nav-link">Se connecter</a></li>
                <li class="nav-item"><a href="registration.php" class="nav-link">S'inscrire</a></li>

            <?php

            } else {

            ?>
                <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="post_add.php" class="nav-link">Ajouter un article</a></li>
                <li class="nav-item"><a href="dashboard.php" class="nav-link">Tableau de bord</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Déconnexion</a></li>

            <?php
            }
            ?>
        </ul>
    </header>
</div>