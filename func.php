<?php
$con=mysqli_connect("localhost","root","","loginsystem");


if(isset($_POST['pat_submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $member_id=$_POST['member_id'];
    $trainer_id=$_POST['trainer_id'];
    $query="insert into Member(fname,lname,email,member_id,trainer_id)values('$fname','$lname','$email','$member_id','$trainer_id')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo "<script>alert('Member Added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }

} 

if(isset($_POST['tra_submit']))
{
    $Trainer_id=$_POST['Trainer_id'];
    $Name=$_POST['Name'];
    $phone=$_POST['phone'];
    $query="insert into Trainer(Trainer_id,Name,phone)values('$Trainer_id','$Name','$phone')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo "<script>alert('Trainer added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
} 

if(isset($_POST['pay_submit']))
{
    $Payment_id=$_POST['Payment_id'];
    $Amount=$_POST['Amount'];
    $customer_id=$_POST['customer_id'];
    $payment_type=$_POST['payment_type'];
    $query="insert into Payment(Payment_id,Amount,customer_id,payment_type)values('$Payment_id','$Amount','$customer_id','$payment_type')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo "<script>alert('Payment Sucessfull.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
} 

if(isset($_POST['pac_submit']))
{
    $Package_id=$_POST['Package_id'];
    $Package_name=$_POST['Package_name'];
    $Amount=$_POST['Amount'];
    $Trainer_id=$_POST['Trainer_id'];
    $customer_id=$_POST['customer_id'];
    $query="insert into Package(Package_id,Package_name,Amount,Trainer_id,customer_id)values('$Package_id','$Package_name','$Amount','$Trainer_id','$customer_id')";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo "<script>alert('Package Added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
} 


function get_patient_details(){
    global $con;
    $query="select * from Member";
    $result=mysqli_query($con,$query);
    while ($row=mysqli_fetch_array($result)){
        $fname=$row ['fname'];
        $lname=$row['lname'];
        $email=$row['email'];
        $member_id=$row['member_id'];
        $trainer_id=$row['trainer_id'];
      echo "<tr>
        <td>$fname</td>
        <td>$lname</td>
        <td>$email</td>
        <td>$member_id</td>
        <td>$trainer_id</td>
        </tr>";
    }
}

function get_package(){
    global $con;
    $query="select * from Package";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $Package_id=$row['Package_id'];
        $Package_name=$row['Package_name'];
        $Amount=$row['Amount'];
        $Trainer_id=$row['Trainer_id'];
        $customer_id=$row['customer_id'];
        echo "<tr>
        <td>$Package_id</td>
        <td>$Package_name</td>
        <td>$Amount</td>
        <td>$Trainer_id</td>
        <td>$customer_id</td>
            
        </tr>";
       
    }
}

function get_trainer(){
    global $con;
    $query="select * from Trainer";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $Trainer_id=$row ['Trainer_id'];
        $Name=$row['Name'];
        $phone=$row['phone'];
        echo"<tr>
        <td>$Trainer_id</td>
        <td>$Name</td>
        <td>$phone</td>
            
        </tr>";

    }
}

function get_payment(){
    global $con;
    $query="select * from Payment";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $Payment_id=$row ['Payment_id'];
        $Amount=$row['Amount'];
        $payment_type=$row['payment_type'];
        $customer_id=$row['customer_id'];
        // $customer_name=$row['customer_name'];
        
        echo"<tr>
        <td>$Payment_id</td>
        <td>$Amount</td>
        <td>$payment_type</td>
        <td>$customer_id</td>
        
        </tr>";

    }
}


?>



