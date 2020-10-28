
<?php

class Application
{
static function LoadClass($className)
{
   require_once "php/class/$className.php";


 //  Model::Read();
 




}




static function Go()
{
  //L'avantage d'utiliser spl_autoload_register () est que, contrairement à __autoload (), 
  //vous n'avez pas besoin d'implémenter une fonction de 
  //chargement automatique dans chaque fichier que vous créez.
  // Spl_autoload_register () vous permet également d'enregistrer plusieurs fonctions de chargement 
  //automatique pour accélérer le chargement automatique et le rendre encore plus facile. 
spl_autoload_register("Application::LoadClass");

         
         Application::ChargerView();
          $objet1=new HandelUser; 
          $objet1->login();
          $objet2=new HandelUser;
          $objet2->CreateUser();
         
  
}


protected function ChargerView()

{      
    // $uri=$_SERVER["REQUEST_URI"];

    // extract(parse_url($uri));
    // extract(pathinfo($path));


 $SectionActif = "index";
     
       require_once "php/view/section-$SectionActif.php";

}
// protected function admin2(){

//   $admin2="admin2";

//   require_once "php/view/section-$admin2.php";
// }


}

Application::Go();

