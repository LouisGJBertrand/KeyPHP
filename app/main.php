<?php

    // in order to import a library,
    use STDio\stdio;

    // in order to import a custom class
    // call require_once $file function
    require_once "bis.php";

    class main extends KeyPHPKernel\KEYPHPAPPLICATION
    {
        
        public function loop()
        {

            // // OverKill method that reads and prints user prompted value
            // $stdio = new stdio;
            // $stdin = $stdio->openstdin();
            // $val = $stdio->ccin();
            // $stdout = $stdio->openstdout();
            // $stdio->ccout($val);
            // $stdio->closestdin($stdin);
            // $stdio->closestdout($stdout);

            // // basic method that reads and prints user prompted value
            // stdio::cout(stdio::cin());

            stdio::cout("Hello World!");
            new bis;
            return false;

        }

    }
    