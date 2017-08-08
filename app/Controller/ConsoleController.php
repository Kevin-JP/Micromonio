<?php

namespace Controller;

use \W\Controller\Controller;

class ConsoleController extends Controller{
    
    public function showConsoles(){  
        // récupère toutes les consoles
        $consoleModel = new \Model\ConsoleModel;
        $consoles = $consoleModel->findAll();
        
//        debug($consoles);
		$this->show('consoles/consoles', array(
            'consoles' => $consoles,
        ));
	}
    
    // affiche les jeux selon la console
    public function showGames($consoleId){  
        // récupère toutes les consoles
        $gameModel = new \Model\VideoGameModel;
        $games = $gameModel->getGamesBasedOnConsole($consoleId);
        
//        debug($games);exit;
        
//        debug($consoles);
		$this->show('consoles/console', array(
            'gamesList' => $games,
        ));
	}
}
