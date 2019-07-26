<?php

    /** 
     * myApp is a generic name for KeyPHP application info holders;
     * here you declare your application by defining different variables
     * if you choose to declare your app via the constructor method,
     * please make sure to erase values of the variables
     * and declare theme one by one in the __constructor method calling
     * E.G.
     *      class myApp extendsPHPWebAppInfosHolder
     *      {
     *          var $packageID,$infos,$author,$version,$mainClass;
     *      } 
     *      // and then replace values in the following order
     *      $myAppInfos = new myApp($packageID,$infos,$author,$version,$mainClass);
     */
    class myApp extends PHPWebAppInfosHolder
    {
        
        // modify thoose variables to your wish
        var $packageID      = "yt.pylott.keyphp.example";
        var $infos          = "an example application made using keyphp";
        var $author         = "Louis Bertrand <adressepro111@pylott.yt>";
        var $version        = "1.0.0.BETA";
        var $mainClass      = "main";

        /** 
         * if you want to use the constructor,
         * replace the previous variables with thoose ones
         */ 

        // var $packageID;
        // var $infos;
        // var $author;
        // var $version;
        // var $mainClass;

        // or use construct to 
        public function __construct($packageID = "",$infos = "",$author = "",$version = "",$mainClass = "") {
            if (is_null($this->packageID)) {
                $this->packageID = $packageID;
            }
            if (is_null($this->infos)) {
                $this->infos = $infos;
            }
            if (is_null($this->author)) {
                $this->author = $author;
            }
            if (is_null($this->version)) {
                $this->version = $version;
            }
            if (is_null($this->mainClass)) {
                $this->mainClass = $mainClass;
            }
        }

    }
    
    // here the appliaction is declared
    // you can declare your app with construct method or directly into the class
    // previously declared
    $myAppInfos = new myApp();

    // we require the main class
    require_once("app/".$myAppInfos->mainClass.".php");

    // we declare your main Class
    $mainClass = new $myAppInfos->mainClass;


    // ACTUAL EXECUTION


    // onStart() event triggered at begining of the algorithm
    $onStartResponse = $mainClass->onStart();
    // if the onStart() event returns false,
    // the program is aborted
    if(!$onStartResponse){
        print("ABORT: Program ended with return value ".$onStartResponse."\r\n");
        exit;
    }
    // loop() function that returns boolean value
    // while the function returns true,
    // the loop is maintained,
    // else it breaks and the algorithm go to the next event function
    while ($mainClass->loop()) {
    }
    // onStop() event triggered at ending of the algorithm
    $onStopResponse = $mainClass->onStop();
    // if the onStop() event returns false,
    // the program is aborted
    if(!$onStopResponse){
        print("Program ended with return value ".$onStopResponse."\r\n");
        exit;
    }