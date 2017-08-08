<?php $this->layout('layout', ['title' => 'Home']) ?>

<?php $this->start('main_content') ?>
    <!--<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>-->
<!--    <a href="</?= $this->url('signin'); ?>">Se connecter</a><br>
    <a href="</?= $this->url('signup'); ?>">S'inscire</a><br>-->


<div class="row row-panel">
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
                    <span class="center"><a href="<?= $this->url('console_id', ['id'=>$currentGame['con_id'], 'conname'=>$currentGame['con_name']]); ?>"><?= $currentGame['con_name'] ?></a></span>
                    <span class="editor"><a href="<?= $this->url('edit_game', ['id'=>$currentGame['vid_id']]); ?>">Modifier</a></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


    </?= print_r($_SESSION); ?>

<?php $this->stop('main_content') ?>
