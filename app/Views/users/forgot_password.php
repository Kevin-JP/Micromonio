<?php
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Mot de passe oublié
'));
?>

<?php
//début du bloc main_content
$this->start('main_content');
?>

<div class="rowForm card card-container">
    <div class="col-xs-12">
        <div class="form-wrap">
            <form action="" method="post" id="login-form">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="" placeholder="Entrez votre adresse email" /><br />
                    <input type="submit" id="btn-login"class="btn btn-custom btn-lg btn-block" value="Récupérer" />
                </div>
            </form>
        </div>
    </div>
</div>

<?php
//fin du bloc
$this->stop('main_content');
?>