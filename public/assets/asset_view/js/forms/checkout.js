var CheckoutForm = function () {

    return {
        
        //Checkout Form
        initCheckoutForm: function () {
	        // Validation
	        $('#sky-form').validate({
	            // Rules for form validation
	            rules:
	            {
                    username:
	                {
	                    required: true
	                },
                    userpassword:
	                {
	                    required: true
	                },
                    confirmpassword:{
                        required: true,
                        equalTo:"#password"
                    },

	                email:
	                {
	                    required: true,
	                    email: true
	                },
                    firstname:
	                {
	                    required: true
	                },
                    lastname:
	                {
	                    required: true
	                },
                    address:
	                {
	                    required: true
	                },
                    city:
	                {
	                    required: true,
	                },
                    country:
	                {
	                    required: true
	                },
                    zipcode:
	                {
	                    required: true
	                },
                    phone_number:
	                {
	                    required: true
	                },
                    checkbox:
                    {
                        required: true
                    }
	            },
	                                
	            // Messages for form validation
	            messages:
	            {
                    username:
                    {
                        required: 'Please enter your user name'
                    },
                    userpassword:
                    {
                        required: 'Please enter your user password'
                    },
                    confirmpassword:
                    {
                        required: 'Please enter your confirm password',
                        equalTo : 'Please insert correct confirm password'
                    },
                    email:
                    {
                        required: 'Please enter your email address',
                        email: 'Please enter a VALID email address'
                    },
                    firstname:
	                {
	                    required: 'Please enter your first name'
	                },
                    lastname:
	                {
	                    required: 'Please enter your last name'
	                },
                    address:
                    {
                        required: 'Please enter your full address'
                    },
                    city:
                    {
                        required: 'Please enter your city'
                    },
                    country:
                    {
                        required: 'Please select your country'
                    },
                    zipcode:
                    {
                        required: 'Please enter zip code'
                    },
                    phone_number:
	                {
	                    required: 'Please enter your phone number'
	                },
                    checkbox:
                    {
                        required: 'Please check about the terms and conditions'
                    }
	            },                  
	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        }

    };

}();