<?php

//Define a Class

class User
{ 

   

       public $name;
       public $age;

        public function __construct($name,$age)
        { 
               // Runs when an object is created 
              echo "Class". __CLASS__. "instantiated<br>";
             $this->name=$name;
             $this->age=$age;
            
        }
       public function sayHello(){
           return $this->name."says Hello";
       }
 //Called when no other references to a certain objet 
 //Used for clean up , closing connections , etc 

       public function __destruct()
       {
            echo "destructor ran ....";
       }
}


  $user1=new User("brad",36);


  echo $user1->name. " is " .$user1->age. "years old";
 
