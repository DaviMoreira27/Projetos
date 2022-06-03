<?php

function MyAutoload($className) {
    $extension =  spl_autoload_extensions();

    $file = __DIR__ . '/Classes/' . $className . $extension;

    if (!file_exists($file)){
        require(__DIR__ . '/Classes/BEAN/' . $className . $extension);
    }elseif(file_exists($file)){
        require(__DIR__ . '/Classes/' . $className . $extension);
    }


}

spl_autoload_extensions('.php');
spl_autoload_register('MyAutoload');
