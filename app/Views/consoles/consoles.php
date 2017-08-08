<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Liste des Consoles'));
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<!--<h1>Liste des consoles</h1>-->

<!-- on crée une liste des consoles --> 
<div class="row row-table">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom de la console</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consoles as $currentConsole) : ?>
            <tr>
                <td><?= $currentConsole['con_name'] ?></td>
                <td><a href="<?= $this->url('console_id', ['id'=>$currentConsole['con_id'], 'conname'=>$currentConsole['con_name']]); ?>">Liste des jeux</a></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>





<?php 
//fin du bloc
$this->stop('main_content'); ?>