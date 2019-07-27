<?php

    namespace KeyPHPKernel;

    /**
     * PHP Application Infos Holder
     * 
     * CONTENT OF BASE LIBRARY
     * 
     * class that describes the application
     * @author Louis Bertrand <adressepro111@pylott.yt> 
     */
    class PHPWebAppInfosHolder
    {

        /**
         * here is an example of package id: yt.pylott.keyphp.base or KeyPHPKernel/PHPWebAppInfosHolder
         */
        var $packageID;

        /** 
         * infos is what's you library doing
         */
        var $infos;

        /** 
         * author is the developper's or the company's name
         * here is an example: Louis Bertrand <adressepro111@pylott.yt>
         */
        var $author;

        /**
         * version is your packet version
         * here is an example of package version string: v1.0.0.BETA
         */
        var $version;

        /**
         * the main class is the class that will be executed
         */
        var $mainClass;

        public function __construct($packageID, $infos, $author, $version, $mainClass) {
            $this->packageID = $packageID;
            $this->infos = $infos;
            $this->author = $author;
            $this->version = $version;
            $this->mainClass = $mainClass;
        }
        
    }
    
