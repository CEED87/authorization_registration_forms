<?php
    
    class ConnectDb 
    {
        private $xmlObj;
    
        protected function getUsers() 
        { 
            $this->jsonArr = simplexml_load_file(__DIR__ . '/users.xml'); 
            return $this->jsonArr;
        }
    }

?>    