$(document).ready(function() {
    $("#SignUpForm").validate({ // Replace "#myForm" with your form's actual ID
      rules: {
        username: {
          required: true,
          minlength: 3
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 8
        },
        ConfirmPassword: {
          required: true,
          equalTo: "#floatingPassword" // Ensure passwords match
        },
        phone: {
          required: true,
          // Add phone number validation rule if needed (e.g., regex)
        },
        image: {
          // required: true
        }
      },
      messages: {
        username: {
          required: "<span style='color: red;'>Please enter a username</span>",
          minlength: "<span style='color: red;'>Username must be at least 3 characters long</span>"
        },
        email: {
          required: "<span style='color: red;'>Please enter your email address</span>",
          email: "<span style='color: red;'> enter a valid email address</span>"
        },
        password: {
          required: "<span style='color: red;'>Please enter a password</span>",
          minlength: "<span style='color: red;'>Password must be at least 8 characters long</span>"
        },
        ConfirmPassword: {
          required: "<span style='color: red;'>Please confirm your password</span>",
          equalTo: "<span style='color: red;'>Passwords do not match</span>"
        },
        phone: {
          required: "<span style='color: red;'>Please enter your phone number</span>"
        },
        image: {
          required: "<span style='color: red;'>Please select a profile image</span>"
        }
      },
      submitHandler: function(form) {
        // Prevent default form submission
        event.preventDefault();
  
        // Use AJAX to submit form data to the PHP controller
        var formData = new FormData(form); // For handling file uploads
        $.ajax({
          url: $(form).attr("action"), // Get form action URL
          type: "post",
          data: formData,
          processData: false,
          contentType: false, // Important for file uploads
          success: function(response) {
            // Handle successful submission (e.g., display success message)
            console.log(response);
            window.location.href='SignUpOtp.php';// For debugging purposes
            // You can redirect or display a success message here
          },
          error: function(jqXHR, textStatus, errorThrown) {
            // Handle errors during submission (e.g., display error message)
            console.error("Error:", textStatus, errorThrown);
            // You can display an error message here
          }
        });
      }
    });
  });
  