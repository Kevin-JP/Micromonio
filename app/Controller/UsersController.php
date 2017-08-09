<?php

namespace Controller;

use \W\Controller\Controller;

class UsersController extends Controller {

    public function signin() {
        $this->show('users/signin');
    }

    public function signinPost() {
        //debug($_POST);
        // Récupération des données
        $email = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '';
        $password = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '';
        
        // Validation des données
        $formValid = true;
        if (empty($email)) {
            $this->flash('Email vide', 'danger'); // Attention, un seul message en session :(
            $formValid = false;
        }
        
        if (empty($password)) {
            $this->flash('Mot de passe vide', 'danger'); // Attention, un seul message en session :(
            $formValid = false;
        }
        
        // Si tout est ok => on vérifie dans la DB
        if ($formValid) {
            $authModel = new \W\Security\AuthentificationModel();
            $userId = $authModel->isValidLoginInfo($email, $password);
            
            // Utilisateur existant
            if ($userId > 0) {
                // Je récupère les données en DB
                $usersModel = new \Model\UsersModel();
                $userInfos = $usersModel->find($userId);
                
                // passer en session
                $authModel->logUserIn($userInfos);
                
                // TODO rediriger vers la home
                $this->redirectToRoute('default_home');
            }
            else {
                $this->flash('Utilisateur/Mot de passe non reconnu', 'danger');
            }
        }
        
        // On affiche la vue, mais on arrivera ici que si erreur
        $this->show('users/signin');
    }

    public function signup() {
        // Formulaire
        if (!empty($_POST)) {
            // Récupération des données
            $username = isset($_POST['usernameToto']) ? trim($_POST['usernameToto']) : '';
            $email = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '';
            $password = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '';
            $password2 = isset($_POST['passwordToto2']) ? trim($_POST['passwordToto2']) : '';
            
            // Validation des données
            $formValid = true;
            if (empty($username)) {
                $this->flash('Username vide', 'danger'); // Attention, un seul message en session :(
                $formValid = false;
            }
            else if (!preg_match('/^[A-Za-z0-9_]{3,}$/', $username)) {
                $this->flash('Username incorrect (au moins 3 caractères alphanumériques)', 'danger'); // Attention, un seul message en session :(
                $formValid = false;
            }
            if (empty($email)) {
                $this->flash('Email vide', 'danger');
                $formValid = false;
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $this->flash('Email incorrect', 'danger');
                $formValid = false;
            }
            if (empty($password) || empty($password2)) {
                $this->flash('Mot de passe vide', 'danger');
                $formValid = false;
            }
            else if ($password != $password2) {
                $this->flash('Les 2 mots de passe sont différents', 'danger');
                $formValid = false;
            }
            
            // Si tout est ok
            if ($formValid) {
                // vérifier si email et/ou username existe déjà
                $usersModel = new \Model\UsersModel();
                if ($usersModel->getUserByUsernameOrEmail($email) !== false) {
                    $this->flash('L\'email existe déjà', 'danger');
                    $formValid = false;
                }
                else if ($usersModel->getUserByUsernameOrEmail($username) !== false) {
                    $this->flash('Le username existe déjà', 'danger');
                    $formValid = false;
                }
                
                if ($formValid) {
                    // insertion dans la DB
                    $authModel = new \W\Security\AuthentificationModel();
                    $data = $usersModel->insert(
                        array(
                            'usr_username' => $username,
                            'usr_email' => $email,
                            'usr_role' => 'user',
                            'usr_password' => $authModel->hashPassword($password)
                        )
                    );
                    
                    // Si insertion ok
                    if ($data !==false) {
                        // connexion de l'utilisateur
                        $authModel->logUserIn($data);
                        
                        // afficher message success
                        $this->flash('Inscription réussie', 'success');
                        
                        // rediriger vers la home
                        $this->redirectToRoute('default_home');
                    }
                    else {
                        $this->flash('Erreur dans l\'insertion', 'danger');
                    }
                }
            }
        }
        
        $this->show('users/signup', array(
            'username' => isset($username) ? $username : '',
            'email' => isset($email) ? $email : ''
        ));
    }
    
