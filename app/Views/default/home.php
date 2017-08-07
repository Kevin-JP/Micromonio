<?php // $this->layout('layout', ['title' => 'Accueil']) ?>
<?php $this->layout('layout', ['title' => 'Micromonio']) ?>

<?php $this->start('main_content') ?>
    <!--<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>-->
<!--    <a href="</?= $this->url('signin'); ?>">Se connecter</a><br>
    <a href="</?= $this->url('signup'); ?>">S'inscire</a><br>-->

<ul>
<?php foreach ($gamesList as $currentGame) : ?>
    <li><img src="<?= $currentGame['vid_image'] ?>" style="height:200px" ></li>
    <li><?= $currentGame['vid_name'] ?></li>
<?php endforeach; ?>
</ul>

    </?= print_r($_SESSION); ?>
    <?php if(!empty($_SESSION)) : ?>
        <?= $_SESSION['user']['usr_username'] ?> est connecté
    <?php endif; ?>
<?php $this->stop('main_content') ?>
