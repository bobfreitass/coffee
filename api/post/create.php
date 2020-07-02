<?php

//instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new Post($db);
$name_exist = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input")) ?? null;

//check parammeters
if (@$data->name == null || @$data->description == null) :

    die(json_encode( array('message' => 'Informe dodos os parametros para continuar ')));

endif;

//Get for check exist.
$name_exist->name = $data->name;

//check if name exist.
$name_exist-> read_name(); 

    if ($name_exist->id != null) :

        die(json_encode( array('message' => 'O item \''.$data->name.'\' já se encontra cadastrado.')));

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



  



