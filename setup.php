<!DOCTYPE html>
<html>
	<head>
		<title>Setting up database</title>
	</head>
	<body>
		<h3>Setting up...</h3>
		
		<?php
            require_once 'functions.php';
            
            createTable('students','user CHAR(8),
                                    pass CHAR(4),
                                    firstname VARCHAR(30),
                                    lastname VARCHAR(30),
                                    INDEX(user)');
            //admin account
           queryMysql("INSERT INTO students(user,pass) 
                                        VALUES('starlord',1914);");
            
            createTable('lowerdiv','user CHAR(8),
                                    coursenum VARCHAR(12),
                                    coursename VARCHAR(30),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR TINYINT,
                                    INDEX(user)');
            
            createTable('core','user CHAR(8),
                                    coursenum VARCHAR(22),
                                    coursename VARCHAR(35),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR TINYINT,
                                    INDEX(user)');
            
            createTable('othermath','user CHAR(8),
                                    coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR TINYINT,
                                    INDEX(user)');
           
            createTable('freeelect','user CHAR(8),
                                    coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR TINYINT,
                                    INDEX(user)');
            
            createTable('sciences','user CHAR(8),
                                    coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR TINYINT,
                                    hidden VARCHAR(12),
                                    INDEX(user)');
            
            createTable('upperdiv','user CHAR(8),
                                    coursenum VARCHAR(12),
                                    coursename VARCHAR(35),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR TINYINT,
                                    INDEX(user)');
            
            createTable('techelect','user CHAR(8),
                                    coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR TINYINT,
                                    hidden VARCHAR(12),
                                    INDEX(user)');
           
        ?>
	</body>
</html>

