<?php
    
    class ConnectDb 
    {
        private $xmlObj;
    
        protected function getUsers() 
        {
            // $this->jsonArr = json_decode(file_get_contents(__DIR__ . '/users.json'), true); 
            $this->jsonArr = simplexml_load_file(__DIR__ . '/users.xml'); 
            return $this->jsonArr;
        }
    }

?>    