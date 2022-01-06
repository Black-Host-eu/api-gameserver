<?php

$url = "https://game.host-control.eu/api/application/servers";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Content-Type: application/json",
   "Authorization: Bearer <apikey>",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
  "name": "Servername",
  "user": 1,
  "nest": 2,
  "egg": 5,
  "docker_image": "ghcr.io/software-noob/yolks:wisp_java",
  "startup": "java -Xms128M -Xmx128M -jar server.jar",
  "environment": {
    "SERVER_VERSION": "1.8",
    "SERVER_JARFILE": "server.jar"
  },
  "limits": {
    "memory": 128,
    "swap": 0,
    "disk": 512,
    "io": 500,
    "cpu": 100
  },
  "feature_limits": {
    "databases": 0,
    "backups": 0
  },
  "allocation": {
    "default": 17
  }
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>
