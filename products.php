<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LetsConnect</title>
       <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <!-- lets-connect  -->
    <link href="css/lets-connect.css" rel="stylesheet">
    
  </head>
<body>

   
<div class="container_wapper">
    <div id="letsConnect_banner_menu">
        <div class="container-fluid">
            <div class="col-xs-4 letsconnect_logo">
            	<a href="home.html">
                	<img src="images/letsconnect_logo.jpg" id="logo_img" />
                	<!--<h1 id="logo_text"><span>letsconnect</span></h1>-->
                </a>
            </div>
            <div class="col-sm-8 hidden-xs">
                <ul class="nav nav-justified">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="connect.php">Connect</a></li>
                     </ul>
            </div>
            <div class="col-xs-8 visible-xs">
                <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a>
            </div>
        </div>
    </div>
</div>

<div id ="products_container" >
     <a class="cd-signup" href="#products_form">Donate an item</a>
    <a class="cd-signup" href="#wish_list_container">wish listitems </a>
    
    <h1 class="products_page_header">Donated Items</h1>
    <div class="dynamic_peoducts_container">
        
     <div class="span7">   
<div class="widget stacked widget-table action-table">
    	<div class="widget-content">
        <?php
// include database connection
include 'database_connection.php';
 // select all data
$query = "SELECT id, name, description, price , donor_name, donor_address,donor_contact FROM products";
$stmt = $DB_con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
/*// link to create record form
echo "<div>";
    echo "<a href='create.php'>Create New Record</a>";
echo "</div>";
 */
//check if more than 0 record found
        
if($num>0){
 
    echo "<table class='table table-striped table-bordered'>";//start table
     
        //creating our table heading
        echo "<tr class='widget-header'>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Description</th>";
            echo "<th>Price</th>";
            echo "<th>Donor Name</th>";
            echo "<th>Donor Address</th>";
            echo "<th>Donor Contacts</th>";
            echo "<th>Action</th>";
        echo "</tr>";
         
        // retrieve our table contents
       
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['firstname'] to
            // just $firstname only
            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
                echo "<td>&#36;{$price}</td>";
                echo "<td>{$donor_name}</td>";
                echo "<td>{$donor_address}</td>";
                echo "<td>{$donor_contact}</td>";
            
               /* echo "<td>";
                    // we will use this links on next part of this post
                    echo "<a href='update.php?id={$id}'>Edit</a>";
                    echo " / ";
                    // we will use this links on next part of this post
                    echo "<a href='#' onclick='delete_user({$id});'>Delete</a>";
                echo "</td>";*/
            echo "</tr>";
        }
     
    // end table
    echo "</table>";
     
}
 
// if no records found
else{
    echo "<div>No records found.</div>";
}
?>
    </div>
    
         </div>
        </div>
        
    </div>
    
    
    </div>
    
    <div id ="wish_list_container" >
     <a class="cd-signup" href="#products_form">Add Item to wish list</a>
    
    <h1 class="products_page_header">Items In The WISH List</h1>
    <div class="dynamic_peoducts_container">
        
     <div class="span7">   
<div class="widget stacked widget-table action-table">
    	<div class="widget-content">
        <?php
// include database connection
include 'database_connection.php';
 // select all data
$query = "SELECT id, name, description FROM products_wish_list";
$stmt = $DB_con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
/*// link to create record form
echo "<div>";
    echo "<a href='create.php'>Create New Record</a>";
echo "</div>";
 */
//check if more than 0 record found
        
if($num>0){
 
    echo "<table class='table table-striped table-bordered'>";//start table
     
        //creating our table heading
        echo "<tr class='widget-header'>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Description</th>";
           
        echo "</tr>";
         
        // retrieve our table contents
       
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['firstname'] to
            // just $firstname only
            extract($row);
             
            // creating new table row per record
            echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
               
            
               /* echo "<td>";
                    // we will use this links on next part of this post
                    echo "<a href='update.php?id={$id}'>Edit</a>";
                    echo " / ";
                    // we will use this links on next part of this post
                    echo "<a href='#' onclick='delete_user({$id});'>Delete</a>";
                echo "</td>";*/
            echo "</tr>";
        }
     
    // end table
    echo "</table>";
     
}
 
// if no records found
else{
    echo "<div>No records found.</div>";
}
?>
    </div>
    
         </div>
        </div>
        
    </div>
    
    
    </div>
   
    
   <div id ="products_form" class ="container_wapper col-md-12 " >
       
       <form class="form-horizontal col-md-6" action='create_wish_list.php' method='post'>
<fieldset>

<!-- Form Name -->
<legend>Add Item To Wish List</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Item Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="your item title" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Item Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description"  placeholder="eg. This is two year old 32 inch television" ></textarea>
  </div>
</div>


<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save button"></label>
  <div class="col-md-8">
    <button id="save button" name="save button" class="btn btn-success">Add Item</button>
   
  </div>
</div>

</fieldset>
</form>

       
       
       <form class="form-horizontal col-md-6" action='create_products.php' method='post'>
<fieldset>

<!-- Form Name -->
<legend>Donate Item</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Item Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="your item title" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Item Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description"  placeholder="eg. This is two year old 32 inch television" ></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="eg .$0" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="donoraddress">Donor address</label>  
  <div class="col-md-4">
  <input id="donoraddress" name="donoraddress" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="donorname">Donor name</label>  
  <div class="col-md-4">
  <input id="donorname" name="donorname" type="text" placeholder="eg. John Mark" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="donorcontact">Donor Contact</label>  
  <div class="col-md-4">
  <input id="donorcontact" name="donorcontact" type="text" placeholder="eg. +44 554 555 554" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save button"></label>
  <div class="col-md-8">
    <button id="save button" name="save button" class="btn btn-success">Donate</button>
   
  </div>
</div>

</fieldset>
</form>

       
    </div>
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>
   


<div id="letsconnect_footer">
    <div>
        <p id="footer">Copyright &copy; 2016 letsconnect pty LTD</p>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>
<script src="js/unslider.min.js"></script>

<script src="js/letsConnect_script.js"></script>
</body>
</html>