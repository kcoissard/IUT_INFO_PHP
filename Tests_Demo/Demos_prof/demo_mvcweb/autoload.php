<?php

spl_autoload_register(function($classname)
{
    // on suppose classe dans son propre fichier portant le même nom
    // class Animal => Animal.php
    $file = '/'.$classname.'.php';

    $searchFolders = array('model');
    $found = false;
    foreach ($searchFolders as $searchFolder)
    {
        $path = __DIR__.'/'.$searchFolder.'/'.$classname.'.php';
        if (file_exists($path))
        {
            require_once($path);
            $found = true;
            break;
        }
    }
    if (!$found)
    {
        echo 'ERROR: '.$classname.' not found in any of folders: '.
             implode($searchFolders, ',')."\n";
    }
});
