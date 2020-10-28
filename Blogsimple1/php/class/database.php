<?php


session_start();

$errors=[];

      class DataBase
{
   



  public static  function connexion()
   
  {
$host="localhost";
$user="root";
$password="";
$database="Blog";

try
{
$connection=new PDO("mysql:host={$host};dbname={$database}",$user,$password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //echo "DATA BASE CONNECTED";
}
catch(PDOException$E)
{  
    array_push($errors,$E->getMessage());
}

return $connection;
}

}



   //$users pourqu'on puisse utiliser partout represente la class $users 
   //par exemple si on veut utiliser une fonction on peut $users->findBy();
 