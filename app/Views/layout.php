<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Micromonio</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?= $this->url('default_home') ?>">Home</a></li>
                    <li><a href="</?= $this->url('console') ?>">Consoles</a></li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
            </div>
        </nav>
    </header>
	<div class="container" >
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>Micromonio - <?= $this->e($title) ?></h1>
            </div>
            
            <div class="panel-body">
                <?= $this->section('main_content') ?>
            </div><br>
            
            <?php if(!empty($_SESSION)) : ?>
                <a href="<?= $this->url('signout'); ?>">se déconnecter</a><br>
            <?php endif; ?>
        </div>

		<footer>
		</footer>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>