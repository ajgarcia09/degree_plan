<?php
require_once 'header.php';

$connection = new mysqli($hn,$un,$pw,$db);
if($connection->connect_error) die($connection->connect_error);

$user = $_SESSION['user'];
var_dump($_POST);
//update_first_attempt($user);
//update_second_attempt($user);
//update_third_attempt($user);
//update_grades($user);
print_core_table_for_edit("SELECT * FROM core WHERE user='$user'", "Core Curriculum (37)","edit_core.php");

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
    if(isset($_POST['L.,_Phil.,_&_Cult.+_one']) &&
        $_POST['L.,_Phil.,_&_Cult.+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='L.,_Phil.,_&_Cult.+_one';")){
            $first = sanitizeString($_POST['L.,_Phil.,_&_Cult.+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='L.,_Phil.,_&_Cult.+_one';");
    }
    if(isset($_POST['Creative Arts+_one']) &&
        $_POST['Creative Arts+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Creative Arts+_one';")){
            $first = sanitizeString($_POST['Creative Arts+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Creative Arts+_one';");
    }
    if(isset($_POST['Soc._&_Beh._Sc.+_one']) &&
        $_POST['Soc._&_Beh._Sc.+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Soc._&_Beh._Sc.+_one';")){
            $first = sanitizeString($_POST['Soc._&_Beh._Sc.+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Soc._&_Beh._Sc.+_one';");
    }
    //TODO: HANDLE BOTH COMPONENT AREA OPT(1 & 2)
    if(isset($_POST['Comp. Area Opt.1+_one']) &&
        $_POST['Comp. Area Opt.1+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Comp. Area Opt.1+_one';")){
            $first = sanitizeString($_POST['Comp. Area Opt.1+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Comp. Area Opt.1+_one';");
    }
    if(isset($_POST['Comp. Area Opt.2+_one']) &&
        $_POST['Comp. Area Opt.2+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='Comp. Area Opt.2+_one';")){
            $first = sanitizeString($_POST['Comp. Area Opt.2+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='Comp. Area Opt.2+_one';");
    }    
    if(isset($_POST['HIST_1301+_one']) &&
        $_POST['HIST_1301+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='HIST_1301+_one';")){
            $first = sanitizeString($_POST['HIST_1301+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='HIST_1301+_one';");
    }
    if(isset($_POST['HIST_1302+_one']) &&
        $_POST['HIST_1302+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='HIST_1302+_one';")){
            $first = sanitizeString($_POST['HIST_1302+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='HIST_1302+_one';");
    }
    if(isset($_POST['POLS_2310+_one']) &&
        $_POST['POLS_2310+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='POLS_2310+_one';")){
            $first = sanitizeString($_POST['POLS_2310+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='POLS_2310+_one';");
    }
    if(isset($_POST['POLS_2311+_one']) &&
        $_POST['POLS_2311+_one'] != queryMysql("SELECT one FROM core WHERE user='$user' AND coursenum='POLS_2311+_one';")){
            $first = sanitizeString($_POST['POLS_2311+_one']);
            queryMysql("UPDATE core SET one='$first' WHERE user='$user' AND coursenum='POLS_2311+_one';");
    }
    
    
}


?>