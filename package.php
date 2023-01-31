<!DOCTYPE html>
<?php 

include("func.php");

?>
<html>
<head>
	<title>Members details</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron" style="background: url('pic/new2.jpg') no-repeat;background-size: cover;height: 350px;"></div>	

 <div class="container">
<div class="card">
     <div class="card-body" style="background-color:darkslategrey;color:#ffffff;">
         <div class="row">
             <div style="font-family: 'Lobster', cursive;" class="col-md-1">
    <a href="admin-panel.php" class ="btn btn-outline-primary">Go Back</a>
             </div>
             <div class="col-md-3"><h3 style="font-family: 'Lobster', cursive;" >Package Details</h3></div>
             <div class="col-md-8">
         <form class="form-group" action="patient_search.php" method="post">
          <div class="row">
              
                 </form></div></div></div>
     <div class="card-body" style="background-color:darkslategrey;color:#ffffff;">
         <div class="card-body">
    <table class="table table-hover">
        <thead>
     <tr>
            <th>Package ID </th>
            <th>Package Name</th>
            <th>Amounts</th>
            <th>Trainer ID</th>
            <th>Customer ID</th>
         
        </tr>   
        </thead>
        <tbody>
          <?php get_package(); ?>
        </tbody>
    </table>
    <div class="card-body" style="background-color:darkslategrey;color:FFFFFF;">
        <h3 style="font-family: 'Lobster', cursive;">Register Package</h3>
    </div>
    <div class="card-body"></div>
    <form class="form-group" action="func.php" method="post" style="font-family: 'Lobster', cursive;">
        <label>Package ID</label>
        <input type="text" name="Package_id" class="form-control" required><br>

        <label>Package Name</label>
        <input type="text" name="Package_name" class="form-control" required><br>

        <label>Amount</label>
        <input type="text" name="Amount" class="form-control" required><br>

        <label>Trainer ID</label>
        <input type="text" name="Trainer_id" class="form-control" required><br>

        <label>Customer ID</label>
        <input type="text" name="customer_id" class="form-control" required><br>

        <input type="submit" class="btn btn-primary" name="pac_submit" value="Add Package">
    </form>
    
     </div>
    </div>
    </div>
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </div>
    </body>
</html>

