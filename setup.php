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
                                    pass CHAR(4)');
            
            
            createTable('lowerdiv','coursenum VARCHAR(12),
                                    coursename VARCHAR(30),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
            
            queryMysql("INSERT INTO lowerdiv(coursenum,coursename,HR)
                        VALUES('CS 1401 +', 'Intro. to Computer Science', '4')");
          
            queryMysql("INSERT INTO lowerdiv(coursenum,coursename,HR)
                     VALUES('CS 2401 +', 'Elem. Data Struct./Algorithms', '4')");
            
            queryMysql("INSERT INTO lowerdiv(coursenum,coursename,HR)
                        VALUES('MATH 2300 +', 'Discrete Mathematics', '3')");
            
            queryMysql("INSERT INTO lowerdiv(coursenum,coursename,HR)
                        VALUES('CS 2302 +', 'Data Structures', '3')");
            
            queryMysql("INSERT INTO lowerdiv(coursenum,coursename,HR)
                        VALUES('EE 2369 +', 'Digital Systems Design I', '3')");
            
            queryMysql("INSERT INTO lowerdiv(coursenum,coursename,HR)
                        VALUES('EE 2169 +', 'Digital Systems Design I Lab', '1')");
            
            
            createTable('core','coursenum VARCHAR(22),
                                    coursename VARCHAR(35),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
            
          
           queryMysql("INSERT INTO core(coursenum,coursename,HR)
                        VALUES('RWS 1301 +', 'Rhetoric and Composition 1', '3')");

            queryMysql("INSERT INTO core(coursenum,coursename,HR)
                        VALUES('RWS 1302 +', 'Rhetoric and Composition 2', '4')");
            
            queryMysql("INSERT INTO core(coursenum,coursename,HR)
                        VALUES('MATH 1411 +', 'Calculus I', '3')");
            
            //***CORE ELECTIVES***
            queryMysql("INSERT INTO core(coursenum, HR)
                        VALUES('L., Phil., & Cult. +', '3')");
            
            queryMysql("INSERT INTO core(coursenum, HR)
                        VALUES('Creative Arts +', '3')");
            
            queryMysql("INSERT INTO core(coursenum, HR)
                        VALUES('Soc. & Beh. Sc. +', '3')");
            
            queryMysql("INSERT INTO core(coursenum, HR)
                        VALUES('Comp. Area Opt. +', '3')");
            
            queryMysql("INSERT INTO core(coursenum, HR)
                        VALUES('Comp. Area Opt. +', '3')");
            
            //***CORE ELECTIVES***
            
            queryMysql("INSERT INTO core(coursenum,coursename,HR)
                        VALUES('HIST 1301 +', 'History of U.S. to 1865', '3')");
            
            queryMysql("INSERT INTO core(coursenum,coursename,HR)
                        VALUES('HIST 1301 +', 'History of U.S. since 1865', '3')");
            
            queryMysql("INSERT INTO core(coursenum,coursename,HR)
                        VALUES('POLS 2310 +', 'Introduction to Politics', '3')");
            
            queryMysql("INSERT INTO core(coursenum,coursename,HR)
                        VALUES('POLS 2311 +', 'American Government & Politics', '3')");
            
            
            
            createTable('othermath','coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
            
            queryMysql("INSERT INTO othermath(coursenum,coursename,HR)
                        VALUES('MATH 1312 +', 'Calculus II', '3')");
            
            queryMysql("INSERT INTO othermath(coursenum,coursename,HR)
                        VALUES('MATH 3323 +', 'Matrix Algebra', '3')");
            
            queryMysql("INSERT INTO othermath(coursenum,coursename,HR)
                        VALUES('MATH 4329', 'Numerical Analysis', '3')");
            
            queryMysql("INSERT INTO othermath(coursenum,coursename,HR)
                        VALUES('STAT 3320', 'Probability & Statistics for CS', '3')");
            
            
            createTable('freeelect','coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
            
            queryMysql("INSERT INTO freeelect(HR)
                       VALUES('3')");
            
            createTable('sciences','coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
            
            queryMysql("INSERT INTO sciences(coursenum,coursename,HR)
                        VALUES('PHYS 2420', 'Introductory Mechanics', '4')");
            
            queryMysql("INSERT INTO sciences(HR)
                        VALUES('4')");
            
            queryMysql("INSERT INTO sciences(HR)
                        VALUES('4')");
             
            
            createTable('upperdiv','coursenum VARCHAR(12),
                                    coursename VARCHAR(35),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 3195', 'Jr. Professional Orientation', '1')");
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 3331 +', 'Adv. Object-Oriented Programming', '3')");
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 3350', 'Automata/Computabi/Formal Lang.', '3')");
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 3360', 'Design/Impl. Programming Languages', '3')");
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 3432 +', 'Comp. Arch I:Comp/Org Design', '4')");
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 4310 +', 'Software Eng: Requirements Eng.', '3')");
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 4311', 'Software Eng: Design & Implmnt.', '3')");
            
            queryMysql("INSERT INTO upperdiv(coursenum,coursename,HR)
                        VALUES('CS 4375', 'Theory of Operating Systems', '3')");
            
            
            createTable('techelect','coursenum VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
            
            queryMysql("INSERT INTO techelect(HR)
                        VALUES('3')");
            
            queryMysql("INSERT INTO techelect(HR)
                        VALUES('3')");
            
            queryMysql("INSERT INTO techelect(HR)
                        VALUES('3')");
            
            queryMysql("INSERT INTO techelect(HR)
                        VALUES('3')");
            
            queryMysql("INSERT INTO techelect(HR)
                        VALUES('3')");
             
            
            createTable('totals','totalhrs VARCHAR(12),
                                    coursename VARCHAR(50),
                                    one CHAR(4),
                                    two CHAR(4),
                                    three CHAR(4),
                                    GR CHAR(1),
                                    HR CHAR(1)');
                                    
        ?>
	</body>
</html>

