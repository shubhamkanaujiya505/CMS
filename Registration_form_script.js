// window.onload = function(){
//   document.registration.onsubmit = function() {
//     return validation();
//   }
// }
// function nameValidate(){
//   // alert("first name validate");
// }

function validation() {

  
    var correct_way = /^[A-Za-z ]+$/;  // add regexp for validate name
    var expr =/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/ ;  // add regexp for validate email
    
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
      var filevalidation = /^.*\.(jpg|jpeg|png|gif)$/;// add regexp for validate file
      var file = document.getElementById('file').value;
      var Password = document.getElementById('Password').value;
      var address = /^[#.0-9a-zA-Z\s,-]+$/;  // add regexp for address file
      var RePassword = document.getElementById('Re-password').value;
      var Checkbox = document.getElementById('Checkbox').value;
  
    var success = true;  //if no error its returns true else false 

    
  
    // Using for Remove the error message
    document.getElementById('nameMessage').innerHTML = '';
    document.getElementById('nameMessage').innerHTML = '';
    document.getElementById('fatherNameMessage').innerHTML = '';
    document.getElementById('mobileNumberMessage').innerHTML = '';
    document.getElementById('maleMessage').innerHTML = '';
    document.getElementById('femaleMessage').innerHTML = '';
    document.getElementById('DOBMessage').innerHTML = '';
    document.getElementById("countryMessage").innerHTML = "";
    document.getElementById('stateMessage').innerHTML = '';
    document.getElementById('cityMessage').innerHTML = '';
    document.getElementById('addressMessage').innerHTML = '';
    document.getElementById('EmailMessage').innerHTML = '';
    document.getElementById('fileMessage').innerHTML = '';
    document.getElementById('PasswordMessage').innerHTML = '';
    document.getElementById('re_PasswordMessage').innerHTML = '';
    document.getElementById('checkMessage').innerHTML = '';



    // var nameMessage,fatherNameMessage,mobileNumberMessage,maleMessage;
       
  // create a validation logic for every input field

    /////////////////////// create  validation logic for name /////////////////////////

    if (Name==""|| Name == null) {
      document.getElementById('nameMessage').innerHTML ="** can't blank please fill your Name like `Amit Kumar`";
        document.getElementById("Name").focus();
      success = false;
    }else if (Name.length < 3){
      document.getElementById('nameMessage').innerHTML ='** allow minimum 3 character';
      success = false;
    }
    else if (Name.length > 30){
      document.getElementById('nameMessage').innerHTML ='** only allow maximum 30 character';
      success = false;
    }
    // defining RegExp functionx
    if (Name.match(correct_way)) true;
    else if(Name!="")
   {
      document.getElementById('nameMessage').innerHTML ='** Only alphabets are allowed like "Amit Kumar"';
      success = false;
    }else {

    }

/////////////////////// create a validation logic for Father Name /////////////////////////////

    if (FName == '') {
      document.getElementById('fatherNameMessage').innerHTML ="** can't blank  please fill your Father Name like `Amit Kumar`";
        // document.registration.name.focus();
        document.getElementById("F_Name").focus();
      success = false;
    }
    else if (FName.length < 3){
      document.getElementById('fatherNameMessage').innerHTML ='** allow minimum 3 character';
      success = false;
    }
    else if (FName.length > 30) {
      document.getElementById('fatherNameMessage').innerHTML ='** only allow maximum 30 character';
      success = false;
    }
    // defining RegExp function
    if (FName.match(correct_way)) true;
    else if(FName !="")
    {
      document.getElementById('fatherNameMessage').innerHTML ='**  Only alphabets are allowed like "Amit Kumar" ';
      success = false;
    }else{

    }
  


   /////////////////////////// create a validation logic for Mobile number/////////////////////////
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
        (MNumber.charAt(0) != 6) &&
        (MNumber.charAt(0) != 7) &&
        (MNumber.charAt(0) != 8) &&
        (MNumber.charAt(0) != 9)
        ) {
            document.getElementById('mobileNumberMessage').innerHTML ='** mobile number must start with 6,7,8,9';
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


        // var dob = document.getElementById("dob");
        // document.getElementById("DOBMessage");

        // var threeYearsAgo = new Date();
        // threeYearsAgo.setFullYear(threeYearsAgo.getFullYear() - 3);
        // var eightyOneYearsAgo = new Date();
        // eightyOneYearsAgo.setFullYear(eightyOneYearsAgo.getFullYear() - 81);

        // // Function returns true when age is OK, false otherwise
        // function check() {
        //     var birthDate = new Date(dob.value.replace(/(..)\/(..)\/(....)/, "$3-$2-$1"));
        //     return birthDate <= threeYearsAgo && birthDate > eightyOneYearsAgo;
        // }
        //     if (check()) {
        //       document.getElementById('DOBMessage').innerHTML ='** "Your age is OK"';
        //     } else {
        //       document.getElementById('DOBMessage').innerHTML ='** please select any one';"Your age must be between 3 and 80";
        //     }
        
    
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
    iziToast.settings({
      timeout: 1000, // default timeout
      resetOnHover: true,
      // icon: '', // icon class
      transitionIn: 'flipInX',
      transitionOut: 'flipOutX',
      position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
      onOpen: function () {
        console.log('callback abriu!');
      },
      onClose: function () {
        console.log("callback fechou!");
      }
    });

    // success
    $('#successClick').click(function () {
      iziToast.success({timeout: 3000, icon: 'fa fa-check', title: 'OK', message: 'Registered successfully'});
    }); 
    // error
    $('#errorClick').click(function () {
      iziToast.error({title: 'Error',  icon: 'fa fa-times', message: 'Not Registered'});
    });



    // $("#formid").submit(function(e) {
    //   e.preventDefault();
    //   var name = $("#Name").val();
    //   var comment = $("#F_Name").val();
      
    //   if(name == "" || comment == "" ) {
    //     $("#error_message").show().html("All Fields are Required");
    //   } else {
    //     $("#error_message").html("").hide();
    //     $.ajax({
    //       type: "POST",
    //       url: "post-form.php",
    //       data: "name="+name+"&comment="+comment,
    //       success: function(data){
    //         $('#success_message').fadeIn().html(data);
    //         setTimeout(function() {
    //           $('#success_message').fadeOut("slow");
    //         }, 2000 );
    
    //       }
    //     });
    //   }
    // })

  // validation for login Username and password on login page

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
function loadCountry($id = ''){
  $cid = $id;
  $json = JSON.stringify({ get:'country',cid:$cid});
  $.ajax({
    type: "POST",
    url : "ajax.php",
    async: false,
    data: $json,
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'text/plain'
     },
    dataType: "json",
  }).done(function(result){
   var resut = JSON.parse(JSON.stringify(result));
  // console.log(resut['country']);
    $(resut['country']).each(function(res,v){
    //  console.log(v);
      $("#country").append(v);
    })
  });
}
function loadState($id = ''){
  $sid = $id;
  $json = JSON.stringify({ get:'state',countryId:$sid});
  $.ajax({
    type: "POST",
    url : "ajax.php",
    async: false,
    data: $json,
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'text/plain'
     },
    dataType: "json",
  }).done(function(result){
   var resut = JSON.parse(JSON.stringify(result));
  // console.log(resut['country']);
    $(resut['state']).each(function(res,v){
    //  console.log(v);
      $("#state").append(v);
     
    })
  });
}

 
// function loadState(countryId){
//   $("#state")
//   $.ajax  ({
//     type:"POST",
//     url: "ajax.php",
//     data: "get=state&countryId=" + countryId
//   }).done(function(result) {
//     // console.log(result); 
//     $("#state").append($(result));

