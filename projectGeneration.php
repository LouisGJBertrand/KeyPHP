<?php

    class NewProject
    {
        
        /**
         * project Name
         */
        var $appName;

        /**
         * project Author team
         */
        var $authors = [];

        /**
         * project mainclass
         */
        var $mainClass = "main";

        /**
         * project Infos
         */
        var $infos;

        /**
         * project version
         */
        var $version = "1.0.0";

        /**
         * project License
         */
        var $License = "MIT";

        /**
         * project packageName
         */
        var $packageName;

        var $CompilationTarget =
        [
            "MACOS" =>
            [
                "10.9.*",
                "10.10.*",
                "10.11.*",
                "10.12.*",
                "10.13.*",
                "10.14.*"
            ],
            "WINDOWS" =>
            [
                "7.*",
                "8.*",
                "10.*"
            ],
            "LINUX" =>
            [
                "*"
            ]
        ];

        /**
         * project language
         */
        var $lang = "EN-UK/US";

        public function __construct() {

            $filename = "appInfos.json";

            if (!file_exists($filename)) {
                $this->appName = readline("app Name > ");
                $this->history[] = "app Name : ".$this->appName."\r\n";
                $this->authors = readline("developpement team > ");
                $this->history[] = "developpement team : ".$this->authors."\r\n";
                $this->mainClass = str_replace(" ","_",readline("main Class > "));
                $this->history[] = "main Class : ".$this->mainClass."\r\n";
                $this->infos = readline("package infos > ");
                $this->history[] = "package infos : ".$this->infos."\r\n";
                $this->version = readline("version > ");
                $this->history[] = "version : ".$this->version."\r\n";
                $this->License = readline("License > ");
                $this->history[] = "License : ".$this->License."\r\n";
                $this->packageName = readline("package Name > ");
                $this->history[] = "package Name : ".$this->packageName."\r\n";
            } else {
                $this->history[] = "APP INFO PRELOADED\r\n";
            }
        }

        public function parseJsonProject()
        {

            $filename = "appInfos.json";

            if (!file_exists($filename)) {

                $appInfos["appName"] = $this->appName;
                $appInfos["authors"] = $this->authors;
                $appInfos["mainClass"] = $this->mainClass;
                $appInfos["infos"] = $this->infos;
                $appInfos["version"] = $this->version;
                $appInfos["License"] = $this->License;
                $appInfos["packageName"] = $this->packageName;
                $appInfos["CompilationTarget"] = $this->CompilationTarget;

                $output = json_encode($appInfos,JSON_PRETTY_PRINT);
                file_put_contents($filename,$output);
                $this->history[] = "project values generated\r\n";

            } else {

                $jsonvals = json_decode(file_get_contents($filename));
                $this->appName = $jsonvals->appName;
                $this->authors = $jsonvals->authors;
                $this->mainClass = $jsonvals->mainClass;
                $this->infos = $jsonvals->infos;
                $this->version = $jsonvals->version;
                $this->License = $jsonvals->License;
                $this->useComposer = $jsonvals->useComposer;

                $jsonvals = json_decode(file_get_contents($filename),JSON_PRETTY_PRINT);
                $this->CompilationTarget = $jsonvals["appName"];

                echo "nothing to generate here\r\n";

            }

        }

        public function generateMainClass()
        {

            $file = 
"<?php

    /**
     * 
     * Main Class of KeyPHP Project nammed ".$this->appName."
     * 
     * @author ".$this->authors."
     * 
     */
    class ".$this->mainClass." extends KeyPHPKernel\KEYPHPAPPLICATION
    {

        /**
         * Var example
         */
        var \$greetings = \"Hello World!\";

        /**
         * 
         * loop() function
         * 
         * main function of the class ".$this->mainClass."
         * 
         * @return bool
         * 
         */
        public function loop(){
        
            print \$this->greetings.\"\\r\\n\";
            return false;
        
        }

    }";
            mkdir("app");
            $this->history[] = "app/ folder generated\r\n";
            $my_file = "app/".$this->mainClass.".php";
            $handle = fopen($my_file, 'w') or die('Cannot open file: '.$my_file); //implicitly creates file
            $this->history[] = $my_file." created\r\n";
            fwrite($handle, $file);
            $this->history[] = "Main class successfuly generated\r\n";
            fclose($handle);

        }

        public function generateSourceFiles()
        {

            $files[0] = "ENV.php";
            $files[1] = "autoload.php";
            $files[2] = "application.php";
            $files[3] = "env.json";
            $files[4] = "LICENSE.keyphp";
            $files[4] = "LICENSECOMPOSER";
            $files[5] = "doc.txt";
            $files[6] = "readme.rtf";
            $files[7] = "readme.txt";
            $files[8] = "readme.md";
            $files[9] = "Makefile";
            $files[10] = "projectDestroyer.php";
            $files[11] = "appInfos.json";
            file_put_contents("included_sourcefiles.json", json_encode($files,JSON_PRETTY_PRINT));
            unset($files[11]);
            $this->history[] = "source files added to queue\r\n";
            $wantComposer = null;
            $first = true;
            if (isset($this->useComposer)) {
                if ($this->useComposer == true) {
                    $wantComposer = "Y";
                } elseif ($this->useComposer == false) {
                    $wantComposer = "N";
                }
            }
            while ($wantComposer != "Y" && $wantComposer != "N") {
                if (!$first) {
                    $wantComposer = print("Incorrect answer, must be Y or N\r\n");
                }
                $wantComposer = readline("DO YOU WANT TO INSALL COMPOSER ON THE PROJECT? (Y/N) : ");
                $first = false;
            }
            if ($wantComposer == "Y") {

                echo "downloading composer\r\n";
                echo "to stop process ctrl+C\r\n";

                $output = shell_exec("php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\"
                php composer-setup.php
                php -r \"unlink('composer-setup.php');\"");

                print_r($output);
                echo "\r\ncomposer installed\r\n";
                $this->history[] = "composer installed localy\r\n";

            }
            $this->history[] = "source file queue treatment starting";
            foreach ($files as $value) {

                echo "creating $value\r\n";
                echo "downloading from https://raw.githubusercontent.com/PYLOTT/KeyPHP/master/$value\r\n";
                file_put_contents($value, file_get_contents("https://raw.githubusercontent.com/PYLOTT/KeyPHP/master/".$value));
                echo "$value fully downloaded and created\r\n";
                $this->history[] = "$value fully downloaded and created\r\n";

            }
            if (file_exists("Makefile")) {

                if (PHP_OS == "Darwin" || PHP_OS == "BSD" || PHP_OS == "Linux" || PHP_OS == "Solaris") {
                    mkdir("libraries");
                    $output = shell_exec('make Download_Basic_Libraries');
                    print_r($output);
                    echo "\r\nBasic Libraries Downloaded\r\n";
                    $this->history[] = "Basic Libraries Downloaded\r\n";
                } elseif (PHP_OS == "Windows") {
                    mkdir("libraries");
                    // since this program is developped on OSX, tests of NMAKE
                    // can't be made. We please you to do so and publish results
                    // on https://github.com/PYLOTT/KeyPHP/issues.
                    // issues can come from the makefile itself. please purpose
                    // your corrections if you find one.
                    // thank you for your understanding. Louis Bertrand <adressepro111@pylott.yt>
                    $output = shell_exec('nmake Download_Basic_Libraries');
                    print_r($output);
                    echo "\r\nBasic Libraries Downloaded\r\n";
                    $this->history[] = "Basic Libraries Downloaded\r\n";
                } else {
                    echo "\r\nYour os can't be nammed.\r\nplease proceed yourself to Makefile\r\n";
                    $this->history[] = "Your os can't be nammed.\r\nplease proceed yourself to Makefile\r\n";
                }

            } else {

                echo "\r\nMakefile can't be found, ignoring\r\n";
                $this->history[] = "Unable to find Makefile\r\n";

            }

        }

        public function logger()
        {

            mkdir("logs");
            file_put_contents("logs/install_latest", $this->history);

        }

    }
    
    $newApp = new NewProject;
    $newApp->parseJsonProject();
    $newApp->generateMainClass();
    $newApp->generateSourceFiles();
    $newApp->logger();
