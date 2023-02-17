<?php
//var_dump($annonces);
if (isset($_SESSION['messages'])){
    $message = $_SESSION['messages'];
    unset($_SESSION['messages']);

    echo '<div class="alert alert-dismissible alert-info">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4> Félicitations !</h4>
    <p class="mb-0">' . $message. '</p>
</div>';
}
?>

<h3><?= $_SESSION['user']['id'] == 1 ? "Toutes les annonces du site :" : "Vos annonces :" ?></h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Prix</th>
            <th>Image</th>
            <th>Catégorie</th>
            <th>Détail</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($annonces as $annonce): ?>
            <tr>
                <td><?= $annonce['title'] ?></td>
                <td><?= $annonce['price'] ?></td>
                <td><img src="<?= SITEBASE ?>/img/annonces/<?= $annonce['image'] ?>" alt="<?= $annonce['title'] ?>" class="logo grow"></td>
                <td><?= $annonce['nameCat'] ?></td>
                <td><a href="annonceDetail?id=<?= $annonce['idAnnonce'] ?>" class="btn btn-primary"><i class="bi bi-binoculars"></i></a></td>
                <td><a href="annonceModif?id=<?= $annonce['idAnnonce'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></td> Modifier</a></td>
                <td><a href="annonceSup?operation&id=<?= $annonce['idAnnonce'] ?>" class="btn btn-primary"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>