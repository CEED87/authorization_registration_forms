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

            // print_r($this->userDatabase);

            // if ($this->userData['password'] === $this->userData['password_confirm']) {

                // $this->userData['password'] = $solt . md5($this->userData['password']);
                // $this->userData['password_confirm'] = $solt . md5($this->userData['password_confirm']);
            
                // foreach ($this->userDatabase as $key => $value) {
                //     if ($value['login'] === $this->userData['login']) {

                //         $this->userData['user'] = [$value['login'] => 'exist'];
                //         echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                //         exit();

                //     } elseif ($value['email'] === $this->userData['email']) {

                        // $this->userData['Email'] = [$value['email'] => 'exist'];
                        // echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
                        // exit();
                //     } 
                // }
                if ($this->userData['password'] === $this->userData['password_confirm']) {

                    $this->userData['password'] = $solt . md5($this->userData['password']);
                    $this->userData['password_confirm'] = $solt . md5($this->userData['password_confirm']);
                    
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
                        // var_dump($value);
                        // echo $value. "<br>";
                        
                    }
                
                // $this->userDatabase[] = $this->userData;
                // $this->userDatabase 
                $user_xml = $this->userDatabase->addChild('user');
                $user_xml->addChild('login', $this->userData['login']);
                $user_xml->addChild('password', $this->userData['password']);
                $user_xml->addChild('password_confirm', $this->userData['password_confirm']);
                $user_xml->addChild('email', $this->userData['email']);
                $user_xml->addChild('full_name', $this->userData['full_name']);
                $this->userDatabase->asXML(__DIR__ . '/users.xml');

            
                // file_put_contents(__DIR__ . '/users.json', json_encode($this->userDatabase, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
              
                
                $this->userData['status'] = 'successfully';
                echo json_encode($this->userData,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
            } 
        }
    }

?>