<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Modifier JV'));
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<!--<h1>Liste des consoles</h1>-->
<div class="row row-sign">
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
    <form action="" method="POST">
        <!--select pour récupérer les données du jeu à modifier-->
        <div class="form-group">
            <label for="console">Modifier Jeu:</label>
            <select id="selectGame" name="console">
                <?php foreach ($games as $key=>$value) :?>
                    <option value="<?= $key+1 ?>"><?= $value['vid_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="title">Titre:</label>
            <input type="text" class="form-control"name="title" value="<?= $gameinfos['vid_name'] ?>">
        </div>
        <div class="form-group">
            <label for="editor">Éditeur:</label>
            <input type="text" class="form-control"name="editor" value="<?= $gameinfos['vid_editor'] ?>">
        </div>
        <div class="form-group">
            <label for="year">Année de sortie:</label>
            <input type="number" class="form-control"name="year" min='1980' max='2025' value="<?= $gameinfos['vid_year'] ?>">
        </div>
        <div class="form-group">
            <label for="image">Url de l'image:</label>
            <input type="text" class="form-control"name="image" value="<?= $gameinfos['vid_image'] ?>">
        </div>
        <div class="form-group">
            <label for="console">Console:</label>
            <select id="console" name="console">
                <?php foreach ($consoles as $key=>$value) :?>
                    <option value="<?= $key+1 ?>" <?php if ($gameinfos['console_con_id'] == $key+1) : ?> selected <?php endif; ?>><?= $value['con_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <select name="genre">
                <?php foreach ($genres as $key=>$value) :?>
                    <option value="<?= $key+1 ?>" <?php if ($gameinfos['genre_gen_id'] == $key+1) : ?> selected <?php endif; ?>><?= $value['gen_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Modifier</button>
    </form>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>
<script>
    $(document).ready(function(){
       $('#selectGame').change(function(){
           window.location.replace("http://micromonio.dev/admin/videogame/ajax/edit/"+$(this).val());
       });
        
    });
</script>



<?php 
//fin du bloc
$this->stop('main_content'); ?>