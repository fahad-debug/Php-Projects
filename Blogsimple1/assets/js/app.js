



  inputhidden=document.getElementById("register");
  login=document.querySelector(".login");
  FormContainerLogin=document.querySelector(".FormLogin");
  FormContainerRegister=document.querySelector(".FormRegister");
  signUp=document.querySelector(".signup");
//toggle login &register 
  login.addEventListener('click',()=>{
  signUp.classList.remove("cache");
  FormContainerRegister.classList.add("cache");
  FormContainerLogin.classList.remove("cache");
  login.classList.remove("cache");});


 //function
  signUp.addEventListener("click",()=>
{ FormContainerRegister.classList.remove("cache");
    FormContainerLogin.classList.add("cache");

 });



 inputhidden=document.getElementById("register");
  login=document.querySelector(".login");
  FormContainerLogin=document.querySelector(".FormLogin");
  FormContainerRegister=document.querySelector(".FormRegister");
  signUp=document.querySelector(".signup");
//toggle login &register 
  login.addEventListener('click',()=>{
  signUp.classList.remove("cache");
  FormContainerRegister.classList.add("cache");
  FormContainerLogin.classList.remove("cache");
  login.classList.remove("cache");});


 //function
  signUp.addEventListener("click",()=>
{ FormContainerRegister.classList.remove("cache");
    FormContainerLogin.classList.add("cache");

 });











const form=document.getElementById("form");
const username=document.getElementById("username");
const email=document.getElementById("email");
const password=document.getElementById("password");
const password2=document.getElementById("password2");
const error=document.getElementById("error");
const error2=document.getElementById("error2");
const errorServer=document.getElementById("errorServer");

let errorPhp=errorServer.getAttribute("errorPhp");

form.addEventListener("submit",myfunction)

  function myfunction(e){

    if(errorPhp.length > 0){
   
     e.preventDefault();
    error2.innerHTML=errorPhp;
    console.log(error2);
    }

        
    }

 

  
    

form.addEventListener("submit",function(e){

    let message=[];

    


     if(username.value=="" ||  username.value==null)
     {
         message.push("Veuillez remplir les champs obligatoire");

     }

     if(password.value.lenght<=6){

        message.push("Le Mot de passe doit être au 6 caractères");
     }

     if(email.value=="" || email.value==null)
     {
         message.push("Veuillez remplir les Email");
     }

 
     if(password.value!==password2.value){

        message.push("Le Mot de passes ne correspondent pas ");
     }
       
     if(message.length > 0 ){

        e.preventDefault();
    
        error.innerHTML=message.join(",");
     }
  
        
     
    
    
})

  



