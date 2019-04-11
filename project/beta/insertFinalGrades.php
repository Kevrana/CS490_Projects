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

// ------------------- 490_studentgrades insert final function start ------------

$examid  = $_POST ['examid']  ; 
$ucid	 = $_POST ['ucid']    ;  
$g1      = $_POST ['g1']      ; 
$g2      = $_POST ['g2']      ; 
$g3      = $_POST ['g3']      ; 


function insertGrades ($gid, $examid, $ucid, $g1, $g2, $g3, $sql_cnct) 
{
	$inG   = "INSERT INTO 490_studentgrades VALUES ('$gid', '$examid', '$ucid', '$g1', '$g2', '$g3' ) ";
	($t = mysqli_query ($sql_cnct , $inG ) ) or die ( mysqli_error( $sql_cnct) );
}

if ( $examid=="" || $examid==":" || trim($examid)=="" ||
     $ucid=="" || $ucid==":" || trim($ucid)=="" ||
     $g1=="" || $g1==":" || trim($g1)=="" ||
     $g2=="" || $g2==":" || trim($g2)=="" ||
     $g3=="" || $g3==":" || trim($g3)=="" )
{
	exit();
}
else
{
insertGrades ($gid, $examid, $ucid, $g1, $g2, $g3, $sql_cnct);
}

// ------------------- 490_studentgrades insert final  function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>