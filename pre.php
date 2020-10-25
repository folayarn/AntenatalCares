<?php 
session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}



include('includes/header.php'); ?>

<div class="container-fluid">
    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
  <h1 class="text-center">PREGNANCY OUTCOME  </h1>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="table.php">
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black"><span class="glyphicon glyphicon-home"></span>Home</button>
  </form>
<?php
if(isset($_GET['go'])){
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
  
  </div>
  <div style="background-color:rgb(51, 192, 51)" class="col-sm-12 col-md-12 col-lg-12" >
  <form class="form-horizontal" role="form" action="pre.php" method="post">
  <div class="col-sm-2 col-md-2 col-lg-2"></div>
  <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:rgb(51, 192, 51); padding:6px" >
  <h3 class="text-center"> PREGNANCY OUTCOME</h3>
  <hr/>

  <div class="col-sm-4 col-md-2 col-lg-2"  >


  <label>Enter the Delivery Complication from the list below:</label><br/>

<select class="mdb_select form-control md-form " name="com">
<option disabled selected>Select option</option>
<?php $com= array('X','PPH','E','PS','OL','B','T','Ot');
    foreach( $com as $value){ ?>

<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php }?>
</select>

</div>

  <div class="col-sm-5 col-md-5 col-lg-5" style="margin-left:101px" >
<table>
    <tr>
        <td>

    </td>
    <td>
<label>Enter the Delivery Date</label><br/>
<input type="date" class="form-control" name="date_b">
</td>
    </tr>

    <tr>
    
        <td>
<label >PATIENT ID</LABEL></td>
<td>
<input type="text" class="form-control" name="id" />
        </td>
    </tr>
    <tr>

  <td>
<label  >AGE</label>
</td>
<td>
<input type="number" class="form-control"  name="age" >

</td>
</tr>

</table>

</div>
<div class="col-sm-12 col-md-12 col-lg-12" >

<button type="submit" class="btn btn-default" name="save"  style="margin-left:260px" >Save</button>

</div>

<div class="col-sm-12 col-md-12 col-lg-12" >
<table>
<tr>
<td></td>
<td>
  <?php
  include('includes/config.php');
  if(isset($_POST['save'])){

$com=$_POST['com'];
$date=$_POST['date_b'];
$id=$_POST['id'];
$age=$_POST['age'];
$user=$_SESSION['user_no'];
if(!empty($com)&& !empty($date)&& !empty($id)&& !empty($age)){
  
  $gone= $db->prepare("SELECT ANC_no FROM anc_reg  where ANC_no=?");
  $gone->bind_param("s",$pat_id);
  $gone->execute();
  $ds=$gone->get_result();
if($ds->num_rows == 0){
  echo "
  <div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
  this patient ID does not exist in the database, please provide the register ID
</div>

";
}else{

  $sql1= $db->prepare("SELECT ANC_no from pregna_out where ANC_no=? ");
  $sql1->bind_param("s",$id);
  $sql1->execute();
  $da1=$sql1->get_result();

  if($da1->num_rows >0){
    echo "
    <div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
    this data already exist in the database
  </div>
  
  ";
  

  }else{

    $sql="INSERT INTO pregna_out(ANC_no, complication, delivery,user_no,age) 
    VALUES(?,?,?,?,?)";
   $query= $db->prepare($sql);
   
    $query->bind_param("ssssi",$id,$com,$date,$user,$age);
    
    $query->execute();
    echo $db->error;
   
    if($sql){
  
     
  
     echo "
     <div style='margin-top:10px; margin-left:200px; padding:7px; background-color:white'>
  
     The data are successfully submitted! you can 
   go back home now
   </div>
   
   ";
  }else {echo "<div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
    canot be added'.mysqli_error($db)</div>";
  }
   }} }else{
       
echo "<div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
All fields are required!!</div>";
}}
   
   $db->close();
   ?>
</td>
</tr>
</table>




  </div>
    
  </div></form></div></div></div>





  <?php 
include('includes/footer.php');
?>
<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>