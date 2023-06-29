<?php
$version = "8.0";
$servername = "mysql80";
$username = "admin";
$password = "password";
$db_name = "mysql80";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "<br>Connected successfully to mysql $version <p> using: Host: $servername User: $username Pass: $password Db_name:$db_name";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$version = "5.7";
$servername = "mysql57";
$username = "admin";
$password = "password";
$db_name = "mysql57";

try {
    $conn2 = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p><p><hr>Connected successfully to mysql $version <p> using: Host: $servername User: $username Pass: $password Db_name:$db_name";

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
