<?php
    class DB{
        public $conn;
        
        public function __construct() {
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "vcs_web0711_db";
            $this->conn = new mysqli($host, $user, $pass, $db);
        }   
    }



?>