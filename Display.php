 <?php


session_start();
// you can print this way 
// echo "Welcome ".$_SESSION['user_name'];

?>
 <div class="row" id="table">
      <div class="col-md-8"></div>
      <div class="col-md-4">
        <!-- add new record button -->
          <button type="submit" id="addNewRecord"  style="float:right;margin:20px" value="Add New Record" class="btn btn-small btn-success" ><a href="Insert.php" class="text-white"> + Add New Record</a></button>

      </div>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
*{
    font-size: 12px;
}
/* using mediaquery for making page responsive */
  
@media (max-width: 998px) {
    html {
      font-size: 55%;
    }
  }
  
  @media (max-width: 768px) {
    html {
      font-size: 45%;
    }
  }
  
  @media (max-width: 768px) {
    html {
      font-size: 45%;
    }
}
    </style>


</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
           <h1 class="text-warning text-center" >Display Table Data</h1>
           <table class="table table-striped table-hover table-border ">
            <tr  class="bg-dark text-white text-center" >
            <th>Sr.No</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Mobile Number</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>State</th>
            <th>Address</th>
            <th>Email</th>
            <!-- <th>Password</th> -->
            <th>FileUpload</th>
            <th>Delete</th>
            <th>Update</th>
            </tr>

            <?php
            

// database connection file import
// include 'conn.php';
    $con = mysqli_connect('localhost','root','123456'); //connect to database

    mysqli_select_db($con,'Form');
// when clicked on submit button data is save


   // use session before login 
    $userprofile = $_SESSION['user_name'];
    //  check condition 
    if($userprofile == true){

    }else{
        header('location:login.php');
    }


    // Taking all values from the form data(input)
    // $folder = "uploadfiles/";
     // we have file type method
     $files = $_FILES['file'];   
     // access the filename
     $filename = $files['name'];
     
     // check file error
     $fileerror = $files['error'];
     
     // file stored in temporary folder
     $filetmp = $files['tmp_name'];



     // check exetention
     // break file name into 2 part 55.jpg  55|jpg

     $fileext = explode('.',$filename);  //expload == divide different different part

     // access only file exetention
    $filecheck = strtolower(end($fileext));
     // $newFile = time().'.'.$filecheck;
     // which type of file validate
     $fileextstored = array('png', 'jpg', 'pdf', 'jpeg', 'xlsx');

    //  echo ("hello");
    // var_dump(in_array($filecheck, $fileextstored));
     if(in_array($filecheck,$fileextstored)){

         //create destination folder
         // $destinationfile =getcwd().'/uploadfiles/'.$newFile;
         $destinationfile ='uploadfiles/'.$filename;
         // echo $destinationfile;
         // var_dump(move_uploaded_file($_FILES['file']['tmp_name'],$destinationfile));  
         move_uploaded_file($filetmp,$destinationfile);   
     
        
        $q = "INSERT INTO StudentForm (FileUpload)
        values('$destinationfile')";
    }
        $q = "select * from StudentForm";
        $query = mysqli_query($con,$q);
        $x=1;
         while($res = mysqli_fetch_array($query)){
            
         ?>
            <tr class="text-center">

            <td><?php  echo $x; ?></td>
            <td><?php  echo $res['Student_Name']; ?></td>
            <td><?php  echo $res['Father_Name']; ?></td>
            <td><?php  echo $res['Mobile_Number']; ?></td>
            <!-- take condition for display male or female -->
            <td><?php   if($res['Gender'] == 1){
                echo "Male";
            } else{
                echo "Female";
            }
            ?></td>
            <td><?php  echo $res['Date_Of_Birth']; ?></td>
            <td><?php  echo $res['State']; ?></td>
            <td><?php  echo $res['Address']; ?></td>
            <td><?php  echo $res['Email']; ?></td>
            <!-- <td><?php  echo $res['Password']; ?></td> -->
            <!-- <td><?php  //echo $res['FileUpload']; ?></td> -->
            <!-- add file path for show image  -->
            
            <td> <img src="<?php echo 'http://localhost/Res_form/RF/uploadfiles/'.$res['FileUpload']; ?>" height="20px" width="20px" ></td>
                             
            <td><button class="btn-danger btn"> <a href="Delete.php?del=<?php echo $res['SrNo']; ?>" class="text-white">Delete</a></button> </td>
            <td><button class="btn-primary btn"> <a href="Update.php?Updates=<?php echo $res['SrNo']; ?>" class="text-white">Update</a></button> </td>
            


            </tr>
        <?php
        $x++;
        }
        
        ?>

           </table>
        </div>
    </div>
</body>
</html>
<a href="logout.php"><input type="submit" name="" value="LogOut" style="background:blue; color:white; height: 35px; width: 100px; margin: top 20px; margin-left: 5px; font: size 18px; border:0; border-radius: 5px; cursor:pointer"></a>