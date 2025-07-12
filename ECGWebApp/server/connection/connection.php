<?php
    require_once("config.connection.php");
    
    $connection = new mysqli($HOST, $USERNAME, $PASSWORD, $DB_NAME, $PORT);

    if($connection->error) {
        die("Connection was fail.");
    }

    date_default_timezone_set('Asia/Bangkok');
?>