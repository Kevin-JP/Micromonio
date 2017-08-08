<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller {

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}
    
    public function listGames() {   
        // crée un objet Model (pour table videogame)
        $gameModel = new \Model\VideoGameModel;
        // récupère toutes les JV
        $videogames = $gameModel->getConsoleName();
        // mélange les résultats
        shuffle($videogames);
        // récupère que les 4 premiers JV de l'array
        $videogames = array_slice($videogames, 0, 4);
        
        
        
        // Lance le template engine sur le fichier default/home
        $this->show('default/home', array(
            'gamesList' => $videogames
        ));
	}

}