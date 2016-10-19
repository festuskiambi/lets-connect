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
            	<a href="index.php">
                	<img src="images/letsconnect_logo.jpg" id="logo_img" />
                	<!--<h1 id="logo_text"><span>letsconnect</span></h1>-->
                </a>
            </div>
            <div class="col-sm-8 hidden-xs">
                <ul class="nav nav-justified">
                    <li><a href="index.php">Home</a></li>
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

<div id ="connect_container" >
    <a class="cd-signup" href="#connect_form">Register To Connect</a>
    <h1 class="products_page_header">Connections</h1>
     <div class="dynamic_peoducts_container">
        
     <div class="span7">   
<div class="widget stacked widget-table action-table">
    	<div class="widget-content">
        <?php
// include database connection
include 'database_connection.php';
 // select all data
$query = "SELECT id, name, nickname, address, contact, comment FROM connections";
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
            echo "<th>Nickname</th>";
            echo "<th> Address</th>";
            echo "<th> Contacts</th>";
            echo "<th> Comments/th>";
           
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
                echo "<td>{$nickname}</td>";
                echo "<td>&#36;{$address}</td>";
                echo "<td>{$contact}</td>";
                echo "<td>{$comment}</td>";
                
            
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
 <div id ="connect_form" class ="container_wapper col-md-12 " >
    <form class="form-horizontal" action='create_connections.php' method='post'>
<fieldset>

<!-- Form Name -->
<legend>Register To Connect</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="eg. Jane Joy" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nickname">Nickname</label>  
  <div class="col-md-4">
  <input id="nickname" name="nickname" type="text" placeholder="eg jojane" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="eg. 45 Ringroad Kilimani" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contact">Contacts</label>  
  <div class="col-md-4">
  <input id="contact" name="contact" type="text" placeholder="+044 555 444 333" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="comment">Comment</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="comment" name="comment" placeholder="eg. Iam a software developer"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="register"></label>
  <div class="col-md-8">
    <button id="register" name="register" class="btn btn-success">Register</button>
    <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
  </div>
</div>

</fieldset>
</form>

    
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="js/letsConnect_script.js"></script>
</body>
</html>