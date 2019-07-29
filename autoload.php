<?php

    if (debug && in_array("INFOS",$debugMask)) {print environnementPrefix."Importing KeyPHP Libraries\r\n";}

    if(!is_dir("libraries")){

        if (debug && in_array("ERROR", $debugMask)) {
            print "\033[0;31mFATAL ERROR: LIBRARIES FOLDER DOESN'T EXIST. [0X2001]\r\n\033[m"; 
            print "\033[0;31m             TO REPAIRE, TYPE\r\n\033[m";
            print "\e[3mmkdir libraries\r\n";
            print "make Download_Basic_Libraries\r\n\033[m";
        }
        return false;

    }

    $LibDir = scandir("libraries");

    // AUTO LOAD OF KEYPHP LIBRARIES

    foreach ($LibDir as $key => $value) {
        if ($value != "." && $value != "..") {
            if (file_exists("libraries/".$value."/".$value.".php")) {
                require "libraries/".$value."/".$value.".php";
                if (debug && in_array("INFOS",$debugMask)) {
                    echo environnementPrefix."\033[0;32mLIBRARY \"".$value."\" LOADING: SUCCESS\r\n\033[m";
                }
            } elseif (file_exists("libraries/".$value."/loader.php")) {
                require "libraries/".$value."/loader.php";
                if (debug && in_array("INFOS",$debugMask)) {
                    echo environnementPrefix."\033[0;32mLIBRARY \"".$value."\" LOADING: SUCCESS\r\n\033[m";
                }
            } else {
                if (file_exists("libraries/".$value."/infos.ini")) {
                    $clibinfos=parse_ini_file("libraries/".$value."/infos.ini",true);
                    if (isset($clibinfos["infos"]["loaderFileName"])) {
                        if (file_exists("libraries/".$value."/".$clibinfos["infos"]["loaderFileName"].".php")) {
                            require "libraries/".$value."/".$clibinfos["infos"]["loaderFileName"].".php";
                            if (debug && in_array("INFOS",$debugMask)) {
                                echo environnementPrefix."\033[0;32mLIBRARY \"".$value."\" LOADING: SUCCESS\r\n\033[m";
                            }
                        } else {
                            if (debug && in_array("ERROR", $debugMask)) {
                                print environnementPrefix."\033[0;31mERROR: UNABLE TO LOAD LIBRARY \"".$value."\" MISSING LOADER FILE\r\n\033[m";    
                            }
                        }
                    } else {
                        if (debug && in_array("ERROR", $debugMask)) {
                            print environnementPrefix."\033[0;31mERROR: UNABLE TO LOAD LIBRARY \"".$value."\" MISSING LOADER FILE IN INFOS.INI\r\n\033[m";   
                        }
                    }
                } elseif (file_exists("libraries/".$value."/infos.json")) {
                    $clibinfos=json_decode(file_get_contents("libraries/".$value."/infos.json",true));
                    if (isset($clibinfos["infos"]["loaderFileName"])) {
                        if (file_exists("libraries/".$value."/".$clibinfos["infos"]["loaderFileName"].".php")) {
                            require "libraries/".$value."/".$clibinfos["infos"]["loaderFileName"].".php";
                            if (debug && in_array("INFOS", $debugMask)) {
                                echo environnementPrefix."\033[0;32mLIBRARY \"".$value."\" LOADING: SUCCESS\r\n\033[m";
                            }
                        } else {
                            if (debug && in_array("ERROR", $debugMask)) {
                            print environnementPrefix."\033[0;31mERROR: UNABLE TO LOAD LIBRARY \"".$value."\" MISSING LOADER FILE\r\n\033[m";
                        }}
                    } else {
                        if (debug && in_array("ERROR", $debugMask)) {
                        print environnementPrefix."\033[0;31mERROR: UNABLE TO LOAD LIBRARY \"".$value."\" MISSING LOADER FILE IN INFOS.JSON\r\n\033[m";
                    }}
                } elseif( !is_dir("libraries/".$value) ) {

                    // Ignore

                } else {
                    if (debug && in_array("ERROR", $debugMask)) {
                    print environnementPrefix."\033[0;31mERROR: UNABLE TO LOAD LIBRARY \"".$value."\" MISSING INFOS.INI FILE OR LOADER FILE\r\n\033[m";
                }}
            }
        }
    }

    // AUTO LOAD OF COMPOSER LIBRARIES

    if (file_exists("vendor/autoload.php")) {
        $vendorAutoLoad = require "vendor/autoload.php";
    } else {
        if (debug && in_array("WARNS", $debugMask)) {
            echo environnementPrefix."\033[0;33mFile 'vendor/autoload.php' can't be find, Ignoring.\r\n\033[m";
        }
    }

    return true;