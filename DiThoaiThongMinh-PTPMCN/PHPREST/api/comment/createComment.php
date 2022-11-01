<?php
    header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../core/initialize.php');
    $comment = new Comment($db);

    
?>