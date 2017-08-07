<?php

namespace Model;

class VideoGameModel extends \W\Model\Model{
    function __construct() {
        $this->setPrimaryKey('vid_id');
        $this->setTable('videogame');
        
        parent::__construct();
    }

}
