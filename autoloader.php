<?php

//require_once('Loader.php');

spl_autoload_register(function ($className) {
    $autoload = new Loader($className);
    $autoload->load();
});
