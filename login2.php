
<?php session_start();
include('includes/header.php');
include('includes/config.php');
?>

<div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
<ul>
         <li class="pull-right"> 
<a href="login.php"> <h4> Staff should login here...</h4></a>
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
if(isset($_POST['submit'])){
$name= $_POST['username'];
$pass= $_POST['password'];

if(empty($name) || empty($pass)){
echo "<h5 style='color:red; margin-left:100px; background-color:#FAC0C6; padding:3px'><span class='glyphicon glyphicon-exclamation-sign' style='color:red; 
background-color:#FAC0C6; padding:3px'></span> missing information<h5>";
}else{
   
$pass=md5($pass);
$women="SELECT ANC_no, name1,image,pass FROM anc_reg WHERE ANC_no=? AND pass=? ";
$women=$db->prepare($women);
$women->bind_param("ss",$name,$pass);
$women->execute();
$result2=$women->get_result();


if($result2->num_rows > 0){

while($row1=$result2->fetch_assoc()){
    $_SESSION['ANC_no']=$row1['ANC_no'];
    $_SESSION['name1']=$row1['name1'];
    $_SESSION['image']=$row1['image'];
    header('location: women.php ');
} 
}
else{
        echo "<h5 style='color:red; margin-left:100px;background-color:#FAC0C6; padding:3px '>
        <span class='glyphicon glyphicon-exclamation-sign' style='color:red'></span>This user does not exist<h5>";

}
}}

 
$db->close();
 ?>
<form action="login2.php" method="post">
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
    </td>
    <td>
<button type="submit" name="submit" class="btn btn-success" style="float:right ;
 margin-left:9px"><span style="color:white" class="glyphicon glyphicon-arrow"></span>Login</button>
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
