<?php
ob_start(); 
// start session
session_start();
if(isset($_POST) & !empty($_POST)){
  // CSRF Token Validation
    if(isset($_POST['token'])){
      if($_POST['token'] == $_SESSION['csrf_token']){
        // echo "CSRF token validation success";
      }else{
        echo "Problem with CSRF token Verification";
      }
    }
}

//1. create CSRF Token
$cipher = "aes-256-cbc";
//Generate a 256-bit encryption key
$encryption_key = openssl_random_pseudo_bytes(32);
// Generate an initialization vector
$iv_size = openssl_cipher_iv_length($cipher);
$iv = openssl_random_pseudo_bytes($iv_size);
//Data to encrypt
$data = uniqid(rand(),true);
$Token = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv);
// assign it to session 
$_SESSION['csrf_token'] = $Token;
// print_r($_SESSION);

//2. Adding CSRF token to form
//3. validating CSRF token
?>
<?php
// $pass = "shubham";
// echo password_hash($pass,TRUE);
// $password = '$2y$10$cUCDzqFOAgl.zTsqL0ZRc.TilFKiWsEJ.Wm713PWwGlMk62UckmKS';
// echo password_verify('shubham',$password);

?>
<?php
// database connection file import
// include 'conn.php';
$con = mysqli_connect('localhost','root','123456'); //connect to database

mysqli_select_db($con,'Form');

// when clicked on submit button data is save
if(isset($_POST['submit'])){
  
  // Taking all values from the form data(input)
  
  //   $name =  $_POST['name'];
  //   $fathername = $_POST['fathername'];
  //   $mobilenumber =  $_POST['mobilenumber'];
  //   $gender =  $_POST['gender'];
  //   $dob =  $_POST['dob'];
  //   $state =  $_POST['state'];
  //   $Address = $_POST['Address'];
  //   $email = $_POST['email'];
  //   $Password = $_POST['password'];
  //   $File = $_POST['file'];
  $value['name'] =  $_REQUEST['name'];
  $value['fathername'] = $_REQUEST['fathername'];
  $value['mobilenumber'] =  $_REQUEST['mobilenumber'];
  $value['gender'] =  $_REQUEST['gender'];
  $value['dob'] =  $_REQUEST['dob'];
  $value['C_ountry'] =  $_REQUEST['country'];
  $value['S_tate'] =  $_REQUEST['state'];
  $value['C_ity'] =  $_REQUEST['city'];
  $value['Address'] = $_REQUEST['Address'];
  $value['email'] = $_REQUEST['email'];
  $value['Password'] = $_REQUEST['password'];
  $value['File'] = $_REQUEST['file'];
  // for encrypt our database email
  // $value['email'] = password_hash ($value['email'],PASSWORD_DEFAULT);

  // for encrypt our database password
  // $value['Password'] = password_hash($value['Password'],PASSWORD_DEFAULT);
  //Define cipher
  $cipher = "aes-256-cbc";

//Generate a 256-bit encryption key
$encryption_key = "shubhamkanaujiya";

// Generate an initialization vector
$iv_size = openssl_cipher_iv_length($cipher);
//$iv = openssl_random_pseudo_bytes($iv_size);
$iv = "ginger2022";

//Data to encrypt
$data = $value['Password'];
$value['Password'] = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv);

// echo "Encrypted Text: " . $value['Password'] ;

echo "<br>";
//Define cipher
$cipher = "aes-256-cbc";

//Decrypt data
$decrypted_data = openssl_decrypt($value['Password'] , $cipher, $encryption_key, 0, $iv);

// echo "Decrypted Text: " . $decrypted_data;

