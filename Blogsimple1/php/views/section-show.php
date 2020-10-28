<?php
require_once "header.php";
require_once "../class/User.php";
require_once "../class/api.php";


   $users=new User();

    //$sql="SELECT * FROM users WHERE id=:id";

    $query=DataBase::connexion()->prepare($users->findBy());

 
    $query->bindParam(":id",$_SESSION["user_session"]);
   

    $query->execute();
    
    $retourn_row=$query->fetch(PDO::FETCH_ASSOC);

   if(isset($_GET["logout"]))
   {
       $users->logout();
       $users->redirect("index.php");
   }



?>




  <p>Welcome, <?php 



  $data=HandleForm::read($retourn_row["id"],"article");
  foreach($data as $datas)
  {

  extract($datas);
 
 
    echo $titre;
    echo $contenu;
    echo $categorie;

  }
         



 
 
 
 ?></p>
        
       



<?php
//READ POUR UPLOAD 
$arrays=HandleForm::read($retourn_row["id"],"upload");
foreach($arrays as $tableligne){
  

extract($tableligne);

  
echo 
<<<CODE

<img src="$path" style="width:300px; height:300px;">



CODE;
}
?>


<?php require_once  "footer.php";?>