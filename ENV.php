<?php

    // PHP ENVIRONEMENT SETUP

    define("PHPENV_LibrariesDIR", "libraries");
    define("PHPENV_LibrariesDatabase", PHPENV_LibrariesDIR."/libraries.ini");

    $libraries = parse_ini_file(PHPENV_LibrariesDatabase,true);

    define("yt.pylott.keyphp.base", PHPENV_LibrariesDIR."/".$libraries["libraries"]["yt.pylott.keyphp.base"]);

    require_once(constant("yt.pylott.keyphp.base"));

    require_once("application.php");