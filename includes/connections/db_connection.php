<?php


$db['serverName'] = "localhost";
$db['userName'] = "root";
$db['password'] = "";
$db['databaseName'] = "cms-edwin";

foreach ($db as $key => $value){
  define(strtoupper($key), $value);

}

$connection = mysqli_connect(SERVERNAME,USERNAME,'',DATABASENAME);

if(!$connection){
    echo "Connection error " . mysqli_connect_error($connection);
}



?>