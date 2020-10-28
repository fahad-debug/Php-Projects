<?php




Class Model  extends HandelUser
{
protected function Read($TableName,$ColonneName,$ColonneValue)

{
     
$RequetSql=

<<<CODE

SELECT * FROM $TableName

WHERE $ColonneName=:$ColonneName

CODE;

$pdoStatement=Model::SendToSql($RequetSql,["$ColonneName"=>$ColonneValue]);
$Result=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);
return $Result;

}
protected function SendToSql($RequetSql,$ArrayAsso){
  try
  {
      $pdo=new PDO("mysql:host=localhost;dbname=skills-management_project;charset=utf8;","root","");
   }
    catch(PDOException $E){
    
      echo "YOU ARE FUCKED".$E->getMessage();
    }
   
        $pdoStatement=$pdo->prepare($RequetSql);
       
    
        $pdoStatement->execute($ArrayAsso);
     
 
         return $pdoStatement;
    
}

static function Voir()

{
    static $ArrayAsso=[];
     
$RequetSql=

<<<CODE

SELECT * FROM  users 

CODE;
$pdoStatement=Model::SendToSql($RequetSql,$ArrayAsso);
$Result=$pdoStatement->fetchAll(PDO::FETCH_ASSOC);

return $Result;

   }


  }