<?php

    // in order to import a library,
    // call import($libname) function
    import("base");
    import("stdio");

    // in order to import a custom class
    // call require_once $file function
    require_once "bis.php";

    class main extends KEYPHPAPPLICATION
    {
        
        public function loop()
        {
            stdio::cout("Hello World!");
            new bis;
            return false;
        }

    }
    