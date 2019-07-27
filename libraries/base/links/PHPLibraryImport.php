<?php

    namespace KeyPHPKernel;

    /**
     * PHPLibrary object
     * 
     * used to import libraries
     */
    class PHPLibraryImport
    {

        var $name;
        var $infos;
        var $version;
        var $author;
        var $packageID;

        /**
         * Library Import 
         *
         * Undocumented function long description
         *
         * @param string $libname library name
         **/
        public function __construct(string $libname)
        {

            $libinfos = parse_ini_file("libraries/".$libname."/infos.ini",true);
            $this->name=$libinfos["infos"]["name"];
            $this->infos=$libinfos["infos"]["infos"];
            $this->version=$libinfos["infos"]["version"];
            $this->author=$libinfos["infos"]["author"];
            $this->packageID=$libinfos["infos"]["packageID"];

            require "libraries/".$libname."/".$libname.".php";

        }
        
    }

    if (!function_exists("import")) {

        /**
         * import() function
         *
         * Undocumented function long description
         *
         * @param string $libname library name
         * @return bool
         **/
        function import(string $libname)
        {
            $imported = new PHPLibraryImport($libname);
            if (!is_null($imported)) {
                return true;
            }
            return false;
        }

    }
    
