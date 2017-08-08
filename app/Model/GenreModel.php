<?php

namespace Model;

class GenreModel extends \W\Model\Model{
    function __construct() {
        $this->setPrimaryKey('vid_id');
        $this->setTable('genre');
        
        parent::__construct();
    }
}
