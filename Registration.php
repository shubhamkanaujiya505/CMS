<?php
// start session
session_start();
if(isset($_POST) & !empty($_POST)){
  // CSRF Token Validation
    if(isset($_POST['token'])){
      if($_POST['token'] == $_SESSION['csrf_token']){
        echo "CSRF token validation success";
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
  $value['state'] =  $_REQUEST['state'];
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
    // taking input in db table
    $q = "INSERT INTO StudentForm (Student_Name,Father_Name,Mobile_Number,Gender,Date_Of_Birth,State,Address,Email,Password,FileUpload) values(".$v.")";
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
              <i class="fas fa-user"></i>
              <input type="text" class="inputs" name="name" id="Name" value="<?php echo $name; ?>" placeholder="Enter your Name"  />
              <!-- Using style tag in span tag to give style in error message -->
              <span id="nameMessage" style="color: white"></span>
            </div>
            
            <div>
              <!-- Father name --> 
              <label for="fathername">Father Name
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <input type="text" class="inputs" name="fathername" id="F_Name" value="" placeholder="Enter your Father Name"  />
              <span id="fatherNameMessage" style="color: red"></span>
            </div>
            
            
            <div id="phone" >
                           
              <div>
                <!-- Gender -->
                <label for="gender">Gender<hr /></label>
                <br>
                <input type="radio" class="Gender" name="gender" id="Male" value="Male" style=" font-size: 5px;" checked />
              <label id="male" for="Male">Male </label>
              <span id="maleMessage" style="color: red"></span><br>
              
              <input type="radio" class="Gender" name="gender" onclick="" id="Female" value="Female" />
              <label id="female" for="Female">Female </label>
              <span id="femaleMessage" style="color: red"></span>
            </div>

            <div>
              <!-- Date of Birth -->
              <label for="DOB">Date of Birth
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <input type="Date" class="inputs" name="dob" id="dob" value="" />

              <span id="DOBMessage" style="color: red"></span>
            </div>
            
            <div>

            <div id="phone" >
              <!-- Select Country code -->
              <label id="dropdown" for="Select Country Code">Country Code
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <select name="state" id="State" class="inputs">
              <option value="IN">India (+91)</option>
              <option value="DZ">Algeria (+213)</option>
              <option value="AD">Andorra (+376)</option>
              <option value="AO">Angola (+244)</option>
              <option value="AI">Anguilla (+1264)</option>
              <option value="AG">Antigua &amp; Barbuda (+1268)</option>
              <option value="AR">Argentina (+54)</option>
              <option value="AM">Armenia (+374)</option>
              <option value="AW">Aruba (+297)</option>
              <option value="AU">Australia (+61)</option>
              <option value="AT">Austria (+43)</option>
              <option value="AZ">Azerbaijan (+994)</option>
              <option value="BS">Bahamas (+1242)</option>
              <option value="BH">Bahrain (+973)</option>
              <option value="BD">Bangladesh (+880)</option>
              <option value="BB">Barbados (+1246)</option>
              <option value="BY">Belarus (+375)</option>
              <option value="BE">Belgium (+32)</option>
              <option value="BZ">Belize (+501)</option>
              <option value="BJ">Benin (+229)</option>
              <option value="BM">Bermuda (+1441)</option>
              <option value="BT">Bhutan (+975)</option>
              <option value="BO">Bolivia (+591)</option>
              <option value="BA">Bosnia Herzegovina (+387)</option>
              <option value="BW">Botswana (+267)</option>
              <option value="BR">Brazil (+55)</option>
              <option value="BN">Brunei (+673)</option>
              <option value="BG">Bulgaria (+359)</option>
              <option value="BF">Burkina Faso (+226)</option>
              <option value="BI">Burundi (+257)</option>
              <option value="KH">Cambodia (+855)</option>
              <option value="CM">Cameroon (+237)</option>
              <option value="CA">Canada (+1)</option>
              <option value="CV">Cape Verde Islands (+238)</option>
              <option value="KY">Cayman Islands (+1345)</option>
              <option value="CF">Central African Republic (+236)</option>
              <option value="CL">Chile (+56)</option>
              <option value="CN">China (+86)</option>
              <option value="CO">Colombia (+57)</option>
              <option value="KM">Comoros (+269)</option>
              <option value="CG">Congo (+242)</option>
              <option value="CK">Cook Islands (+682)</option>
              <option value="CR">Costa Rica (+506)</option>
              <option value="HR">Croatia (+385)</option>
              <option value="CU">Cuba (+53)</option>
              <option value="CY">Cyprus North (+90392)</option>
              <option value="CY">Cyprus South (+357)</option>
              <option value="CZ">Czech Republic (+42)</option>
              <option value="DK">Denmark (+45)</option>
              <option value="DJ">Djibouti (+253)</option>
              <option value="DM">Dominica (+1809)</option>
              <option value="DO">Dominican Republic (+1809)</option>
              <option value="EC">Ecuador (+593)</option>
              <option value="EG">Egypt (+20)</option>
              <option value="SV">El Salvador (+503)</option>
              <option value="GQ">Equatorial Guinea (+240)</option>
              <option value="ER">Eritrea (+291)</option>
              <option value="EE">Estonia (+372)</option>
              <option value="ET">Ethiopia (+251)</option>
              <option value="FK">Falkland Islands (+500)</option>
              <option value="FO">Faroe Islands (+298)</option>
              <option value="FJ">Fiji (+679)</option>
              <option value="FI">Finland (+358)</option>
              <option value="FR">France (+33)</option>
              <option value="GF">French Guiana (+594)</option>
              <option value="PF">French Polynesia (+689)</option>
              <option value="GA">Gabon (+241)</option>
              <option value="GM">Gambia (+220)</option>
              <option value="GE">Georgia (+7880)</option>
              <option value="DE">Germany (+49)</option>
              <option value="GH">Ghana (+233)</option>
              <option value="GI">Gibraltar (+350)</option>
              <option value="GR">Greece (+30)</option>
              <option value="GL">Greenland (+299)</option>
              <option value="GD">Grenada (+1473)</option>
              <option value="GP">Guadeloupe (+590)</option>
              <option value="GU">Guam (+671)</option>
              <option value="GT">Guatemala (+502)</option>
              <option value="GN">Guinea (+224)</option>
              <option value="GW">Guinea - Bissau (+245)</option>
              <option value="GY">Guyana (+592)</option>
              <option value="HT">Haiti (+509)</option>
              <option value="HN">Honduras (+504)</option>
              <option value="HK">Hong Kong (+852)</option>
              <option value="HU">Hungary (+36)</option>
              <option value="IS">Iceland (+354)</option>  
              <option value="ID">Indonesia (+62)</option>
              <option value="IR">Iran (+98)</option>
              <option value="IQ">Iraq (+964)</option>
              <option value="IE">Ireland (+353)</option>
              <option value="IL">Israel (+972)</option>
              <option value="IT">Italy (+39)</option>
              <option value="JM">Jamaica (+1876)</option>
              <option value="JP">Japan (+81)</option>
              <option value="JO">Jordan (+962)</option>
              <option value="KZ">Kazakhstan (+7)</option>
              <option value="KE">Kenya (+254)</option>
              <option value="KI">Kiribati (+686)</option>
              <option value="KP">Korea North (+850)</option>
              <option value="KR">Korea South (+82)</option>
              <option value="KW">Kuwait (+965)</option>
              <option value="KG">Kyrgyzstan (+996)</option>
              <option value="LA">Laos (+856)</option>
              <option value="LV">Latvia (+371)</option>
              <option value="LB">Lebanon (+961)</option>
              <option value="LS">Lesotho (+266)</option>
              <option value="LR">Liberia (+231)</option>
              <option value="LY">Libya (+218)</option>
              <option value="LI">Liechtenstein (+417)</option>
              <option value="LT">Lithuania (+370)</option>
              <option value="LU">Luxembourg (+352)</option>
              <option value="MO">Macao (+853)</option>
              <option value="MK">Macedonia (+389)</option>
              <option value="MG">Madagascar (+261)</option>
              <option value="MW">Malawi (+265)</option>
              <option value="MY">Malaysia (+60)</option>
              <option value="MV">Maldives (+960)</option>
              <option value="ML">Mali (+223)</option>
              <option value="MT">Malta (+356)</option>
              <option value="MH">Marshall Islands (+692)</option>
              <option value="MQ">Martinique (+596)</option>
              <option value="MR">Mauritania (+222)</option>
              <option value="YT">Mayotte (+269)</option>
              <option value="MX">Mexico (+52)</option>
              <option value="FM">Micronesia (+691)</option>
              <option value="MD">Moldova (+373)</option>
              <option value="MC">Monaco (+377)</option>
              <option value="MN">Mongolia (+976)</option>
              <option value="MS">Montserrat (+1664)</option>
              <option value="MA">Morocco (+212)</option>
              <option value="MZ">Mozambique (+258)</option>
              <option value="MN">Myanmar (+95)</option>
              <option value="NA">Namibia (+264)</option>
              <option value="NR">Nauru (+674)</option>
              <option value="NP">Nepal (+977)</option>
              <option value="NL">Netherlands (+31)</option>
              <option value="NC">New Caledonia (+687)</option>
              <option value="NZ">New Zealand (+64)</option>
              <option value="NI">Nicaragua (+505)</option>
              <option value="NE">Niger (+227)</option>
              <option value="NG">Nigeria (+234)</option>
              <option value="NU">Niue (+683)</option>
              <option value="NF">Norfolk Islands (+672)</option>
              <option value="NP">Northern Marianas (+670)</option>
              <option value="NO">Norway (+47)</option>
              <option value="OM">Oman (+968)</option>
              <option value="PW">Palau (+680)</option>
              <option value="PA">Panama (+507)</option>
              <option value="PG">Papua New Guinea (+675)</option>
              <option value="PY">Paraguay (+595)</option>
              <option value="PE">Peru (+51)</option>
              <option value="PH">Philippines (+63)</option>
              <option value="PL">Poland (+48)</option>
              <option value="PT">Portugal (+351)</option>
              <option value="PR">Puerto Rico (+1787)</option>
              <option value="QA">Qatar (+974)</option>
              <option value="RE">Reunion (+262)</option>
              <option value="RO">Romania (+40)</option>
              <option value="RU">Russia (+7)</option>
              <option value="RW">Rwanda (+250)</option>
              <option value="SM">San Marino (+378)</option>
              <option value="ST">Sao Tome &amp; Principe (+239)</option>
              <option value="SA">Saudi Arabia (+966)</option>
              <option value="SN">Senegal (+221)</option>
              <option value="CS">Serbia (+381)</option>
              <option value="SC">Seychelles (+248)</option>
              <option value="SL">Sierra Leone (+232)</option>
              <option value="SG">Singapore (+65)</option>
              <option value="SK">Slovak Republic (+421)</option>
              <option value="SI">Slovenia (+386)</option>
              <option value="SB">Solomon Islands (+677)</option>
              <option value="SO">Somalia (+252)</option>
              <option value="ZA">South Africa (+27)</option>
              <option value="ES">Spain (+34)</option>
              <option value="LK">Sri Lanka (+94)</option>
              <option value="SH">St. Helena (+290)</option>
              <option value="KN">St. Kitts (+1869)</option>
              <option value="SC">St. Lucia (+1758)</option>
              <option value="SD">Sudan (+249)</option>
              <option value="SR">Suriname (+597)</option>
              <option value="SZ">Swaziland (+268)</option>
              <option value="SE">Sweden (+46)</option>
              <option value="CH">Switzerland (+41)</option>
              <option value="SI">Syria (+963)</option>
              <option value="TW">Taiwan (+886)</option>
              <option value="TJ">Tajikstan (+7)</option>
              <option value="TH">Thailand (+66)</option>
              <option value="TG">Togo (+228)</option>
              <option value="TO">Tonga (+676)</option>
              <option value="TT">Trinidad &amp; Tobago (+1868)</option>
              <option value="TN">Tunisia (+216)</option>
              <option value="TR">Turkey (+90)</option>
              <option value="TM">Turkmenistan (+7)</option>
              <option value="TM">Turkmenistan (+993)</option>
              <option value="TC">Turks &amp; Caicos Islands (+1649)</option>
              <option value="TV">Tuvalu (+688)</option>
              <option value="UG">Uganda (+256)</option>
              <option value="GB">UK (+44)</option>
              <option value="UA">Ukraine (+380)</option>
              <option value="AE">United Arab Emirates (+971)</option>
              <option value="UY">Uruguay (+598)</option>
              <option value="US">USA (+1)</option>
              <option value="UZ">Uzbekistan (+7)</option>
              <option value="VU">Vanuatu (+678)</option>
              <option value="VA">Vatican City (+379)</option>
              <option value="VE">Venezuela (+58)</option>
              <option value="VN">Vietnam (+84)</option>
              <option value="VG">Virgin Islands - British (+1284)</option>
              <option value="VI">Virgin Islands - US (+1340)</option>
              <option value="WF">Wallis &amp; Futuna (+681)</option>
              <option value="YE">Yemen (North)(+969)</option>
              <option value="YE">Yemen (South)(+967)</option>
              <option value="ZM">Zambia (+260)</option>
              <option value="ZW">Zimbabwe (+263)</option>
              </select>
              <span id="countryCodeMessage" style="color: red"></span>
            </div>

             <!-- Select Country code -->
             <label id="dropdown" for="Select Country Code">Mobile
                <hr />
              </label>
              <i class="fas fa-user"></i>
            <div>
              <input type="tel" class="inputs" name="mobilenumber" id="M_Number" maxlength="10" value=""
                placeholder="Enter your Mobile Number"  />
                <span id="mobileNumberMessage" style="color: red"></span>
              </div>
           





              <!-- Select State
              <label for="Select_State">Select State
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <select name="state" id="State" class="inputs">

                <option value="#">Select-State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
              <span id="selectStateMessage" style="color: red"></span>
            </div> -->
            

            <div class="container">
            <div class="row">
                <!--Course -->

                      <form action="" name="frm" method="post">
                    <i class="fas fa-user"></i>
                   
                    <section class="courses-section">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="country">Country</label>
                                <select type="text" name="country" id="country" class="form-control">
                                    <option>Select Country</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="state">State</label>
                                <select type="text" id="state" name="state" class="form-control"></select>
                            </div>



                            <div class="col-md-4">
                                <label for="city">City</label>
                                <select name="city" id="city" class="form-control"></select>
                            </div>

                        </div>

                        </div>
                    </section>
                </form>
            </div>




            <div>
              <!-- Address -->
              <label for="Address">Address
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <textarea name="Address" id="Address" class="inputs" placeholder="Enter your Address" rows="4"></textarea>
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
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="Registration_form_script.js"></script>

 
</body>
</html>