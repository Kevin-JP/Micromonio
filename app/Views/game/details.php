<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Détails du Jeu'));
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<!-- on crée une liste des jeux --> 
<div class="row row-table">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th><img src="<?= $gameinfos['vid_image'] ?>"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Titre: </strong><?= $gameinfos['vid_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Années de sortie: </strong><?= $gameinfos['vid_year'] ?></td>
            </tr>
            <tr>
                <td><strong>Éditeur: </strong><?= $gameinfos['vid_editor'] ?></td>
            </tr>
            <tr>
                <td><strong>Console: </strong><?= $gameinfos['con_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Genre: </strong><?= $gameinfos['gen_name'] ?></td>
            </tr>
            <?php if(!empty($_SESSION['user'])) : ?>
                <!--Si admin alors affiche page Add/Edit-->
                <?php if($_SESSION['user']['usr_role'] === 'admin'): ?>
                    <tr>
                        <td>
                            <a class="btn-primary btn-sm" href="<?= $this->url('edit_game', ['id'=>$gameinfos['vid_id']]); ?>">Modifier</a>
                            <a class="btn-danger btn-sm" href="<?= $this->url('delete_game', ['id'=>$gameinfos['vid_id']]); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
        </tbody>        
    </table>
</div>

<?php 
//fin du bloc
$this->stop('main_content'); ?>