<div class="container">
    <?php if ($errMsg) : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4>Warning !</h4>
            <p> <?= $errMsg ?></p>
        </div>
    <?php endif ?>
<form method="POST" enctype="multipart/form-data">
    <select name="idCategorie" id="categorie" class="form-select">
        <option value="">Selectionner une Categorie :</option>
        <?php foreach ($categories as $categorie) : ?>
            <!-- J'ajoute "selected" si l'idCategorie de l'annonce correspond à l'idCategorie de la categorie-->
            <option value="<?= $categorie['idCategorie'] ?>"<? $annonce['idCategorie'] == $categorie['idCategorie'] ? "selected" : null ?><?= ucfirst($categorie['title']) ?></option>
        <?php endforeach ?>
    </select>
    <div class="my-3">
        <label for="title" class="form-label">Nom de l'annonce</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Titre">
    </div>
    <div class="form-group my-3">
        <label for="price" class="form-label">Prix</label>
        <div class="input-group">
            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Prix">
            <span class="input-group-text">€</span>
        </div>
    </div>
    <div class="form-group">
        <label for="Description" class="form-label mt-4">Description</label>
        <textarea name="description" class="form-control" id="description" rows="3"><?= $annonce['description']?></textarea>
    </div>
    <div class="form-group">
        <label for="photo" class="form-label">Photo</label>
        <p>Si vide, nous conserverons l'ancienne image : <img src="<?= SITEBASE ?>/img/annonces/<?= $annonce['image'] ?>" alt="<?= $annonce['title']?>" class="logo"></p>
        <input type="file" name="image" id="image" class="form-control">
        <small class="form-text text-muted">(max 3Mo, format acceptés : jpg, jpeg, png)</small>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>