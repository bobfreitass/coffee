<?php

// headers
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

if ($_SERVER["REQUEST_METHOD"] == 'GET') :
 
    include '../models/post.php';
    include '../config/database.php';    
    
    //selection of consult
    if (URL_FRIENDLY[1] ?? null) :

        include '../api/post/read_id.php';

    else :

        include '../api/post/read.php';

    endif;
   
else :

    die(json_encode(array('message' => 'Informe o \'VERBO HTTP CORRETO\' para executar a operação.')));

endif;