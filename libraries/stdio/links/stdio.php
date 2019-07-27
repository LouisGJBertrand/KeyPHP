<?php

    namespace STDio;

    /**
     * Implementation of standard I/O library for KeyPHP
     * 
     * @author Louis Bertrand <adressepro111@pylott.yt>
     * 
     */
    class stdio
    {

        /**
         * stdin file holder
         */
        var $stdin;

        /**
         * stdout file holder
         */
        var $stdout;

        /**
         * openstdin
         * 
         * open stdin stream file
         * 
         * @usage
         *      $stdio = new stdio;
         *      $stdin = $stdio->openstdin();
         * 
         * @return resource|false
         */
        public function openstdin() {
            $this->stdin = fopen('php://stdin', 'r');
            return $this->stdin;
        }


        /**
         * openstdout
         * 
         * open stdout stream file
         * 
         * @usage
         *      $stdio = new stdio;
         *      $stdout = $stdio->openstdout();
         * 
         * @return resource|false
         */
        public function openstdout() {
            $this->stdout = fopen('php://stdout', 'w');
            return $this->stdin;
        }

        /**
         * closestdin
         * 
         * close stdin stream file
         * 
         * @usage
         *      $stdio = new stdio;
         *      $stdin = $stdio->openstdin();
         *      $stdio->closestdin($stdin);
         * 
         * @return true
         */
        public function closestdin(&$stdin) {
            $this->stdin = null;
            $stdin = null;
            return true;
        }

        /**
         * closestdout
         * 
         * close stdout stream file
         * 
         * @usage
         *      $stdio = new stdio;
         *      $stdout = $stdio->openstdout();
         *      $stdio->closestdout($stdout);
         * 
         * @return true
         */
        public function closestdout(&$stdout) {
            $this->stdout = null;
            $stdout = null;
            return true;
        }

        /**
         * cin() function
         *
         * cin is a function that reads line from stdin
         *
         * @usage
         *      $someVar = stdio::cin();
         * 
         * @return string
         */
        public function cin()
        {

            return trim(fgets(STDIN));

        }

        /**
         * ccin() function
         *
         * cin is a function that reads line from stdin
         * 
         * @usage
         *      $stdio = new stdio;
         *      $stdin = $stdio->openstdin();
         *      $someVar = $stdio->ccin();
         *
         * @return string
         */
        public function ccin()
        {

            return trim(fgets($this->stdin));

        }

        /**
         * cout() function
         *
         * cout is a function that write line into stdout
         * 
         * @usage
         *      $stdio = new stdio;
         *      $stdout = $stdio->openstdout();
         *      $stdio->ccout("some string");
         * 
         * @return int|false
         */
        public function ccout($string)
        {

            return fwrite($this->stdout, $string."\r\n");

        }

        /**
         * cout() function
         *
         * cout is a function that write line into stdout
         *
         * @usage
         *      stdio::cout("some string");
         * 
         * @return int|false
         */
        public function cout($string)
        {

            return fwrite(STDOUT, $string."\r\n");

        }

    }

