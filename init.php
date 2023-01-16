<?php

//session_set_cookie_params(time()+1000,'/','localhost',false,true);

//session_start();

session_start(['cookie_lifetime' => 43200,'cookie_secure' => true,'cookie_httponly' => true]);

?>