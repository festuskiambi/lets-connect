<?php
if($_POST){
 
    // include database connection
    include 'database_connection.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO connections SET name=:name, nickname=:nickname, address=:address, contact=:contact, comment=:comment, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $nickname=htmlspecialchars(strip_tags($_POST['nickname']));
        $address=htmlspecialchars(strip_tags($_POST['address']));
        $contact=htmlspecialchars(strip_tags($_POST['contact']));
        $comment=htmlspecialchars(strip_tags($_POST['comment']));
        
 
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':comment', $comment);
       
         
        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div>Record was saved.</div>";
        }else{
            die('Unable to save record.');
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>