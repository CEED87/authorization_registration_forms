<?php

    session_start();
    
    class Profile extends ConnectDb 
    {
        private $usersDB;
        private $login; 
        private $password;
        private $profile;
        private $user;

        function __construct($data) 
        {
            $this->user = $data;
        }

        private function checkUser() 
        {
            // $this->usersDB = $this->getUsers();
            $this->usersDB = (array) $this->getUsers();
            // print_r($this->usersDB);

            // foreach ($array as $value) {
            //         foreach ($value as $user => $data) {
            //             // echo $data['login'];
            //             $arr = (array) $data;
            //             print_r($arr['login']);
            //             // foreach ($arr as $key => $info) {
            //             //     echo $info['login'];
            //             // }
            //     }
                // print_r($value);
                // echo $value['user'];
            // }
            $solt = 'RbdtEWjm';

            
            // echo gettype($array);
            // print_r($this->usersDB);
            // print_r($array);

            // $this->login = $this->user['login']; 
            // $this->password = $this->user['password'];

            if ($this->user['login'] === '' || $this->user['password'] === '') {
                $this->profile = 1;
                return $this->profile;
            }
          
            // foreach ($this->usersDB as $key => $value) {
            //     if ($value['login'] === $this->login && $value['password'] === $solt . md5($this->password)) {
                    // $this->profile = ['name' => $value['full_name'], 'login' => $value['login'], 'password' => $value['password']];
                    // break;
                // } else {
                //     $this->profile = NULL;
                // }
                 
            // }

            
            foreach ($this->usersDB as $value) {
                foreach ($value as $user => $data) {
                    $userData = (array) $data;
                    // print_r($userData);
                    if ($userData['login'] === $this->user['login'] && $userData['password'] === $solt . md5($this->user['password'])) {
                        $this->profile = ['name' => $userData['full_name'], 'login' => $userData['login'], 'password' => $userData['password']];
                        // print_r($this->profile);
                        break;
                        // echo $data;
                        // echo $userData['login'];
                        // echo $userData['password'];
                    

                    } else {
                        $this->profile = NULL;
                    }
                    // echo $user;
                }
            return $this->profile;
            }
        }

        public function getUser() 
        {
            
            if (gettype($this->checkUser()) == 'integer') {
               
                echo json_encode($this->user,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
        
            } elseif (gettype($this->checkUser()) == 'array') {
               
                $name = $this->checkUser()['name'];
                $login = $this->checkUser()['login'];
                $password = $this->checkUser()['password'];

                setcookie('password', $password, 0, '/');
                setcookie('login', $login, 0, '/');
                $_SESSION['user'] = $name;
        
                echo json_encode($this->checkUser(),JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
            }
             else {
                $this->user = ['user' => 'not found'];
                echo json_encode($this->user);
            }
        }   
    }

?>