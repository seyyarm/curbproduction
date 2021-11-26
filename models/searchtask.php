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
           <a class="navbar-brand mr-auto" href="../index.html"><img src="../img/logo.png" height="20" width="31"></a>
           <diV class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a class="nav-link" href="../index.php"><span class="fa fa-home fa-lg"></span>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./addtask.php"><span class="fa fa-info fa-lg"></span>Add Task</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/addproduct.html"><span class="fas fa-tablet-alt"></span>Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="../views/addclient.html"><span class="fas fa-male"></span>Add Client</a></li>
                    <li class="nav-item"><a class="nav-link" href="./product"><span class="fa fa-list fa-lg"></span>Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="./client.php"><span class="fa fa-address-card fa-lg"></span>Client</a></li>
                    <li class="nav-item active"><a class="nav-link" href="./task.php"><span class="fa fa-tasks fa-lg"></span>Tasks</a></li>
                </ul>      
           </diV>          
        </div>
    </nav>

    <div class="container">

<?php

// read the form values
include_once '../db/db.php';
$taskoption = $_POST['task'];
$zonesearch = $_POST['resh'];


?>

        <div class="row row-content justify-content-center">
            <div class="col-12 col-sm-10">
                <h2>Tasks Result </h2> <div color="red"><?php echo "(" . $taskoption . " = " . $zonesearch . ")"?></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                            <th>Tasks Code </th>
                                <th>Client Title</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Quantity</th>
                                <th>Products</th>
                                <th>Kit/RMA</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Order Number</th>
                            </tr>
                        </thead>
                        <tbody>
                     <?php   


                     $res = mysqli_query($conn,"SELECT * FROM tasks, product, client where (client.codeclient = tasks.codeclient) and (product.codeproduct = tasks.codeproduct) and (tasks.$taskoption = '$zonesearch')");
                     
                     while($row = mysqli_fetch_array($res))
                            {
                                ?>
                                
                                <tr>  
                                <th><a href="updatetask.php?codetask=<?php echo $row['codetask'] ?> "><?php echo $row['codetask'] ?> <i class="fas fa-edit"></i></a>
                                <a href="deletetask.php?codetask=<?php echo $row['codetask'] ?> "><i class="far fa-trash-alt"></i></a>
                                </th>
                                <?php 
                                echo "<th>" . $row['nameclient'] . "</th>";
                                echo "<th>" . $row['stat'] . "</th>";
                                echo "<th>" . $row['city'] . "</th>";
                                echo "<th>" . $row['quantity'] . "</th>";
                                echo "<th>" . $row['name'] . "</th>";
                                echo "<th>" . $row['kitrma'] . "</th>";
                                echo "<th>" . $row['status'] . "</th>";
                                echo "<th>" . $row['datetask'] . "</th>";
                                echo "<th>" . $row['tracknumber'] . "</th>";
                                echo "</tr>";
                            }
                            mysqli_close($conn);
                            ?>
                       
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-sm-2">
<br>
<br>
                <form action="../models/searchtask.php" method="POST">
                    <label for="task"><b>Select Task option</b></label>
                    <select name='task' class="custom-select">
                        <option value="codetask">Task Code</option>
                        <option value="status">Task Status</option>
                        <option value="tracknumber">Ordre Number</option>
                        <option value="datetask">Date</option>
                        <option value="kitrma">Kit/RMA</option>
                    </select>
                    <br><br><br>

                    <div class="input-group">
                        <input type="search" name="resh" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <footer class="footer">
        <div class="container">
            <div class="row justify-content-center">             
                <div class="col-12 offset-1">
                   <h1>Clients List</h1> 
                </div>
                    
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright Curb Mobility</p>
                </div>
           </div>
        </div>
    </footer>
    
</body>

</html>


<?php 
/*
// start of dbcon
include_once '../db/db.php';
?>
<div class="form-group">
<?php 
    $sql = "SELECT * FROM client";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        echo "<select name='name'>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        }
        echo "</select>";
    } 
    $conn->close();
   
    echo "</div>";
     */
    ?>    


