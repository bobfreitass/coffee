<?php

//instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set ID to delete
$post->id = $data->id;
$post-> read_id();

if ($post->name == null) :

    die(json_encode( array('message' => 'O item '.$data->id.' não existe.')));
 
 else :
 
     //Delete post
     if($post->delete()) :
 
         die(json_encode(array('message' => 'Item deletado')));
 
     else :
 
         die(json_encode(array('message' => 'Item não deletado!')));
         
     endif;
 endif;
 