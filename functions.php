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

function print_table($query,$table_title){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die ($connection->connect_error);
    $rows = $result->num_rows;
    
    echo "<th><b>$table_title</b></th>";
    echo <<<_END
<table>
 <tr>
  <th>User</th>
  <th>Course Number</th>
  <th>Course Name</th>
  <th>1</th>
  <th>2</th>
  <th>3</th>
  <th>GR</th>
  <th>HR</th>
 </tr>
 
_END;
    
    for($j =0; $j < $rows; ++$j){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo "<tr>" .
            "<td>" . $row['user'] . "</td>" .
            "<td>" . $row['coursenum'] . "</td>" .
            "<td>" .$row['coursename'] . "</td>" .
            "<td>" . $row['one'] . "</td>" .
            "<td>" . $row['two'] . "</td>" .
            "<td>" . $row['three'] . "</td>" .
            "<td>" . $row['GR'] . "</td>" .
            "<td>" . $row['HR']. "</td>" .
            "</tr>";
    }
    
    echo "</table>";
    echo "<br><br>";
    $result->close();
}

/**
 * Tables lowerdiv, othermath, and upperdiv
 * will call this function. Remaining tables
 * will have their own print_table_for_edit function.
 * **/
function print_table_for_edit($query,$table_title,$edit_file){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die ($connection->connect_error);
    $rows = $result->num_rows;
    
    echo "<th><b>$table_title</b></th>";
    echo <<<_END
    
<form method="post" action="$edit_file">
    <table>
    <tr>
    <th>User</th>
    <th>Course Number</th>
    <th>Course Name</th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>GR</th>
    <th>HR</th>
    </tr>
    
_END;
    
    for($j =0; $j < $rows; ++$j){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $user = $row['user'];
        $coursenum = $row['coursenum'];
        $coursename = $row['coursename'];
        $first = $row['one'];
        $second = $row['two'];
        $third = $row['three'];
        $grade = $row['GR'];
        $hrs = $row['HR'];
        echo <<<_END
            <tr>
            <td>$user</td>
            <td>$coursenum</td>
            <td>$coursename</td>
            <td><input type='text' name='$coursenum.one' value='$first'></td>
            <td><input type='text' name='$coursenum.two' value='$second'></td>
            <td><input type='text' name='$coursenum.three' value='$third'></td>
            <td><input type='text' name='$coursenum.GR' value='$grade'></td>
            <td>$hrs</td>
            </tr>
_END;
    }
    
    echo <<<_END
    </table>
    <input type="submit" value="Save Changes">
    </form>
    <br><br>
_END;
    $result->close();
}

function print_core_table_for_edit($query,$table_title,$edit_file){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die ($connection->connect_error);
    $rows = $result->num_rows;
    
    echo "<th><b>$table_title</b></th>";
    echo <<<_END
    
<form method="post" action="$edit_file">
    <table>
    <tr>
    <th>User</th>
    <th>Course Number</th>
    <th>Course Name</th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>GR</th>
    <th>HR</th>
    </tr>
    
_END;
    
    for($j =0; $j < $rows; ++$j){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $user = $row['user'];
        $coursenum = $row['coursenum'];
        $coursename = $row['coursename'];
        $first = $row['one'];
        $second = $row['two'];
        $third = $row['three'];
        $grade = $row['GR'];
        $hrs = $row['HR'];
        if($coursenum == "L Phil & Cult+" || $coursenum == "Creative Arts+" ||
            $coursenum == "Soc & BehSc+" || $coursenum == "Comp Area Opt1+" || 
            $coursenum == "Comp Area Opt2+"){
            echo <<<_END
                <tr>
            <td>$user</td>
            <td>$coursenum</td>
            <td><input type='text' name='$coursenum' value='$coursename'></td>
            <td><input type='text' name='$coursenum.one' value='$first'></td>
            <td><input type='text' name='$coursenum.two' value='$second'></td>
            <td><input type='text' name='$coursenum.three' value='$third'></td>
            <td><input type='text' name='$coursenum.GR' value='$grade'></td>
            <td>$hrs</td>
            </tr>
            _END;
        }
        else{
            echo <<<_END
                <tr>
                <td>$user</td>
                <td>$coursenum</td>
                <td>$coursename</td>
                <td><input type='text' name='$coursenum.one' value='$first'></td>
                <td><input type='text' name='$coursenum.two' value='$second'></td>
                <td><input type='text' name='$coursenum.three' value='$third'></td>
                <td><input type='text' name='$coursenum.GR' value='$grade'></td>
                <td>$hrs</td>
                </tr>
            _END;
        }
    }
    
    echo <<<_END
    </table>
    <input type="submit" value="Save Changes">
    </form>
    <br><br>
_END;
    $result->close();
}