//   });
// }
// console.log($id = '');
function loadCity($id = ''){
  $ciid = $id;
  $json = JSON.stringify({ get:'city',stateId:$ciid});
  $.ajax({
    type: "POST",
    url : "ajax.php",
    async: false,
    data: $json,
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'text/plain'
     },
    dataType: "json",
  }).done(function(result){
   var resut = JSON.parse(JSON.stringify(result));
  // console.log(resut['country']);
    $(resut['city']).each(function(res,v){
    //  console.log(v);
      $("#city").append(v);
    })
  });
}


// function loadCity(stateId) {
//   $("#city")
//   $.ajax({
//       type: "POST",
//       url: "ajax.php",
//       data: "get=city&stateId=" + stateId
//   }).done(function(result) {
    


//       $("#city").append($(result));

//   });
// }
// init the countries
$cid = '<?php echo $Co_untry ?>';
$sid = '<?php echo $St_ate ?>';
$ciid = '<?php echo $Ci_ty ?>';
loadCountry();
loadState();
//loadState();
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



//////////// Here's a jQuery plugin handles enter key as a callback or as a tab key (with an optional callback)/////////////

          // $(document).ready(function () {
          //   $("#Name").onEnter("tab");
          //   $("#F_Name").onEnter("tab");
          //   // $("#Male").onEnter("tab");
          //   // $("#Female").onEnter("tab");
          //   $("#dob").onEnter("tab");
          //   $("#M_Number").onEnter("tab");
          //   $("#country").onEnter("tab");
          //   $("#state").onEnter("tab");
          //   $("#city").onEnter("tab");
          //   $("#Address").onEnter("tab");
          //   $("#E_mail").onEnter("tab");
          //   $("#file").onEnter("tab");
          //   $("#Password").onEnter("tab");
          //   $("#Re-password").onEnter("tab");
          //   $("#Checkbox").onEnter("tab");
          // });

          // if (window.jQuery) {
          //   (function ($) {
          //     $.fn.onEnter = function (opt1, opt2, opt3) {
          //       return this.on("keyup", function (e) {
          //         var me = $(this);
          //         var code = e.keyCode ? e.keyCode : e.which;
          //         if (code == 13) {
          //           if (typeof opt1 == "function") {
          //             opt1(me, opt2);
          //             return true;
          //           } else if (opt1 == "tab") {
          //             var eles = $(document)
          //               .find("input,select,textarea,button")
          //               .filter(":visible:not(:disabled):not([readonly])");
          //             var foundMe = false;
          //             var next = null;
          //             eles.each(function () {
          //               if (!next) {
          //                 if (foundMe) next = $(this);
          //                 if (JSON.stringify($(this)) == JSON.stringify(me))
          //                   foundMe = true;
          //               }
          //             });
          //             next.focus();
          //             if (typeof opt2 === "function") {
          //               opt2(me, opt3);
          //             }
          //             return true;
          //           }
          //         }
          //       }).on("keydown", function (e) {
          //         var code = e.keyCode ? e.keyCode : e.which;
          //         if (code == 13) {
          //           e.preventDefault();
          //           e.stopPropagation();
          //           return false;
          //         }
          //       });
          //     };
          //   })(jQuery);
          // } else {
          //   console.log("onEnter.js: This class requies jQuery > v3!");
          // }