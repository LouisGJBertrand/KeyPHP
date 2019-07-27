<?php

    namespace KeyPHPKernel;

    /**
     * a class that verify if this library has been fully loaded
     */
    class BaseLibTester
    {

        /**
         * an array containing the names of every classes from the library
         */
        var $classes = ["KEYPHPAPPLICATION", "PHPLibraryImport", "PHPWebAppInfosHolder"];

        public function __construct() {

            $a = 0;
            foreach ($this->classes as $value) {
                if(class_exists($value)){
                    $a++;
                }
            }
            if ($a == count($this->classes)) {
                return true;
            }
            return false;

        }

    }
    