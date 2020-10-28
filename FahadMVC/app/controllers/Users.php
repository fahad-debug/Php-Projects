<?php

class Users  extends Controller
{

      public function __construct()
      {
          $this->userModel=$this->model("User");
          
      }

      public function register()
      {
          //Check for POST
           if($_SERVER["REQUEST_METHOD"]=="POST")
           {
                //Process Form
               
                //Snaitize POST DATA

                $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
               $data=
               [
               "name"=> trim($_POST["name"]),
               "email"=>trim($_POST["email"]),
               "password"=>trim($_POST["password"]),
               "confirm_password"=>trim($_POST["confirm_password"]),
               "name_err"=>"",
               "email_err"=>"",
               "password_err"=>"",
               "confirm_password_err"=>""];
           

           //Validate Email 

           if(empty($data["email"])){
               $data["email_err"]="Please Enter Email";
           }
           else
           {
                if($this->userModel->findUserByEmail($data["email"])) {
                    $data["email_err"]="Email is already taken";
                }
           }

           if(empty($data["name"])){
               $data["name_err"]="Please Enter Name";
           }

           if(empty($data["password"])){
               $data["password_err"]="please Enter password";
           }
           else if(strlen($data["password"])<6){
               $data["password_err"]="Password must be at least 6 charactoers";
           }
           
           // Validation Confirm Password
           if(empty($data["confirm_password"])){
               $data["confirm_password_err"]="please confirm password";
           }
           else
            {
               if($data["password"]!= $data["confirm_password"]){
                   $data["confirm_password_err"]="Passwords do not match";
               }
           }
           //Make Sure errors are empty 
           
            if(empty($data["email_err"])&&
               empty($data["name_err"])&&
               empty($data["password_err"])&&
               empty($data["confirm_password_err"])){

              $data["password"]=password_hash($data["password"],PASSWORD_DEFAULT);
              if($this->userModel->register($data)){
                  flash("register_success","You are registered Great ");

                  redirect("users/login");
              }

              else{
                  die("something went wrong ");
              }
               }
             else  {
                $this->view("users/register",$data);
             }
             
        }


            else 
            {
                $data=
                [
                "name"=>"",
                "email"=>"",
                "password"=>"",
                "confirm_password"=>"",
                "name_err"=>"",
                "email_err"=>"",
                "password_err"=>"",
                "confirm_password_err"=>""];
                
                $this->view("users/register",$data);
            }

          
           }
      
      public function login()
      {
          //Check for POST
          if($_SERVER["REQUEST_METHOD"]=="POST")
           {
                //Process Form
               
                //Snaitize POST DATA

                $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
               $data=
               [
               "email"=>trim($_POST["email"]),
               "password"=>trim($_POST["password"]),
               "email_err"=>"",
               "password_err"=>"",
               ];
           

           //Validate Email 
           
           if(empty($data["email"])){
            $data["email_err"]="Please Enter Email";
        }
         //Validate Password

        if(empty($data["password"])){
            $data["password_err"]="Please Enter Password";
        
        }

        if($this->userModel->findUserByEmail($data["email"])){
            //User found
        }
        else{
             $data["email_err"]="No user found";
        }
        if(empty($data["email_err"])&&empty($data["password_err"]))
      {
     
           $loggedInUser=$this->userModel->login($data["email"],$data["password"]);

           if($loggedInUser){
            //create Session
            $this->createUserSession($loggedInUser);
           }
           else{
               $data["password_err"]="Password incorrect";

               $this->view("users/login",$data);
           }
        }
     
      else  {
         $this->view("users/login",$data);
      }
     
  }

   //Make sure these are empty 
   
 
           else 
           {
               //Load form
               //init data

               $data=
               [
               "email"=>"",
               "email_err"=>""
               ,"password"=>"",
               "password_err"=>"",
             ];

            //Load View

            $this->view("users/login",$data);
           }
      }

      public function createUserSession($user)
    {
          $_SESSION["user_id"]=$user->id;
          $_SESSION["user_email"]=$user->email;
          $_SESSION["user_name"]=$user->name;
           redirect("posts");
    }

           public function logout()
        {
              unset($_SESSION["user_id"]);
              unset($_SESSION["user_email"]);
              unset($_SESSION["user_name"]);
              session_destroy();
              redirect("users/login");
        }

}