<?php

if(!empty($_POST['module_name'])) {
    //Module Name
    $module = $_POST['module_name'];

    // Finding all files with name loremipsum in root directory.
    foreach(glob(__DIR__ . DIRECTORY_SEPARATOR . 'loremipsum.*') as $file) {
        update_file_contents($file, $module);
        rename_files($file, $module);
    }

    // Finding all files with .php extension inside src/.
    foreach(glob_recursive(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . '*.php') as $file) {
        update_file_contents($file, $module);
    }

    echo "Module Files Generated Successfully. Have Fun!";
}
else {
    echo "Please provide a Module Name to be created. <a href='index.php'>Go Back</a>";
}

function update_file_contents($file, $module) {
    //Get File Contents
    $file_contents = file_get_contents($file);
    $file_contents = str_replace("loremipsum", $module, $file_contents);
    //Update File Contents
    file_put_contents($file, $file_contents);
}
function rename_files($file, $module) {
    $f = str_replace("loremipsum", $module, $file);
    rename($file, $f);
}

function glob_recursive($pattern, $flags = 0)
{
    $files = glob($pattern, $flags);
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
    {
        $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}
