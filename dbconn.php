<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
$factory = (new Factory)
            ->withServiceAccount('sritechnology-b2abd-firebase-adminsdk-panuc-703342ebc6.json')
            ->withDatabaseUri('https://sritechnology-b2abd-default-rtdb.firebaseio.com/');
           
            $database = $factory->createDatabase();
            $auth = $factory->createAuth();

?>