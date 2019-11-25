<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);
if($connection->connect_error) die($connection->connect_error);





?>