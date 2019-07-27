<?php

    /**
     * 
     * Template Library
     * 
     * Modify this template as your wish to create your own KeyPHP library
     * don't forget to modify the infos.ini or infos.json file to match your lib
     * 
     * @author
     * 
     * @version
     * 
     */


    //                 '\nameSpace\classname'
    if (!class_exists('\templateNS\templateCL')) {
        // class file import
        require_once("templateNS/templateCL.php");
    }