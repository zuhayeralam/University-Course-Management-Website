function changeTab(ref){
   try {
   if(ref.getAttribute("data-tab") == "reg-student-form"){
     document.getElementById("form-body").classList.remove('active');
     ref.parentNode.classList.remove('reg-tab-switch');
   } else {
     document.getElementById("form-body").classList.add('active');
     ref.parentNode.classList.add('reg-tab-switch');
   }
   } catch(err){
     console.log(err);
   }
 }