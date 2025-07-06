<?php
$config = json_decode(file_get_contents("config.json"), true);
require "netsuite_soap.php";

$latestFile = null;
$latestMTime = 0;
foreach (glob($config['source_dir'] . "/*") as $file) {
    if (filemtime($file) > $latestMTime) {
        $latestMTime = filemtime($file);
        $latestFile = $file;
    }
}

if ($latestFile) {
    upload_to_netsuite($latestFile, $config);
}
