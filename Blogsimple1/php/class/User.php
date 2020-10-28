

<?php
   
require_once "database.php";
    
class User

{
    private $db;

  //INstantiate object with data base connection 
    public function __construct()
    {

        $this->db=DataBase::connexion();
    }

    public function register($username,$email,$password){



     try{
           $passwordHashed=password_hash($password,PASSWORD_DEFAULT);


           $sql="INSERT INTO users(username,email,password)VALUES(:username,:email,:password)";
            
       
           $query=$this->db->prepare($sql);
            
           $query->bindParam(":username",$username);
           $query->bindParam(":email",$email);
           $query->bindParam(":password",$passwordHashed);

           $query->execute();
     }
     catch(PDOException $e){

           array_push($errors,$e->getMessage());
     }
             
    }

    // this function is private and can only be used inside this class
    // private function setToUpper($str) {
    //   return strtoupper($str);
    // }


    public function login($username,$email,$password){

      // $username = $this->setToUpper($username);


      try{

           $sql="SELECT * FROM users WHERE username=:username OR email=:email LIMIT 1";

             $query=$this->db->prepare($sql);
           //The PDOStatement::bindParam() function is an inbuilt
           // function in PHP which is used to bind a parameter
           // to the specified variable name. This function 
           //bound the variables, pass their value as input 
           //and receive the output value, if any,
           // of their associated parameter marker.
        
           $query->bindParam(":username",$username);
           $query->bindParam(":email",$email);

           $query->execute();


          $retourne_ligne=$query->fetch(PDO::FETCH_ASSOC);





          if($query->rowCount() > 0){


            if(password_verify($password,$retourne_ligne["password"]))
            {

                $_SESSION["user_session"]=$retourne_ligne["id"];
                //on va stocker user_session=$retourne_ligne[]
                return true;

            }

            return false;
          }
       
      }

      catch(PDOException $e){
        array_push($errors,$e->getMessage());
      }

       

    }


        public function logged(){

      if(isset($_SESSION["user_session"])){
       
         return true;

      }
    }


    public function redirect($url){

      header("location:$url");

    }

    public function logout(){

      session_destroy();
      unset($_SESSION["user_session"]);
      return true;
    }

    public function findBy(){
   
      $sql="SELECT * FROM users WHERE id=:id";

      return $sql;
      
    }


        //username,email,password c'est les colonnes dans
           // les bases des donneés 
           // VALUES ces sont  nos variables que nous avons crées 
         //  $sql="INSERT INTO people (username,gender ,country ) VALUES (?,?,?);";
        
}





      