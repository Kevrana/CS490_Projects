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

// ------------------- 490_exams createExam function start ------------

$qid1   = $_POST ['qid1'] ; 
$qid2   = $_POST ['qid2'] ;
$qid3   = $_POST ['qid3'] ;

function createExam ($examid,$qid1,$qid2,$qid3, $sql_cnct) 
{
	$q1 = "SELECT * FROM 490_testbank WHERE qid='$qid1'";
	$q2 = "SELECT * FROM 490_testbank WHERE qid='$qid2'";
	$q3 = "SELECT * FROM 490_testbank WHERE qid='$qid3'";
	
	$q1r = mysqli_query($sql_cnct,$q1) or die(mysqli_error($sql_cnct));
	$q2r = mysqli_query($sql_cnct,$q2) or die(mysqli_error($sql_cnct));
	$q3r = mysqli_query($sql_cnct,$q3) or die(mysqli_error($sql_cnct));
	
	$r1 = mysqli_fetch_assoc($q1r);
	$r2 = mysqli_fetch_assoc($q2r);
	$r3 = mysqli_fetch_assoc($q3r);
	
	$question1=$r1["question"];
	$question2=$r2["question"];
	$question3=$r3["question"];
	
	if ( $question1=="" || $question1==":" || trim($question1)=="" || $question2=="" || $question2==":" || trim($question2)=="" || $question3=="" || $question3==":" || trim($question3)=="" )
{
	exit();
}
	
	$inE   = "INSERT INTO 490_exams VALUES ('$examid','$question1','$question2','$question3') ";
	
	($t = mysqli_query ($sql_cnct , $inE ) ) or die ( mysqli_error( $sql_cnct) );
}

if ($qid1=="" || $qid1==":" || $qid2=="" || $qid2==":" || $qid3=="" || $qid3==":" ) 
{ 
	exit();
}
else
{
createExam ($examid, $qid1, $qid2, $qid3, $sql_cnct);
}
// ------------------- 490_exam createExams function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>