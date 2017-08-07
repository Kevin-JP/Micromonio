<?php // $this->layout('layout', ['title' => 'Accueil']) ?>
<?php $this->layout('layout', ['title' => 'Home']) ?>

<?php $this->start('main_content') ?>
    <!--<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>-->
<!--    <a href="</?= $this->url('signin'); ?>">Se connecter</a><br>
    <a href="</?= $this->url('signup'); ?>">S'inscire</a><br>-->

<!--<ul>-->
<?php //foreach ($gamesList as $currentGame) : ?>
<!--    <li><img src="--><?//= $currentGame['vid_image'] ?><!--" style="height:200px" ></li>-->
<!--    <li>--><?//= $currentGame['vid_name'] ?><!--</li>-->
<?php //endforeach; ?>
<!--</ul>-->

<?php foreach ($gamesList as $currentGame) : ?>
     <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
        <div class="card">
            <img class="card-img-top" src="<?= $currentGame['vid_image'] ?>">
            <div class="card-block">
                <h5 class="text-bold"><?= $currentGame['vid_name'] ?></h5>
<!--                <div class="meta">-->
<!--                    <a href="#">Catégorie</a>-->
<!--                </div>-->
            </div>
            <div class="card-footer">
                <span class="float-left"><?= $currentGame['vid_year'] ?></span>
                <span class="center">PC</span>
                <span class="editor"><i class=""></i><?= $currentGame['vid_editor'] ?></span>
            </div>
        </div>
    </div>
<?php endforeach; ?>


    </?= print_r($_SESSION); ?>
    <?php if(!empty($_SESSION)) : ?>
        <?= $_SESSION['user']['usr_username'] ?> est connecté
    <?php endif; ?>
<?php $this->stop('main_content') ?>
