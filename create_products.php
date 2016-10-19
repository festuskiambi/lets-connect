<?php
if($_POST){
 
    // include database connection
    include 'database_connection.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO products SET name=:name, description=:description, price=:price, donor_name=:donor_name, donor_address=:donor_address, donor_contact=:donor_contact, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
        $donor_name=htmlspecialchars(strip_tags($_POST['donorname']));
        $donor_address=htmlspecialchars(strip_tags($_POST['donoraddress']));
        $donor_contact=htmlspecialchars(strip_tags($_POST['donorcontact']));
 
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':donor_name', $donor_name);
        $stmt->bindParam(':donor_address', $donor_address);
        $stmt->bindParam(':donor_contact', $donor_contact);
         
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