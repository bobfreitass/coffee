<?php

//instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input")) ?? null;
 
//check parammeters
if ($data == null) :

    die(json_encode( array('message' => 'Informe os parametros para continuar ')));

endif;

$post->name = $data->name;

//verify if coffee exist
$post-> read_name();
 
    if ($post->name != null) :

    die(json_encode( array('message' => 'O item '.$data->name.' já se encontra cadastrado.')));

    else :

        //Get post create
        $post->name = $data->name;
        $post->description = $data->description;

        //Create post
        if($post->Create()):

            die(json_encode(array('message' => 'Item criado.')));
        
        else :

            die(json_encode(array('message' => 'Item não pode ser criado.')));

        endif;   

    endif;



