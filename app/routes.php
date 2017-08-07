<?php
	
	$w_routes = array(
//		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/', 'Default#listGames', 'default_home'],
		
        // console
        ['GET', '/console/', 'Console#listGames', 'console_show'],
        ['GET', '/console', 'Console#listGames', 'console_show2'],
	);