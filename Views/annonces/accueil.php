<?php
//var_dump($annonces);
?>

<h2 class="mt-4"> <?= $title ?></h2>

<div class="container border border-secondary p-5">
    <div class="row justify-content-around">
        <?php foreach ($annonces as $key => $annonce) : ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">
                    <p><u>Catégorie : <?= $annonce['NameCat'] ?></u></p>
                </div>
                <div class="card-body">
                    <h4 class="card-title"> <?= $annonce['title'] ?> : <?= $annonce['price'] ?> €</h4>
                    <img src=" <?= SITEBASE ?>/img/annonces/<?= $annonce['image'] ?>" alt=" <?= $annonce['title'] ?>" class="img-fluid">
                    <p class="card-text"><?= $annonce['description'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>