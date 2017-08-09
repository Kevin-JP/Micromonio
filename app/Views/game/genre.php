<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Liste des genres dans la DB'));
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<!-- on crée une liste des jeux --> 
<div class="row row-table">
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td><strong><?= $genres['gen_id'] ?></strong></td>
            </tr>
            <tr>
                <td><?= $genres['gen_name'] ?></td>
            </tr>
            <tr>
                <a class="btn-primary btn-sm" href="</?= $this->url('edit_game', ['id'=>$gameinfos['vid_id']]); ?>">Modifier</a>
                <a class="btn-danger btn-sm" href="</?= $this->url('delete_game', ['id'=>$gameinfos['vid_id']]); ?>">Supprimer</a>
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