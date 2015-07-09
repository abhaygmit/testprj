
$(function(){
	$.validator.addMethod("alphanum", function(value, element) { 
		return this.optional(element) || /^[a-z0-9/_ '']+$/i.test(value); 
	}, "Please enter only alphanumeric digits/characters.");

 	jQuery.validator.addMethod("exactlength", function(value, element, param) {  
 		return this.optional(element) || value.length == param;
  	}, jQuery.format("Please enter exactly {0} digits/characters."));
  	
  	$.validator.addMethod('lessThanEqual', function(value, element, param) {
    	return this.optional(element) || parseInt(value) > parseInt($(param).val());
	}, "End time should not be less than or equal to start time");
  	
  	$.validator.addMethod('greaterThanEqual', function(value, element, param) {
    	return this.optional(element) || parseInt(value) >= parseInt($(param).val());
	}, "Please select the correct value.");
	
	$.validator.addMethod('greaterThan', function(value, element, param) {
    	return this.optional(element) || parseInt(value) > parseInt($(param).val());
	}, "Please select the correct value.");
	
	jQuery.validator.addMethod("captchaCode", function(value, element, param) {
  return this.optional(element) || value == param;
}, "Please specify a different (non-default) value");
	
	$.validator.addMethod("alphabetOnly", function(value, element) { 
		return this.optional(element) || /^[a-z,0-9, ' ]+$/i.test(value); 
	}, "Please enter only alphabet characters.");
	
	$.validator.addMethod("numberOnly", function(value, element) { 
		return this.optional(element) || /^[0-9]+$/i.test(value); 
	}, "please enter numbers greater than 0.");


	
 }); 	
 
 /*-----------User registration form---------------*/
 $(document).ready(function() {
	 
	$("#registration_form").validate({
		
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"fullname": {
                       required: true,
					   maxlength:20,
					   minlength:4,
					   alphabetOnly:true
				     
           		},
               "email": {
                       required: true,
					   email:true
					  
           		},
				"password": {
                       required: true,
					   minlength:8,
					   maxlength:35
					  
           		},
				"confirm": {
                       required: true,
					    minlength:8,
					   maxlength:35, 
					   equalTo: "#password",
					  
           		},
				"gender": {
                       required: true,
					   
           		},
				
        }
   })
});

/*-----------User login form---------------*/
 $(document).ready(function() {
	 
	$("#login_form").validate({
		
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				
               "username": {
                       required: true,
					   email:true
					  
           		},
				"password_login_bottom": {
                       required: true,
					   minlength:4,
					   maxlength:35
					  
           		},
				"practice_id_login": {
                       required: true,
					   
					  
           		},
				
				
        }
   })
});
/*-----------User login form Top---------------*/
 $(document).ready(function() {
	 
	$("#login_form_top").validate({
		
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				
               "username_login": {
                       required: true,
					   email:true
					  
           		},
				"password_login": {
                       required: true,
					   minlength:8,
					   maxlength:35
					  
           		},
				"practice_login": {
                       required: true,
					   
					  
           		},
				
				
        }
   })
});
 
 /*-----------User payment form---------------*/
 $(document).ready(function() {
	 
	$("#payment_form").validate({
		
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
			
				"firstName": {
                       
					   required:true,
					   maxlength:30,
					   minlength:2,
					   alphanum:true
				     
           		},
				"lastName": {
                       
					   required:true,
					   maxlength:30,
					   minlength:1,
					   alphanum:true
				     
           		},
				"address1": {
                       
					   required:true,
					   maxlength:30,
					   minlength:4,
					   alphanum:true
				     
           		},
               "address2": {
                      //required:true,
					   maxlength:30,
					   minlength:4,
					   alphanum:true 
           		},
				"city": {
                      required:true,
					   maxlength:30,
					   minlength:4,
					   alphanum:true
					  
           		},
				"state": {
						required:true,
                       maxlength:30,
					   minlength:4,
					   alphanum:true
           		},
				"zip": {
						required:true,
                       maxlength:6,
					   minlength:4,
					   number:true
           		},
				"creditCardType": {
					   required:true,
                       
           		},
				"creditCardNumber": {
						required:true,
                       maxlength:16,
					   minlength:10,
					   number:true
           		},
				"expDateMonth": {
					   required:true,
                       
           		},
				"expDateYear": {
					   required:true,
                       
           		},
				"cvv2Number": {
						required:true,
                       maxlength:3,
					   minlength:1,
					   number:true
           		},
				
        }
   })
});
 