if(mysqli_num_rows(mysqli_query($con,"SELECT * from StudentForm where Email='{$value['email']}'"))>0){
  
  // echo (alert(""));
  echo '<script>alert("Email id already exist")</script>';
}else{
// echo ("hello ");
$v = '"' . implode('", "', $value) . '"';
    // insert data in db table
    $q = "INSERT INTO StudentForm (Student_Name,Father_Name,Mobile_Number,Gender,Date_Of_Birth,Country,State,city,Address,Email,Password,FileUpload) values(".$v.")";
//    echo $q;
//$name,$fathername,$mobilenumber,$gender,$dob,$state,$Address,$email,$Password,$File
$query = mysqli_query($con,$q) or die(mysqli_error($con));
//   die;
//  echo '<script>alert("User register successfully")</script>';   
}}
?>
  <!-- add show details button  -->
  <!-- <div class="row" id="table">
    <div class="col-md-9" style="margin:0.2rem;"></div>
            <div class="col-md-2"> -->
              <!-- add new record button -->
              <!-- <button type="button" id="addNewRecord"  style="float:right;margin:1rem" value="Show Records" class="btn btn-small btn-success" style="width: 0px;" ><a href="Display.php" class="text-white">show Records</a></button>
        </div>
        <div>
          <button type="button" id="addNewRecords"  style="float:right;margin:2rem" value="Show Records" class="btn btn-small btn-success" ><a href="login.php" class="text-white">Existing User Login</a></button>
        </div>
      </div> -->
    <!-- <div id="header">
      <button type="button" class="btn btn-success"><a href="Display.php" class="text-black">show Records</a></button>
      <button type="button" class="btn btn-success"><a href="login.php" class="text-black">Existing User Login</a></button>
    </div> -->
    
        <!-- Navigation bar  -->
        <!-- <div> -->
<nav id="navigation" class="navbar navbar-expand-sm navbar-green bg-green">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size: 30px; font-family: 'Edu TAS Beginner', cursive; color: lightskyblue"><b>Avalon Aurora High School</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        
        
     </ul>
      <!-- <div style="display:inline-flex; text-align:right;"> -->
        <button class="btn btn-blue " style="border-radius:8px;font-size:large;  margin-right:4px;" type="button" > <a href="login.php" style="color: white; "><b>User Login</b></a></button>
        <button class="btn btn-blue " style="border-radius:8px;font-size:large; "> <a href="Display.php" type="button" style="color: white;"><b>View Records</b></a></button>
      <!-- </div>  -->
    </div> 
  </div>
 </nav>
 <!-- </div>  -->
 
 <!-- Navigation bar end  -->

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- CSS page link  -->
  <link rel="stylesheet" href="Registration_form_style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- add bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- for coutry state city validation  -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
  <!-- add iziToast css -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/izitoast/dist/css/iziToast.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- end iziToast css -->
  <!-- add iziToast js -->
    <!-- <script src="https://unpkg.com/izitoast/dist/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- end iziToast js -->
 <!-- for date  -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- end date  -->

    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    
    <!-- for country code  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
    <!-- end country code  -->


  <title>Resistration form</title>
</head>

