<?php
//KEVIN RANA 
//backend  BETA
// CS490 - Group 4: Kevin Rana and Karmesh Patel and Thomas Livshits

//error checking
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

//connects to database 
include ("account.php") ;
$sql_cnct = mysqli_connect($hostname, $username, $password, $project);

//connection failed   
if(!$sql_cnct) {
  die('Connection failed: ' . mysqli_error()); 
  exit();
}

//mysqli_select_db('kr276');
//mysqli_select_db( $db, $project );



//---------------- create users & hash the passwords start -------------
//hash the passwords
/*
$pw1= md5('password01'); $pw2= md5('password02'); $pw3= md5('password03'); $pw4= md5('password04');

//sql queries to insert user and pass to 490_login table in DB
$insertkr276 = "INSERT INTO `490_login` (`UCID`, `Password`, `usertype`) VALUES
('kr276', '$pw1', 'student'); ";

$insertksp52 = "INSERT INTO `490_login` (`UCID`, `Password`, `usertype`) VALUES
('ksp52', '$pw2', 'student'); ";

$inserttl263 = "INSERT INTO `490_login` (`UCID`, `Password`, `usertype`) VALUES
('tl263', '$pw3', 'student'); ";

$inserttheo   = "INSERT INTO `490_login` (`UCID`, `Password`, `usertype`) VALUES
('theo', '$pw4', 'professor'); ";

// insert user and hashed passwords into the 490_login table in DB
$insertresults01 = mysqli_query( $insertkr276, $sql_cnct );
$insertresults02 = mysqli_query( $insertksp52, $sql_cnct );
$insertresults03 = mysqli_query( $inserttl263, $sql_cnct );
$insertresults04 = mysqli_query( $inserttheo, $sql_cnct  );

*/
//---------------- create users & hash the passwords end -------------


// ------------------------ 490_login start --------------------------
$xucid = mysqli_real_escape_string($sql_cnct,$_POST ['ucid']) ; 
$xpass = mysqli_real_escape_string($sql_cnct,$_POST ['pass']) ;
//$bpass = $_POST['pass'];
$squery = "SELECT * FROM 490_login WHERE UCID = '$xucid'";
$sresult = mysqli_query($sql_cnct,$squery) or die(mysqli_error($sql_cnct));
//compares data from database with input from frontend
if(mysqli_num_rows($sresult) == 1)
{
    $row = mysqli_fetch_assoc($sresult);
    if (md5($xpass) == $row['Password'])
    {
        $match = "Match";
        $type = $row['usertype'];
        $reply = array('DB_reply'=>$match, 'type'=>$type);
        echo json_encode($reply);
    }
    else
    {
        $match = "No Match";
        $type = '';
        $reply = array('DB_reply'=>$match, 'type'=>$type);
        echo json_encode($reply);
    }
}
//----------------------  490_login end ------------------------




//closes connection to db
mysqli_close($sql_cnct);
?>