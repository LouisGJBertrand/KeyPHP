<?php

    function delTree($dir) { 
    $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        } 
        return rmdir($dir); 
    } 

    $keeps[]=".";
    $keeps[]="..";
    $keeps[]="appInfos.json";
    $keeps[]="projectDestroyer.php";
    $keeps[]="projectGeneration.php";

    foreach (scandir(getcwd()) as $key => $value) {
        if(!in_array($value, $keeps)) {
            if (is_dir($value)) {
                echo "deleting folder : $value\r\n";
                delTree($value);
            }else{
                echo 'rm '.$value."\r\n";
                $output = shell_exec('rm '.$value);
                print_r($output);
            }
        }
    }
    $output = shell_exec('rm projectDestroyer.php');
