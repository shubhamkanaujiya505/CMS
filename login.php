<?php
// query("tab1",'col2',"where col1= 1");
// function query($table,$col = "*",$where = "",$order = ""){
//   echo "SELECT $col FROM $table $where";
// }

// EXIT;
ob_start(); //add when header('location:Display.php'); gives error message
// create session 

    session_start();
?>

<!-- create login page  -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@700&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600;700&family=Edu+TAS+Beginner:wght@700&display=swap" rel="stylesheet">
<!-- add syle page  -->
<link rel="stylesheet" href="LoginStyle.css">
<title>login page</title>


</head>
<!-- style="background-image: url('kids.jpg'); background-size:cover" -->
<body >

    <!-- Create a box  -->  
<div class="center">
    <h1 style="background-color:lightseagreen; padding-top: 20px;margin:0px !important" > Login</h1>

    <!-- create form  using post method-->
    <form action="#" style="background-color:aquamarine;" method="POST" onsubmit="return validlogin()" autocomplete="off" >  
    <div class="form" >

        <!-- add username  -->
        <input type="text" name="username" id="userName" class="textfield" placeholder="Username">
        <span id="USERNAMEfailMessage" style="color: #ff8500; "></span>
        
        <!-- add Password  -->
        <input type="password" name="password" id="secure" class="textfield" placeholder="Password">
        <span id="PASSWORDfailMessage" style="color: #ff8500;"></span>

        <!-- add forget option  -->
        <div class="forgetpass" id="forgetpass"><a href="recover_email.php" class="" >ForgetPassword ?</a></div>
       
        <!-- add submit button  -->
        <input type="submit" class="submit" name="login" value="Submit">

        <!-- add Register page  -->
        <div class="signup" id="signUp" style="text-align: center;">New Member ?<a href="Registration.php" class="link"> Signup Here</a></div>
    </div>
    
    
</div>
<nav class="navbar navbar-expand-sm navbar-green bg-green">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size: 30px; font-family: 'Edu TAS Beginner', cursive; color:pink"><b>Avalon Aurora High School</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        
        
      </ul>
      <form class="d-flex" >
        <!-- <button class="btn btn-dark" type="button" style="width: 10%;">Login</button> -->
        <button class="btn btn-dark"> <a href="Registration.php" type="button" style="text-decoration: none; text-align:center; color:white;" >SignUp</a></button>
        <button class="btn btn-dark" type="button" style="width: 10%;">FAQ</button>
      </form>
    </div>
  </div>
</nav>
</form >
<!-- add javaScript tag for using javaScript function  -->
<script>
    // make function logic 
    function message() {
        alert("Remember your password");        
    }

    // function Fail() {

    //     var fail = document.getElementById('fail').value;

    //     var success = true;  //if no error its returns true else false 
    //     document.getElementById('failmessage').innerHTML = ''

    //     if(fail==1 ){
    //        // echo "Login ok";
    //        $_SESSION['user_name'] = $username;
    //        header('location:Display.php'); // or using meta tag to redirect other page

    //     }else{
    //         // echo ("Login Failed");
    //         document.getElementById('failmessage').innerHTML =
    //     '** Login Failed'
    //     success = false;
    //     }
        
    // }
  function loginfail(){
    alert("login fail");
  }

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="Registration_form_script.js"></script>
</body>
</html>

<!-- add php  -->
<?php
// Connection database 

    error_reporting(E_ALL);
    ini_set("display_errors","1");
    $servername = "localhost"; //servername
    $username = "root"; // server username
    $dbpass = "123456"; //  server password
    $dbname = "Form"; //database name
    
    // store all value in conn variable
    $conn = mysqli_connect($servername,$username,$dbpass,$dbname);
    
    // check connection_status
    if($conn){
        // echo "connection ok";
    }
    else{
        echo "connection failed",mysqli_connect_error();
    }
    // set post method on login button 
    if(isset($_POST['login']))
    {
       $cipher = "aes-256-cbc";
      //Generate a 256-bit encryption key
      $encryption_key ="shubhamkanaujiya";
      // Generate an initialization vector
      $iv_size = openssl_cipher_iv_length($cipher);
      $iv = "ginger2022";

      //print_r($_POST);
        // call username and password using post method 
        $userName = $_POST['username'];
        $password = $_POST['password'];
        
        // use session before login 
        
//Data to encrypt
      //$data =  $password;
      //$password = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv);



//Decrypt data
//$decrypted_data = openssl_decrypt($password, $cipher, $encryption_key, 0, $iv);

// echo 'dfsfsd'.$decrypted_data;
// die;
        // matching username and password are correct or not from db
        $query = "SELECT Password FROM StudentForm where Email = '$userName'"; 
        $data = mysqli_query($conn, $query); 
        $res = mysqli_fetch_object($data);
        $pass = $res->Password;
        $decrypted_data = openssl_decrypt($pass, $cipher, $encryption_key, 0, $iv);
        //  var_dump($password == $decrypted_data);
        // die;
        if($password == $decrypted_data)
        {
          $_SESSION['user_name'] = $userName;
          header('location:Display.php');
        }else{
         
        
        }
    }

?>