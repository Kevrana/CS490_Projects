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

// ------------------- 490_studentsub insert function start ------------

$examid  = $_POST ['examid']  ; 
$ucid	 = $_POST ['ucid']    ;  
$sub1      = $_POST ['sub1']      ; 
$sub2      = $_POST ['sub2']      ; 
$sub3      = $_POST ['sub3']      ; 



function insertStudentSub ($sid,$examid, $ucid, $sub1, $sub2, $sub3, $sql_cnct) 
{
	$inG   = "INSERT INTO 490_studentsub VALUES ('$sid','$examid', '$ucid', '$sub1', '$sub2', '$sub3' ) ";
	($t = mysqli_query ($sql_cnct , $inG ) ) or die ( mysqli_error( $sql_cnct) );
}

if ( $examid=="" || $examid==":" || trim($examid)=="" ||
     $ucid=="" || $ucid==":" || trim($ucid)=="")
{
	exit();
}
else
{
insertStudentSub ($sid, $examid, $ucid, $sub1, $sub2, $sub3, $sql_cnct);
}

// ------------------- 490_studentsub insert function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>