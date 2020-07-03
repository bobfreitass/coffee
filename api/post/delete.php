<?php

//instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new Post($db);
$count = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));


//check parammeters
if ($data->id == null) :

    die(json_encode( array('message' => 'Informe o parametro \'id\' para continuar ')));

endif;

//Set ID to check
$count->id = $data->id;
$count-> count_id();

if ($count->id == 0 ) :

    die(json_encode( array('message' => 'O id \''.$data->id.'\' não existe.')));
 
 else :
    
    $post->id = $data->id;

     //Delete post
     if($post->delete()) :
 
         die(json_encode(array('message' => 'Item deletado')));
 
     else :
 
         die(json_encode(array('message' => 'Item não deletado!')));
         
     endif;
 endif;
 