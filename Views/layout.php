<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Bootswatch Lux-->
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <!-- CDN icon bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Lien vers notre CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- Pour rendre le title dynamique -->
    <title><?= $title ?></title>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=<?= SITEBASE ?>>Mon Bon Coin
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="annonces">Toutes les annonces</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

        <!-- Titre Dynamique-->
        <h1 class="m-5 text-center">
        <?= $title ?>
    </h1>
    <!--Ici nous récupérons les données à afficher-->
    <div class="container">
        <?= $content //Affichage des données ?>  <!-- < ? = equivaut à < ? php echo -->
        
    </div>

    <footer class=" m-5 text-center">Baptiste &copy; 2023</footer>
</body>
</html>