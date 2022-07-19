<?php
session_start();
// include 'conn.php';
$con = mysqli_connect('localhost','root','123456'); //connect to database

mysqli_select_db($con,'Form');

// use session before login 
$userprofile = $_SESSION['user_name'];
//  check condition 
if($userprofile == true){

}else{
    header('location:login.php');
}

$deletes = $_GET['del'];
$q = "DELETE FROM StudentForm WHERE SrNo = $deletes";
mysqli_query($con,$q);
// print_r("hello");

// for return same page after delete whole row
header('location: Display.php');

?> 