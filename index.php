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
         <link rel="stylesheet" href="./css/styles.css">
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
           <a class="navbar-brand mr-auto" href="#"><img src="./img/logo.png" height="20" width="31"></a>
           <diV class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.php"><span class="fa fa-home fa-lg"></span>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./models/addtask.php"><span class="fa fa-info fa-lg"></span>Add Task</a></li>
                    <li class="nav-item"><a class="nav-link" href="./views/addproduct.html"><span class="fas fa-tablet-alt"></span>Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="./views/addclient.html"><span class="fas fa-male"></span>Add Client</a></li>
                    <li class="nav-item"><a class="nav-link" href="./models/product.php"><span class="fa fa-pie-chart fa-lg"></span>Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="./models/client.php"><span class="fa fa-address-card fa-lg"></span>Client</a></li>
                    <li class="nav-item"><a class="nav-link" href="./models/task.php"><span class="fa fa-tasks fa-lg"></span>Tasks</a></li>
                </ul>      
           </diV>          
        </div>
    </nav>

    <div class="container">

        <div class="row row-content">
            <div class="col-12 col-sm">
                <h2>Kit/RMA Parts Needed</h2>
                <form>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tasks Code </th>
                                <th>Client </th>
                                <th>Kit / RMA</th>
                                <th>State</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                     <?php   
                     include_once './db/db.php';
                     $resu = mysqli_query($conn,"SELECT * FROM client, product, tasks where (tasks.codeclient = client.codeclient) and (tasks.codeproduct = product.codeproduct) and ((tasks.status = 'Processing') or (tasks.status = 'On-hold'))");
                     while($row = mysqli_fetch_array($resu))
                            {
                                echo "<tr>";  
                                echo "<th>" . $row['codetask'] . "</th>";
                                echo "<th>" . $row['nameclient'] . "</th>";
                                echo "<th>" . $row['kitrma'] . "</th>";
                                echo "<th>" . $row['stat'] . "</th>";
                                echo "<th>" . $row['name'] . "</th>";
                                echo "<th>" . $row['quantity'] . "</th>";
                                echo "<th>" . $row['datetask'] . "</th>";
                                echo "<th>" . $row['status'] . "</th>";
                                
                               
                               
                                
                                echo "</tr>";
                            }
                            mysqli_close($conn);
                            ?>
                       
                           
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
            <div class="col-12 col-sm-1"></div>
        </div>

    </div>

    <footer class="footer">
        <div class="container">
            <div class="row justify-content-center">             
                <div class="col-12 offset-1">
                   <h1>RMA Parts Needed</h1> 
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