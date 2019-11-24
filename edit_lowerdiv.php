<?php

require_once 'header.php';
require_once 'functions.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

print_table_for_edit("SELECT * FROM lowerdiv", "Lower Division Requirements (18)","edit_lowerdiv.php");


$connection->close();



?>