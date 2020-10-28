<?php

$host="localhost";
$user="root";
$password="";
$dbname="pdo";


$dsn="mysql:host=".$host. ";dbname=".$dbname;

$pdo=new PDO($dsn,$user,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$password="12341234";



$sql="SELECT * FROM users WHERE password=:password";


//$sql="SELECT * FROM users WHERE //!!password=:pd";
//!! password correspond la column dans la base de donnees après WHERE 
//aprés le égal c'est le paramétre dans execute c'est temporaire 
//TODO $stmt->execute(["pd"=>"$password"])
//TODO $passsword la valuer dans la base de donnees si elle existe

$stmt=$pdo->prepare($sql);
$stmt->execute(["password"=>$password]);

$users=$stmt->fetchAll();

foreach($users as $user)
{
  

    echo $user->name;
    echo "<br>";
    echo $user->email;
    echo "<br>";
}


$name="Karen333333 Williams";
$email="Kwills@3333333gmail";
$password="Guest33333";

$arrayAsso=["n"=>$name,"e"=>$email,"p"=>$password];

$sql="INSERT INTO users(name,email,password) VALUES(:n,:e,:p)";

$stmt=$pdo->prepare($sql);

$stmt->execute($arrayAsso);
//$stmt->execute(["name"=>$name,"email"=>$email,"password"=>$password]);

