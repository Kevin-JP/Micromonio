<?php

namespace Controller;

use W\Controller\Controller;

class VideoGameController extends Controller{
    
    public function addGame() {
        $this->allowTo('admin');
        
        $consoleModel = new \Model\ConsoleModel();
        $consoles = $consoleModel->findAll();
        
        $genreModel = new \Model\GenreModel();
        $genres = $genreModel->findAll();
        
        if (!empty($_POST)) {
//            debug($_POST);
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $editor = isset($_POST['editor']) ? trim($_POST['editor']) : '';
            $image = isset($_POST['image']) ? trim($_POST['image']) : '';
            $year = isset($_POST['year']) ? trim($_POST['year']) : '';
            $editor = isset($_POST['editor']) ? trim($_POST['editor']) : '';
            $genre = isset($_POST['genre']) ? trim($_POST['genre']) : '';
         
            $formValide = true;

            if (empty($title)) {
                $this->flash("Veuillez renseigner le nom du film", 'danger');                
                $formValide = false;
            }
            else if (strlen($movieTitle) < 4) {
                $errorList[] = "Le nom du film doit contenir au moins 4 caractères<br>";
                $formValide = false;
            }
            if (empty($movieActors)) {
                $errorList[] = "Veuillez renseigner les acteurs<br>";
                $formValide = false;
            }
            else if (strlen($movieActors) < 5) {
                $errorList[] = "Le champ des acteurs doit contenir au moins 5 caractères<br>";
                $formValide = false;
            }
            if (empty($movieSynopsis)) {
                $errorList[] = "Veuillez renseigner le synopsis<br>";
                $formValide = false;
            }
            else if (strlen($movieSynopsis) < 5) {
                $errorList[] = "Le synopsis doit contenir au moins 5 caractères<br>";
                $formValide = false;
            }
            if (empty($movieYear)) {
                $errorList[] = "Veuillez renseigner l'année de sortie du film'<br>";
                $formValide = false;
            }
            if (empty($movieCategory)) {
                $errorList[] = "Veuillez renseigner la catégorie du film'<br>";
                $formValide = false;
            }
            if (empty($supportDevice)) {
                $errorList[] = "Veuillez renseigner le support de stockage du film'<br>";
                $formValide = false;
            }
            if (empty($moviePath)) {
                $errorList[] = "Veuillez renseigner le chemin absolu vers le film'<br>";
                $formValide = false;
            }
            if (empty($movieImage)) {
                $errorList[] = "Veuillez renseigner l'url de l'affiche<br>";
                $formValide = false;
            }
            if (!filter_var($movieImage, FILTER_VALIDATE_URL)) {
                $errorList[] = "Le lien url n'est pas valide<br>";
                $formValide = false;
            }
            
        }
        
        
        $this->show('admin/add', array(
            'consoles'=> $consoles,
            'genres'=> $genres
        ));
    }
}
