<?php
    $con = mysqli_connect('localhost','root','123456'); //connect to database

    mysqli_select_db($con,'Form');

    // for check connection success or not

    // if($con){
    //     echo "connected";
    // }else{
    //     echo "not connected";
    // }

?>