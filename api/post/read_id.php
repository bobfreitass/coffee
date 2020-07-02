<?php


//instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new post($db);

//Get ID

$post->id = URL_FRIENDLY[1] ?? die;
//$post->id = isset($_GET['id']) ? $_GET['id'] : die();
//$post->id = isset($id) ? $id : die();

//Get post
$post-> read_id();

//Create array
$post_arr = array(
    'id' => $post->id,
    'name' => $post->name,
    'description' => $post->description
);

//make JSON
print(json_encode($post_arr));
 


