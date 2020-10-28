

<?php 

 


   class HandelUser extends Application

   {    
      
   
       static  $ready;
       static  $error;
     //  static $reg;
     //la visibilité d'une proprété , dune méthode ou peut etre
     // définie en prefixant sa delaration avec un mot
     //clé  public .protected .private 
     //public accessible partout . 
     //l'accès aux éleéments protégés est limité à classe elle même
  
     //ainsi qu'aux classes qui en héritent et parente 
     //privé est uniquement réservé 1a la classe qui les a définis 
     //une classe hértée est définie à l'aide du mot clé extends 

      protected function login()
   {

      
       
     //cest un moyen de stocker des inforamtion 
     //dans des variables à utiliser sur plusieurs pages 
      // une sssion est lancée avec la foncion session_start()

      $login="";

      $login=$_REQUEST["login"]??"";

      if($login=="login"){

      //session)start() function 
       session_start();
     
      if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
       header("location: php/view/section-admin.php");
       exit;
     

           }


      if(isset($_REQUEST["email"])&&
        isset($_REQUEST["password"])&&
         $_REQUEST["email"]!=""&&
         $_REQUEST["password"]!=""&&
         trim($_REQUEST["email"])&&
         trim($_REQUEST["password"]))
      {

   
      
         $emailEntered=$_REQUEST["email"]??"";
         $passwordEntered= $_REQUEST["password"]??"";
   

   
   //  $objet4=new Model;
   //  $objet4->Read("users","email",$emailEntered);

   $Result=Model::Read("users","email",$emailEntered);
   
   $passwordHash=password_hash($passwordEntered, PASSWORD_DEFAULT);
   
     
              
    foreach($Result as $arr){
   
    extract($arr);
    
     

      
   
   
         if(!empty($arr)){
                   
             
               
   
             if(password_verify($passwordEntered,$password))
                 
        {    

                   
         $_SESSION['login']=true;
         $_SESSION["username"]=$username;
         header("location:php/view/section-admin.php");
        

         
         

         //echo HandelUser::$ready ="<script>window.location.href='php/view/section-admin.php'</script>";
      
        }  
           
        }
         
   }
   
   }
        
   }
  
}
       protected function CreateUser()
   {
         
            
    
    static $ArrayAsso=[];
    static $register="";
//we use function isset si email est existe pour verifier
//Vérifiez si une variable est vide. Vérifiez également si la variable est définie / déclarée: 
   
   if(isset($_REQUEST["email"])&&
    isset($_REQUEST["username"])&&
    isset($_REQUEST["password"])&&
    trim($_REQUEST["username"])&&
    !empty($_REQUEST["username"])&&
    trim($_REQUEST["password"])&&
    !empty($_REQUEST["password"])&&
    trim($_REQUEST["email"])&&
    !empty($_REQUEST["email"]))
   
             
      {
        
   $username=$_REQUEST["username"]??"";
   $_SESSION["username"]=$username;
   

     $email=$_REQUEST["email"]??"";
     $_SESSION["email"]=$email;
     $ArrayAsso=[
   
     "email"=>$_REQUEST['email']??"",
     "username"=>$_REQUEST["username"]??"",
     "password"=>$_REQUEST['password']?? "",
     
    ];
   
   
     
    $register=$_REQUEST["register"]??"";
   
    if($register =="register"){
       
      $Result=Model::Read("users","email",$ArrayAsso["email"]);
   
      foreach($Result as $table){
       
       extract($table);}
     
       if("email"!=$ArrayAsso["email"])
       {
     
       
   echo HandelUser::$ready ="<script>window.location.href='index.php'</script>";
       

     
    
    $ArrayAsso['password']=password_hash($ArrayAsso["password"],PASSWORD_DEFAULT);
   
 
   //   }
          
   
   $RequetSql=
   
   <<<CODE
   
   INSERT INTO users
    (email,username,password) 
   
   VALUES
   (:email,:username,:password)
   
   CODE;
     
   

  // echo HandelUser::$ready ="<script>window.location.href='index.php'</script>";
         
         // Model::SendToSql($RequetSql,$ArrayAsso);

         //le deux manière fonctionne :: ou instancier 
         $objetModel=new Model;
         $objetModel->SendToSql($RequetSql,$ArrayAsso);
       
       }   
   }
   
    } 
   } 
         
   

   public function update()
   
   {  
      $table=
      [
             "id"=>$_REQUEST["id"],
             "email"=>$_REQUEST["email"],
             "username"=>$_REQUEST["username"],
             "password"=>$_REQUEST["password"]];
   
      $request="UPDATE users SET email=:email,username=:username,password=:password WHERE id=:id";
      
      Model::SendToSql($table,$request);
   }

   public function delete()
    
   {
        $table=["id"=>$_REQUEST["id"]];

        $request="DELETE FROM users WHERE id=:id";

         Model::SendToSql($table,$request);
    }   
          


}
