<?php
    include "constants.php";
    class DBConnection {
        private $_con;
        function __construct(){
            $this->_con = new mysqli('localhost', 'root', '','social');      
            if ($this->_con->connect_error) die('Database error -> ' . $this->_con->connect_error);
        }
        // return Connection
        function returnConnection() {
            return $this->_con;
        }
    }
?>