<?php

// headers
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

//var_dump(URL_FRIENDLY[1]);


include '../models/post.php';
include '../config/database.php';


if(URL_FRIENDLY[1] ?? null){
    include '../api/post/read_id.php';
}else{
    include '../api/post/read.php';
}

