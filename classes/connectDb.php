<?php
    // класс для подключения к базе данных
    class ConnectDb 
    {
        private $xmlDB;
    
        protected function getUsers() 
        { 
            $this->xmlDB = simplexml_load_file(__DIR__ . '/users.xml'); 
            return $this->xmlDB;
        }
    }

?>    