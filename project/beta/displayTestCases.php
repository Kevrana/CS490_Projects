<?php
//KEVIN RANA 
//backend  BETA
// CS490 - Group 4: Kevin Rana and Karmesh Patel and Thomas Livshits

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include (  "account.php"     ) ;
$sql_cnct = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
mysqli_select_db( $sql_cnct, $project );

// ------------------- 490_testbank get test cases function start ------------

$squery = "SELECT * FROM 490_exams ORDER BY examid DESC LIMIT 0, 1";
$sresult = mysqli_query($sql_cnct,$squery) or die(mysqli_error($sql_cnct));

$r = mysqli_fetch_assoc($sresult); 
	
$q1=$r["question1"];
$q2=$r["question2"];
$q3=$r["question3"];

$qs1 = "SELECT * FROM 490_testbank WHERE question='$q1'";
$qs2 = "SELECT * FROM 490_testbank WHERE question='$q2'";
$qs3 = "SELECT * FROM 490_testbank WHERE question='$q3'";

$q1r = mysqli_query($sql_cnct,$qs1) or die(mysqli_error($sql_cnct));
$q2r = mysqli_query($sql_cnct,$qs2) or die(mysqli_error($sql_cnct));
$q3r = mysqli_query($sql_cnct,$qs3) or die(mysqli_error($sql_cnct));

$r1 = mysqli_fetch_assoc($q1r); 
$r2 = mysqli_fetch_assoc($q2r); 
$r3 = mysqli_fetch_assoc($q3r); 

//question1: testcases
$q1tc1 = $r1["tc1"];
$q1tc2 = $r1["tc2"];
$q1tc3 = $r1["tc3"];

//question2: testcases
$q2tc1 = $r2["tc1"];
$q2tc2 = $r2["tc2"];
$q2tc3 = $r2["tc3"];

//question3: testcases
$q3tc1 = $r3["tc1"];
$q3tc2 = $r3["tc2"];
$q3tc3 = $r3["tc3"];

//question1: testcases Answers
$q1tca1 = $r1["tca1"];
$q1tca2 = $r1["tca2"];
$q1tca3 = $r1["tca3"];

//question2: testcases Answers
$q2tca1 = $r2["tca1"];
$q2tca2 = $r2["tca2"];
$q2tca3 = $r2["tca3"];

//question3: testcases Answers
$q3tca1 = $r3["tca1"];
$q3tca2 = $r3["tca2"];
$q3tca3 = $r3["tca3"];


$func1 = $r1["funcName"];
$func2 = $r2["funcName"];
$func3 = $r3["funcName"];


$array = 
array(
'func1'=> $func1,
'q1tc1'=>$q1tc1, 'q1tca1'=>$q1tca1,
'q1tc2'=>$q1tc2, 'q1tca2'=>$q1tca2,
'q1tc3'=>$q1tc3, 'q1tca3'=>$q1tca3,
'func2'=> $func2,
'q2tc1'=>$q2tc1, 'q2tca1'=>$q2tca1,
'q2tc2'=>$q2tc2, 'q2tca2'=>$q2tca2,
'q2tc3'=>$q2tc3, 'q2tca3'=>$q2tca3,
'func3'=> $func3,
'q3tc1'=>$q3tc1, 'q3tca1'=>$q3tca1,
'q3tc2'=>$q3tc2, 'q3tca2'=>$q3tca2,
'q3tc3'=>$q3tc3, 'q3tca3'=>$q3tca3 );


echo json_encode($array);


// ------------------- 490_exam createExams function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>