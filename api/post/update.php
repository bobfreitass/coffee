<?php
// headers
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Autorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/post.php';

//instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

 
//Set ID to update
$post->id = $data->id;
$post->name = $data->name;
$post->description = $data->description;



//Update post
if($post->update()){
    echo json_encode(
        array('message' => 'Item atualizado.')
    );
}else{
    echo json_encode(
        array('message' => 'Item não pode ser atualizado')
    );
}