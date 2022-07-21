<?php
ini_set("sendmail_from","shubham.kanaujiya@gingerwebs.co.in");
ini_set("sendmail_path","/usr/sbin/sendmail -t -i");
$to = "shubhamkanaujiya505@gmail.com"; // change reciver address
$subject = "this is subject";
$message = "this is simple message.";
$header = "from:shubham.kanaujiya@gingerwebs.co.in\r\n";

$result = mail($to,$subject,$message,$header); 
// var_dump($result);
if($result == true){
    echo "message sent successfully...";
}else{
    echo "sorrry, unable to send mail..";
}
?>