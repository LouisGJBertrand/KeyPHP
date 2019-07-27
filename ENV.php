<?php

    define("debug",true);
    $debugMask[]="ERROR";
    // $debugMask[]="INFOS";
    $debugMask[]="WARNS";

    if (debug && in_array("INFOS",$debugMask)) {
        print "ENV SETUP\r\n\r\n";
    }

    $env_ = json_decode(file_get_contents("env.json"), true);

    define("appInfosPath","appInfos.json");
    define("environnementPrefix",$env_["EnvOutputPrefix"]);

    if (debug && in_array("INFOS",$debugMask)) {

        print environnementPrefix."ENV Name: ".$env_["Name"]."\r\n";
        print environnementPrefix."ENV Version: ".$env_["Version"]."\r\n";
        print environnementPrefix."ENV Authors: "."\r\n";
        print_r($env_["Authors"]);
        print environnementPrefix."ENV PackageID: ".$env_["PackageID"]."\r\n";
        print "\r\n\r\n";

    }

    $appInfos = json_decode(file_get_contents(appInfosPath));

    $autoLoad = require('autoload.php');
    if ($autoLoad) {
        $application = require('application.php');
    } else {
        print "\033[0;31mFATAL ERROR: AUTOLOAD FAILED [0X2000]\r\nABORTING\r\n\033[m";
        return 1;
    }
