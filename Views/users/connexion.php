<?php
if (isset($_SESSION['messages'])) {
    $message = $_SESSION['messages'];
    unset($_SESSION['messages']);

    echo '<div class="alert alert-dismissible alert-info">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4> Félicitations !</h4>
    <p class="mb-0">' . $message . '</p>
</div>';
}
?>


<div class="container">
    <?php if ($errMsg) : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4>Warning !</h4>
            <p> <?= $errMsg ?></p>
        </div>
    <?php endif ?>
    <form method="POST">
        <div class="row justify-content-around">
            <div class="col-12 col-md-4">
                <label for="login">Email</label>
                <input type="text" name="login" id="login" placeholder="Votre email" class="form-control">
                <div class="col-12 col-md-4 w-100">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">
                </div>
                <button class="btn btn-primary my-2 w-100">Connexion</button>
                <div class="text-center">Pas encore de compte ? <a href="inscription" class="">S'inscrire</a></div>
    </form>
</div>