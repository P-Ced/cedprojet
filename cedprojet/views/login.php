<?php ob_start() ?>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="login">Pseudo</label>
            <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp" placeholder="Entrer votre Pseudo" >
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" >
            <small id="loginHelp" class="form-text text-muted">Ne jamais divulguer votre mot de passe.</small>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
        <p></p>
        <p>Pas de compte?</p>
        <a href="<?=URL . 'register'?>"><button type="button" class="btn btn-primary" >S'inscrire</button></a>
    </form>
</div>
<?php
$title = 'S\'identifier';
$content = ob_get_clean();
include 'includes/layout.php';
?>
