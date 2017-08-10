<?php
	
	$w_routes = array(
//		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/', 'Default#listGames', 'default_home'],
		
        // consoles
        ['GET', '/consoles/', 'Console#showConsoles', 'consoles_showconsoles'],
        ['GET', '/consoles', 'Console#showConsoles', 'consoles_showconsoles2'],
        
        // console
        ['GET', '/consoles/[i:id]-[a:conname]/', 'Console#showGames', 'console_id'],
//        ['GET', '/consoles/[i:id]/', 'Console#showGames', 'console_id'],
        ['GET', '/consoles/[i:id]', 'Console#showGames', 'console_id2'],
        
        
        // Add/Edit/Delete Game
        ['GET|POST', '/admin/videogame/add/', 'VideoGame#addGame', 'add_game'],
//        ['POST', '/admin/videogame/ajax/add/', 'VideoGame#addGame', 'ajax_add_game'],
        ['GET', '/admin/videogame/ajax/edit/[i:id]', 'VideoGame#getGame', 'edit_game'],
        ['POST', '/admin/videogame/ajax/edit/[i:id]', 'VideoGame#editGame', 'edit_game2'],
        ['GET|POST', '/admin/videogame/delete/[i:id]', 'VideoGame#deleteGame', 'delete_game'],
        
        // Add/Edit/Delete Console
        ['GET|POST', '/admin/console/add/', 'Console#addEditConsole', 'add_console'],
        ['GET|POST', '/admin/console/edit/[i:id]', 'Console#editConsole', 'edit_console'],
        ['GET|POST', '/admin/console/ajax/edit/[i:id]', 'Console#ajaxEditConsole', 'ajax_edit_console'],
        ['GET|POST', '/admin/console/delete/', 'Console#deleteConsole', 'delete_console'],

        
        // Users signin & signup
        ['GET', '/signin/', 'Users#signin', 'users_signin'],
        ['POST', '/signin/', 'Users#signinPost', 'users_signin_post'],
        ['GET|POST', '/signup/', 'Users#signup', 'users_signup'],
        ['GET', '/signout/', 'Users#signout', 'users_signout'],
        
        // Forgot Pass
        ['GET|POST', '/forgot_password/', 'Users#forgotPassword', 'users_forgotPassword'],
        
        // Forgot Pass
        ['GET', '/reset_password/[:token]', 'Users#getResetPasswordForm', 'users_resetPassword'],
        ['POST', '/reset_password/[:token]', 'Users#resetPassword', 'users_resetPassword2'],
        
        // Détails - on récupère que l'id dans le controlleur, osef du nom
        ['GET', '/consoles/[i:id]-[a:conname]/[i:id_game]-[:vid_name]/', 'VideoGame#details', 'game_details'],
	);