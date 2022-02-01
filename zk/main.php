<?php

define("IP_ADDRESS", '192.168.0.125');
define("PORT", '424');
define("CONNECTION", '');

$data = new Focal(IP_ADDRESS, CONNECTION, PORT);
$data->connect();
echo $data->render();

?>