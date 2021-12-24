<?php

function getDateTime()
{
    return date('Y-m-d H:i');
}


// database connection and query funciton
function getQuery($query = '')
{
    if($query == ''){
        return 'no query defined.';
    }
    $getObj = '';

    $connect    = new mysqli('localhost', 'root', '', 'property');
    $getResult  = $connect->query($query);

    if($getResult){
      $getObj = $getResult;
    }else{
      $getObj = $connect->error;
    }

    $connect->close();

    return $getObj;
}
