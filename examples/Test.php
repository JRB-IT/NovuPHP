<?php

require '../vendor/autoload.php';

use jrbit\novu;


$Novu = new novu\Client("API_KEY", "https://api.novu.co");

var_dump($Novu->Events()->Trigger(
    new novu\models\MTriggerBody(
        "my-notification",
        [
            "text" => "Test Message"
        ],
        new novu\models\MTriggerTo(
            sSubscriberId: "subscriber-id"
        )
    )
));