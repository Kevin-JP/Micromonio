<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', array('title' => 'Console'));
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
<div class="row row-sign">
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <form action="" method="get">
			<div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
					<label for="console">Sélectionner une console à modifier:</label>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
                    <!--<label for="console">Modifier une console:</label>-->
                    <select id="selectConsole" class="form-control">
                        <option value="0">Ajouter une nouvelle console</option>
                        <?php foreach ($consoles as $key=>$value) :?>
                            <?php if (!isset($consoleEdit)) : ?>
                                <option value="<?= $key+1 ?>"><?= $value['con_name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $key+1 ?>" <?php if ($consoleEdit['con_id'] == $key+1) : ?> selected <?php endif; ?>><?= $value['con_name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
				</div>
<!--				<div class="col-md-3 col-sm-3 col-xs-12">
					<input type="submit" class="btn btn-success btn-block" value="Modifier" />
				</div>-->
			</div>
		</form>
        <form action="" method="POST">
            <div class="form-group">
                <label for="console">Console:</label>
                <input id="consoleId" type="hidden" name="consoleId" value="<?php if (!empty($consoleEdit['con_id'])) { echo $consoleEdit['con_id']; } ?>">
                <input id="console" type="text" class="form-control"name="console" value="<?php if (!empty($consoleEdit['con_id'])) { echo $consoleEdit['con_name']; } ?>">
            </div>
            <button id="submit" type="submit" class="btn btn-primary"><?php if (!empty($consoleEdit['con_id'])) { echo 'Modifier'; } else {echo 'Ajouter';} ?></button>
        </form>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>
<script>
    $(document).ready(function(){
        var url = '<?= $this->url('ajax_edit_console', ['id'=>'']); ?>';
        $('#selectConsole').change(function(){
            
            console.log($(this).val());
            $.ajax({
                url: url+$(this).val(),
                method: 'GET',
                dataType: 'json',
                success: function(response){
//                    console.log(response);
                    $('#consoleId').val(response.con_id);
                    $('#console').val(response.con_name);
                    $('#submit').html('Modifier');
                    if (response === false) {
                        console.log('ajouter');
                        $('#submit').html('Ajouter');
                    }
                }
            });
        });
        
    });
</script>



<?php 
//fin du bloc
$this->stop('main_content'); ?>