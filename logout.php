<?php
require_once 'header.php';

if(isset($_SESSION['user'])){
    destroySession();
    echo "<div class='main'>You have been logged out. Please " .
        "<a=href='index.php'>click here</a> to refresh the page.";
}
else echo "<div class='main'><br>" .
          "You can't log out because you are not logged in.";

?>

<br><br></div>
</body>
</html>