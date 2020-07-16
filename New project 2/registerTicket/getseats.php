<?php

$id = $_REQUEST["id"];

        include_once 'dbconf.php';
        include_once 'database.php';
        //instantiating database to connect
        $database = new dbconf();
        $db = $database->connect();
        //instaiating blog post object
        $post = new database($db);
        
        $post->getSeats($id);
        



















        

