<?php
require_once 'header.php';
echo <<<_END
    <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }
      
      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")
      
      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }
    
    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
<div class='main'><h4>Please enter your UTEP ID number as your username</h4>
<h4>And enter the last 4 digits of your UTEP ID as your password.</h4> 
_END;

$error = $user = $pass = $firstname = $lastname = "";
if(isset($_SESSION['user'])) destroySession();

if(isset($_POST['user'])){
    
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $firstname = sanitizeString($_POST['firstname']);
    $lastname = sanitizeString($_POST['lastname']);
   
    
    if($user == "" || $pass == "")
        $error = "Not all fields were entered<br><br>";
    else{
        $result = queryMysql("SELECT * FROM students WHERE user='$user'");
        
        if($result->num_rows)
            $error = "That username already exists<br><br>";
        else{
            queryMysql("INSERT INTO students VALUES('$user','$pass','$firstname','$lastname')");
            setup_lowerdiv($user);
            setup_core($user);
            setup_othermath($user);
            setup_freeelect($user);
            setup_sciences($user);
            setup_upperdiv($user);
            setup_techelect($user);
            die("<span class='available'>&nbsp;&#x2714 Account Created</span><br>Please Log in.<br><br>");
        }
    }
}


/*
 * Inserts the required pre-filled values
 * for each new user in the lowerdiv table.
 */
function setup_lowerdiv($user){
    queryMysql("INSERT INTO lowerdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 1401+', 'Intro. to Computer Science', '4')");
    
    queryMysql("INSERT INTO lowerdiv(user,coursenum,coursename,HR)
                     VALUES('$user','CS 2401+', 'Elem. Data Struct./Algorithms', '4')");
    
    queryMysql("INSERT INTO lowerdiv(user,coursenum,coursename,HR)
                        VALUES('$user','MATH 2300+', 'Discrete Mathematics', '3')");
    
    queryMysql("INSERT INTO lowerdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 2302+', 'Data Structures', '3')");
    
    queryMysql("INSERT INTO lowerdiv(user,coursenum,coursename,HR)
                        VALUES('$user','EE 2369+', 'Digital Systems Design I', '3')");
    
    queryMysql("INSERT INTO lowerdiv(user,coursenum,coursename,HR)
                        VALUES('$user','EE 2169+', 'Digital Systems Design I Lab', '1')");
}

function setup_core($user){
    queryMysql("INSERT INTO core(user,coursenum,coursename,HR)
                        VALUES('$user','RWS 1301+', 'Rhetoric and Composition 1', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum,coursename,HR)
                        VALUES('$user','RWS 1302+', 'Rhetoric and Composition 2', '4')");
    
    queryMysql("INSERT INTO core(user,coursenum,coursename,HR)
                        VALUES('$user','MATH 1411+', 'Calculus I', '3')");
    
    //***CORE ELECTIVES***
    queryMysql("INSERT INTO core(user,coursenum, HR)
                        VALUES('$user','L Phil & Cult+', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum, HR)
                        VALUES('$user','Creative Arts+', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum, HR)
                        VALUES('$user','Soc & BehSc+', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum, HR)
                        VALUES('$user','Comp Area Opt1+', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum, HR)
                        VALUES('$user','Comp Area Opt2+', '3')");
    
    //***CORE ELECTIVES***
    
    queryMysql("INSERT INTO core(user,coursenum,coursename,HR)
                        VALUES('$user','HIST 1301+', 'History of U.S. to 1865', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum,coursename,HR)
                        VALUES('$user','HIST 1302+', 'History of U.S. since 1865', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum,coursename,HR)
                        VALUES('$user','POLS 2310+', 'Introduction to Politics', '3')");
    
    queryMysql("INSERT INTO core(user,coursenum,coursename,HR)
                        VALUES('$user','POLS 2311+', 'American Government & Politics', '3')");
}

function setup_othermath($user){
    queryMysql("INSERT INTO othermath(user,coursenum,coursename,HR)
                        VALUES('$user','MATH 1312+', 'Calculus II', '3')");
    
    queryMysql("INSERT INTO othermath(user,coursenum,coursename,HR)
                        VALUES('$user','MATH 3323+', 'Matrix Algebra', '3')");
    
    queryMysql("INSERT INTO othermath(user,coursenum,coursename,HR)
                        VALUES('$user','MATH 4329', 'Numerical Analysis', '3')");
    
    queryMysql("INSERT INTO othermath(user,coursenum,coursename,HR)
                        VALUES('$user','STAT 3320', 'Probability & Statistics for CS', '3')");
}

function setup_freeelect($user){
    queryMysql("INSERT INTO freeelect(user,HR)
                       VALUES('$user','3')");
}

function setup_sciences($user){
    queryMysql("INSERT INTO sciences(user,coursenum,coursename,HR)
                        VALUES('$user','PHYS 2420', 'Introductory Mechanics', '4')");
    
    queryMysql("INSERT INTO sciences(user,HR,hidden)
                        VALUES('$user','4','science1')");
    
    queryMysql("INSERT INTO sciences(user,HR,hidden)
                        VALUES('$user','4','science2')");
}

function setup_upperdiv($user){
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 3195', 'Jr. Professional Orientation', '1')");
    
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 3331+', 'Adv. Object-Oriented Programming', '3')");
    
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 3350', 'Automata/Computabi/Formal Lang.', '3')");
    
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 3360', 'Design/Impl. Programming Languages', '3')");
    
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 3432+', 'Comp. Arch I:Comp/Org Design', '4')");
    
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 4310+', 'Software Eng: Requirements Eng.', '3')");
    
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 4311', 'Software Eng: Design & Implmnt.', '3')");
    
    queryMysql("INSERT INTO upperdiv(user,coursenum,coursename,HR)
                        VALUES('$user','CS 4375', 'Theory of Operating Systems', '3')");
}

function setup_techelect($user){
    queryMysql("INSERT INTO techelect(user,HR,hidden)
                        VALUES('$user','3','elect1')");
    
    queryMysql("INSERT INTO techelect(user,HR,hidden)
                        VALUES('$user','3','elect2')");
    
    queryMysql("INSERT INTO techelect(user,HR,hidden)
                        VALUES('$user','3','elect3')");
    
    queryMysql("INSERT INTO techelect(user,HR,hidden)
                        VALUES('$user','3','elect4')");
    
    queryMysql("INSERT INTO techelect(user,HR,hidden)
                        VALUES('$user','3','elect5')");
}

echo <<<_END
    <form method='post' action='signup.php'>$error
    <span class='fieldname'>Username</span>
    <input type='text' maxlength='16' name='user' value='$user' placeholder='Your UTEP ID'
        onBlur='checkUser(this)'><span id='info'></span><br>
    <span class='fieldname'>Password</span>
    <input type='password' maxlength='16' name='pass' value='$pass' placeholder='Last 4 digits of UTEP ID'><br>
    <span class='fieldname'>First Name</span>
    <input type='text' maxlength='25' name='firstname' value='$firstname' placeholder='Your first name'><br>
    <span class='fieldname'>Last Name</span>
    <input type='text' maxlength='25' name='lastname' value='$lastname' placeholder='Your last name'><br>
    <br><br>
_END;
?>

<span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Sign up'>
    </form></div><br>
  </body>
</html>