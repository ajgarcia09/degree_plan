<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

//the currently logged in user
$user = $_SESSION['user'];

if($user == 'starlord'){
    print_students_table("SELECT * FROM students WHERE user != 'starlord';", "Students");
    $connection->close();
}
else{
    print_firstname_lastname("SELECT firstname, lastname FROM students WHERE user='$user';");
    print_student_tables($user); 
    $connection->close();
    
    echo <<<_END
    <b>1,2,3 = Semester course was taken (1st attempt, 2nd attempt, 3rd attempt) </b><br>
    <b>GR = Grade Received (precede with 'T' if transfer grade)</b><br>
    <b>HR = Hours </b><br>
    <b>T = Transfer Credit </b><br>
    <b>(+) Minimum grade of C required </b><br>
    <b>(*) Click here for details</b>
    _END;
    
}





    



?>