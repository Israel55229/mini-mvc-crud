<?php 
    spl_autoload_register();

    function myAutoloader($newClass) {
        $filePath = __DIR__ . "/../classes/" . $newClass . ".php";
        
        if(file_exists($filePath)) {
            include_once $filePath;
        }
        else {
            throw new Exception("File does not exit" .  $filePath);
        }
    }

?>