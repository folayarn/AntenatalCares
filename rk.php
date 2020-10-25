<?PHP 

session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}



include('includes/header.php');
?>
<div class="container-fluid">
    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
  <h1 class="text-center">REGISTRATION PAGE </h1>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="table.php">
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black"><span class="glyphicon glyphicon-home"></span>Home</button>
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
 
  </div>
  <div style="background-color:rgb(51, 192, 51) " class="col-sm-12 col-md-12 col-lg-12" >
   <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:rgb(51, 192, 51); margin:20px" >
  <h3 class="text-center">RISK FACTORS DATA</h3>
  <hr/>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form class="form-horizontal" role="form" action="rk.php" method="post">
 
<div class="col-sm-2 col-md-2 col-lg-2" style="height:auto">
<?

?>
choose the week number for visitation <br/>
<select class=" mdb_select form-control md-form"  name="wik">
<option disabled selected>week option</option>
<?php 
$wik= array(1,2,3,4);
foreach($wik as $value ){?>
<option value="<?php echo $value; ?>"><?php
echo $value; ?></option>
<?php } ?>
</select><br/>
<table>
<tr>

  <td>
<button type="submit" class="btn btn-default" name="save">Save</button>
</td>
</tr>
</table>
</div>

<div class="col-xs-4 col-sm-4 col-md-1 col-lg-1" >

</div>


<div class="col-xs-4 col-sm-5 col-md-5 col-lg-5" >


<table >
<tr>
  <td>
<label >PATIENT ID</label>
</td>
<td>

<input type='text' class="form-control" name='patient_id' >
</td>
</tr>

  
<tr>            
<td>        
<label >DATE</label>
</td>
<td> 
<input type='date' class="form-control" name="date">

</div> 
</td>	
</tr>

  <tr>
  <td>
    
<label >GESTATION AGE(<i>weeks</i>)</label>
</td>
<td>

<input type='number' class="form-control" name='gest_age' >
</td>
</tr>
<tr>

  <td>
<label  >AGE</label>
</td>
<td>
<input type="number"  class="form-control" name="age" >

</td>
</tr>

<tr>

  <td>
<label >HB</label>
</td>
<td>


<input type='text' class="form-control"  name='hb' >


</td>
<tr>

<td>
<label >ANC RF:</label>
</td>
<td>
<select class=' mdb_select form-control md-form' name='anc_rf'>
<option disabled selected>select option</option>
<option>X</option>
<option>A</option>
<option>O</option>
<option>P</option>
<option>H</option>
<option>U</option>
<option>APH</option>
<option>M</option>
<option>Ot</option>

</td>
</tr>
</table>
</div>

<div class="col-xs-4 col-sm-5 col-md-5 col-lg-5">

</div>


<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-top:20px; margin-left:200px">

 <?php
 error_reporting(E_ALL);
 ini_set('dispaly_errors',1); 
 
 include('includes/config.php'); 
 if(isset($_POST['save'])){
$wik=$_POST['wik'];
$gest_age=$_POST['gest_age'];
$age=$_POST['age'];
$hb=$_POST['hb'];
$pat_id=$_POST['patient_id'];
$date=$_POST['date'];
$anc_rf=$_POST['anc_rf'];
$user=$_SESSION['user_no'];

if(!empty($wik)&& !empty($gest_age)&& !empty($hb)&& !empty($pat_id&&
!empty($date)&& !empty($anc_rf)&& !empty($age)
)){
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

  $sql1= $db->prepare("SELECT ANC_no, visit_week FROM risk_factors  where ANC_no=? AND visit_week=? ");
  $sql1->bind_param("si",$pat_id,$wik);
  $sql1->execute();
  $da1=$sql1->get_result();


  if($da1->num_rows >0){
    echo "
    <div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
    this data  already exist in the database
  </div>
  
  ";
  

  }else{
 
  $sql="INSERT INTO risk_factors (ANC_no,date1,gestation_age,hb,ANC_RF,visit_week,user_no,age)VALUES(?,?,?,?,?,?,?,?)";
 $query=$db->prepare($sql);
 
  $query->bind_param("ssissisi",$pat_id,$date,$gest_age,$hb,$anc_rf,$wik,$user,$age);
  $query->execute();
  echo $db->error;
 
  if($sql){

   

   echo "
   <div style='margin-top:10px; margin-left:0px; color:green; padding:7px; background-color:white'>

   The data are successfully submitted  
 <a href='dr_ser.php'>goto work page</a> to move to next page
 </div>
 
 ";
}else {
       echo 'canot be added'.mysqli_error($db);
     }
 } }}else{
   
   echo 'All fields are required!!';
 }}
 
 $db->close();
 ?>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px; color:white; background-color:green">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<ul>
<li><b>NOTE:<b></li>
<li>X= No risk factor</li>
<li>A= Anaemia</li>
<li>O= Oedema</li>
<li>P= Protenuira</li>
<li>H= High BP (above 140/90)</li>


</ul>


</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<ul>
<li>U= Not gaining weight</li>
<li>APH= Antepartum Haem</li>
<li>M= Abnormal lie (after 32 weeks)</li>
<li>Ot= Other</li>


</ul>




</div>
 


</div>




</div>
</div>

 
 


</div>
</div>
</form>
  </div>
    

<?php include('includes/footer.php'); ?>

</div>
</div>
<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>