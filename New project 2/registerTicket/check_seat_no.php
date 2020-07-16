<?php
include_once '../../dbconfig/dbconf.php';
include_once '../../methods/database.php';
//instantiating database to connect
$database = new dbconf();
$db = $database->connect();
//instaiating blog post object
$post = new database($db);

//blog post querry
$result = $post->check_if_seat_is_taken($seat_no);
