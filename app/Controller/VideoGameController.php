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
        
        $gameModel = new \Model\VideoGameModel();
        $games = $gameModel->findAll();
        
        if (!empty($_POST)) {
//            debug($_POST);
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $editor = isset($_POST['editor']) ? trim($_POST['editor']) : '';
            $image = isset($_POST['image']) ? trim($_POST['image']) : '';
            $year = isset($_POST['year']) ? trim($_POST['year']) : '';
            $console = isset($_POST['console']) ? trim($_POST['console']) : '';
            $genre = isset($_POST['genre']) ? trim($_POST['genre']) : '';
         
            $formValide = true;

            if (empty($title)) {
                $this->flash("Veuillez renseigner le titre du jeu", 'danger');                
                $formValide = false;
            }
            else if (strlen($title) < 4) {
                $this->flash('Le titre du jeu doit contenir au moins 4 caractères', 'danger');
                $formValide = false;
            }
            if (empty($editor)) {
                $this->flash("Veuillez renseigner l\'éditeur du jeu", 'danger');
                $formValide = false;
            }
            else if (strlen($editor) < 4) {
                $this->flash("Le champ de l'éditeur doit contenir au moins 5 caractères", 'danger');
                $formValide = false;
            }
            if (empty($image)) {
                $this->flash("Veuillez renseigner l'url de l'image du jeu", 'danger');
                $formValide = false;
            }
            else if (!filter_var($image, FILTER_VALIDATE_URL)) {
                $this->flash("Le lien url de l'image n'est pas valide", 'danger');
                $formValide = false;
            }
            if (empty($year)) {
                $this->flash("Veuillez renseigner l'année de sortie du jeu", 'danger');
                $formValide = false;
            }
            if (empty($console)) {
                $this->flash("Veuillez renseigner une console sur laquelle le jeu existe", 'danger');
                $formValide = false;
            }
            if (empty($genre)) {
                $this->flash("Veuillez renseigner le genre du jeu", 'danger');
                $formValide = false;
            }
            
            if ($formValide) {
                // insertion dans la DB
                $gameModel = new \Model\VideoGameModel();
                $data = $gameModel->insert(
                    array(
                        'vid_name' => $title,
                        'vid_editor' => $editor,
                        'vid_year' => $year,
                        'vid_image' => $image,
                        'console_con_id' => $console,
                        'genre_gen_id' => $genre
                    )
                );
                    
                // Si insertion ok
                if ($data !==false) { 
                    // afficher message success
                    $this->flash('Votre jeu a été ajouté', 'success');

                    // rediriger vers la home
                    $this->redirectToRoute('default_home');
                }
                else {
                    $this->flash('Erreur dans l\'ajout du jeu', 'danger');
                }
            }
        }
        
        $this->show('admin/add', array(
            'consoles'=> $consoles,
            'games'=> $games,
            'genres'=> $genres
        ));
    }
    
    public function getGame($id) {
        $this->allowTo('admin');
        
        // récupère tous les jeux, genres et consoles pour les selects
        $gameModel = new \Model\VideoGameModel;
        $games = $gameModel->findAll();
        
        $gameModel = new \Model\VideoGameModel;
        $gameinfos = $gameModel->getAllInfosGame($id);
        
        $consoleModel = new \Model\ConsoleModel();
        $consoles = $consoleModel->findAll();
        
        $genreModel = new \Model\GenreModel();
        $genres = $genreModel->findAll();

//        debug($games);exit;
        
        $this->show('admin/edit', array(
            'games'=> $games,
            'gameinfos'=> $gameinfos,
            'consoles'=> $consoles,
            'genres'=> $genres
        ));
    }
    
    public function editGame($id) {
        $this->allowTo('admin');
        
        
        if (!empty($_POST)) {
//            debug($_POST);
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $editor = isset($_POST['editor']) ? trim($_POST['editor']) : '';
            $image = isset($_POST['image']) ? trim($_POST['image']) : '';
            $year = isset($_POST['year']) ? trim($_POST['year']) : '';
            $console = isset($_POST['console']) ? trim($_POST['console']) : '';
            $genre = isset($_POST['genre']) ? trim($_POST['genre']) : '';
         
            $formValide = true;

            if (empty($title)) {
                $this->flash("Veuillez renseigner le titre du jeu", 'danger');                
                $formValide = false;
            }
            else if (strlen($title) < 4) {
                $this->flash('Le titre du jeu doit contenir au moins 4 caractères', 'danger');
                $formValide = false;
            }
            if (empty($editor)) {
                $this->flash("Veuillez renseigner l\'éditeur du jeu", 'danger');
                $formValide = false;
            }
            else if (strlen($editor) < 4) {
                $this->flash("Le champ de l'éditeur doit contenir au moins 5 caractères", 'danger');
                $formValide = false;
            }
            if (empty($image)) {
                $this->flash("Veuillez renseigner l'url de l'image du jeu", 'danger');
                $formValide = false;
            }
            else if (!filter_var($image, FILTER_VALIDATE_URL)) {
                $this->flash("Le lien url de l'image n'est pas valide", 'danger');
                $formValide = false;
            }
            if (empty($year)) {
                $this->flash("Veuillez renseigner l'année de sortie du jeu", 'danger');
                $formValide = false;
            }
            if (empty($console)) {
                $this->flash("Veuillez renseigner une console sur laquelle le jeu existe", 'danger');
                $formValide = false;
            }
            if (empty($genre)) {
                $this->flash("Veuillez renseigner le genre du jeu", 'danger');
                $formValide = false;
            }
            
            if ($formValide) {
                // insertion dans la DB
                $gameModel = new \Model\VideoGameModel();
                $data = $gameModel->update(
                    array(
                        'vid_name' => $title,
                        'vid_editor' => $editor,
                        'vid_year' => $year,
                        'vid_image' => $image,
                        'console_con_id' => $console,
                        'genre_gen_id' => $genre
                        ),
                $id);
                    
                // Si insertion ok
                if ($data !==false) { 
                    // afficher message success
                    $this->flash('Votre jeu a été modifié', 'success');

                    // rediriger vers la home
                    $this->redirectToRoute('default_home');
                }
                else {
                    $this->flash('Erreur dans l\'ajout du jeu', 'danger');
                }
            } 
        }
    }
    
    public function details($id=0, $console='', $gameId, $gameName='') {
//        echo $gameId;
  
        $gameModel = new \Model\VideoGameModel;
        $gameinfos = $gameModel->getAllInfosGame($gameId);

//        debug($gameinfos);exit;
        
        $this->show('details/details', array(
            'gameinfos'=> $gameinfos,
        ));

    }
}
