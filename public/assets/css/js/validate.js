
	$("#validation").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
 		rules: {
			"firstname": {
				required: true,
				maxlength: 15,
			},
            "lastname": {
				required: true,
				maxlength: 15
			},
            "email": {
				required: true,
                email: true,
                valid_email: true
			},
             "password": {
                required: true,
                minlength: 8
        },
            "re-password": {
                equalTo: "#password",
                minlength: 8				
        },
            "phone": {
				required: true,
				maxlength: 10,
                number: true,
                matches:"[0-9]+",minlength:10,
                digits: true
			},
            // "user_flg": {
			// 	required: true,
			// },
            "address": {
				required: true,
				minlength: 2
			},
            "birth": {
				required: true,
				maxlength: 15,
                date:true,
                minAge:10,
			},
            "information": {
				required: true,
				minlength: 2,
			},
      
		},
//     messages: {
// 				"firstname": {
// 					required: "Firstname is required",
// 					maxlength: "Please enter up to 15 characters"
// 				},
// 				"lastname": {
// 					required: "Lastname is required",
// 					minlength: "Please enter at least 8 characters"
// 				},
// 				"email": {
// 					required: "Email is required",
// 				},
//                 "password": {
//                     required: 'Password is required',
//                     minlength: "Please enter at least 8 characters"
//                     },
//                 "re-password": {
//                     equalTo: " Please enter your correct password",
//                     minlength: "Please enter at least 8 characters"				
//                     },
//                 "address": {
//                     required: "Address is required",
//                     maxlength: "Please enter up to 20 characters"
//                         },
//                 // "user_flg": {
//                 //     required: "Role is required",
//                 // },
//                 "birth": {
//                     required: "Birth is required",
//                     maxlength: "Please enter up to 15 characters",
//                      date:"Date of birth should be a valid date",
//                      minAge:"You must be at least 10 years old",
//                         },
//                 "information": {
//                     required: "Information is required",
//                     minlength: "Please enter at least 2 characters"
//                         },
//                 "phone": {
//                     required: "Phone is required",
//                     maxlength: 'Please enter up to 10 characters',
//                     digits: "Please type number only"
//                 },
// 			},
//             highlight: function(element) {
//                 $(element).css('text', '#ffdddd');
//             },
//             unhighlight: function(element) {
//                 $(element).css('text', '#ffffff');
//             }
            
   });
$(document).ready(function(){
    var firstname=$("#firstname");
        var error_firstname=$("#error-firstname");
        function checkName(){
            var re=/^([A-Z]{1}[a-z]*\s)*([A-Z]{1}[a-z]*)$/;
            if(firstname.val()===""){
                error_firstname.html("Firstname is required");
                return false;
            }
            if(!re.test(firstname.val())){
                error_firstname.html("Capitalize first letter");
                return false;
            }
            error_firstname.html("(*)");
            return true;
        }       
        firstname.blur(checkName);
   //lastname
   var lastname=$("#lastname");
        var error_lastname=$("#error-lastname");
        function checklName(){
            var re=/^([A-Z]{1}[a-z]*\s)*([A-Z]{1}[a-z]*)$/;
            if(lastname.val()===""){
                error_lastname.html("Firstname is required");
                return false;
            }
            if(!re.test(lastname.val())){
                error_lastname.html("Capitalize last letter");
                return false;
            }
            error_lastname.html("(*)");
            return true;
        }       
        lastname.blur(checklName);
        //address
    var address=$("#address");
    var error_address=$("#error-address");
    function checkAddress(){
        var re=/^([A-Z]{1}[a-z]*\s)*([A-Z]{1}[a-z]*)$/;
        if(address.val()===""){
            error_address.html("address is required");
            return false;
        }
        if(!re.test(address.val())){
            error_address.html("Capitalize first letter");
            return false;
        }
        error_address.html("(*)");
        return true;
    }       
    address.blur(checkAddress);

     //phone
     var phone=$("#phone");
     var error_phone=$("#error-phone");
     function checkphone(){
         var re=/^([0-9]{9,})$/;
         if(phone.val()===""){
             error_phone.html("phone is required");
             return false;
         }
         if(!re.test(phone.val())){
             error_phone.html("Please type number only");
             return false;
         }
         error_phone.html("(*)");
         return true;
     }       
     phone.blur(checkphone);
     //email
     var email=$("#email");
     var error_email=$("#error-email");
     function checkEmail(){
         var re=/^([A-Za-z0-9]){3,}@(gmail.com)$/;
                     if(email.val()===""){
             error_email.html("Email is required");
             return false;
         }
         if(!re.test(email.val())){
             error_email.html("incorrect format");
             return false;
         }
         error_email.html("(*)");
         return true;
     }
     
     email.blur(checkEmail);
     //birth
     var birth=$("#birth");
            var error_birth=$("#error-birth");
            function checkBirth(){
                
                if(birth.val()===""){
                    error_birth.html("Birth is required");
                    return false;
                }
                var year= new Date(birth.val());
                if(year.getFullYear()>2005){
                    error_birth.html("You must be at least 18 years old");
                    return false;
                }
              error_birth.html("(*)");
                return true;
            }birth.blur(checkBirth);
    
    $("#btnsave").click(function(){
        if(!firstname() | !lastname() | !email() | !birth() | !address() |!phone()){
            $("#tb").html("điền đầy đủ");
            return false;
        }
    })
	
})


