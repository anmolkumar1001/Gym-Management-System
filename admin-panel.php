<!DOCTYPE html>
<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "loginsystem";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `Trainer`";

// for method 1

$result1 = mysqli_query($connect, $query);

?>

<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
      
  <div class="jumbotron" style="border-radius:0;background:url('pic/new1.jpg');background-size:cover;height:350px;"></div>
   <div class="container-fluid">
    <div class="row">
        <div style="font-family: 'Lobster', cursive;" class="col-md-3">
            <div class="list-group">
                <a href="" class="list-group-item active" style="background-color:darkslategrey;border-color:darkslategrey;">Members</a>
                <a href="trainer_details.php" class="list-group-item">Member details</a>
            </div>
            <hr>
            <div class="list-group">
                <a href="" class="list-group-item active" style="background-color:darkslategrey;border-color:darkslategrey;">Packages</a>
                <a href="package.php" class="list-group-item">Package details</a>
            </div>
            <hr>
            <div class="list-group">
                <a href="" class="list-group-item active" style="background-color:darkslategrey;border-color:darkslategrey;">Payments</a>
                <a href="payment.php" class="list-group-item">Payment details</a>
            </div>
            <hr>
            <div  style="font-family: 'Lobster', cursive;" class="list-group">
              <a href="" class="list-group-item active" style="background-color:darkslategrey;border-color:darkslategrey;">Trainers</a>
              <a href="trainer.php" class="list-group-item">Trainer details</a>             
              <a href="trainer.php" class="list-group-item">Add new Trainer</a>
            </div>      
            
            <hr>
        </div>
            <div class="col-md-8">
            <div class="card">
       
     <div class="card-body" style="background-color:darkslategrey;color:white;border-color:darkslategrey;font-family: 'Lobster', cursive;">
                <h3>Register new members</h3>
                </div> 
                <div  style="font-family: 'Lobster', cursive;" class="card-body"></div>
                <form class="form-group" action="func.php" method="post" style="font-family: 'Lobster', cursive;">
                
                    <label>First Name:</label>
                <input type="text" name="fname" class="form-control" required><br>
                    <label>Last Name:</label>
                <input type="text" name="lname" class="form-control" required><br> 
                    <label>Email</label>
                <input type="text" name="email" class="form-control" required><br>
                    <label>Member ID</label>
                <input type="text" name="member_id" class="form-control" required><br>        
                    <label>Trainer </label> 
                <select class="form-control" name="trainer_id">  

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

        </select>
        <br>
  <div style = "display:flex; justify-content:center; align-item:center;">                                      
  <input type="submit" class="btn btn-outline-primary" name="pat_submit" value="Register"></div>
                    
                    
                </form>
                </div>
      </div>
       </div>
      <div class="col-md-1"></div>
      </div>
    <header>
 <nav>
     <div class="main-wrapper">
	      
		       <div class="nav-login">
			       <?php
				        if (isset($_SESSION['u_id'])) {
						  echo '<form action="includes/index.php" method="POST">
					            <button type="submit" name="submit">logout</button>
					              </form>';	
                }else{
                    
                  echo '<form action="includes/index.php" method="POST">
                              
                    </form>
				              <a href="index.php" class="btn btn-outline-primary" style="color:FFFFFF;align-items: center;
                      /* display: flex; */
                      margin-left: 50%;font-family: cursive;">Logout</a>';
							}
				   
				    ?>
					
				
		       </div>
	 </div>
 </nav>

</header>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

     </body>
    
</html>
   