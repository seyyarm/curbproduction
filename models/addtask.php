<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Curb System</title>
         <!-- Required meta tags always come first -->
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta http-equiv="x-ua-compatible" content="ie=edge">
         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
         <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
         <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
         <link rel="stylesheet" href="../css/styles.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    
<body>


    <nav class="navbar navbar-dark navbar-expand-sm fixed-top font-weight-bold">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
           <a class="navbar-brand mr-auto" href="#"><img src="../img/logo.png" height="20" width="31"></a>
           <diV class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a class="nav-link" href="../index.php"><span class="fa fa-home fa-lg"></span>Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="./addtask.html"><span class="fa fa-info fa-lg"></span>Add Task</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/addproduct.html"><span class="fas fa-tablet-alt"></span>Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/addclient.html"><span class="fas fa-male"></span>Add Client</a></li>
                    <li class="nav-item"><a class="nav-link" href="./product.php"><span class="fa fa-list fa-lg"></span>Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="./client.php"><span class="fa fa-address-card fa-lg"></span>Client</a></li>
                    <li class="nav-item"><a class="nav-link" href="./task.php"><span class="fa fa-tasks fa-lg"></span>Tasks</a></li>
                </ul>      
           </diV>          
        </div>
    </nav>


    <div class="container">

        <br>
        <h1>Add Tasks</h1>
        
        <form action="inserttask.php" method="POST">
            <div class="form-row">
                <div class="col-md-4 mb-3">

                    <label for="client"><b>Client</b></label>
                     <?php
                    // start of dbcon
                    include_once '../db/db.php';
                    ?>
                    <div class="form-group">
                        <?php 
                        $sql = "SELECT * FROM client";
                        $result = $conn->query($sql);
                        ?>      
                        <select name='namec' class="custom-select">
                        <?php
                         if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['codeclient'] . "' >" . $row['nameclient'] . " , " . $row['stat'] . " " . $row['codeclient'] . "</option>";
                         
                        }
                            echo "</select>";
                                                     
                        } 
                        
                        
                        ?>

                    </div>
                    
                </div>
                <div class="col-md-4 mb-3">
                    <label for="stat"><b>Product</b></label>

                    <?php
                    // start of dbcon
                    
                    ?>
                    <div class="form-group">
                        <?php 
                        $sql = "SELECT * FROM product";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                        ?>
                         <select name='namep' class="custom-select">
                        <?php
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['codeproduct'] . "' >" . $row['name'] . " , " . $row['partnumber'] . " " . $row['codeproduct'] . "</option>";
                         
                        }
                            echo "</select>";
                                                     
                        } 
                        
                        $conn->close();
                        ?>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="qty" ><b>Quantity</b></label>
                    <input type="text" class="form-control" id="qty" placeholder="quantity" value="10" name="qty" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="product"><b>Kit/RMA</b></label>
                    <select name='kitrma' class="custom-select">
                        <option value="RMA">RMA</option>
                        <option value="KIT">KIT</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="product"><b>Kit/RMA Order Number </b></label>
                    <input type="text" class="form-control" id="shipment" placeholder="shipment" value="Order Number" name="shipment" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="product"><b>Status</b></label>
                    <select name='status' class="custom-select">
                        <option value="Processing">Processing</option>
                        <option value="On-hold">On Hold</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Add Task</button>
        </form>

    </div>

<hr>
<br><br><br><br>
    <footer class="footer">
      <div class="container">
          <div class="row justify-content-center">             
              <div class="col-12 offset-1">
                 <h1>Add New Tasks</h1> 
              </div>
                  
         </div>
         <div class="row justify-content-center">             
              <div class="col-auto">
                  <p>?? Copyright Curb Mobility</p>
              </div>
         </div>
      </div>
  </footer>
  

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
   
</body>
</html>