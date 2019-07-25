<?php

    class myApp extends PHPWebAppInfosHolder
    {
        
        var $packageID      = "yt.pylott.keyphp.example";
        var $infos          = "an example application made using keyphp";
        var $author         = "Louis Bertrand <adressepro111@pylott.yt>";
        var $version        = "1.0.0.BETA";
        var $mainClass      = "main";

    }
    
    $myAppInfos = new myApp;

    require_once("app/".$myAppInfos->mainClass.".php");

    $myApp = new $myAppInfos->mainClass;

    $onStartResponse = $myApp->onStart();
    if(!$onStartResponse){
        print("Program ended with return value ".$onStartResponse."\r\n");
        exit;
    }
    while ($myApp->loop()) {
    }
    $onStopResponse = $myApp->onStart();
    if(!$onStopResponse){
        print("Program ended with return value ".$onStopResponse."\r\n");
        exit;
    }