
<?php


//ele ta pegando o diretório e subindo 2, nesse caso o public e chegando no innout
require_once(dirname(__FILE__,2). "/src/config/config.php");
require_once(MODEL_PATH . "/Login.php");

$login = new Login(
    [
        'email' => 'chaves@cod3r.com.br',
        'password' => 'a'
    ]
    );
    try{
        echo "nice";
        return $login->checkLogin();
     

    }catch (Exception $e){
        echo "deu ruim";
    }