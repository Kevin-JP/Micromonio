<?php

namespace Controller;

use \W\Controller\Controller;

class ConsoleController extends Controller{
    
    public function home(){
		$this->show('default/home');
	}
}