<body style="background-image: url('color.jpg'); background-size:cover;  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;" >
  <!-- Registration box -->
  <div class="container">
    <!-- Calling function form js using validation function-->
    <div class="panel panel-default" id="form" >
      <form method="post" name="registration" onsubmit="return validation()"> 


         <div class="title">
              <h1 class="text-white bg-blue text-center">
                <b>Student Registration Form</b>
                <hr />
              </h1>
            </div>

            <div>
              <!-- student details input by user -->
              <!-- Student name -->
              <label for="name">Student Name
                <hr />
              </label>
              <input type="text" class="inputs" name="name" id="Name" value="<?php echo $name; ?>" placeholder="Enter your Name"  />
              <!-- Using style tag in span tag to give style in error message -->
              <span id="nameMessage" style="color: white"></span>
            </div>
            
            <div>
              <!-- Father name --> 
              <label for="fathername">Father Name
                <hr />
              </label>
              <input type="text" class="inputs" name="fathername" id="F_Name" value="" placeholder="Enter your Father Name"  />
              <span id="fatherNameMessage" style="color: red"></span>
            </div>
            
            
            <div id="phone" >
                           
              <div>
                <!-- Gender -->
                <label for="gender">Gender<hr /></label>
                <br>
                <input type="radio" class="Gender" name="gender" id="Male" value="1" style=" font-size: 5px;" checked />
              <label id="male" for="Male">Male </label>
              <span id="maleMessage" style="color: red"></span><br>
              
              <input type="radio" class="Gender" name="gender" onclick="" id="Female" value="0" />
              <label id="female" for="Female">Female </label>
              <span id="femaleMessage" style="color: red"></span>
            </div>

            <div>
              <!-- Date of Birth -->
              <label for="DOB">Date of Birth
                <hr />
              </label>
              <input type="Date" class="inputs" name="dob" id="dob" value="" />

              <span id="DOBMessage" style="color: red"></span>
            </div>
            
           
                <!-- #Select Country code -->
            <label id="dropdown" for="Select Country Code">Mobile
                <hr />
              </label>
            <div>
              <!-- <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="name"> -->
              <input type="tel" class="inputs" name="mobilenumber" id="M_Number" maxlength="10" value=""
                placeholder="Phone Number"  />
                <span id="mobileNumberMessage" style="color: red"></span>
              </div>
              </div> 
              
         


              <!-- <label id="dropdown" for="Select Country Code">Mobile
                <hr />
              </label>
              <form>
                <div class="input-group">
                  <input type="tel" class="form-control">
                  <span class="input-group-addon">Tel</span>
                </div>
              </form> -->

            <div class="container">
            <div class="row">
                <!--Course -->

                  
                   
                    <section class="courses-section">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="country">Country</label>
                                <select type="text" name="country" id="country" class="form-control">
                                  <span id="countryMessage" style="color: red"></span>
                                    <option value="">Select Country</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="state">State</label>
                                <select type="text" id="state" name="state" class="form-control"></select>
                                <span id="stateMessage" style="color: red"></span>
                            </div>

                         <div class="col-md-4">
                                <label for="city">City</label>
                                <select name="city" id="city" class="form-control"></select>
                                <span id="cityMessage" style="color: red"></span>
                            </div>

                        </div>

                </div>
 
            </section>
          
         </div>

            <div>
              <!-- Address -->
              <label for="Address">Address
                <hr />
              </label>
              <textarea name="Address" id="Address" class="inputs" style="overflow:hidden" placeholder="Enter your Address" rows="4"></textarea>
              <span id="addressMessage" style="color: red"></span>
            </div>
            
            <div>
              <!-- E-mail -->
              <label for="email">E-mail
                <hr />
              </label>
              <i class="far fa-envelope"></i>

              <input type="text" class="inputs" name="email" id="E_mail" value="" placeholder="abc@gmail.com" />
              <span id="EmailMessage" style="color: red"></span>
            </div>
            <div>
              <!-- Password -->
              <label for="password">Password
                <hr />
              </label>
              <i class="fas fa-lock"></i>
              <input type="password" class="inputs" name="password" id="Password" value=""
                placeholder="Enter your Password here" />
              <span id="PasswordMessage" style="color: red"></span>
            </div>

            <div>
              <!-- Re-Password -->
              <label for="Re-password">Re-password
                <hr />
              </label>
              <i class="fas fa-lock"></i>

              <input type="password" class="inputs" name="re-password" id="Re-password" value=""
                placeholder="Enter your Re-Password here" />
              <span id="re_PasswordMessage" style="color: red"></span>
            </div>

            <div>
              <!-- File Upload -->
              <label for="file">File Upload
                <hr />
              </label>
              <i class="fas fa-lock"></i>

              <input type="file" class="inputs" name="file" id="file" value="" />
              <span id="fileMessage" style="color: red"></span>
            </div>
            <!-- Checkbox -->
            <input type="checkbox" id="Checkbox" name="checkbox" value="checkbox" />
            <span id="checkMessage" style="color: red"></span>
            
              <!-- Declaration -->
              <b style=" color:white; margin-left: 10px; margin-bottom: 10px;">I have declare this information is given by me and this is correct</b>
         
            <input type="hidden" name="token" value="<?php echo $Token;?>">
            <!-- Submit button -->
            <div>
            <button type="submit" name="submit"  value="submit" style="margin-top:50px; width: 50%; border-radius:35px; font-size:large;"><b>Submit</b></a></button>
            <!-- Reset button -->
            <button type="reset" value="Reset" style="width: 49%; border-radius:35px; font-size:large;"><b>Reset</b></button>
            </div>

            <!-- id="successClick"  -->
          </form>

    </table>
</div>
</div>

</div>
      <!-- JavaScript page link -->

      <script src="Registration_form_script.js"></script>
</body>
</html>