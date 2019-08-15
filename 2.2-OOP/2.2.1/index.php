<?php

include ('./autoload.php');
include ('./config/SystemConfig.php');


$fileJSON = new JsonFileAccessModel('data');
$contentFileJSON = $fileJSON->readJson();
print_r($contentFileJSON);

