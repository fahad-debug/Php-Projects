<?php

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
     
  

     if($users->register($username,$email,$password)){

        echo "Registerd";
     }

    }

}
  catch(PDOException $e){

        array_push($errors, $e->getMessage());

    }
}
}

?>


<section> 
<!--  Formulaire de connexion     -->

           <h1>bienvenu</h1>


           <?php if(count($errors)): ?>

           <ul>
           <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
            <?php endforeach ?>
           </ul>
           <?php endif ?>

<h2>Log in</h2>
<form action="index.php" method="POST">

<label for="user_name_email">Username or E-mail Address</label>

<input type="text" name="user_name_email" id="user_name_email" required>

<label for="password">PASSWORD:</label>

<input type="password" name="password" id="user_password" required>


<input type="submit" name="login" value="login">

</form> 
           
           
<!--       Formualire de Creation       -->


<?php if (count($errors)): ?>
<p>Error(s):</p>
<ul>
    <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>


<h2>Register</h2>

<form action="index.php" method="POST">

<label for="username">Username:</label>
<input type="text" name="username" id="username" required>

<label for="email">Email</label>

<input type="email" name="email" id="email" required>

<label for="password">Password:</label>

<input type="password" name="password" id="password" required>
<label for="confirm">PasswordConfirm</label>
<input type="password" name="confirm" required>

<input type="submit" name="register" value="register">

</form>

    </section>

