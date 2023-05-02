<?php

spl_autoload_register( function($class) {
    $sources = array(
     "models/$class.php",
     "database/$class.php",
     "database/dao/$class.php",
     "core/$class.php",
     "controllers/$class.php",
     "utils/$class.php",
     "views/$class.php"
    );
    foreach($sources as $source) {
        if (file_exists($source)) {
            require $source;
        }
    }
});