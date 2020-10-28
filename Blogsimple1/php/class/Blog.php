
<?php

class Blog
{

     static function ChargeClass($classes)
     {
        require_once "php/class/$classes.php";
       // DataBase::connexion();
    
     }

     static function Start()
     {
        

        spl_autoload_register("Blog::chargeClass");
        Blog::displayPage();
       
      


 
        
        
        
      
     }

     static function displayPage()
     {

         

            $uri=$_SERVER["REQUEST_URI"];

             if($uri="http://localhost/dev/coder1/Blogsimple1/admin.php")
            {
                 
               $fichier="admin";

            }

            if($uri="http://localhost/dev/coder1/Blogsimple1/index.php"){    
                $fichier="index";

             }
           
         
              
 

        return   require_once "php/views/section-$fichier.php";

     }
}