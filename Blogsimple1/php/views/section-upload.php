<?php

require_once "../class/database.php";

//je sors des views 2 point et entre avec slach /class/database

$whereToUpload="upload/";

$target_file=$whereToUpload.basename($_FILES["photo"]["name"]);

$uploadOK=1;

$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    
 $check=getimagesize($_FILES["photo"]["tmp_name"]);

    if($check !==false){

        echo "FILE IS AN IMAGE".$check["mime"].".";

        $uploadOK=1;
    }
    else {

        echo "FILE IS NOT A IMAGE";
        $uploadOK=0;
    }
   

if(file_exists($target_file)){

    echo "sorry.dossier deja exist.";
    $uploadOK=0;
}


if($_FILES["photo"]["size"]>50000000){

    echo "problem";

    $uploadOK=0;

}


if(
    $imageFileType != "jpg" &&
    $imageFileType != "png" &&
    $imageFileType != "jpeg" &&
    $imageFileType != "gif"){

        echo "desole change type";

        $uploadOK=0;
    }
 

    if($uploadOK==0){

        echo "ton dossier n a pas été  telecharge";
    }

    else{

    if(move_uploaded_file($_FILES['photo']["tmp_name"],$target_file))
        
    {
           echo "this file".basename($_FILES["photo"]["name"])."has been uploaded";
    }
    else
    {

         "desole il ya une erreur quelque part";
    }
    }
     
          if($uploadOK!==0){
    define("FILE_UPLOADED_PATH","upload/");

    $path=FILE_UPLOADED_PATH.$_FILES["photo"]["name"];
    $id_user=$_REQUEST["id_user"];
    //$id_user=$_REQUEST["id_user"]??"";
    
  
    $arrayassoc=["id_user"=>$id_user,"path"=>$path];

     $requestsql="INSERT INTO upload (id_user,path) VALUES (:id_user,:path)";
         $pdoStatement=DataBase::connexion()->prepare($requestsql);
         $pdoStatement->execute($arrayassoc);
          }