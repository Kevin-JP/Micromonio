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
        
        
        // Add/Edit Game
        ['GET|POST', '/admin/videogame/add/', 'VideoGame#addGame', 'add_game'],
//        ['POST', '/admin/videogame/ajax/add/', 'VideoGame#addGame', 'ajax_add_game'],
        
        
        
        // Users signin & signup
        ['GET', '/signin/', 'Users#signin', 'users_signin'],
        ['POST', '/signin/', 'Users#signinPost', 'users_signin_post'],
        ['GET|POST', '/signup/', 'Users#signup', 'users_signup'],
        ['GET', '/signout/', 'Users#signout', 'users_signout'],
	);