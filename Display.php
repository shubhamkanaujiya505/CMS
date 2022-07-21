 <?php


session_start();
// you can print this way 
// echo "Welcome ".$_SESSION['user_name'];

?>


      <!-- Navigation bar  -->
<!-- <div> -->
<nav id="navigation" class="navbar navbar-expand-sm navbar-green bg-green">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size: 30px; font-family: 'Edu TAS Beginner', cursive; color: black"><b>Avalon Aurora High School</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" style="display: block !important;" data-bs-target="#mynavbar">
      <!-- <span class="navbar-toggler-icon"></span> -->
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        
        
     </ul>
      <!-- <div style="display:inline-flex; text-align:right;"> -->
      <button type="submit" id="addNewRecord"  style="float:right;margin:20px" value="Add New Record" class="btn btn-small btn-success" ><a href="Registration.php" class="text-white"> + Add New Record</a></button>
      <button type="submit" id="addNewRecord"  style="float:right;margin:20px" value="Logout"  class="btn btn-small btn-success" ><a href="logout.php" class="text-white">Logout</a></button>
      <!-- </div>  -->
    </div> 
  </div>
 </nav>
<!-- </div>  -->

<!-- Navigation bar end  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- add iziToast css -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/izitoast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- end iziToast css -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- add iziToast js -->
    <!-- <script src="https://unpkg.com/izitoast/dist/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- end iziToast js -->
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
<body > 


    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
           <h1 class="text-warning text-center" >Display Table Data</h1>
           <table class="table table-striped table-hover table-border">
            <tr  class="bg-dark text-white text-center" >
            <th>Sr.No</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Mobile Number</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
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
        // taking data from db to display page 
       

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
            <td><?php  
            //echo $res['Gender'];
            //var_dump($res['Gender'] == 'Male');
            if($res['Gender'] == 'Male'){
                echo "Male";
            } else{
                echo "Female";
            }
            ?></td>
            <td><?php  echo $res['Date_Of_Birth']; ?></td>

            <!-- $query = select st.Student Name, st.Father Name, st.Mobile Number, st.Gender, st.Date Of Birth, st.Country, st.State, st.City, st.Address, st.Email, st.FileUpload, C.name as Country,S.name as State ,Ci.name as City from StudentForm INNER JOIN tbl_countries C ON C.id = country INNER JOIN tbl_states S ON S.id = State inner join tbl_cities Ci on Ci.id=city; -->

            <!-- get data from db to display page  -->
            <!-- <td>  -->
              <?php// $cid  = $res['Country'];
            //  $Conquery = mysqli_query($con,"select id,name from tbl_countries where id=$cid limit 1");
            //  $cdata = mysqli_fetch_assoc($Conquery);
                // if($cid==$cdata['id']){ echo $cdata['name'];}else{ echo "-";
                //}  ?> 
                   <!-- </td> -->

                  <!-- test start -->
            <td><?php $cid  = $res['Country'];
             $Conquery = mysqli_query($con,"select C.name as Country from StudentForm inner join tbl_countries c on C.id = Country");
                if($cid==$Conquery['id']){ echo $Conquery['name'];}else{ echo "-";
                }  ?></td>
                  <!-- test end  -->

            <td><?php  $sid = $res['State'];
            $statequery = mysqli_query($con,"select id,name from tbl_states where id = $sid limit 1");
            $statedata = mysqli_fetch_assoc($statequery);
            if($sid ==$statedata['id']){
                echo $statedata['name'];
            } ?></td>
            <td><?php  $ciid = $res['city'];
            $cityquery = mysqli_query($con,"select id,name from tbl_cities where id = $ciid limit 1"); 
            $citydata = mysqli_fetch_assoc($cityquery);
            if($ciid == $citydata['id']){
                echo $citydata['name'];
              }  ?></td>
            <td><?php  echo $res['Address']; ?></td>
            <td><?php  echo $res['Email']; ?></td>
            <!-- <td><?php  echo $res['Password']; ?></td> -->
            <!-- <td><?php  //echo $res['FileUpload']; ?></td> -->
            <!-- add file path for show image  -->
            
            <td> <img src="./uploadfiles/<?php echo $res['FileUpload']; ?>" height="20px" width="20px" ></td>
                             
            <td><button class="btn-danger btn" > <a href="Delete.php?del=<?php echo $res['SrNo']; ?>" onclick='return confirm("Sure you want to delete!");' class="text-white">Delete</a></button> </td>
            <td><button class="btn-primary btn"> <a href="Update.php?Updates=<?php echo $res['SrNo']; ?>" class="text-white">Update</a></button> </td>
            


            </tr>
        <?php
        $x++;
        }
        
        ?>

           </table>
        </div>
    </div>
   <script> 

//    sweet alert for delete confirmation 
//    function deletevalidity(){
//     swal({
//         title: "Are you sure?",
//         text: "Once deleted, you will not be able to recover this file!",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//         })
//         .then((willDelete) => {
//         if (willDelete) {
//             console.log('yes');
//         } else {
//             console.log('cancel');
//         }
//         });
//      }
   
 
            //         // settings
            //     iziToast.settings({
            //     timeout: 300000, // default timeout
            //     resetOnHover: true,
            //     // icon: '', // icon class
            //     transitionIn: 'flipInX',
            //     transitionOut: 'flipOutX',
            //     position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            //     onOpen: function () {
            //         console.log('callback abriu!');
            //     },
            //     onClose: function () {
            //         console.log("callback fechou!");
            //     }
            //     });

            //     // custom toast
            //     $('#customClick').click(function () {

            //     iziToast.show({
            //         color: 'red',
            //         icon: 'fa fa-user',
            //         title: 'Hey',
            //         message: 'Are you sure you want to Delete!',
            //         position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            //         progressBarColor: 'rgb(0, 255, 184)',
            //         buttons: [
            //         [
            //             '<button>Ok</button>',
            //             function (instance, toast) {
            //                echo ($deletes);
            //             }
            //         ],
            //         [
            //             '<button>Close</button>',
            //             function (instance, toast) {
            //             instance.hide({
            //                 transitionOut: 'fadeOutUp'
            //             }, toast);
            //             }
            //         ]
            //         ]
            //     });

            //     }); // ! .click()

            // $('#any').click(function(){
            // iziToast.error({
            //     title: 'Error',
            //     message: 'iziToast.error()'
            // });
            // }); -->

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
