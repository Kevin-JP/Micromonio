<?php
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Reset du mot de passe'));
?>

<?php
//début du bloc main_content
$this->start('main_content');
?>

<div class="rowForm card card-container">
    <div class="col-xs-12">
        <div class="form-wrap">
            <?php if (!isset($_SESSION['UserID'])) : ?>
                <?php if ($formOK) : ?>
                    <!-- useless mettre action ? action vide reste dans la même page si vide.  -->
                    <!-- <form action="reset_password.php?token=<?php echo $_GET['token'] ?>" method="post" id="login-form"> -->
                    <form action="" method="post" id="login-form">
                        <!-- <input type="hidden" name="emailReset" value="<?php // echo $_GET['email'] ?>" > -->
                        <!-- <input type="hidden" name="tokenReset" value="<?php // echo $_GET['token'] ?>" > -->
                        <div class="form-group">
                            <label for="password1" class="sr-only">Password</label>
                            <input type="password" name="password1" id="key1" class="form-control" placeholder="Nouveau mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">Password</label>
                            <input type="password" name="password2" id="key2" class="form-control" placeholder="Confirmez mot de passe">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Confirmer">
                    </form>
                    <a href="<?= $this->url('users_forgotPassword') ?>" class="forget">Mot de passe oublié ?</a>
                    <a href="<?= $this->url('users_signup') ?>" class="forget">S'inscire</a>
                <?php else : ?>
                    <span style="text-align: center; ">Le token est invalide.<br><a href="<?= $this->url('users_forgotPassword') ?>" class="forget">Veuillez reformuler une nouvelle demande de réinitialisation du MDP</a>.</span>
                <?php endif; ?>  <!-- fin if formOK -->
            <?php else : ?>
                <div class="alert alert-danger">
                    <span>Vous êtes déjà connecté. </span>
                </div>
            <?php endif; ?> <!-- fin if qqn connecté -->
        </div>
    </div> <!-- /.col-xs-12 -->
</div> <!-- /.row -->

<?php
//fin du bloc
$this->stop('main_content');
?>