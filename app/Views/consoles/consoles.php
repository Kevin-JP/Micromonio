<?php 
//hérite du fichier layout.php à la racine de app/Views/
//$this->layout('layout', array('title' => 'Équipes de la division '.$divisionName.''));
$this->layout('layoutBootstrap', array('title' => 'Consoles'));
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<h1>Liste des équipes</h1>

<!--on crée une liste des divisions--> 
<ul>
<?php foreach ($teams as $currentTeam) : ?>
    <li><?= $currentTeam['tea_name'] ?></li>
<?php endforeach; ?>
</ul>

<a href="<?= $this->url('default_home'); ?>">Accueil</a>
<?php 
//fin du bloc
$this->stop('main_content'); ?>