<?php
//var_dump($annonces);
//var_dump($categories);
?>
<?php if(!isset($_GET['idCategorie']) || empty($_GET['idCategorie'])) : ?>
    <h2 class="mt-4 text-center">Toutes les catégories</h2>
<?php else : ?>
    <?php if(!$annonces) : ?>
        <h2>Il n'y a pas d'annonces dans cette catégorie.</h2>
        <?php else : ?>
    <h2 class="mt-4 text-center"> Annonces de la catégorie : <?= $annonces[0]['nameCat']?></h2>
    <?php endif ?>
<?php endif ?>

    

<!-- Formulaire de tri -->
    <div>
            <form method="GET" class="row justify-content-around mb-5">
            <div class="col-12 col-md-4">
                    <label for="idCategorie" class="form-label">Filtrer par catégorie</label>
                    <select name="idCategorie" id="categorie" class="form-select">
                        <option value="">Toutes les catégories</option>
                        <?php foreach($categories as $categorie) : ?>
                            <option value="<?= $categorie['idCategorie']?>"> <?= ucfirst( $categorie['title'])?></option>
                            <?php endforeach ?>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="price" class="form-label">Trier par prix</label>
                    <select name="order" id="order" class="form-select">
                            <option value="price ASC">Prix ascendant</option>
                            <option value="price DESC">Prix descendant</option>
                    </select>
                </div>
                <button class="btn btn-primary">
                    Trier
                </button>
            </form>
        </div>
    </div>
<!-- Section d'affichage des annonces -->
<div class="container border border-secondary p-5">
    <div class="row justify-content-around">
        <?php foreach ($annonces as $key => $annonce) : ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">
                    <p><u>Catégorie : <?= $annonce['nameCat'] ?></u></p>
                </div>
                <div class="card-body">
                    <h4 class="card-title"> <?= $annonce['nameCat'] ?> : <?= $annonce['price'] ?> €</h4>
                    <img src=" <?= SITEBASE ?>/img/annonces/<?= $annonce['image'] ?>" alt=" <?= $annonce['title'] ?>" class="img-fluid">
                    <p class="card-text"><?= $annonce['description'] ?></p>
                </div>
                <div class="card-footer text-center">
                    <a href="annonceDetail?id=<?= $annonce['idAnnonce'] ?>" class="btn btn-success">Voir le détail</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>