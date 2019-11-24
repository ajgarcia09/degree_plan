<?php
require_once 'header.php';

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    echo "$name was entered";
    echo "$email was entered";
}

?>

<form method="post" action="edit.php">
	<table>
		<tr>
			<td>Your name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Your email</td>
			<td><input type="text" name="email"></td>
		</tr>
	</table>
	<input type="submit" value="Submit">
	
</form>