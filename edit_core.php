<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);
if($connection->connect_error) die($connection->connect_error);

$user = $_SESSION['user'];
update_course_name($user);
update_first_attempt($user);
update_second_attempt($user);
update_third_attempt($user);
update_grades($user);
show_form_edit_example();
print_core_table_for_edit("SELECT * FROM core WHERE user='$user'", "Core Curriculum (37)","edit_core.php");

function update_course_name($user){
    if(isset($_POST['L_Phil_&_Cult+']) &&
        $_POST['L_Phil_&_Cult+'] != queryMysql("SELECT coursename FROM core WHERE user='$user' AND coursenum='L Phil & Cult+';")){
            $coursename = sanitizeString($_POST['L_Phil_&_Cult+']);
            queryMysql("UPDATE core SET coursename='$coursename' WHERE user='$user' AND coursenum='L Phil & Cult+';");
    }
    if(isset($_POST['Creative_Arts+']) &&
        $_POST['Creative_Arts+'] != queryMysql("SELECT coursename FROM core WHERE user='$user' AND coursenum='Creative Arts+';")){
            $coursename = sanitizeString($_POST['Creative_Arts+']);
            queryMysql("UPDATE core SET coursename='$coursename' WHERE user='$user' AND coursenum='Creative Arts+';");
    }
    if(isset($_POST['Soc_&_BehSc+']) &&
        $_POST['Soc_&_BehSc+'] != queryMysql("SELECT coursename FROM core WHERE user='$user' AND coursenum='Soc & BehSc+';")){
            $coursename = sanitizeString($_POST['Soc_&_BehSc+']);
            queryMysql("UPDATE core SET coursename='$coursename' WHERE user='$user' AND coursenum='Soc & BehSc+';");
    }
    if(isset($_POST['Comp_Area_Opt1+']) &&
        $_POST['Comp_Area_Opt1+'] != queryMysql("SELECT coursename FROM core WHERE user='$user' AND coursenum='Comp Area Opt1+';")){
            $coursename = sanitizeString($_POST['Comp_Area_Opt1+']);
            queryMysql("UPDATE core SET coursename='$coursename' WHERE user='$user' AND coursenum='Comp Area Opt1+';");
    }
    if(isset($_POST['Comp_Area_Opt2+']) &&
        $_POST['Comp_Area_Opt2+'] != queryMysql("SELECT coursename FROM core WHERE user='$user' AND coursenum='Comp Area Opt2+';")){
            $coursename = sanitizeString($_POST['Comp_Area_Opt2+']);
            queryMysql("UPDATE core SET coursename='$coursename' WHERE user='$user' AND coursenum='Comp Area Opt2+';");
    }
}

