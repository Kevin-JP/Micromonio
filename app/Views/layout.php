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
                    <li><a href="<?= $this->url('default_home') ?>">Home</a></li>
                    <li><a href="<?= $this->url('consoles_showconsoles') ?>">Consoles</a></li>
                    <?php if(empty($_SESSION['user'])) : ?>
                        <li><a href="<?= $this->url('users_signin') ?>">Sign In</a></li>
                        <li><a href="<?= $this->url('users_signup') ?>">Sign up</a></li>
                    <?php endif; ?>    
                    <?php if(!empty($_SESSION['user'])) : ?>
                        <!--Si admin alors affiche page Add/Edit-->
                        <?php if($_SESSION['user']['usr_role'] === 'admin'): ?>
                            <li><a href="<?= $this->url('add_game') ?>">Ajout d'un JV</a></li>
                        <?php endif; ?>
                        <li><a href="<?= $this->url('users_signout'); ?>">Se déconnecter</a></li>
                        <li style="line-height: 50px; padding: 0 15px;"><?= $_SESSION['user']['usr_username'] ?> est connecté</li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    
	<div class="container" >
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>Micromonio - <?= $this->e($title) ?></h1>
            </div>
                <!-- Gestion générique des messages d'erreur -->
                <?php if (!empty($w_flash_message)) : ?>
                <div class="alert alert-<?= $w_flash_message->level ?>"><?= $w_flash_message->message ?></div>
                <?php endif; ?>
        
                <?= $this->section('main_content') ?>
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