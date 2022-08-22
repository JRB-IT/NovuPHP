<?php

require '../vendor/autoload.php';

use jrbit\novu;


$Novu = new novu\Client("API_KEY", "https://api.novu.co");

var_dump($Novu->Subscribers()->List(0)->getData()[0]->delete());