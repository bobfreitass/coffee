<?php

// headers
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Autorization, X-Requested-With');


include_once '../config/database.php';
include_once '../models/post.php';

 


include '../api/post/create.php';



 



