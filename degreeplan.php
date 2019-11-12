<?php
require_once 'header.php';

//need to get rid of this, gives an error when
//user logs out and clicks on Home (user is undefined)
//echo "Welcome, '$user'";

$connection = new mysqli($hn,$un,$pw,$db);

if($connection->connect_error) die($connection->connect_error);

$query = "SELECT * FROM lowerdiv";
$result = $connection->query($query);
if(!$result) die ($connection->connect_error);

$rows = $result->num_rows;

echo "<th>Lower Division Courses</th>";
echo <<<_END
<table>
 <tr>
  <td align='center'>Course Number</td>
  <td align='center'>Course Name</td>
  <td align='center'>1</td>
  <td align='center'>2</td>
  <td align='center'>3</td>
  <td align='center'>GR</td>
  <td align='center'>HR</td>
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

$result->close();
$connection->close();

?>