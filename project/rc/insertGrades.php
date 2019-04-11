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

// ------------------- 490_grades insert function start ------------

$examid     = $_POST ['examid']   ; 
$eName      = $_POST ['eName']    ; 
$ucid	    = $_POST ['ucid']     ; 
$sub1       = $_POST ['sub1']     ; 
$sub2       = $_POST ['sub2']     ; 
$sub3       = $_POST ['sub3']     ;   
$g1         = $_POST ['g1']       ; 
$g2         = $_POST ['g2']       ; 
$g3         = $_POST ['g3']       ; 
$comment1   = $_POST ['comment1'] ; 
$comment2   = $_POST ['comment2'] ; 
$comment3   = $_POST ['comment3'] ; 
$q1v        = $_POST ['point1']   ; 
$q2v        = $_POST ['point2']   ; 
$q3v        = $_POST ['point3']   ;

$comment1= mysqli_real_escape_string($sql_cnct, $comment1);
$comment2= mysqli_real_escape_string($sql_cnct, $comment2);
$comment3= mysqli_real_escape_string($sql_cnct, $comment3);

function authenticate ($ucid, $examid, $sql_cnct ) 
{
	global $t;
	$s    = "select * from 490_grades where ucid='$ucid' and examid='$examid'";
	($t = mysqli_query ($sql_cnct, $s) ) or die ( mysqli_error($sql_cnct) ) ;
	$num = mysqli_num_rows ( $t ) ;		
	if ( $num == 0 ) {return true;}   else { return false;};
}

function insertGrades ($gid, $examid, $eName, $ucid, $sub1, $sub2, $sub3, $g1, $g2, $g3, $comment1, $comment2, $comment3, $q1v, $q2v, $q3v, $sql_cnct) 
{
	$inG   = "INSERT INTO 490_grades VALUES ('$gid', '$examid','$eName', '$ucid', '$sub1', '$sub2', '$sub3', '$g1', '$g2', '$g3', '$comment1','$comment2','$comment3', '$q1v', '$q2v', '$q3v') ";
	($t = mysqli_query ($sql_cnct , $inG ) ) or die ( mysqli_error( $sql_cnct) );
}


if ( $examid=="" || $examid==":" || trim($examid)=="" ||
	 $eName=="" || $eName==":" || trim($eName)=="" ||
     $ucid=="" || $ucid==":" || trim($ucid)=="" ||
     $g1=="" || $g1==":" || trim($g1)=="" ||
     $g2=="" || $g2==":" || trim($g2)=="" ||
     $g3=="" || $g3==":" || trim($g3)==""  )
{
	exit();
}
else
{
//	if ( authenticate ($ucid, $examid, $sql_cnct) ) { 
		insertGrades ($gid, $examid, $eName, $ucid, $sub1, $sub2, $sub3, $g1, $g2, $g3, $comment1, $comment2, $comment3, $q1v, $q2v, $q3v, $sql_cnct);
	/*}
	else{
		exit();
		
	}	*/
}


// ------------------- 490_grades insert function end ------------
mysqli_close($sql_cnct);
exit ( ) ;
?>