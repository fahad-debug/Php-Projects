<?php
    

class HandleForm
{
     static $tabAjax=[];  

    static function TraiterForm()
    {
        HandleForm::$tabAjax["request"]=$_REQUEST;

         $form=$_REQUEST["form"]??"";

         if($form==="create"){

            HandleForm::create();
         }

         

         if($form=="read"){

            HandleForm::read($form,"upload");
         }

       
           
         if($form=="update"){
          HandleForm::update();
    }

         if($form=="delete"){

            HandleForm::delete("article");
         }
         

         $deleteupload=$_REQUEST["deleteupload"]??"";

   
           
           if($form=="deletephoto"){
           
             $path= $_REQUEST["path"]??"";

             if(isset($path)){
             $pathFile = $_SERVER["DOCUMENT_ROOT"].'/dev/coder1/Blogsimple1/php/views/'.$path;
         
             unlink($pathFile);
             
         
      
              HandleForm::delete("upload");
                
             }      
                     
         }

         

   }


   static function update()
   {
            $tableAsso=
            [


                 "id" =>$_REQUEST["id"]??"",            
                 "titre" =>$_REQUEST["titre"]??"",
                 "contenu" =>$_REQUEST["contenu"]??"",
                  "date" =>$_REQUEST["date"]??"",
                 "categorie" =>$_REQUEST["categorie"]??"",
              
              
            ];

            $SqlRequete="UPDATE article SET titre=:titre,contenu=:contenu,date=:date,categorie=:categorie WHERE id=:id";
      
            Model::SendToSql($SqlRequete,$tableAsso);
   }

   static function delete($table)
   {

        $tableAsso= ["id"=>$_REQUEST["id"]??""];
      
      
       $SqlRequete="DELETE FROM $table WHERE id=:id";
       
         

        Model::SendToSql($SqlRequete,$tableAsso);
   }

    static function create()
    {
          
   
  $tableAsso=

          [ 
            "id_user" =>$_REQUEST["id_user"]??"",
            "titre" =>$_REQUEST["titre"]??"",
            "contenu" =>$_REQUEST["contenu"]??"",
            "date" =>$_REQUEST["date"]??"",
            "categorie"=>$_REQUEST["categorie"]??"",
    ];


    $SqlRequete=

<<<CODE

    INSERT INTO article
    (id_user,titre,contenu,date,categorie)
    VALUES
    (:id_user,:titre,:contenu,:date,:categorie)
CODE;
             Model::SendToSql($SqlRequete,$tableAsso);
    
    }

    
    static function read($id_user,$table)
{
               $tableAsso=[];

               

      $SqlRequete="SELECT * FROM  $table WHERE id_user=$id_user";

      $pdoStatement=Model::SendToSql($SqlRequete,$tableAsso);

   // $tableAsso=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    //HandleForm::$tabAjax["table"]=$tableAssoLigne;
       $tableAsso=$pdoStatement->fetchAll();

      return $tableAsso;
}



}



class Model
{

    static function SendToSql($SqlRequete,$tableAsso)
   {   
        
             $pdo=new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","");


             $pdoStatement=$pdo->prepare($SqlRequete);

             $pdoStatement->execute($tableAsso);

             return $pdoStatement;
    }
   }

HandleForm::TraiterForm();

