<?php 
    spl_autoload_register("myAutoloader");

    function myAutoloader($newClass) {
        $filePath = __DIR__ . "/../classes/" . $newClass . ".php";
        
        if(file_exists($filePath)) {
            include_once $filePath;
        }
        else {
            throw new Exception("Class file is not found: " .  $filePath);
        }
    }

?>