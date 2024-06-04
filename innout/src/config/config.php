<?php
date_default_timezone_set('America/Sao_Paulo');
//brasil
setlocale(LC_ALL, 'pt-br', 'pt_BR.utf-8', 'portuguese');

//pastas

define('MODEL_PATH', realpath(dirname(__FILE__). '/../models'));

define('VIEW_PATH', realpath(dirname(__FILE__). '/../views'));



//o __FILE__ é para pegar o diretório atual;
//dirname é pra ver o nome do arquivo
//para ver o caminho certo, nesse caso pegar o caminho do data base
//arquivos para arquivoar no inicio
require_once(realpath(dirname(__FILE__). '/database.php'));
require_once(realpath(MODEL_PATH). '/Model.php');