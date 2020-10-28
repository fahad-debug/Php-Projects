
<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// $link = mysqli_connect("localhost", "root", "");
// $sql="CREATE DATABASE Training123";


// if(mysqli_query($link,$sql)){
//  echo "Data base  a été crée";

// }

// else{

//     echo "ERROR".mysqli_error($link);
// }

// mysqli_close($link);

/* ---------------------------------METHOD2---------------------------------- */
/* -------------------------------------------------------------------------- */

// $servername="localhost";
// $user="root";
// $password="";


// $connection=new mysqli($servername,$user,$password);

// //check connection 

// if($connection->connect_error){

//     die("connection failed".$connection->connect_error);
// }

// //delete data base 
// $sql="DROP DATABASE TESTisTEST";

// if($connection->query($sql)===true){

//     echo "DELETE DATA BASE DONE";
// }

// else {

//      echo "YOU ARE DIED";
// }

// $connection->close();

// PDO 
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
function ConnectDb()
{
$servername="localhost";
$user="root";
$password='';
$db="";
try
{
     $conn=new PDO("mysql:host=$servername;dbname=$db;",$user,$password);

     //echo "connect to data base successfully";
}


catch(PDOException$e){


    echo "Failed".$e->getMessage();
}
     return $conn;
}
        
ConnectDb();

function CreateDb($name){

try{
         
     $sql="CREATE DATABASE $name";
     if($sql===true)
  
    echo "Data base created";
}
catch(PDOException $e){

    echo "connexion echoée".$e->getMessage();
}


return ConnectDb()->query($sql);
}

//CreateDb("virginie2");

//CreateDb("Testpm");
function DeleteDb($name)
{  
    
     $sql="DROP DATABASE $name";
     if($sql===true){

       echo "database deleted successfully";}

       else {
            echo "failed";
          }    
     return ConnectDb()->query($sql);
}

//DeleteDb("virginie");


function CreateTable($table)
{  
  $sql="CREATE TABLE $table (id int,titre varchar(100),description varchar(100),photo varchar(100))";

 return connectDb()->query($sql);

}

CreateTable("Vir");

function AlterTable($table)
{
     $sql="ALTER skills ADD $ varchar (255)";

     
}

/* -------------------------------------------------------------------------- */

// function create(){

//     $servername="localhost";
//     $user="root";
//     $password='';

//     $conn=new PDO("mysql:host=$servername",$user,$password);
     
//     $create="CREATE DATABASE functions";

//     $d=$conn->query($create);
//     if($conn->query($create)===true){

//         echo "EVERYTHING IS GOOD";
//     }

//     else{
//              echo "FUCKING ";
//     }
//           return $d;

// }

// create();

