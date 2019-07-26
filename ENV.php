<?php

    // PHP ENVIRONEMENT SETUP

    define("PHPENV_LibrariesDIR", "libraries");
    define("PHPENV_LibrariesDatabase", PHPENV_LibrariesDIR."/libraries.ini");

    $libraries = parse_ini_file(PHPENV_LibrariesDatabase,true);

    define("yt.pylott.keyphp.base", PHPENV_LibrariesDIR."/".$libraries["libraries"]["yt.pylott.keyphp.base"]);

    require_once(constant("yt.pylott.keyphp.base"));

    // 1.0.1.BETA feature : #0001 : appSettingsFile
    // application datas will come from a .ini file

    $GLOBAL_appSettings     = parse_ini_file("conf/appSettings.ini", true);

    // var_dump($GLOBAL_appSettings);
    // exit;

    $GLOBAL_packageID       = $GLOBAL_appSettings["AppInfosHolder"]["packageID"];
    $GLOBAL_infos           = $GLOBAL_appSettings["AppInfosHolder"]["infos"];
    $GLOBAL_author          = $GLOBAL_appSettings["AppInfosHolder"]["author"];
    $GLOBAL_version         = $GLOBAL_appSettings["AppInfosHolder"]["version"];
    $GLOBAL_mainClass       = $GLOBAL_appSettings["AppInfosHolder"]["mainClass"];

    // end of 1.0.1.BETA feature : #0001 : appSettingsFile

    require_once("application.php");