/**** method used in Template page. *******/
  
  $(document).ready(function() {
	$("#scheduleTemplate").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"txType": {
                       required: true,
				     
           		},
				 "dsetName": {
                       required: true,
				       minlength: 1,
				       maxlength: 30,
					   alphanum:true
					   
           		},
               "noChair": {
                       required: true,
				       minlength: 1,
				       maxlength: 3,
					   number:true,
					   numberOnly:true
           		},
			    "noDoc": {
			         required: true,
			         minlength: 1,
			         maxlength: 3,
					 number:true,
					 numberOnly:true
			    },
			   
			    "scheduleT": {
			         required: true,
			         
			     },
			    
				 
			    "startTime": {
			         required: true,
					 
			         
			    },
				
			    
        }
   })
});

 
 /*-----------Op_Admin add/Edit classes form---------------*/
 $(document).ready(function() {
	$("#addClass22222").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"clName": {
                       required: true,
					   maxlength:20,
					   minlength:4,
					   alphanum:true
				     
           		},
               "colorCode": {
                       required: true,
				       minlength: 1,
				       maxlength: 10,
					  
           		},
			    "status": {
			         required: true,
			         
			    },
				
				 "classAttribute": {
                       required: true,
							  
           		},
			    "timeAttribute": {
			         required: true,
			         
			    },
			    
        }
   })
});


 /*-----------Op_Admin Schedule time form---------------*/
 $(document).ready(function() {
	$("#scheduleTime").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"month": {
                       required: true,
					  
           		},
               "year": {
                       required: true,
				      
           		}
			    
        }
   })
});

 /*-----------Op_Admin manage hour monthly form---------------*/
 $(document).ready(function() {
	$("#manageMonthly").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"month1": {
                       required: true,
					  
           		},
               "year": {
                       required: true,
				      
           		}
			    
        }
   })
});

/*-----------Op_Admin manage hour weekly form---------------*/
 $(document).ready(function() {
	$("#manageWeekly").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"month2": {
                       required: true,
					  
           		},
               "year2": {
                       required: true,
				      
           		}
			    
        }
   })
});

/*-----------Op_Admin manage Practice inputs form---------------*/
 $(document).ready(function() {
	$("#manage_inputs").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"e_tx_len": {
                       required: true,
					    maxlength:3,
						number:true,
						
					  
           		},
               "e_conv_rate": {
                       required: true,
					   maxlength:2,
					   number:true
				      
           		},
				"annual_goal": {
                       required: true,
					   maxlength:2,
						number:true
					  
           		},
               "avg_tx_intvl": {
                       required: true,
					   maxlength:2,
						number:true
				      
           		},
				"active_P": {
                       required: true,
					   maxlength:5,
						number:true
					  
           		},
               "no_chairs": {
                       required: true,
					   maxlength:3,
						number:true
				      
           		},
				"no_rooms": {
                       required: true,
					   maxlength:3,
						number:true
					  
           		},
               "no_docs": {
                       required: true,
					   maxlength:3,
						number:true
				      
           		},
				"avg_tx_fee": {
                       required: true,
				      maxlength:6,
						number:true
           		}
				
			    
        }
   })
});



  /*-----------Op_Admin add/Edit Procedure form---------------*/
 $(document).ready(function() {
	$("#addProcedure").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"procName": {
                       required: true,
					   maxlength:20,
					   minlength:4,
					   alphanum:true
				},
            	"class_id": {
			         required: true,
			    },
				"procAbbr": {
			         required: true,
					 minlength:3,
					 maxlength:5,
					 alphanum:true
			    },
				"procLength": {
			         required: true,
			    },
				"price": {
					 maxlength:6,
					 number:true
			    },
			    "status": {
			         required: true,
			    },
				"procWeight": {
			         required: true,
			    },
			    
        }
   })
});

 
  /*-----------Op_Admin add/Edit Doctor form---------------*/
 $(document).ready(function() {
	$("#addDoctor").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"docName": {
                       required: true,
					   maxlength:20,
					   minlength:4,
					   alphanum:true
				     
           		},
               "email": {
                       required: true,
					   email:true
					  
           		},
				"qualification": {
			         required: true,
					 maxlength:20,
					   minlength:4, 
					   alphanum:true
			         
			    },
				"address": {
			         required: true,
					 maxlength:20,
					   minlength:4 
					   
			         
			    },
				"city": {
			         required: true,
					 maxlength:20,
					   minlength:4,
					   alphanum:true
				     
			    },
				"state": {
			         required: true,
					 maxlength:20,
					   minlength:4,
					   alphanum:true
			          
			    },
				"zip": {
			         required: true,
					 maxlength:6,
					 numberOnly:true
			         
			    },
				"phone": {
			         required: true,
					 minlength:8,
					 maxlength:12,
					 numberOnly:true
			         
			    },
				"colorCode": {
                       required: true,
				       minlength: 1,
				       maxlength: 10,
					  
           		},
			    "status": {
			         required: true,
					
			         
			    },
        }
   })
});

  /*-----------Op_Admin add/Edit Treatment form---------------*/
 $(document).ready(function() {
	$("#addTreatment").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"proc_id": {
                       required: true,
				     
           		},
               "treatName": {
                       required: true,
					   maxlength:20,
					   minlength:4,
					   alphanum:true
				       
           		},
				"treatTime": {
                       required: true,
					  
				       
           		},
				 "price": {
			         required: true,
					 numberOnly:true
			         
			    },
			    "status": {
			         required: true,
			         
			    },
			    
        }
   })
});
/*-----------Op_Admin add/Edit Time Interval form---------------*/
 $(document).ready(function() {
	$("#addBreak").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"breakType": {
                       required: true,
					   maxlength:20,
					  // minlength:4, 
					   alphanum:true
				     
           		},
               "tmInterval": {
                       required: true,
				       
           		},
				 "noOfBreaks": {
                       required: true,
				       
           		},
				 "applyTime": {
                       required: true,
				       
           		},
				 "timeAttribute": {
                       required: true,
				       
           		},
				 
			    "status": {
			         required: true,
			         
			    },
			    
        }
   })
});

