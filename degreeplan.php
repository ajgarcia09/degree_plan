<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

//the currently logged in user
$user = $_SESSION['user'];

print_table("SELECT * FROM lowerdiv WHERE user='$user'", "Lower Division Requirements (18)");
echo "<button id='editButton'>".
        "<a href='edit_lowerdiv.php'>Edit Lower Division Requirements</a></button>";
echo "<br><br>";

print_table("SELECT * FROM core WHERE user='$user'", "Core Curriculum (37)*");
echo "<button id='editButton'>".
    "<a href='edit_core.php'>Edit Core Curriculum</a></button>";
echo "<br><br>";

print_table("SELECT * FROM othermath WHERE user='$user'", "Other Required Mathematics Courses (12)");
echo "<button id='editButton'>".
    "<a href='edit_math.php'>Edit Other Math Courses</a></button>";
echo "<br><br>";

print_table("SELECT * FROM freeelect WHERE user='$user'", "Free Electives (3)*");
echo "<button id='editButton'>".
    "<a href='edit_free_elect.php'>Edit Free Electives</a></button>";
echo "<br><br>";

print_table("SELECT * FROM sciences WHERE user='$user'", "Life & Physical Sciences (12)*");
echo "<button id='editButton'>".
    "<a href='edit_sciences.php'>Edit Life & Physical Sciences</a></button>";
echo "<br><br>";

print_table("SELECT * FROM upperdiv WHERE user='$user'", "Upper Division Requirements (23)");
echo "<button id='editButton'>".
    "<a href='edit_upperdiv.php'>Edit Upper Division Requirements</a></button>";
echo "<br><br>";

print_table("SELECT * FROM techelect WHERE user='$user'", "Technical Electives (15)*");
echo "<button id='editButton'>".
    "<a href='edit.php'>Edit Technical Electives</a></button>";
echo "<br><br>";


$connection->close();

echo <<<_END
<b>1,2,3 = Semester course was taken (1st attempt, 2nd attempt, 3rd attempt) </b><br>
<b>GR = Grade Received (precede with 'T' if transfer grade)</b><br>
<b>HR = Hours </b><br>
<b>T = Transfer Credit </b><br>
<b>(+) Minimum grade of C required </b><br>
<b>(*) Click here for details</b>
_END;


    



?>