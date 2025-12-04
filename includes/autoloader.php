<?php
spl_autoload_register("myAutoloader");

function myAutoloader($className)
{
    // Possible folders to search
    $paths = [
        __DIR__ . "/../classes/",
        __DIR__ . "/../controllers/",
    ];

    foreach ($paths as $path) {
        $file = $path . $className . ".php";

        if (file_exists($file)) {
            include_once $file;
            return;
        }
    }

    // If not found in any folder
    throw new Exception("Class file not found: " . $className);
}
?>
