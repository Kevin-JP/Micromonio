<?php
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Sign in'));
?>

<?php
//début du bloc main_content
$this->start('main_content');
?>

<div class="row row-sign">
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        Pas encore de compte ? => <a href="<?= $this->url('users_signup') ?>">créer un compte</a><br><br>
        <form method="post" action="">
            <fieldset>
                <input type="text" class="form-control" name="emailToto" value="" placeholder="Username or Email address" /><br />
                <input type="password" class="form-control" name="passwordToto1" value="" placeholder="Your password" /><br />
                <input type="submit" class="btn btn-primary btn-block" value="Sign in" />
            </fieldset>
        </form>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>

<?php
//fin du bloc
$this->stop('main_content');
?>