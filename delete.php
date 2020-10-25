<?php
error_reporting(E_ALL);
ini_set('dispaly_errors',1); 
session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}
 

 
?>
<?php include('includes/header.php'); ?>

<div class="container-fluid">
    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
  <h1 class="text-center">Remove Account </h1>
 </div>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="new_user.php">
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black">
<span class="glyphicon glyphicon-home"></span> Home</button>
  </form>

  <?php
if(isset($_GET['go'])){
echo $session;
  if($session == "Administrator"){
    header('location: admin.php ');
    exit();
    }elseif( $session =="Doctor"){
    header('location: doctor.php ');
    exit();
    
    }else{
          header('location:recept.php ');
        exit(); } 
    
}

?>

  </div>
  <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:60px" >
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  <div class="col-sm-4 col-md-4 col-lg-4"  >
<?php 

include('includes/config.php');
if(isset($_POST['reb'])){
$re=$_POST['re'];

if($re ==""){

echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' class='glyphicon glyphicon-exclamation-sign'>
</span> field must not be empty!!</p> ";

}else{
         $dd="DELETE from user_all where user_no='$re'";
$sql=mysqli_query($db,$dd);
if($sql){

         echo "<p style='color: green; background-color:#CBF5DA; padding:9px'><span style='color:green' 
         class='glyphicon glyphicon-ok'></span> the user was deleted succesfully!</p> ";  



}else{
         echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' class='glyphicon glyphicon-exclamation-sign'>
         </span> the operation was not succesful!!</p> ".$db->error;
}
}}


?>




  </div>
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  </div>
  
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  <div class="col-sm-4 col-md-4 col-lg-4" style="background-color:#E2E6EB; padding:20px;  " >

<form method="post" action="delete.php" >

<div class="form-group">
         <label class="control-label">Enter the User ID to remove</label>
         <input type="text" class="form-control" name="re">
         
</div>     
        
        
<div class="form-group">
         
         <button class="btn btn-danger pull-right" name="reb"> <span class="glyphicon glyphicon-remove"></span>
         Remove</button>
         
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






