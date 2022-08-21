<?php

require '../vendor/autoload.php';

use jrbit\novu;


$Novu = new novu\Client("API_KEY", "https://api.novu.co");

var_dump($Novu->Events()->Broadcast(
    new novu\models\MBroadcastBody(
        "my-notification",
        [
            "text" => "Broadcast Message"
        ]
    )
));