/*-----------Op_Settings Change password ---------------*/
 $(document).ready(function() {
	$("#changePass").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"curr_pass": {
                       required: true,
					   minlength:8,
					   maxlength:30
				     
           		},
               "new_pass": {
                      required: true,
					   minlength:8,
					   maxlength:30
				       
           		},
				 
			    "confirmPass": {
			         required: true,
					   minlength:8,
					   maxlength:30,
					   equalTo:'#new_pass'
			         
			    },
			    
        }
   })
});


/*-----------Change password after forgot password ---------------*/
 $(document).ready(function() {
	$("#changepassword_form").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				
               "new_pass": {
                      required: true,
					   minlength:8,
					   maxlength:30
				       
           		},
				 
			    "cnew_pass": {
			         required: true,
					   minlength:8,
					   maxlength:30,
					   equalTo:'#new_pass'
			         
			    },
			    
        }
   })
});

/*-----------Op_Settings update profile ---------------*/
 $(document).ready(function() {
	$("#updateProfile").validate({
		
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				"uname": {
                       required: true,
					   alphanum:true,
					   maxlength:40
				},
               "email": {
                      required: true,
					  email:true  
           		},
				 
			    "address1": {
			         required: true,
					 maxlength:30,
					 alphanum:true,
				  },
				"state": {
			         required: true,
					 alphanum:true,
					 maxlength:20
				},
				
				 "country": {
			         required: true,
					 alphanum:true,
					 maxlength:20
				  },
				"zip": {
			         required: true,
					 alphanum:true,
					 maxlength:6
				},
				 "phone": {
			         required: true,
					 number:true,
					 minlength:10,
					 maxlength:12
				  },
				
        }
   })
});
/*-----------Schedule time interval implementation ---------------*/
 $(document).ready(function() {
	$("#addScheduleTime").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
				
               "scheduleT": {
                      required: true,
				},
				 
			    "status": {
			         required: true,
					   
			    },
				"otherApt":{
					
						number:true, 
						maxlength:3,	
				}
			    
        }
   })
});

/* ---------Analysis reports------------------*/
$(document).ready(function() {
	$("#getAnalysis").validate({
		debug: false,
		errorClass: "error_txt",
		errorElement: "span",
	 	rules: {
               "selectFrom": {
                      required: true,
				},
				"selectTo": {
			         required: true,
				}
			}
   })
});

