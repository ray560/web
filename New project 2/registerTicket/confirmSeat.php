<?php

        include_once 'dbconf.php';
        include_once 'database.php';

$id = $_REQUEST["id"];

        //instantiating database to connect
        $database = new dbconf();
        $db = $database->connect();
        //instaiating blog post object
        $post = new database($db);

        $post->check_if_seat_is_taken($id);