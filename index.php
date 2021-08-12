<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<?php 

$name = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['name']);

$ch = curl_init();
// IMPORTANT: the below line is a security risk, read https://paragonie.com/blog/2017/10/certainty-automated-cacert-pem-management-for-php-software
// in most cases, you should set it to true
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'http://api-lamp-service.lamp.svc.cluster.local./?name=' . $name);
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result, true);
echo $obj[0]['CountryCode'] . ' ' . $obj[0]['Name'] . ' ' . $obj[0]['District'] . ' ' . $obj[0]['Population'];
 ?> 
 </body>
</html>
