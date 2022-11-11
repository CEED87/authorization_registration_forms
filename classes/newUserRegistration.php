<?php
    session_start();

    class NewUserRegistration extends ConnectDb 
    {
        private $userData;
        private $userDatabase;
        private $state;
        
        function __construct($userData) 
        {
            $this->userData = $userData;
        }

        public function addUser() 
        {

            $solt = 'RbdtEWjm';

            foreach($this->userData as $key => $value) {
                if ($value == '') {
                    
                    $this->userData['empty'] = [$key => 'empty'];
                    echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                    exit();
                }
            }

            $this->userDatabase = $this->getUsers();

                if ($this->userData['password'] === $this->userData['confirm_password']) {

                    $this->userData['password'] = $solt . md5($this->userData['password']);
                    $this->userData['confirm_password'] = $solt . md5($this->userData['confirm_password']);
                    
                    foreach ($this->userDatabase->children() as $value) {
                        foreach ($value as $user => $data) {
                            if ($user === 'login' && $data == $this->userData['login']) {
                                $this->userData['user'] = [$this->userData['login'] => 'exist'];
                                echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                                exit();
                            } elseif ($user === 'email' && $data == $this->userData['email']) {
                                $this->userData['Email'] = [$this->userData['email'] => 'exist'];
                                echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                                exit();
                                
                            }
                        }    
                    }
                
                $user_xml = $this->userDatabase->addChild('user');
                $user_xml->addChild('login', $this->userData['login']);
                $user_xml->addChild('password', $this->userData['password']);
                $user_xml->addChild('confirm_password', $this->userData['confirm_password']);
                $user_xml->addChild('email', $this->userData['email']);
                $user_xml->addChild('name', $this->userData['name']);
                $this->userDatabase->asXML(__DIR__ . '/users.xml');

                $this->userData['status'] = 'successfully';
                echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
            } 
        }
    }

?>