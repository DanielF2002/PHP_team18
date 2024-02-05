<?php
$dbLocal = true;
if ($dbLocal) {
    $dbHost = "web-dev-env-main-db-1";
    $dbUser = "team18";
    $dbPwd = "team18";
    $dbName = "team18";
}


$conn = new mysqli($dbHost, $dbUser, $dbPwd, $dbName);

if ($conn->connect_error)
{
    die("". $conn->connect_error);
}
?>