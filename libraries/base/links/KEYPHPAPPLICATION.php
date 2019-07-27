<?php

    namespace KeyPHPKernel;

    /**
     * undocumented class
     */
    abstract class KEYPHPAPPLICATION
    {

        /**
         * onStart() event
         *
         * an event that is triggered on application start
         *
         * @return bool
         **/
        public function onStart()
        {
            return true;
        }

        /**
         * loop() function
         *
         * here goes your application loop code
         *
         * @return type
         **/
        public function loop()
        {

            return true;

        }

        /**
         * onStop() event
         *
         * function triggered on application stop
         *
         * @return bool
         **/
        public function onStop()
        {

            return true;

        }

    }
    
