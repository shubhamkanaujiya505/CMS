
    
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

  <title>Recover-Email</title>
<style>
    body{
        background-image: url('color.jpg'); 
        background-size:cover;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
    .E_mail{
        margin-top:50px; 
        width:20%; 
        border-radius:35px; 
        font-size:large;

    }

</style>

</head>

<body >
 
  <div class="container">
    <!-- Calling function form js using validation function-->
    <div class="panel panel-default" id="form" >
      <form method="post" name="registration" onsubmit="return validation()"> 


         <div class="title">
              <h1 class="text-white bg-blue text-center">
                <b>Recover-Email</b>
                <hr />
              </h1>
            </div>

            
              <!-- E-mail -->
              <label for="email">E-mail<hr/></label>
              <i class="far fa-envelope"></i>
              <input type="text" class="inputs" name="email" id="E_mail" value="" placeholder="abc@gmail.com" />
              <span id="EmailMessage" style="color: red"></span>
            </div>
            <div>
              
            <!-- Submit button -->
            <div>
            <button type="submit" name="submit"  value="submit" style=""><b>Submit</b></a></button>
            </div>
          </form>
    </table>
</div>
</div>

</div>
      <!-- JavaScript page link -->

      <script src="Registration_form_script.js"></script>
</body>
</html>