<?php
//KEVIN RANA 
//backend  RV
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

$gid         = $_POST ['gid']     ; 
$examid      = $_POST ['examid']  ;
$eName       = $_POST ['eName']   ;  
$ucid	     = $_POST ['ucid']    ;
$sub1        = $_POST ['sub1']    ; 
$sub2        = $_POST ['sub2']    ; 
$sub3        = $_POST ['sub3']    ;  
$g1          = $_POST ['g1']      ; 
$g2          = $_POST ['g2']      ; 
$g3          = $_POST ['g3']      ;
$gc1 = $_POST ['gc1'] ; 
$gc2 = $_POST ['gc2'] ; 
$gc3 = $_POST ['gc3'] ; 
$tc1 = $_POST ['tc1'] ;
$tc2 = $_POST ['tc2'] ;
$tc3 = $_POST ['tc3'] ;
$q1v          = $_POST ['point1']      ; 
$q2v          = $_POST ['point2']      ; 
$q3v          = $_POST ['point3']      ;

function insertGrades ($gid, $examid, $eName, $ucid, $sub1, $sub2, $sub3, $g1, $g2, $g3, $gc1, $gc2, $gc3, $tc1 , $tc2, $tc3, $q1v, $q2v, $q3v, $sql_cnct) 
{
	$inG   = "INSERT INTO 490_studentgrades VALUES ('$gid', '$examid','$eName', '$ucid', '$sub1', '$sub2', '$sub3','$g1', '$g2', '$g3', '$gc1', '$gc2', '$gc3', '$tc1' , '$tc2' , '$tc3' , '$q1v', '$q2v', '$q3v' ) ";
	($t = mysqli_query ($sql_cnct , $inG ) ) or die ( mysqli_error( $sql_cnct) );
}

if ( $examid=="" || $examid==":" || trim($examid)=="" ||
	 $eName=="" || $eName==":" || trim($eName)=="" ||
     $ucid=="" || $ucid==":" || trim($ucid)=="" ||
     $g1=="" || $g1==":" || trim($g1)=="" ||
     $g2=="" || $g2==":" || trim($g2)=="" ||
     $g3=="" || $g3==":" || trim($g3)=="" )
{
	exit();
}
else
{
insertGrades ($gid, $examid, $eName, $ucid, $sub1, $sub2, $sub3, $g1, $g2, $g3, $gc1, $gc2, $gc3, $tc1 , $tc2, $tc3, $q1v, $q2v, $q3v, $sql_cnct);
}

// ------------------- 490_studentgrades insert final  function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>