function validation() {
  
    var correct_way = /^[A-Za-z ]+$/ ;  // add regexp for validate name
    var expr =
      /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/ ;  // add regexp for validate email
    
      // createing a variable for every input field
      var Name = document.getElementById('Name').value;
      var FName = document.getElementById('F_Name').value;
      var mobregex = /^[0-9]{10}$/;   // add regexp for mobilenumber file
      var MNumber = document.getElementById('M_Number').value;
      var Male = document.getElementById('Male').value;
      var Female = document.getElementById('Female').value;
      var dob = document.getElementById('dob').value;
      var country = document.getElementById('country').value;
      var state = document.getElementById('state').value;
      var city = document.getElementById('city').value;
      var Address = document.getElementById('Address').value;
      var Email = document.getElementById('E_mail').value;
      var filevalidation = /^.*\.(jpg|jpeg|png|gif|xlsx)$/;// add regexp for validate file
      var file = document.getElementById('file').value;
      var Password = document.getElementById('Password').value;
      var address = /^[#.0-9a-zA-Z\s,-]+$/;  // add regexp for address file
      var RePassword = document.getElementById('Re-password').value;
      var Checkbox = document.getElementById('Checkbox').value;
  
    var success = true;  //if no error its returns true else false 
  
    // Using for Remove the error message
    document.getElementById('nameMessage').innerHTML = '';
    document.getElementById('fatherNameMessage').innerHTML = '';
    document.getElementById('mobileNumberMessage').innerHTML = '';
    document.getElementById('maleMessage').innerHTML = '';
    document.getElementById('femaleMessage').innerHTML = '';
    document.getElementById('DOBMessage').innerHTML = '';
    document.getElementById('countryMessage').innerHTML = '';
    document.getElementById('stateMessage').innerHTML = '';
    document.getElementById('cityMessage').innerHTML = '';
    document.getElementById('addressMessage').innerHTML = '';
    document.getElementById('EmailMessage').innerHTML = '';
    document.getElementById('fileMessage').innerHTML = '';
    document.getElementById('PasswordMessage').innerHTML = '';
    document.getElementById('re_PasswordMessage').innerHTML = '';
    document.getElementById('checkMessage').innerHTML = '';
       
  // create a validation logic for every input field
    // create  validation logic for name 
    if (Name=="") {
      document.getElementById('nameMessage').innerHTML ='** please fill your Name';
        document.getElementById("Name").focus();
      success = false;
    }
  
    if (Name.length < 3) {
      document.getElementById('nameMessage').innerHTML ='** Allow minimum three character';
      success = false;
    }
    if (Name.length > 30) {
      document.getElementById('nameMessage').innerHTML ='** please fill correct length';
      success = false;
    }
  
    // defining RegExp function
    if (Name.match(correct_way)) true;
    else {
      document.getElementById('nameMessage').innerHTML ='** Only alphabets are allowed';
      success = false;
    }
   
    // create a validation logic for Father Name
    if (FName == '') {
      document.getElementById('fatherNameMessage').innerHTML ='** please fill your Father Name';
        // document.registration.name.focus();
        document.getElementById("F_Name").focus();
      success = false;
    }
    if (FName.length < 3) {
      document.getElementById('fatherNameMessage').innerHTML ='** please fill correct length';
      success = false;
    }
    if (FName.length > 30) {
      document.getElementById('fatherNameMessage').innerHTML ='** please fill correct length';
      success = false;
    }
    // defining RegExp function
    if (FName.match(correct_way)) true
    else {
      document.getElementById('fatherNameMessage').innerHTML ='** Only alphabets are allowed';
      success = false;
    }
  
    // create a validation logic for Mobile number
    if (MNumber == '') {
      document.getElementById('mobileNumberMessage').innerHTML ='** Please  Enter a mobile Number';
        document.getElementById("M_Number").focus();
        success = false;
    }
    
    if (isNaN(MNumber)) {
      document.getElementById('mobileNumberMessage').innerHTML ='** Only number are allowed';
      success = false;
    }
  
    if (MNumber.length < 10) {
      document.getElementById('mobileNumberMessage').innerHTML ='** please enter a valid length';
        success = false;
    }
    
    if (MNumber.length > 10) {
        document.getElementById('mobileNumberMessage').innerHTML ='** please enter a valid length';
        success = false;
    }
    
    if (
        (MNumber.charAt(0) != 7) &&
        (MNumber.charAt(0) != 8) &&
        (MNumber.charAt(0) != 9)
        ) {
            document.getElementById('mobileNumberMessage').innerHTML ='** mobile number must start with 7,8,9';
            success = false;
        }
        
        // defining RegExp function
        if (MNumber.match(mobregex)) true
        else {
            document.getElementById('mobileNumberMessage').innerHTML ='** please enter ten digit number only';
            success = false;
        }
        
    // create a validation logic for Selection gender
    if ((document.getElementById('Male').checked!==true) && (document.getElementById('Female').checked!==true)) {
        document.getElementById('maleMessage').innerHTML ='** please select any one';
        document.getElementById("Male").focus();
        success = false;
    }
    
    // create a validation logic for Date-of-Birth
    if (dob == '') {
        document.getElementById('DOBMessage').innerHTML ='** please select your DOB';
        document.getElementById("dob").focus();
        success = false;
    }
    
    // create a validation logic for Dropdown
    if (country == '') {
        document.getElementById('countryMessage').innerHTML ='** please select your country';
        document.getElementById("country").focus();
        success = false;
    }
    
    if (state == '') {
        document.getElementById('stateMessage').innerHTML ='** please select your State';
        document.getElementById("state").focus();
        success = false;
    }
    
    if (city == '') {
        document.getElementById('cityMessage').innerHTML ='** please select your city';
        document.getElementById("city").focus();
        success = false;
    }
    
    // create a validation logic for Address
    if (Address.length < 5) {
        document.getElementById('addressMessage').innerHTML ='** please enter minimum six character';
        document.getElementById("Address").focus();
      success = false;
    }
  
    if (Address.match(address)) true
    else {
      document.getElementById('addressMessage').innerHTML ='** please enter your correct address';
      success = false;
    }
  
     // create a validation logic for Email
    if (!expr.test(Email)) {
      document.getElementById('EmailMessage').innerHTML ='**please enter a correct email';
        document.getElementById("E_mail").focus();
      success = false;
    }
  
       // create a validation logic for file upload
    if (file.match(filevalidation)) true
    else {
      document.getElementById('fileMessage').innerHTML ='** please upload (jpg|jpeg|png|gif|xlsx) file Extention';
        document.getElementById("file").focus();
      success = false;
    }
    
     // create a validation logic for password
    if (Password =='') {
      document.getElementById('PasswordMessage').innerHTML ='** please enter password';
        document.getElementById("Password").focus();
        success = false;
    }
    
    if (Password.length < 5) {
        document.getElementById('PasswordMessage').innerHTML ='** please enter minimum six digit password';
        success = false;
    }
    
    if (Password.length > 20) {
        document.getElementById('PasswordMessage').innerHTML ='** please enter maximum 20 digit password';
        success = false;
    }
    
    // create a validation logic for RePassword
    if (RePassword !== Password) {
        document.getElementById('re_PasswordMessage').innerHTML ='** please enter same password';
        document.getElementById("Re-password").focus();
      success = false;
    }
  
    if (RePassword == '') {
      document.getElementById('re_PasswordMessage').innerHTML ='** please enter same password';
      success = false;
    }
  
    // create a validation logic for Checkbox
    if (document.getElementById('Checkbox').checked !== true) {'** please select check box';
        document.getElementById("Checkbox").focus();
      success = false;
    }
  
    return success; 
  }
    //   // settings
    // iziToast.settings({
    //   timeout: 3000, // default timeout
    //   resetOnHover: true,
    //   // icon: '', // icon class
    //   transitionIn: 'flipInX',
    //   transitionOut: 'flipOutX',
    //   position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
    //   onOpen: function () {
    //     console.log('callback abriu!');
    //   },
    //   onClose: function () {
    //     console.log("callback fechou!");
    //   }
    // });

    // // success
    // $('#successClick').click(function () {
    //   iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: 'iziToast.sucess() with custom icon!'});
    // }); 

// validation for login Username and password 
function validlogin(){
  var USERNAME = document.getElementById('userName').value;
  var PASSWORD = document.getElementById('secure').value;
  
  var success = true;
  document.getElementById('USERNAMEfailMessage').innerHTML = '';
  document.getElementById('PASSWORDfailMessage').innerHTML = '';

  if(USERNAME == ""){
    document.getElementById('USERNAMEfailMessage').innerHTML = '** please must fill your username';
    success = false;
  }
  
  if(PASSWORD == ""){
    document.getElementById('PASSWORDfailMessage').innerHTML = '** please must fill your Password';
    success = false;
  }
  return success;
}

// function for country state and city 

$(document).ready(function() {

      $('#country').change(function() {
          loadState($(this).find(':selected').val())
      })
      $('#state').change(function() {
          loadCity($(this).find(':selected').val())
      })

});
// define function for country 
function loadCountry(){
  $.ajax({
    type: "POST",
    url : "ajax.php",
    data: "get=country"
  }).done(function(result){
    
    $(result).each(function(){
      $("#country").append($(result));
    })
  });
}
function loadState(countryId){
  $("#state")
  $.ajax  ({
    type:"POST",
    url: "ajax.php",
    data: "get=state&countryId=" + countryId
  }).done(function(result) {
    // console.log(result); 
    $("#state").append($(result));

  });
}
function loadCity(stateId) {
  $("#city")
  $.ajax({
      type: "POST",
      url: "ajax.php",
      data: "get=city&stateId=" + stateId
  }).done(function(result) {
    


      $("#city").append($(result));

  });
}
// init the countries
loadCountry();
//validation();
// $("input").intlTelInput({
//   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
// });

// for country Code 
// var input = document.querySelector("#mobile_code");
// intlTelInput(input, {
//   initialCountry: "auto",
//   geoIpLookup: function (success, failure) {
//     $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
//       var countryCode = (resp && resp.country) ? resp.country : "us";
//       success(countryCode);
//     });
//   },
// });
        

// -----Country Code Selection
$("#M_Number").intlTelInput({
	initialCountry: "in",
	separateDialCode: true,
	// utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
});