    public function signout() {
        $authModel = new \W\Security\AuthentificationModel();
        $authModel->logUserOut();
        
        $this->flash('Déconnecté', 'info');
        $this->redirectToRoute('default_home');
    }
    
    
    public function forgotPassword() {
        if (!empty($_POST)) {
            $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';

            // Validation
            $formValid = true;

            if (empty($email)){
                $this->flash('L\'émail est vide', 'danger');
                $formValid = false;
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $this->flash('L\'émail est invalide', 'danger');
                $formValid = false;
            }

            if ($formValid) {
                // check si email existe
                $usersModel = new \Model\UsersModel();
                if ($usersModel->emailExists($email) === true){
                    // echo "user trouvé<br>";

                    // Je récupère les données de l'utilisateur via l'email afin de récupérer l'id
                    $userInfos = $usersModel->getUserByUsernameOrEmail($email);
                    $userID = $userInfos['id'];
                    // echo 'id du user: '.$userID.'<br>';

                    // générer un token
                    $tokenModel = new \W\Security\StringUtils();
                    $token = $tokenModel->randomString();
                    
                    // ajout du token dans la DB
                    $authModel = new \W\Security\AuthentificationModel();
                    $data = $usersModel->update(
                        array(
                            'usr_token' => $token,
                        ), $userID
                    );
                    
                    // Si insertion ok
                    if ($data !== false) {                      
                        // afficher message success
                        $this->flash('Un mail vous a été envoyé', 'success');
                        
                        //appeler fonction sendEmail avec token                  
                        $link= 'www.micromonio.dev/reset_password/'.$token.'';
                        $to = $userInfos['usr_email'];
//                        $to = 'jesus.kevin93@hotmail.com';

//                        $htmlContent = 'Test link : <a href"'.$link.'">Lien</a><br>';     

//                        $htmlContent = 'Test link : <a href="www.micromonio.dev/reset_password/'.$token.'">Lien</a><br>';     
                        $htmlContent = 'Cliquez sur le lien suivant pour réinitialiser votre mot de passe: '.$link.'';


                        $usersModel->sendEmail($to, 'Reset du mot de passe', $htmlContent);
                        
                        // rediriger 
                        $this->redirectToRoute('users_forgotPassword');
                    }
                    else {
                        $this->flash('Erreur dans l\'insertion du token', 'danger');
                    }
                }
                else {
                    $this->flash('L\'email n\'existe pas', 'danger');
                }
            } // fin if formvalid
        } // fin POST
        
        $this->show('users/forgot_password');
    }
    
    public function getResetPasswordForm($token) {

        // variable $formOK pour afficher ou pas le formulaire de renouvellement de mdp
        // devient true uniquement si le token envoyé en url correspond à celui de la DB
        $formOK = true;

        $userModel = new \Model\UsersModel();
        $data = $userModel->searchToken(array(
            'usr_token' => $token
        ));
        
        // si user trouvé
        if (!empty($data)) {                     
            $formOK = true;
            // rediriger 
            $this->show('users/reset_Password', array(
                'formOK' => $formOK,
            ));
        }
        else {
            $formOK = false;
            $this->show('users/reset_Password', array(
                'formOK' => $formOK,
            ));
        }
    }
    
    public function resetPassword($token) {
        // changer mot de passe
        if (!empty($_POST)) {
            $password1 = isset($_POST['password1']) ? trim($_POST['password1']) : '';
            $password2 = isset($_POST['password2']) ? trim($_POST['password2']) : '';
            // Validation
            $formValid = true;    
            
            if ($password1 !== $password2){
                $formValid = false;
                $this->flash('Les 2 mots de passe doivent être identiques !', 'danger');
            }
            else {
                if (empty($password1)){
                    $formValid = false;
                    $this->flash("Le password est vide", 'danger');
                }
                if (strlen($password1) < 6) {
                    $formValid = false;
                    $this->flash("Le password doit faire au moins 6 caractères", 'danger');
                }
            }
//            debug($data);exit;
            // modifier le nouveau mdp et supprimer le token de la DB
            if ($formValid) {
                
                // je récupère toutes les données du user selon le token reçu
                $userModel = new \Model\UsersModel();
                $data = $userModel->searchToken(array(
                    'usr_token' => $token
                ));
 
                $authModel = new \W\Security\AuthentificationModel;
                $updateData = $userModel->update(array(
                    'usr_password' => $authModel->hashPassword($password1),
                    'usr_token' => '',
                ),$data[0]['id']);
                
//            debug($updateData);exit;
                
                // Si update réussit
                if ($updatedata !== false) {
                    // afficher message success
                    $this->flash('Votre mot de passe a été réinitialisé.<br>Vous pouvez désormais vous connecter avec le nouveau mot de passe', 'success');

                    // rediriger vers la home
                    $this->redirectToRoute('users_signin');
                }
                else {
                    $this->flash('Erreur dans la réinitialisation du mot de passe', 'danger');
                }
            }
            
        }
        
        $this->show('users/reset_password');
    }
}
