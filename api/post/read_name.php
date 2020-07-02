<?php

//instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->name = $data->name;

 
//Get post
$post-> read_name();

//Create array
$post_arr = array(
    'id' => $post->id,
    'name' => $post->name,
    'description' => $post->description
);





 

