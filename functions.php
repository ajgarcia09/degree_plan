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
    echo "Table '$name' created or already exists","<br>";
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

function print_firstname_lastname($query){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die ($connection->connect_error);
    
    $result->data_seek(0);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    
    echo "<h3>Welcome, $firstname $lastname</h3><br>";
    
}

function show_form_edit_example(){
    echo <<<_END
        <h3> How to log your courses </h3>
        Please use the following notation to log your 1st, 2nd, and/or 3rd attempt:<br>
        Fall = FAxx <br>
        Spring = SPxx <br>
        Summer = SUxx <br>
        Maymester = MYxx <br>
        Wintermester = WIxx <br>
        Where xx are the last 2 digits of the year you took the course. <br>

        <h3>Example: I took Intro to CS during Summer 2015</h3>
        <table>
        <tr>
            <th>Course Number</th>
            <th>Course Name</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>GR</th>
            <th>HR</th>
        </tr>
        <tr>
            <td>CS 1401+</td>
            <td>Intro. to Computer Science</td>
            <td style='color:red'>SU15</td>
            <td></td>
            <td></td>
            <td style='color:red'>A</td>
            <td>4</td>
        </tr>
    </table>
    <br><br>
 
_END;
    
        
}

function print_students_table($query,$table_title){
        global $connection;
        $result = $connection->query($query);
        if(!$result) die ($connection->connect_error);
        $rows = $result->num_rows;
        
        echo "<th><b>$table_title</b></th>";
        echo <<<_END
        <table>
            <tr>
                <th>StudentID</th>
            </tr>
        _END;
        for($j =0; $j < $rows; ++$j){
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $student = $row['user'];
            echo <<<_END
                <tr>
                    <td><a href='view_student.php?view=$student'>$student</a></td>
                </tr>
            _END;
          
        }
        
        echo "</table>";
        echo "<br><br>";
        $result->close();
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
        $coursenum = $row['coursenum'];
        $coursename = $row['coursename'];
        $first = $row['one'];
        $second = $row['two'];
        $third = $row['three'];
        $grade = $row['GR'];
        $hrs = $row['HR'];
        echo <<<_END
            <tr>
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
    <button type="reset" value="Reset">Reset</button>
    <button><a href='degreeplan.php'>Return to Home</a></button>
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
    <button type="reset" value="Reset">Reset</button>
    <button><a href='degreeplan.php'>Return to Home</a></button>
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
    $coursenum = $row['coursenum'];
    $coursename = $row['coursename'];
    $first = $row['one'];
    $second = $row['two'];
    $third = $row['three'];
    $grade = $row['GR'];
    $hrs = $row['HR'];
  
     echo <<<_END
       <tr>
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
        <button type="reset" value="Reset">Reset</button>
        <button><a href='degreeplan.php'>Return to Home</a></button>
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
    <button type="reset" value="Reset">Reset</button>
    <button><a href='degreeplan.php'>Return to Home</a></button>
    </form>
    <br><br>
_END;
    $result->close();    
}

function print_techelect_table_for_edit($query,$table_title,$edit_file){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die ($connection->connect_error);
    $rows = $result->num_rows;
    
    echo "<th><b>$table_title</b></th>";
    echo <<<_END
    
<form method="post" action="$edit_file">
    <table>
    <tr>
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
        $coursenum = $row['coursenum'];
        $coursename = $row['coursename'];
        $first = $row['one'];
        $second = $row['two'];
        $third = $row['three'];
        $grade = $row['GR'];
        $hrs = $row['HR'];
        $hidden = $row['hidden'];
        echo <<<_END
            <tr>
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
    
    echo <<<_END
    </table>
    <input type="submit" value="Save Changes">
    <button type="reset" value="Reset">Reset</button>
    <button><a href='degreeplan.php'>Return to Home</a></button>
    </form>
    <br><br>
_END;
    $result->close();
}

function print_student_tables($user){
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
        "<a href='edit_techelect.php'>Edit Technical Electives</a></button>";
    echo "<br><br>";
    
}

?>