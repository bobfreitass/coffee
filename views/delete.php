<?php

// headers
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Autorization, X-Requested-With');


if ($_SERVER["REQUEST_METHOD"] == 'DELETE') :

    include_once '../config/database.php';
    include_once '../models/post.php';
    include '../api/post/delete.php';

else :

    die(json_encode(array('message' => 'Informe o \'VERBO HTTP CORRETO\' para executar a operação.')));

endif;



//    Só depois de feito este módulo, percebi que não era pedida a função 'DELETE' no desafio técnico.
//    Porém resolvi deixa-lo por aqui. Caso deseje testar, é só passar o parametro 'delete' utilizando o VERBO HTTP DELETE, atribuindo um valor ao id 
//    
//    Exemplo:
//                {
//                    "id": "3"
//                }
//