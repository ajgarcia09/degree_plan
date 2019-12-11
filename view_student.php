<?php
require_once 'header.php';

$user = $_GET['view'];
echo "Viewing $user's degreeplan";
print_student_tables($user)

?>