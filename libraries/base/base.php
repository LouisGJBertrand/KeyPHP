<?php

    // PHP ENVIRONMENT BASE LIBRARY

    // THIS LIBRARY IS NOT OPTIONAL
    // DELETING IT WILL CAUSE THE ENVIRONMENT TO FAIL
    // IF YOU DELETE IT WE RECOMMANDE YOU TO DOWNLOAD IT AGAIN

    if (!class_exists("\KeyPHPKernel\PHPLibraryImport")) {
        require_once("links/PHPLibraryImport.php");
    }
    if (!class_exists("\KeyPHPKernel\PHPWebAppInfosHolder")) {
        require_once("links/PHPWebAppInfosHolder.php");
    }
    if (!class_exists("\KeyPHPKernel\KEYPHPAPPLICATION")) {
        require_once("links/KEYPHPAPPLICATION.php");
    }

    // this file contains test to see if everything loaded well
    if (!class_exists("\KeyPHPKernel\BaseLibTester")) {
        require_once("links/BaseLibTester.php");
    }