function print_freeelect_table_for_edit($query,$table_title,$edit_file){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die ($connection->connect_error);
    
    echo "<th><b>$table_title</b></th>";
    echo <<<_END
    <form method="post" action="$edit_file">
    <table>
        <tr>
        <th>User</th>
        <th>Course Number</th>
        <th>Course Name</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>GR</th>
        <th>HR</th>
        </tr>
    _END;
    
    $result->data_seek(0);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $user = $row['user'];
    $coursenum = $row['coursenum'];
    $coursename = $row['coursename'];
    $first = $row['one'];
    $second = $row['two'];
    $third = $row['three'];
    $grade = $row['GR'];
    $hrs = $row['HR'];
  
     echo <<<_END
       <tr>
       <td>$user</td>
       <td><input type='text' name='freenum' value='$coursenum' required></td>
       <td><input type='text' name='freename' value='$coursename' required></td>
       <td><input type='text' name='first' value='$first'></td>
       <td><input type='text' name='second' value='$second'></td>
       <td><input type='text' name='third' value='$third'></td>
       <td><input type='text' name='grade' value='$grade'></td>
       <td>$hrs</td>
       </tr>
       _END;
     
     echo <<<_END
        </table>
        <input type="submit" value="Save Changes">
        </form>
        <br><br>
    _END;
    

$result->close();
}

function print_sciences_table_for_edit($query,$table_title,$edit_file){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die ($connection->connect_error);
    $rows = $result->num_rows;
    
    echo "<th><b>$table_title</b></th>";
    echo <<<_END
    
<form method="post" action="$edit_file">
    <table>
    <tr>
    <th>User</th>
    <th>Course Number</th>
    <th>Course Name</th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>GR</th>
    <th>HR</th>
    </tr>
    
_END;
    
    for($j =0; $j < $rows; ++$j){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $user = $row['user'];
        $coursenum = $row['coursenum'];
        $coursename = $row['coursename'];
        $first = $row['one'];
        $second = $row['two'];
        $third = $row['three'];
        $grade = $row['GR'];
        $hrs = $row['HR'];
        $hidden = $row['hidden'];
        //counter to keep track of which of the 2 blank rows is being populated
        if($coursenum == "PHYS 2420"){
          echo <<<_END
            <tr>
                <td>$user</td>
                <td>$coursenum</td>
                <td>$coursename</td>
                <td><input type='text' name='$coursenum.one' value='$first'></td>
                <td><input type='text' name='$coursenum.two' value='$second'></td>
                <td><input type='text' name='$coursenum.three' value='$third'></td>
                <td><input type='text' name='$coursenum.GR' value='$grade'></td>
                <td>$hrs</td>
                </tr>
            _END;
        }
        else{
            echo <<<_END
                <tr>
                <td>$user</td>
                <td><input type='text' name='coursenum.$hidden' value='$coursenum'></td>
                <td><input type='text' name='coursename.$hidden' value='$coursename'></td>
                <td><input type='text' name='first.$hidden' value='$first'></td>
                <td><input type='text' name='second.$hidden' value='$second'></td>
                <td><input type='text' name='third.$hidden' value='$third'></td>
                <td><input type='text' name='grade.$hidden' value='$grade'></td>
                <td>$hrs</td>
                </tr>
            _END;
        }
    }
    
    echo <<<_END
    </table>
    <input type="submit" value="Save Changes">
    </form>
    <br><br>
_END;
    $result->close();
    
    
}
?>