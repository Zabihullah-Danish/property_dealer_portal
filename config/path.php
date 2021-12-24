<?php

function baseUrl($path = ''){

    $basePath = 'http://localhost:8080/property/';

    if($path != ''){
      $basePath = $basePath.$path;
    }

    return $basePath;
}


?>
