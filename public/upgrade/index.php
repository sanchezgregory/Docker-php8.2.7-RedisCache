<?php

echo "<h3><center>" ;
include 'howToConnect.php';
echo "</h3></center>";

echo "<hr><h3> <center> REDIS CONNECTION";
$redis = new Redis();
$redis->connect('redis', '6379');
if ($redis->ping()) {
    echo "<br> Coneection succesful";
}
echo "</center>";
echo "<hr><hr>";
echo phpinfo();

// changes only for upgrade