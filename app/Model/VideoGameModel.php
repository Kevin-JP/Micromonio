<?php

namespace Model;

class VideoGameModel extends \W\Model\Model{
    function __construct() {
        $this->setPrimaryKey('vid_id');
        $this->setTable('videogame');
        
        parent::__construct();
    }
    
    function getConsoleName() {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $this->primaryKey .'  = :id LIMIT 1';
        $sql = 'SELECT * FROM ' . $this->table . ' INNER JOIN console ON con_id = console_con_id';
//        $sql = 'SELECT * FROM videogame INNER JOIN console ON con_id = console_con_id';
        $sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
    }
    
    function getGamesBasedOnConsole($id) {
//        $sql = 'SELECT * FROM ' . $this->table . ' INNER JOIN console ON con_id = console_con_id WHERE console_con_id = ' . $id ;
        $sql = 'SELECT * FROM videogame INNER JOIN console ON con_id = console_con_id INNER JOIN genre ON gen_id = genre_gen_id WHERE console_con_id = ' . $id ;
//        $sql = 'SELECT * FROM videogame INNER JOIN console ON con_id = console_con_id';
        $sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
    }

}
