<?php 
require_once "php/views/header.php";
require_once "php/class/User.php";
require_once "php/class/api.php";


   $users=new User();

  if(!$users->logged()){

    $users->redirect("index.php");

}

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
 <p>Welcome, <?php echo $retourn_row["email"]; echo $retourn_row["id"];?>

            <?php require_once "php/views/section-admin.php";?>

<table>
<tr>
  <th>Titre</th>
  <th>Contenu</th>
  <th>date</th>
  <th>categorie</th>
  <th>Supprimer</th>
  <th>Modifier</th>
  <th>Photo</th>
  <th>deletePhoto</th>
</tr>



  <?php 
  $data=HandleForm::read($retourn_row["id"],"article");
  foreach($data as $datas)
  {

  extract($datas);
 
echo 
<<<DATA

 <tr>
 <td>$titre</td>
 <td>$contenu</td>
 <td>$date</td>
 <td>$categorie</td>
   
    <form method='POST'>    
   <td><button type='submit'name='id' value='$id'>delete</button></td>
   <input type='hidden' name='form' value='delete'>
    </form>
    <td><button class="btn" id="$id" titre="$titre">update</button></td>
 
    <script>

      var btn=document.querySelectorAll("button.btn");
        
      btn.forEach((btnF)=>{
      btnF.addEventListener("click",function(event){

      let id=event.target.getAttribute("id");
      let titre=event.target.getAttribute("titre");
      
      document.querySelector(".update input[name=id]").value=id;
     document.querySelector(".update input[name=titre]").value=titre;

      })
    })
      

    </script> 

DATA;
  }
?>


    



<?php
//READ POUR UPLOAD 
$arrays=HandleForm::read($retourn_row["id"],"upload");
foreach($arrays as $tableligne){
  

extract($tableligne);

  
echo 
<<<CODE
<td><img src="php/views/$path" style="width:50px; height:50px;"></td>

        

<form method="post">
<input type="text" value=$id name="id">
<input type="hidden" value="$path"  name="path">

<input type="hidden" value="deletephoto"  name="form">
<td><button type="submit">delete</button></td>
</form>

CODE;


 }
 
?>
 </tr>
</tbody>
</table>

<?php require_once "php/views/footer.php";?>