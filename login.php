
<?php 
//starting sesion
session_start();
include('includes/header.php');
include('includes/config.php');
?>
<div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
<ul>
         <li class="pull-right"> 
<a href="login2.php"> <h4> Expectant mother should login here...</h4></a>
</li>
</ul>
 </div>



<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="section">
<div class="col-sm-4 col-md-4 col-lg-4">
</div>


 <div class="panel col-sx-4 col-sm-5 mypanel col-md-5 col-lg-5" style=" background-color:blueviolet; padding:0px">
<div class="panel-heading " style="background-color:rgb(51, 192, 51); height:60px" >
<h3 class="text-center" style="margin-bottom:10px">LOGIN TO WORK AREA</h3>
</div>
<div class="panel-body">

    
<?php
//connecting the database to login
if(isset($_POST['submit'])){
$name= $_POST['username'];
$pass= $_POST['password'];
$role=$_POST['role'];

if(empty($name) || empty($pass) || empty($role)){
echo "<h5 style='color:red; margin-left:100px; background-color:#FAC0C6; padding:3px'><span class='glyphicon glyphicon-exclamation-sign' style='color:red; 
background-color:#FAC0C6; padding:3px'></span> missing information<h5>";
}else{
   
$pass=md5($pass);
$sql="SELECT user_no, name,role,image FROM user_all WHERE user_no=? AND pass=? ";
$sql=$db->prepare($sql);
$sql->bind_param("ss",$name,$pass);
$sql->execute();
$result=$sql->get_result();

if($result->num_rows > 0){
   while($row=$result->fetch_assoc()){
    $_SESSION['user_no']=$row['user_no'];
    $_SESSION['name']=$row['name'];
    $_SESSION['role']=$row['role'];
    $_SESSION['image']=$row['image'];
    
    if($row['role']== "Administrator" && $role=="Administrator"){

        header('location: admin.php ');
        
        }elseif( $row['role']=="Doctor" && $role=="Doctor"){
            header('location: doctor.php ');
        
        }elseif($row['role']=="Receptionist" && $role=="Receptionist"){
              header('location:recept.php ');
         
        } else{
            echo "<h5 style='color:red; margin-left:100px; background-color:#FAC0C6; padding:3px'><span class='glyphicon glyphicon-exclamation-sign' 
            style='color:red'></span>invalid choice<h5>";
        
        
        }

 }}
 else{
         echo "<h5 style='color:red; margin-left:100px;background-color:#FAC0C6; padding:3px '>
         <span class='glyphicon glyphicon-exclamation-sign' style='color:red'></span>This user does not exist<h5>";
 
 }
}}
$db->close();
 ?>
<form action="login.php" method="post">
 <table>
   <tr>  <td>
<label>Login ID</label>
</td>
<td> 
<input type="text" name="username" class="form-control" id="username">
</td></tr>
<tr>
    <td>
<label class="label-control">Password</label>
</td>
<td>

<input type="password" name="password" class="form-control" id="password"
placeholder="*****">
</td>
</tr>
<tr>
    <td>
<label class="label-control">Role</label>
</td>
<td>
<select class="form-control mdb_select md-form" name="role">
<option disabled selected>select Role</option>
<option value="Doctor">Doctor</option>
<option value="Receptionist">Receptionist</option>
<option value="Administrator">Administrator</option>

</td>
</tr>




<tr>
    <td>
    </td>
    <td>
<button type="submit" name="submit" class="btn btn-success" style="float:right ; margin-left:9px"><span style="color:white" class="glyphicon glyphicon-arrow"></span>Login</button>
    </td>
</tr>

</table>
    </div>
    </div></div>
    
<div class="col-sm-2 col-md-2 col-lg-2">
</div>




<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>
