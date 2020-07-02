<?php

error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');


define('URL_FRIENDLY', explode('/', $_SERVER['REDIRECT_QUERY_STRING'] ?? null));



//isset($_SERVER['REDIRECT_QUERY_STRING']) ? $_SERVER['REDIRECT_QUERY_STRING'] : null;

//$_SERVER['REDIRECT_QUERY_STRING'] ?? null

//define('JOIN_DIRECTORY', str_replace('','', __DIR__));

//var_dump(URL_FRIENDLY);

//if (URL_FRIENDLY[0]=='lista'){

   // include 'api/post/read_id.php?id='.URL_FRIENDLY[1];
    
//die;
//}



require_once '../class/AutoLoad.class.php';

