<?php

namespace Controller;

use \W\Controller\Controller;

class ConsoleController extends Controller{
    
    public function showConsoles(){  
        $this->allowTo(array('admin', 'user'));
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
        $this->allowTo(array('admin', 'user'));
        // récupère toutes les consoles
        $gameModel = new \Model\VideoGameModel;
        $games = $gameModel->getGamesBasedOnConsole($consoleId);
        
//        debug($games);exit;
        
//        debug($consoles);
		$this->show('consoles/console', array(
            'gamesList' => $games,
        ));
	}
    
    public function addEditConsole() {
        $consoleModel = new \Model\ConsoleModel();
        $consoles = $consoleModel->findAll();
        
        if (!empty($_POST)) {
            $console = isset($_POST['console']) ? trim($_POST['console']) : '';
            
            // Validation des données
            $formValid = true;
            if (empty($console)) {
                $this->flash('Veuillez indiquer le nom de la console', 'danger'); 
                $formValid = false;
            }
            else if (strlen($console) < 2) {
                $this->flash('Le nom de la console doit comporter au moins 2 caractès', 'danger');
                $formValid = false;
            }
            
            if ($formValid) {
                // si console id n'existe pas alors on add la console sinon on edit
                if (empty($_POST['consoleId'])) {
                    $consoleData = $consoleModel->insert(array('con_name' => $console));
                    
                    // si update réussi
                    if ($consoleData !== false) {
                        $this->flash('Console ajoutée', 'success');
                        
                        // rediriger vers la home
                        $this->redirectToRoute('add_console');
                    }
                    else {
                        $this->flash('Erreur dans l\'ajout de la console', 'danger');
                    }
                }
                else{
                    $consoleID = isset($_POST['consoleId']) ? intval($_POST['consoleId']) : 0;
                    var_dump($_POST);exit;
                    $consoleData = $consoleModel->update(array('con_name' => $console), $consoleID, true);
                    
                    // si update réussi
                    if ($consoleData !== false) {
                        $this->flash('Console modifié', 'success');
                        
                        // rediriger vers la home
                        $this->redirectToRoute('add_console');
                    }
                    else {
                        $this->flash('Erreur dans la modification', 'danger');
                    }
                }
            }
            
        }
        $this->show('admin/add_edit_console', array(
            'consoles' => $consoles,
        ));
    }
    
    public function ajaxEditConsole($id) {
        $consoleModel = new \Model\ConsoleModel();
        $consoleInfos = $consoleModel->find($id);
        
        return $this->showJson($consoleInfos);
        
    }
    
    public function editConsole($id) {
        $consoleModel = new \Model\ConsoleModel();
        $consoles = $consoleModel->findAll();
        $consoleInfos = $consoleModel->find($id);
        
        if (!empty($_POST)) {
            $console = isset($_POST['console']) ? trim($_POST['console']) : '';
            
            // Validation des données
            $formValid = true;
            if (empty($console)) {
                $this->flash('Veuillez indiquer le nom de la console', 'danger'); 
                $formValid = false;
            }
            else if (strlen($console) < 2) {
                $this->flash('Le nom de la console doit comporter au moins 2 caractès', 'danger');
                $formValid = false;
            }
            
            if ($formValid) {
                // si con_id existe alors edit console sinon add nouvelle console
                if(!empty($_POST['consoleId'])) {
                    $consoleID = isset($_POST['consoleId']) ? intval($_POST['consoleId']) : 0;
                    
                    $consoleData = $consoleModel->update(array('con_name' => $console), $consoleID, true);
                    
                    // si update réussi
                    if ($consoleData !== false) {
                        $this->flash('Console modifié', 'success');
                        
                        // rediriger vers la home
                        $this->redirectToRoute('add_console');
                    }
                    else {
                        $this->flash('Erreur dans la modification', 'danger');
                    }
                }
                else if (empty($_POST['consoleId'])) {
                    $consoleData = $consoleModel->insert(array('con_name' => $console));
                    
                    // si update réussi
                    if ($consoleData !== false) {
                        $this->flash('Console ajoutée', 'success');
                        
                        // rediriger vers la home
                        $this->redirectToRoute('add_console');
                    }
                    else {
                        $this->flash('Erreur dans l\'ajout de la console', 'danger');
                    }
                }
            }
        }
        
        $this->show('admin/add_edit_console', array(
            'consoleEdit' => $consoleInfos,
            'consoles' => $consoles,
        ));
    }
}
