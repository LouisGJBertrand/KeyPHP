<?php

    if (debug && in_array("INFOS",$debugMask)) {
        print "APPLICATION SETUP\r\n\r\n";
    }

    $myApp_Json = json_decode(file_get_contents("appInfos.json"),true);


    $myAPP = new KeyPHPKernel\PHPWebAppInfosHolder($myApp_Json["packageName"],$myApp_Json["infos"],$myApp_Json["authors"],$myApp_Json["version"],$myApp_Json["mainClass"]);

    require "app/".$myAPP->mainClass.".php";
    $mainClass = new $myAPP->mainClass;

    // ACTUAL EXECUTION

    // onStart() event triggered at beginning of the algorithm
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
    return 0;