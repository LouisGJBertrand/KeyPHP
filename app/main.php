<?php

    // in order to import a library,
    // call import($libname) function
    import("base");
    import("stdio");

    class main extends KEYPHPAPPLICATION
    {
        
        public function loop()
        {
            stdio::cout("Hello World!");
            return false;
        }

    }
    