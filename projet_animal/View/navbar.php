<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../Controller/AccueilController.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if (isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Controller/PostsController.php">Voir les posts</a>
                </li>
            <?php endif; ?>
            </ul>

            <div>
                <?php if(!isset($_SESSION['user'])) : ?>
                    <a class="btn btn-primary" href="../Controller/ConnexionController.php">Se Connecter</a>
                    <a class="btn btn-success" href="../Controller/InscriptionController.php">S'inscrire</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="btn btn-danger" href="../Controller/DisconnectController.php">Se Déconnecter</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>