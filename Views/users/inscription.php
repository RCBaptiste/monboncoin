<div class="container">
    <?php if ($errMsg) : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4>Warning !</h4>
            <p> <?= $errMsg ?></p>
        </div>
    <?php endif ?>
    <form method="POST">
        <div class="row justify-content-around my-2">
            <div class="col-12 col-md-4">
                <label for="login">Email</label>
                <input type="text" name="login" id="login" placeholder="Votre email" class="form-control">
            </div>
            <div class="col-12 col-md-4">
                <label for="prenom">Prénom</label>
                <input type="text" name="firstName" id="firstName" placeholder="Votre Prénom" class="form-control">
            </div>
            <div class="col-12 col-md-4">
                <label for="nom">Nom</label>
                <input type="text" name="lastName" id="lastName" placeholder="Votre Nom" class="form-control">
            </div>
            <div class="row justify-content-around my-2">
                <div class="col-12 col-md-4">
                    <label for="adress">Adresse</label>
                    <input type="text" name="adress" id="adress" placeholder="Votre adresse" class="form-control">
                </div>
                <div class="col-12 col-md-4">
                    <label for="cp">Code Postal</label>
                    <input type="text" name="cp" id="cp" placeholder="Votre code postal" class="form-control">
                </div>
                <div class="col-12 col-md-4">
                    <label for="city">Ville</label>
                    <input type="text" name="city" id="city" placeholder="Votre Ville" class="form-control">
                </div>
                <div class="row justify-content-around my-2">
                    <div class="col-12 col-md-4">
                        <label for="password">Mot de passe</label>
                        <input type="text" name="password" id="password" placeholder="Votre mot de passe" class="form-control">
                        <small id="emailHelp" class="form-text text-muted">Votre mot de passe doit contenir 8 caractères au minimum</small>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="password-confirm">Confirmation du mot de passe</label>
                        <input type="text" name="confirm" id="confirm" placeholder="Confirmez votre mot de passe" class="form-control">
                    </div>
                    <button class="btn btn-primary my-2">S'inscrire</button>
                </div>
    </form>
</div>