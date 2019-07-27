<?php

    // Before beginning to code, understand that this environment is a framework
    // vanilla php is fully compatible with KeyPHP.

    // in order to import a library KeyPHP and/or external libraries,
    use STDio\stdio;

    // Lablnet/Encryption is a php library hosted on Packagist.
    // it's imported here to show that this framework is fully
    // compatible with standard libraries
    use Lablnet\Encryption;
    // Lablnet/Encryption has been imported with composer.

    // in order to import a custom class
    // call require_once $file function
    require_once "bis.php";
    // or you can modify the environment application.php file
    // to automatically load every .php files from the app folder
    // and use namespaces to import them.
    // you should understand that, by default, the main class must be
    // in the app folder. But you can change this directory on line 12
    // of application.php

    /**
     * 
     * MAIN CLASS
     * 
     * you can find every predefined functions of KEYPHPAPPLICATION
     * Class in it's declaration file of BASE library
     * 
     * this type of class documentation is an example,
     * feel free to make your own
     * 
     * @author: your name <email>
     * 
     */
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

            $encryption = new Encryption('your-key');

            // ! STDio/stdio is a class that need to be imported !
            // instead of calling stdio::cout or $stdio->ccout,
            // you can use default php methods such as
            // print, print_r, echo or var_dump
            stdio::cout($crypted = $encryption->encrypt("Hello World!"));
            stdio::cout($encryption->decrypt($crypted));
            // and it's the same for stdio:cin
            // you can use readline()
            // it's better for terminal assistants

            // to incorporate other classes,
            // require the file at the top of this one
            // and call it as a normal class
            new bis;
            // in this case the bis class is in the app/bis.php file
            // and web basically invoked this class.
            // in practice, classes can be of any type;
            // it's php after all

            // here the return value is false
            return false;
            // it just means that the loop will break after execution
            // in this case it's the first
            // but you can imagine a terminal assistant that when you invoke
            // exit function, the loop() function returns false.
            // when the loop() function returns false,
            // the next step is onStop() event that is triggered just after loop()

        }

    }
    
