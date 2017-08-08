<?php

namespace Model;

class ConsoleModel extends \W\Model\Model{
    function __construct() {
        $this->setPrimaryKey('con_id');
        
        parent::__construct();
    }
    
    
}
