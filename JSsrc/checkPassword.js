function checkPassword(form) { 
   password1 = form.password.value; 
   password2 = form.confirmPassword.value; 

    if (password1 != password2) { 
       alert ("\nPassword did not match. Please try again.") 
       return false; 
   } 
   else{ 
       return true; 
   } 
} 