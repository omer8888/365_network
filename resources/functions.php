<?php

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("query failed with error:  ". mysqli_error($connection));
    }
}