function update_first_attempt($user){
    if(isset($_POST['RWS_1301+_one']) &&
        $_POST['RWS_1301+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='RWS 1301+';")){
            $first = sanitizeString($_POST['RWS_1301+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='RWS 1301+';");
    }
    if(isset($_POST['RWS_1302+_one']) &&
        $_POST['RWS_1302+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='RWS 1302+';")){
            $first = sanitizeString($_POST['RWS_1302+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='RWS 1302+';");
    }
    if(isset($_POST['MATH_1411+_one']) &&
        $_POST['MATH_1411+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='MATH 1411+';")){
            $first = sanitizeString($_POST['MATH_1411+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='MATH 1411+';");
    }
    if(isset($_POST['L_Phil_&_Cult+_one']) &&
        $_POST['L_Phil_&_Cult+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='L Phil & Cult+';")){
            $first = sanitizeString($_POST['L_Phil_&_Cult+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='L Phil & Cult+';");
    }
    if(isset($_POST['Creative_Arts+_one']) &&
        $_POST['Creative_Arts+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Creative Arts+';")){
            $first = sanitizeString($_POST['Creative_Arts+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Creative Arts+';");
    }
    if(isset($_POST['Soc_&_BehSc+_one']) &&
        $_POST['Soc_&_BehSc+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Soc & BehSc+';")){
            $first = sanitizeString($_POST['Soc_&_BehSc+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Soc & BehSc+';");
    }
    if(isset($_POST['Comp_Area_Opt1+_one']) &&
        $_POST['Comp_Area_Opt1+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Comp Area Opt1+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt1+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Comp Area Opt1+';");
    }
    if(isset($_POST['Comp_Area_Opt2+_one']) &&
        $_POST['Comp_Area_Opt2+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Comp Area Opt2+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt2+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Comp Area Opt2+';");
    }    
    if(isset($_POST['HIST_1301+_one']) &&
        $_POST['HIST_1301+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='HIST 1301+';")){
            $first = sanitizeString($_POST['HIST_1301+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='HIST 1301+';");
    }
    if(isset($_POST['HIST_1302+_one']) &&
        $_POST['HIST_1302+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='HIST 1302+';")){
            $first = sanitizeString($_POST['HIST_1302+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='HIST 1302+';");
    }
    if(isset($_POST['POLS_2310+_one']) &&
        $_POST['POLS_2310+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='POLS 2310+';")){
            $first = sanitizeString($_POST['POLS_2310+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='POLS 2310+';");
    }
    if(isset($_POST['POLS_2311+_one']) &&
        $_POST['POLS_2311+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='POLS 2311+';")){
            $first = sanitizeString($_POST['POLS_2311+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='POLS 2311+';");
    }
    
}

function update_second_attempt($user){
    if(isset($_POST['RWS_1301+_two']) &&
        $_POST['RWS_1301+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='RWS 1301+';")){
            $first = sanitizeString($_POST['RWS_1301+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='RWS 1301+';");
    }
    if(isset($_POST['RWS_1302+_two']) &&
        $_POST['RWS_1302+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='RWS 1302+';")){
            $first = sanitizeString($_POST['RWS_1302+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='RWS 1302+';");
    }
    if(isset($_POST['MATH_1411+_two']) &&
        $_POST['MATH_1411+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='MATH 1411+';")){
            $first = sanitizeString($_POST['MATH_1411+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='MATH 1411+';");
    }
    if(isset($_POST['L_Phil_&_Cult+_two']) &&
        $_POST['L_Phil_&_Cult+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='L_Phil_&_Cult+_two';")){
            $first = sanitizeString($_POST['L_Phil_&_Cult+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='L Phil & Cult+';");
    }
    if(isset($_POST['Creative_Arts+_two']) &&
        $_POST['Creative_Arts+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='Creative Arts+';")){
            $first = sanitizeString($_POST['Creative_Arts+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='Creative Arts+';");
    }
    if(isset($_POST['Soc_&_BehSc+_two']) &&
        $_POST['Soc_&_BehSc+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='Soc & BehSc+';")){
            $first = sanitizeString($_POST['Soc_&_BehSc+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='Soc & BehSc+';");
    }
    if(isset($_POST['Comp_Area_Opt1+_two']) &&
        $_POST['Comp_Area_Opt1+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='Comp Area Opt1+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt1+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='Comp Area Opt1+';");
    }
    if(isset($_POST['Comp_Area_Opt2+_two']) &&
        $_POST['Comp_Area_Opt2+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='Comp Area Opt2+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt2+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='Comp Area Opt2+';");
    }
    if(isset($_POST['HIST_1301+_two']) &&
        $_POST['HIST_1301+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='HIST 1301+';")){
            $first = sanitizeString($_POST['HIST_1301+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='HIST 1301+';");
    }
    if(isset($_POST['HIST_1302+_two']) &&
        $_POST['HIST_1302+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='HIST 1302+';")){
            $first = sanitizeString($_POST['HIST_1302+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='HIST 1302+';");
    }
    if(isset($_POST['POLS_2310+_two']) &&
        $_POST['POLS_2310+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='POLS 2310+';")){
            $first = sanitizeString($_POST['POLS_2310+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='POLS 2310+';");
    }
    if(isset($_POST['POLS_2311+_two']) &&
        $_POST['POLS_2311+_two'] != queryMysql("SELECT two FROM core WHERE user='$user' AND coursenum='POLS 2311+';")){
            $first = sanitizeString($_POST['POLS_2311+_two']);
            queryMysql("UPDATE core SET two='$first' WHERE user='$user' AND coursenum='POLS 2311+';");
    }
    
}

function update_third_attempt($user){
    if(isset($_POST['RWS_1301+_three']) &&
        $_POST['RWS_1301+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='RWS 1301+';")){
            $first = sanitizeString($_POST['RWS_1301+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='RWS 1301+';");
    }
    if(isset($_POST['RWS_1302+_three']) &&
        $_POST['RWS_1302+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='RWS 1302+';")){
            $first = sanitizeString($_POST['RWS_1302+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='RWS 1302+';");
    }
    if(isset($_POST['MATH_1411+_three']) &&
        $_POST['MATH_1411+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='MATH 1411+';")){
            $first = sanitizeString($_POST['MATH_1411+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='MATH 1411+';");
    }
    if(isset($_POST['L_Phil_&_Cult+_three']) &&
        $_POST['L_Phil_&_Cult+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='L_Phil_&_Cult+_three';")){
            $first = sanitizeString($_POST['L_Phil_&_Cult+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='L Phil & Cult+';");
    }
    if(isset($_POST['Creative_Arts+_three']) &&
        $_POST['Creative_Arts+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='Creative Arts+';")){
            $first = sanitizeString($_POST['Creative_Arts+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='Creative Arts+';");
    }
    if(isset($_POST['Soc_&_BehSc+_three']) &&
        $_POST['Soc_&_BehSc+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='Soc & BehSc+';")){
            $first = sanitizeString($_POST['Soc_&_BehSc+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='Soc & BehSc+';");
    }
    if(isset($_POST['Comp_Area_Opt1+_three']) &&
        $_POST['Comp_Area_Opt1+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='Comp Area Opt1+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt1+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='Comp Area Opt1+';");
    }
    if(isset($_POST['Comp_Area_Opt2+_three']) &&
        $_POST['Comp_Area_Opt2+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='Comp Area Opt2+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt2+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='Comp Area Opt2+';");
    }
    if(isset($_POST['HIST_1301+_three']) &&
        $_POST['HIST_1301+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='HIST 1301+';")){
            $first = sanitizeString($_POST['HIST_1301+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='HIST 1301+';");
    }
    if(isset($_POST['HIST_1302+_three']) &&
        $_POST['HIST_1302+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='HIST 1302+';")){
            $first = sanitizeString($_POST['HIST_1302+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='HIST 1302+';");
    }
    if(isset($_POST['POLS_2310+_three']) &&
        $_POST['POLS_2310+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='POLS 2310+';")){
            $first = sanitizeString($_POST['POLS_2310+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='POLS 2310+';");
    }
    if(isset($_POST['POLS_2311+_three']) &&
        $_POST['POLS_2311+_three'] != queryMysql("SELECT three FROM core WHERE user='$user' AND coursenum='POLS 2311+';")){
            $first = sanitizeString($_POST['POLS_2311+_three']);
            queryMysql("UPDATE core SET three='$first' WHERE user='$user' AND coursenum='POLS 2311+';");
    }
}

function update_grades($user){
    if(isset($_POST['RWS_1301+_GR']) &&
        $_POST['RWS_1301+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='RWS 1301+';")){
            $first = sanitizeString($_POST['RWS_1301+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='RWS 1301+';");
    }
    if(isset($_POST['RWS_1302+_GR']) &&
        $_POST['RWS_1302+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='RWS 1302+';")){
            $first = sanitizeString($_POST['RWS_1302+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='RWS 1302+';");
    }
    if(isset($_POST['MATH_1411+_GR']) &&
        $_POST['MATH_1411+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='MATH 1411+';")){
            $first = sanitizeString($_POST['MATH_1411+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='MATH 1411+';");
    }
    if(isset($_POST['L_Phil_&_Cult+_GR']) &&
        $_POST['L_Phil_&_Cult+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='L_Phil_&_Cult+_GR';")){
            $first = sanitizeString($_POST['L_Phil_&_Cult+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='L Phil & Cult+';");
    }
    if(isset($_POST['Creative_Arts+_GR']) &&
        $_POST['Creative_Arts+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='Creative Arts+';")){
            $first = sanitizeString($_POST['Creative_Arts+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='Creative Arts+';");
    }
    if(isset($_POST['Soc_&_BehSc+_GR']) &&
        $_POST['Soc_&_BehSc+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='Soc & BehSc+';")){
            $first = sanitizeString($_POST['Soc_&_BehSc+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='Soc & BehSc+';");
    }
    if(isset($_POST['Comp_Area_Opt1+_GR']) &&
        $_POST['Comp_Area_Opt1+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='Comp Area Opt1+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt1+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='Comp Area Opt1+';");
    }
    if(isset($_POST['Comp_Area_Opt2+_GR']) &&
        $_POST['Comp_Area_Opt2+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='Comp Area Opt2+';")){
            $first = sanitizeString($_POST['Comp_Area_Opt2+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='Comp Area Opt2+';");
    }
    if(isset($_POST['HIST_1301+_GR']) &&
        $_POST['HIST_1301+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='HIST 1301+';")){
            $first = sanitizeString($_POST['HIST_1301+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='HIST 1301+';");
    }
    if(isset($_POST['HIST_1302+_GR']) &&
        $_POST['HIST_1302+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='HIST 1302+';")){
            $first = sanitizeString($_POST['HIST_1302+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='HIST 1302+';");
    }
    if(isset($_POST['POLS_2310+_GR']) &&
        $_POST['POLS_2310+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='POLS 2310+';")){
            $first = sanitizeString($_POST['POLS_2310+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='POLS 2310+';");
    }
    if(isset($_POST['POLS_2311+_GR']) &&
        $_POST['POLS_2311+_GR'] != queryMysql("SELECT GR FROM core WHERE user='$user' AND coursenum='POLS 2311+';")){
            $first = sanitizeString($_POST['POLS_2311+_GR']);
            queryMysql("UPDATE core SET GR='$first' WHERE user='$user' AND coursenum='POLS 2311+';");
    }
}

?>