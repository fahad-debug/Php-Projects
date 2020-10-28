<?php 

//   $vo=Model::Voir();

// foreach($vo as $f){

//    extract($f);
   
//      echo $email;
// }
//       ?>
<link rel="stylesheet" href="assets/css/style.css">
    <h2>Accueil</h2>
       
    <!-- ------------------------------- LOGIN -------------------------------------- -->
    <section class="login"> 
    
      <h3>FORMULAIRE DE LOGIN</h3>   
      <form  class="login" id="login" action="" method="POST">

        <label for="email">Email</label>
        <input type="email" id="emaillogin"  required placeholder="Entrer votre Email"name="email">

        <label for="password">Mot de Passe</label>
        <input type="password" required placeholder="Entrer votre Mot de Passe" id="passwordlogin" name="password">
        <span id="error"></span>
        <button  type="submit" class="big-button">SE CONNECTER</button>
        <input type="hidden" name="login" value="login">
        <span class="labelNone">Besoin d'un Compte ?<span> <span onclick="myfunction()" class="aa"><a href="#">S'inscrire</a></span>
      </form>

    </section>
                    
   
    <!-- ---------------------------- REGISTER ------------------------------------ -->


    <section class="register cache">
       <h3>FORMULAIRE D'INSCRIPTION</h3>
       <form method="POST"  action="" id="registerfrom">
        
        <label for="email">Email</label>  
        <input type="email" id="emailregister"  required placeholder="Entrer votre Email" name="email">

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" requried placeholder="Entrer votre Nom d'Utilisateur">

        <label for="password">Mot de Passe</label>

        <input type="password"  required placeholder="Entrer votre Mot de Passe" id ="passwordregister" name="password">
        <label for="password">Confirmer le Mot de passe </label>
        <input type="password" required placeholder="Confirmer le mot Mot de Passe" id="password2" name="password2">
        <span id="errorR"></span>
        <button  type="submit" name="submit" class="big-button">CREER VOTRE COMPTE</button>
        

        <input type="hidden" name="register" value="register">
      <span onclick="myfunction2()" class="labelNone"><a href="#">Vous avez déjà un Compte ?</a></span>
    
      </form>

    </section>







   
<script>

const email=document.getElementById("emailregister");
const password=document.getElementById("passwordregister");
const password2=document.getElementById("password2");
const username=document.getElementById("username");
const register=document.getElementById("registerfrom");
const error=document.getElementById('errorR');




register.addEventListener("submit",(e)=>{


   
    let message=[];

    if(email.value == "" || password.value =="" || username.value==""){

        message.push("ce champs est obligatoire");
        
   email.value.trim();
   password.value.trim();
   username.value.trim();
   password2.value.trim();
    
    }
 
     
    if(password.value.length <= 6){


        message.push("le Mot de passe ne correspond pas ou email est déja pris  ");

    }
  if(password.value.length>20){

    message.push("le mot de passe ou email mal forme ");
  }
   
  if(password2.value !== password.value){
          e.preventDefault();
    message.push("le Mot de passe ne correspond pas");
  }
                if(message.length > 0 ){

                    e.preventDefault()
                   
                    error.innerHTML=message.join(', ')
                }


})


function myfunction ()
{
   var register=document.querySelector(".register");
   register.classList.remove("cache");
   var login=document.querySelector(".login");
   login.classList.add("cache");
}
function myfunction2()
{
   var register=document.querySelector(".register");
   register.classList.add("cache");
   var login=document.querySelector(".login");
   login.classList.remove("cache");

}



</script>


<script src="assets/js/app.js"></script>



      