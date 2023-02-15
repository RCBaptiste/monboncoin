<?php
//var_dump($annonce);
?>

<?php if (!$msg) : ?>
    <div class="card">
        <div class="card-header bg-warning text-center">
            <h3 class="card-title"><?= $annonce['title'] ?></h3>
        </div>
        <div class="card-body text-center">
        <img src=" <?= SITEBASE ?>/img/annonces/<?= $annonce['image'] ?>" alt=" <?= $annonce['title'] ?>" class="imgAnnonce align-self-center img-thumbnail grow">
        <p>Description :</p>
        <p><?= $annonce ['description'] ?></p>
        </div>
        <div class="card-footer text-center">
            <p class="price"><?= $annonce['price'] ?> €</p>
            <a href="" class="btn btn-primary">Ajouter au panier</a>
        </div>
    </div>
<?php else : ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong> <?= $msg ?></strong> 
    </div>
<?php endif ?>