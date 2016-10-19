<?php
require_once 'database_connection.php';

if($user->is_loggedin()!="")
{
    $user->redirect('home.html');
}

if(isset($_POST['btn-signup']))
{
   $name = trim($_POST['name']);
   $nickname = trim($_POST['nickname']);
     $address = trim($_POST['address']);
     $contact = trim($_POST['contact']);
   $password = trim($_POST['password']); 
 
   
      try
      {
         $stmt = $DB_con->prepare("SELECT name, nickname FROM users WHERE name=:name OR nickname=:nickname");
         $stmt->execute(array(':name'=>$name, ':nickname'=>$nickname));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['nickname']==$nickname) {
            $error[] = "sorry username already taken !";
         }
         
         else
         {
            if($user->register($name,$nickname,$address,$contact,$password)) 
            {
                $user->redirect('home.html');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
   
}

?>