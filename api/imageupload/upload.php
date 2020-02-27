<?php
    include "DBConnection.php";
    class Upload
    {
        protected $db;
        private $_name;
        private $_file_url;
 
        public function setName($name) {
            $this->_name = $name;
        }
        public function setFileURL($file_url) {
            $this->_file_url = $file_url;
        }
        
        public function __construct() {
            $this->db = new DBConnection();
            $this->db = $this->db->returnConnection();
        }
        // save function
        public function doSave() {
            $query = 'INSERT INTO upload_file SET name="'.$this->_name.'", file_url="'.$this->_file_url.'"';                
            $result = $this->db->query($query) or die($this->db->error);
        } 
    }
?>