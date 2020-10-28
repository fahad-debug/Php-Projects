
<?php



//pour afficher les tables 

function connectToDb()
{


$database=$_POST["database"]??"";
$host="localhost";
$password='';
$user="root";
//pour creer une base données
try{
$connexion=new PDO("mysql:host=$host;dbname=$database;",$user,$password);
//create colonne

if($connexion)
{  
    // echo "OK";
}

}
catch(PDOException $e)
{
echo "off".$e->getMessage();
}
 
   return $connexion;
}


function Create_DB()
{
 $dbname=$_POST["dbname"]??"";
$Createdatabase="CREATE DATABASE $dbname";
return connectToDb()->query($Createdatabase);
}
 Create_Db();

function Delete_DB()
{
$deletedatabase=$_POST["deletedatabase"]??"";
$deleteData="DROP DATABASE $deletedatabase";
return connectToDb()->query($deleteData);

}

Delete_Db();

//create table

function CreateTable(){

$tab=$_POST["tab"]??"";
$type1=$_POST["type1"]??"";
$valeur1=$_POST["valeur1"]??"";
$type2=$_POST["type2"]??"";
$valeur2=$_POST["valeur2"]??"";
$type3=$_POST["type3"]??"";
$valeur3=$_POST["valeur3"]??"";
$colonne1=$_POST["colonne1"]??"";
$colonne2=$_POST["colonne2"]??"";
$colonne3=$_POST["colonne3"]??"";

//create table
$createTable="CREATE TABLE $tab( $colonne1 $type1 ($valeur1),$colonne2 $type2
($valeur2),$colonne3 $type3 ($valeur3)
);";
 return connectToDb()->query($createTable);

}
CreateTable();


function DeleteTabel()
{
    $tab=$_POST["tab"]??"";
   $deletetabel="DROP TABLE $tab";
   connectToDb()->query($deletetabel);
}
DeleteTabel();
//$AddColumn="ALTER TABLE  $tab ADD $colonne1 varchar(255)";//pour créer
//$DeleteColumn="ALTER TABLE  DROP COLUMN $colonne1";//pour supprimer
//connectToDb()->query($AddColumn);
//connectToDb()->query($DeleteColumn);


/* ---------------------------------AFFICHAGE LES BASES---------------------- */
/* -------------------------------------------------------------------------- */
function DisplayDb()
{
$statement = connectToDb()->query('SHOW DATABASES');
$Result=$statement->fetchAll();

return $Result;
}
$Result=DisplayDb();

foreach($Result as $databases){
    // echo $databases[0]."<br>";
echo

<<<code


 <a href="#"><br>$databases[0]</a>


code;
}

/* -------------------------------AFFichage des Tables----------------------- */
/* -------------------------------------------------------------------------- */
$host="localhost";
$password='';
$user="root";
$c=new PDO("mysql:host=$host;dbname=blog;",$user,$password);
$result=$c->query("show tables"); 
$tables=$result->fetchAll();
    foreach($tables as $t)
              { 
        echo "<h2 style=color:red;>". $t[0] . "<BR>"."</h2>";    
              }

// $result=$c->query("show tables");
// //$tables=$result->fetchAll();
// while($tables=$result->fetchAll()){

//     echo $tables[1];
// }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>

     <style>

/*      
    body{
    background-color: limegreen;
    padding:50px;
    margin:0px;
    font-size:17px;


    } */
    form{
        display:flex;
        width:20%;
        flex-direction:column;
    }
         </style>
</head>
<body>
<header>
    <h1 style="color:yellow;text-align:center;">Welcome to your PHP.MY.F&F</h1>
</header> 
<section>
    <h1>Create DataBase</h1>
    <form action="" method="POST">
    <label for="dbname">DataBaseName:</label><br>
    <input type="text" name="dbname"><br>
    <button type="submit">Send</button>

    <h1>DeleteDataBase</h1>
     <label for="deletedatabase">DeleteDataBase:</label><br>
         
     <!-- <input type="text" name="deletedatabase"><br> -->
     <select name='deletedatabase'>
     <?php
     
     $Result=DisplayDb();

     foreach($Result as $databases){

         // echo $databases[0]."<br>";
     echo
     
     <<<code
     
     
      <option value="$databases[0]">$databases[0]</option>
     
     
     code;
     }
        ?>
      
    </select>
    <button type="submit">Send</button>
    </form>
</section>


<section>
<h1>Create Table dans la base de données </h1>
<form action="" method="POST">
<label for="database">DataBase</label>
<input type="text" name="database">
<label for="tab">Table:</label>
<input type="text" name="tab">
<label for="colonne1">Colonne Name1:</label>
<input type="text" name="colonne1">
<label for="type">Type:</label>
<input type="text" name="type1">
<label for="valeur1">Valeur</label>
<input type="text" name="valeur1">
<label for="colonne2">Colonne Name2:</label>
<input type="text" name="colonne2">
<label for="type">Type:</label>
<input type="text" name="type2">
<label for="valeur">Valeur</label>
<input type="text" name="valeur2">
<label for="colonne3">Colonne Name3:</label>
<input type="text" name="colonne3">
<label for="type">Type:</label>
<input type="text" name="type3">
<label for="valeur">Valeur</label>
<input type="text" name="valeur3">
<button type="submit">Send</button>
</form>


<section>
    <h1>Delete Table</h1>
<form action="" method="POST">
<label for="database">DataBase</label>
<input type="text" name="database">
<label for="tab">Table:</label>
<input type="text" name="tab">
<button type="submit">Send</button>
</section>
</body>
</html>

