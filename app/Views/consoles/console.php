<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Liste des Jeux sur ' .$gamesList[0]['con_name']));
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<!-- on crée une liste des jeux --> 
<div class="row row-table">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Genre</th>
                <th>Année</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamesList as $currentGame) : ?>
            <tr>
                <td><a href="<?= $this->url('game_details', ['id'=>$currentGame['con_id'], 'conname'=>$currentGame['con_name'], 'id_game'=>$currentGame['vid_id'], 'vid_name'=> strtolower(str_replace(' ', '-', $currentGame['vid_name']))]); ?>"><?= $currentGame['vid_name'] ?></a></td>
                <td><?= $currentGame['gen_name'] ?></td>
                <td><?= $currentGame['vid_year'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php 
//fin du bloc
$this->stop('main_content'); ?>