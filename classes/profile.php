<?php

    session_start();
    // класс для авторизации пользователя
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
            $this->usersDB = (array) $this->getUsers();
         
            $solt = 'RbdtEWjm';
    // проверка на наличие пустых полей в форме
            if ($this->user['login'] === '' || $this->user['password'] === '') {
                $this->profile = 1;
                return $this->profile;
            }
    //  проверка на соответствие/несоответствие введённых данных пользователя
            foreach ($this->usersDB as $value) {
                foreach ($value as $user => $data) {
                    $userData = (array) $data;
    
                    if ($userData['login'] === $this->user['login'] && $userData['password'] === $solt . md5($this->user['password'])) {
                        $this->profile = ['name' => $userData['name'], 'login' => $userData['login'], 'password' => $userData['password']];
                        break;
                    } else {
                        $this->profile = NULL;
                    }
                }
            return $this->profile;
            }
        }

        public function getUser() 
        {
            
            if (gettype($this->checkUser()) == 'integer') {
               
                echo json_encode($this->user,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
    // авторизации (создание необходимых связей cookies + session + db)
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