<?php
//KEVIN RANA 
// CS490 - Group 4 with Karmesh Patel and Thomas Livshits
//backend.php  ALPHA

//error checking
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

//connects to database 
include ("account.php") ;
$sql_cnct = mysql_connect($hostname, $username, $password, $project);

//connection failed   
if(!$sql_cnct) {
  die('Connection failed: ' . mysql_error()); 
  exit();
}

//sql statement used to retrieve UCID and Password in db kr276
$sql = 'SELECT UCID, Password FROM 490_login';
mysql_select_db('kr276');
$data = mysql_query( $sql, $sql_cnct );

//data retrieval failed
if(! $data ) {
  die('Could not get data: ' . mysql_error());
}

//gets the row in the database table
$row = mysql_fetch_assoc($data);
$ucid = $row['UCID'];
$pass = $row['Password'];
$xucid = $_POST ['ucid'] ; 
$xpass = $_POST ['pass'] ; 

//compares data from database with input from frontend
if( ($ucid == $xucid) && password_verify($pass , $xpass) ){
	$match = '<br>DATABASE MATCH';
}
else{
	$match = '<br>DATABASE NO MATCH';
}
//json object with the output
$reply = array('DB_reply'=>$match);
echo json_encode($reply);

//closes connection to db
mysql_close($sql_cnct);
?>