         function myFunction() {
          var x = document.getElementById("myTopnav");
          console.log(x);
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
const login=document.getElementById("login");
const emaillogin=document.getElementById("emaillogin");
const passwordlogin=document.getElementById("passwordlogin");

const errorlogin=document.getElementById('error');


login.addEventListener("submit",(e)=>{

    let message=[];

    if(emaillogin.value == "" || passwordlogin.value =="" ){

        message.push("ce champs est obligatoire");
    
    }
     
    if(passwordlogin.value.length <= 6){


        message.push("le Mot de passe ne correspond pas ou email est déja pris  ");

    }
  if(passwordlogin.value.length>20){

    message.push("le mot de passe ou email n'est pas valide ");
  }
                if(message.length > 0 ){

                    e.preventDefault()
                    errorlogin.innerHTML=message.join(', ')
                }


              });



              


              