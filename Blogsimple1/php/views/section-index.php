 <link rel="stylesheet" href="assets/css/style.css">

<?php


$success="";




$errors=[];

$users=new User();
  

if($users->logged()){

$users->redirect("admin.php");
}


if(isset($_POST["login"])){
$username=trim($_POST["user_name_email"]);
$email=trim($_POST["user_name_email"]);
$password=trim($_POST["password"]);


if(empty($username)||empty($email)){

    array_push($errors,"veuillez entrez le email ou username");
}

elseif(empty($password)){

    array_push($errors,"veuillez entrez le mot de passe ");
}

else{
    if($users->login($username,$email,$password)){

        $users->redirect("admin.php");
    }

    else{
        array_push($errors,"Incorrect log-in credentials.");
    }

}

}



if(isset($_POST["register"])){


$username=trim($_POST["username"]);
$email=trim($_POST["email"]);
$password=trim($_POST["password"]);
$confirm=trim($_POST["confirm"]);

if(empty($username)){

    echo "Veuillez Entrez votre nom";
}
if(empty($email)){
    array_push($errors, "Veuillez Entrez VOtre email ");
}


if(empty($password)){

    array_push($errors,"veuillez entrez le mot de passe ");
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

array_push($errors,"veuillez entrer l'email correctement");
}

if($password!=$confirm){

array_push($errors,"le mot de passe ne correspond pas ");
}

else{

    try{

        $sql="SELECT username,email FROM users WHERE username=:username OR email=:email";
    

      $query=DataBase::connexion()->prepare($sql);

       $query->bindParam(":username",$username);
       //:username c'est un parametre temporaire pour $username
       $query->bindParam(":email",$email);
       //BindParam for a prepared statement using named placeholder 
       $query->execute();
        
       $Fetch_rows=$query->fetch(PDO::FETCH_ASSOC);
      
         
      if(isset($Fetch_rows["username"])==$username ){
        array_push($errors,"ce nom est déjà pris");
           
      }

      elseif(isset($Fetch_rows["email"])==$email){

        array_push($errors,"cette email est déjà pris");
      }

      else{
     
  
     if(isset($Fetch_rows["username"])!=$username&&isset($Fetch_rows["email"])!=$email){
       
        $users->register($username,$email,$password);

        $success="You Have Successfully Created Your Account";

     }
    }
    
      


}
  catch(PDOException $e){

        array_push($errors, $e->getMessage());

    }
}
}

?>


<!--  Formulaire de connexion     -->



<div class="big-img"> 
<!-- <img src="assets/img/pexels-xxss-is-back-777001.jpg"  alt=""> -->




    
 <!-- Section- ____________________ Connextion -->
 
<section>       
<div class="FormLogin">

  <?php if(count($errors)): ?>

           <ul>
           <?php foreach($errors as $error): ?>
            <h3 style="color:red;" ><?= $error ?></h3>
            <?php endforeach ?>
           </ul>
           <?php endif ?> 

           <?php  echo "<h3color:red;>{$success}</h3color:red;>";?>
<form action="index.php" method="POST" class="form" focus>
<h3>Connexion</h3>
<div class="forms-control">
<label for="user_name_email">Username or E-mail Address</label>
<input type="text" name="user_name_email" id="user_name_email" onf required>

</div>
<div class="forms-control">
<label for="password">Password</label>
<input type="password" name="password" id="user_password" required>
</div>

<button type="submit" class="btn"  name="login" value="login">Connexion</button>

<a href="#" class="signup">Sign Up</a>
</form> 

</div>
           </section>
      
           

<!--       Formualire de Creation       -->
<section>

<div class="FormRegister cache">

<ul>
  
        <h3 style="color:red;" id="errorServer" errorPhp="<?php foreach ($errors as $error) {  $error; } ?>"></h3>
  
</ul>



<form action=""  class="form" id="form" method="POST">
<h3>Register</h3>
<div id="error"></div>
<div id="error2"></div>

<div class="forms-control">
<label for="username">Username:</label>
<input type="text" name="username" id="username" required>
</div>

 <div class="forms-control">
<label for="email">Email</label>
<input type="email" name="email" id="email" required>

    </div>

<div class="forms-control">
<label for="password">Password:</label>
<input type="password" name="password" id="password" required>

    </div>
<div class="forms-control">
<label for="confirm">PasswordConfirm</label>
<input type="password" name="confirm" id="password2" required>

 </div>
<button   class="btn" type="submit" name="register"  value="register">SignUp</button>
<a href="#" class="login">Do you have already an account</a>
</form>

    </div>
     </section>
       

     </div>
<?php require_once "php/views/footer.php";