<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
        
        
		$this->show('default/home');
	}
    
    public function listGames() {   
        // crée un objet Model (pour table videogame)
        $model = new \Model\VideoGameModel;
        // FindAll est une méthode héritée de \W\Model\Model
        $videogames = $model->findAll();

//        foreach ($videogames as $key => $row) {
//            if ($row['con_id'] != 2) { // on unset les divisions de la conférence ouest => con_id = 2
//                unset($divisions[$key]);
//            }
//        }
        
        // Lance le template engine sur le fichier default/home
        $this->show('default/home', array(
            'gamesList' => $videogames
        ));
	}

}