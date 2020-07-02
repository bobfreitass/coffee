<?php
 
 
 //instantiate DB & connect
$database = new database();
$db = $database->connect();

// instantiate list post object
$post = new post($db);

//list post query
$result = $post->read();
//get row count
$num = $result->rowCount();

//check if any posts
if($num > 0){
  
    //post array
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
            'id' => $id,
            'name' => $name,
            'description' => html_entity_decode($description)
        );

        //push to "data"
        array_push($post_arr['data'], $post_item);
    }

    //turn to json & output
    echo json_encode($post_arr);


}else{
    // no posts
    echo json_encode(
        array('message' => 'No Posts Fund')
    );

}
 