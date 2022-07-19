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

$Update = $_GET['Updates'];
$query = "SELECT * FROM StudentForm where SrNo = '$Update'"; 
$data = mysqli_query($con, $query); 
$res = mysqli_fetch_object($data);
// print_r($res);
$name = $res->Student_Name;
$fathername = $res->Father_Name;
$mobilenumber = $res->Mobile_Number;
$gender = $res->Gender;
$dob = $res->Date_Of_Birth;
$Co_untry = $res->Country;
$St_ate = $res->State;
$Ci_ty = $res->city;
$address = $res->Address;
$email = $res->Email;
$File = $res->FileUpload;
// echo "<pre>";print_r($res);exit;
// when clicked on submit button data is save
// if(isset($_POST['submit'])){

//     // Taking all values from the form data(input)

// //   $name =  $_POST['name'];
// //   $fathername = $_POST['fathername'];
// //   $mobilenumber =  $_POST['mobilenumber'];
// //   $gender =  $_POST['gender'];
// //   $dob =  $_POST['dob'];
// //   $state =  $_POST['state'];
// //   $Address = $_POST['Address'];
// //   $email = $_POST['email'];
// //   $Password = $_POST['password'];
// //   $File = $_POST['file'];
 
//   $value['name'] =  $_REQUEST['name'];
//   $value['fathername'] = $_REQUEST['fathername'];
//   $value['mobilenumber'] =  $_REQUEST['mobilenumber'];
//   $value['gender'] =  $_REQUEST['gender'];
//   $value['dob'] =  $_REQUEST['dob'];
//   $value['state'] =  $_REQUEST['state'];
//   $value['Address'] = $_REQUEST['Address'];
//   $value['email'] = $_REQUEST['email'];
//   $value['File'] = $_REQUEST['file'];

//   $v = '"' . implode('", "', $value) . '"';
  
//     // taking input in db table
//     $q = "update StudentForm set SrNo = $Update,$v where SrNo=$v";
 
// //$name,$fathername,$mobilenumber,$gender,$dob,$state,$Address,$email,$Password,$File
//     $query = mysqli_query($con,$q);

//     header('location: Display.php');

// }

?>


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
  <title>Resistration form</title>
</head>

<body style="background-color: skyblue;">
  <!-- Registration box -->
  <div class="container">
    <!-- Calling function form js using validation function-->
        <div class="panel panel-default" id="form" >
          <form method="post" name="registration" onsubmit="return validation()"> 
            <div class="title">
              <h1>
                Update Operation Form
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
              <input type="text" class="inputs" name="name" id="Name" value="<?php echo $name; ?>" placeholder="Enter your Name" />
              <!-- Using style tag in span tag to give style in error message -->
              <span id="nameMessage" style="color: red"></span>
            </div>

            <div>
              <!-- Father name -->
              <label for="fathername">Father Name
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <input type="text" class="inputs" name="fathername" id="F_Name" value="<?php  echo $fathername ?>" placeholder="Enter your Father Name" />
              <span id="fatherNameMessage" style="color: red"></span>
            </div>

            <div>
              <!-- Mobile number -->
              <label for="mobileNumber">Mobile Number
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <input type="tel" class="inputs" name="mobilenumber" id="M_Number" maxlength="10" value="<?php  echo $mobilenumber; ?>"
                placeholder="Enter your Mobile Number" />
              <span id="mobileNumberMessage" style="color: red"></span>
            </div>

            
            <?php
            $male = $female = '';
            if($gender == 'Male')
                $male = 'checked'; 
            else
                $female = 'checked';
            ?>
         
            <div>
                <!-- Gender -->
                <label for="gender">Gender<hr /></label>
                <br>
                <input type="radio" class="Gender" name="gender" id="Male" value="Male" style=" font-size: 5px;" <?php echo $male; ?> />
              <label id="male" for="Male">Male </label>
              <span id="maleMessage" style="color: red"></span><br>
              
              <input type="radio" class="Gender" name="gender" onclick="" id="Female" value="Female" <?php echo $female; ?>/>
              <label id="female" for="Female">Female </label>
              <span id="femaleMessage" style="color: red"></span>
            </div>
            <div>
              <!-- Date of Birth -->
              <label for="DOB">Date of Birth
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <input type="Date" class="inputs" name="dob" id="dob" value="<?php  echo $dob; ?>" />
              <span id="DOBMessage" style="color: red"></span>
            </div>

          
              <!-- Select State -->
              
            <!-- <div class="container"> -->
            <div class="row">
                <!--Course -->

                  
                    <i class="fas fa-user"></i>
                   
                    <section class="courses-section">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="country">Country</label>
                                <select type="text" name="country" id="country" value="<?php  echo $Co_untry; ?>" class="form-control">
                                  <span id="selectcountryMessage" style="color: red"></span>
                                    <option>Select Country</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="state">State</label>
                                <select type="text" id="state" value="<?php  echo $St_ate; ?> name="state" class="form-control"></select>
                                <span id="selectstateMessage" style="color: red"></span>
                            </div>



                            <div class="col-md-4">
                                <label for="city">City</label>
                                <select name="city" id="city" value="<?php  echo $Ci_ty; ?> class="form-control"></select>
                                <span id="selectcityMessage" style="color: red"></span>
                            </div>

                        </div>

                </div>
         

            </section>
          
         <!-- </div> -->

            <div>
              <!-- Address -->
              <label for="Address">Address
                <hr />
              </label>
              <i class="fas fa-user"></i>
              <textarea name="Address" id="Address" class="inputs" style="overflow:hidden" placeholder="Enter your Address" rows="4" value="<?php  echo $address; ?>"></textarea>
              <span id="addressMessage" style="color: red"></span>
            </div>

          
            <div>
              <!-- E-mail -->
              <label for="email">E-mail
                <hr />
              </label>
              <i class="far fa-envelope"></i>

              <input type="text" class="inputs" name="email" id="E_mail" value="<?php  echo $email; ?>" placeholder="abc@gmail.com" />
              <span id="EmailMessage" style="color: red"></span>
            </div>
            <div>
              <!-- File Upload -->
              <label for="file">File Upload
                <hr />
              </label>
              <i class="fas fa-lock"></i>

              <input type="file" class="inputs" name="file" id="file" value="" <?php echo $File; ?> />
              <span id="fileMessage" style="color: red"></span>
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" value="submit" style="border-radius: 7px; border: none;"><a href="Display.php" style="text-align: center; color: white; font-weight: 900;">Update Details</a></button>
  
          </form>
    </div>
    </table>
</div>
</div>

</div>
      <!-- JavaScript page link -->
  <!-- <script src="Registration_form_script.js"></script> -->
</body>
</html>