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

// ------------------- 490_testbank insert question and solution cases function start ------------

$question   = $_POST ['question'] ; 
$topic 		= $_POST ['topic'] ;
$difficulty = $_POST ['difficulty'] ;  

$tc1        = $_POST ['tc1'] ; 
$tc2        = $_POST ['tc2'] ; 
$tc3        = $_POST ['tc3'] ; 

$tca1        = $_POST ['tca1'] ; 
$tca2        = $_POST ['tca2'] ; 
$tca3        = $_POST ['tca3'] ; 
$funcName    = $_POST ['funcName'] ; 

function insertTestBank ($qid, $question, $topic, $difficulty, $tc1, $tc2, $tc3, $tca1, $tca2, $tca3, $funcName, $sql_cnct) 
{
	$inQ   = "INSERT INTO 490_testbank VALUES ('$qid', '$question', '$topic', '$difficulty', '$tc1', '$tc2', '$tc3', '$tca1', '$tca2', '$tca3' , '$funcName') ";
	($t = mysqli_query ($sql_cnct , $inQ ) ) or die ( mysqli_error( $sql_cnct) );
}

if ( $question=="" || $question==":" || trim($question)=="" )
{
	exit();
}
else
{
insertTestBank ($qid, $question, $topic, $difficulty, $tc1, $tc2, $tc3, $tca1, $tca2, $tca3, $funcName, $sql_cnct);
}

// ------------------- 490_testbank insert question and solution cases function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>