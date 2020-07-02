<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
 
//var_dump(URL_FRIENDLY);
 
die(json_encode(array('message:' => 'Parametro informado não corresponde a uma funcionalidade válida. Consulte o README, no diretório principal da API, para mais informações.')));



    

