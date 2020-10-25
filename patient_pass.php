<?php
session_start();
if(!isset($_SESSION['ANC_no'])){
  header('location: logout2.php');
  exit();
}
 
 include('includes/header.php');
  ?>

<div class="container-fluid">
    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
  <h1 class="text-center">Change your password </h1>
 </div>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="patient_pass.php">
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black">
<span class="glyphicon glyphicon-home"></span> Home</button>
  </form>

  <?php
if(isset($_GET['go'])){
        header('location: women.php');
        exit();
    }
    
    


?>

  </div>
  <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:60px" >
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  <div class="col-sm-4 col-md-4 col-lg-4"  >
<?php 

include('includes/config.php');
if(isset($_POST['change'])){
$new=$_POST['new'];
$c_new=$_POST['c_new'];
$old=$_POST['old'];

if($new != $c_new ){

echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' class='glyphicon glyphicon-exclamation-sign'>
</span> Sorry your password must match!!</p> ";

}else{

if(!empty($new)&& !empty($old)&& !empty($c_new)){

 $old=md5($old);
$new=md5($new);
$c_new=md5($c_new);
 $se=$_SESSION['ANC_no'];

$sql=$db->prepare("SELECT pass, ANC_no from anc_reg where ANC_no=?");
$sql->bind_param("s",$se);
$sql->execute();
$re=$sql->get_result();
$row=$re->fetch_assoc();
if($re->num_rows >0){

if($old == $row['pass'] ){


         $sql1=$db->query("UPDATE anc_reg SET pass='$new' where ANC_no='$se'");
         echo "<p style='color: green; background-color:#CBF5DA; padding:9px'><span style='color:green' 
         class='glyphicon glyphicon-ok'></span> your password has been changed succesfully!</p> ";  



}else{
         echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' class='glyphicon glyphicon-exclamation-sign'>
         </span> Sorry your password does not exist!!</p> ".$db->error;
}


}else{
         echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' 
         class='glyphicon glyphicon-exclamation-sign'></span> Sorry your password does not exist!!</p> ";
}







}else{
         echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' class='glyphicon glyphicon-exclamation-sign'></span> all fields are required !!</p> ";
}


}}


?>




  </div>
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  </div>
  
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  <div class="col-sm-4 col-md-4 col-lg-4" style="background-color:#E2E6EB; padding:20px;  " >

<form method="post" action="patient_pass.php" >

<div class="form-group">
         <label class="control-label">Old Password</label>
         <input type="password" class="form-control" name="old">
         
</div>     
        
<div class="form-group">
         <label class="control-label">New Password</label>
         <input type="password" class="form-control" name="new">
         
</div>     

        
<div class="form-group">
         <label class="control-label">Confirm Password</label>
         <input type="password" class="form-control" name="c_new">
         
</div>     

        
<div class="form-group">
         
         <button class="btn btn-primary pull-right" name="change"> <span class="glyphicon glyphicon-pencil"></span>Change</button>
         
</div>     



</form>
  </div>

  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  </div>
</div>



</div></div>

</div></div>








<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>






