<?php

//**DATABASE INFO**
$hn = 'sentinel.local'; //db hostname
$un = 'root'; //db username
$pw = ''; //db password
$db = 'degreeplan'; //db name
$appname = "My CS Degree Plan";

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

function createTable($name, $query){
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists","\n";
}

function queryMysql($query){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die($connection->connect_error);
    return $result;
}

function destroySession(){
    $_SESSION=array();
    
    if(session_id() != "" || isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-2592000,'/');
    }
    session_destroy();
}

function sanitizeString($str){
    global $connection;
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripcslashes($str);
    return $connection->real_escape_string($str);
}

function showProfile($user){
    if(file_exists("$user.jpg"))
        echo "<img src='$user.jpg' style='float:left;'>";
    
        $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
        
        if($result->num_rows){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
        }
}
?>