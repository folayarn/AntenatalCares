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
  <h1 class="text-center">Remove Data</h1>
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
if(isset($_POST['reb1'])){
$re1=$_POST['re1'];

if($re1 ==""){

echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' class='glyphicon glyphicon-exclamation-sign'>
</span> field must not be empty!!</p> ";

}else{
  $dd="DELETE from anc_reg where ANC_no='$re1'";
$sql=mysqli_query($db,$dd);
$dd1="DELETE from pregna_out where ANC_no='$re1'";
$sql1=mysqli_query($db,$dd1);
$dd2="DELETE from test where ANC_no='$re1'";
$sql2=mysqli_query($db,$dd2);
$dd3="DELETE from risk_factors where ANC_no='$re1'";
$sql3=mysqli_query($db,$dd3);
$dd4="DELETE from obsectric where ANC_no='$re1'";
$sql4=mysqli_query($db,$dd4);
$dd5="DELETE from drugs where ANC_no='$re1'";
$sql5=mysqli_query($db,$dd5);



if($sql && $sql1 && $sql2 && $sql3 && $sql4 && $sql5){

         echo "<p style='color: green; background-color:#CBF5DA; padding:9px'><span style='color:green' 
         class='glyphicon glyphicon-ok'></span> the Data was deleted succesfully!</p> ";  



}else{
         echo "<p style='color: red; background-color:#FAC0C6; padding:8px'><span style='color:red' class='glyphicon glyphicon-exclamation-sign'>
         </span> this operation was not succesful!!</p> ".$db->error;
}
}}


?>




  </div>
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  </div>
  
  <div class="col-sm-4 col-md-4 col-lg-4" ></div>
  <div class="col-sm-4 col-md-4 col-lg-4" style="background-color:#E2E6EB; padding:20px;  " >

<form method="post" action="delete1.php" >

<div class="form-group">
         <label class="control-label">Enter the Patient ID to remove Data </label>
         <input type="text" class="form-control" name="re1">
         
</div>     
        
        
<div class="form-group">
         
         <button class="btn btn-danger pull-right" name="reb1"> <span class="glyphicon glyphicon-remove"></span>
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






