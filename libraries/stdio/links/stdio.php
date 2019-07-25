<?php

    /**
     * std class made to communicate with the user
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

        public function openstdin() {
            $this->stdin = fopen('php://stdin', 'r');
        }

        public function openstdout() {
            $this->stdout = fopen('php://stdout', 'w');
        }

        public function closestdin() {
            $this->stdin = null;
        }

        public function closestdout() {
            $this->stdout = null;
        }

        /**
         * cin() function
         *
         * cin is a function that reads line from stdin
         *
         * @return mixed
         **/
        public function cin()
        {

            return trim(fgets(STDIN));

        }

        /**
         * ccin() function
         *
         * cin is a function that reads line from stdin
         *
         * @return mixed
         **/
        public function ccin()
        {

            return trim(fgets($this->stdin));

        }

        /**
         * cout() function
         *
         * cout is a function that write line into stdout
         *
         * @return int|false
         **/
        public function ccout($string)
        {

            return fwrite($this->stdout, $string."\r\n");

        }

        /**
         * cout() function
         *
         * cout is a function that write line into stdout
         *
         * @return int|false
         **/
        public function cout($string)
        {

            return fwrite(STDOUT, $string."\r\n");

        }

    }