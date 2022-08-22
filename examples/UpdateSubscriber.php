<?php

require '../vendor/autoload.php';

use jrbit\novu;


$Novu = new novu\Client("API_KEY", "https://api.novu.co");

$Subscriber = new novu\models\requests\mSubscriber(
    "6301ed353edef13abc71d23d", 
    "Max", 
    "Mustermann",
    "max@example.com"
);


var_dump($Novu->Subscribers()->Update($Subscriber));