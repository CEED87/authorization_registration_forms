<?php
    
    require_once "autoload/autoload.php";

    if (@$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        (new NewUserRegistration($_POST))->addUser();
    }

