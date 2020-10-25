<?php error_reporting(E_ALL);
ini_set('dispaly_errors',1); 
session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}

include('includes/header.php');
include('includes/config.php');


 ?>
</style>
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
  <div style="background-color:rgb(51, 192, 51); " class="col-sm-12 col-md-12 col-lg-12" >
  <form class="form-horizontal" role="form" action="test.php" method="post">
 
  <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:rgb(51, 192, 51); 
  padding:6px; margin-left:100px" >
  <h3 class="text-center"> TEST DATA</h3>
  <hr/>


  <div class="col-sm-4 col-md-4 col-lg-4" style=" padding:5px"  >
<table>
  <tr> 
    <td>
      <label >PATIENT ID</LABEL>

</td>
<TD>

<input type="text" class="form-control" name="id" />
 </td>
<tr>

<td>
<label >URINE TEST</label>
</td>
<td>

<select class="mdb_select md-form form-control" id="urine" name="urine">
<option disabled selected>select option</option>
<option>sugar</option>
<option>protenuria</option>
</select>

</td>

</tr>
<tr>

<td>
<label >RH</label>
</td>
<td>
<select class="mdb_select form-control md-form" id="rh" name="rh">
<option disabled selected>select option</option>
<option>negative</option>
<option>positive</option>
<option>not tested</option>
</select>
</td>
</tr>
<tr>

<td>
<label >TEST FOR HIV</label>
</td>
<td>

<select class=" mdb_select form-control  md-form" id="hiv" name="hiv">
<option disabled selected>select option</option>
<option>yes</option>
<option>no</option>
</select>
</td>
</tr>
<tr>

<td>
<label>HIV RESULT</label>
</td>

<td>

<select class=" mdb_select form-control md-form" id="hiv_re" name="hiv_re">
<option disabled selected>select option</option>
<option>positive</option>
<option>negative</option>
<option>not tested</option>
</select>
</td>


</tr>
</table>
  </div>

<div class="col-sm-4 col-md-4 col-lg-4" style="margin-left:20px; padding:5px">

<table>
<tr>

<td>
<label>ARV PROPHYLAXIS</label>
</td>
<td>

<select class="mdb_select form-control md-form" id="arv" name="arv">
<option disabled selected>select option</option>
<option>yes</option>
<option>no</option>
</select>
</td>
</tr>
<tr>

<td>
<label >ULTRA SCAN DONE</label>
</td>

<td>

<select class="mdb_select form-control md-form" id="ultra" name="ultra">
<option disabled selected>select option</option>
<option>yes</option>
<option>no</option>
</select>

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


<tr>

  <td>
<label>BLOOD PRESSURE</label>
</td>

<td>

<input type="number" class="form-control" name="bp" >


</td>
</tr>

<tr>
<td></td>
<td></td>

<td>



<button type="submit" class="btn btn-default" name="save" >Save</button>


</td>
</tr>
</table>
</div>
<div class="col-sm-12 col-md-12 col-lg-12" >
<table>
<tr>
<td></td>
<td>
  <?php
if(isset($_POST['save'])){
$urine=(isset( $_POST['urine']) ? $_POST['urine']:null);
$rh= $_POST['rh'];
$hiv=(isset( $_POST['hiv']) ? $_POST['hiv']:null);
$hiv_re=$_POST['hiv_re'];
$arv=(isset( $_POST['arv']) ? $_POST['arv']:null);
$ultra=(isset( $_POST['ultra']) ? $_POST['ultra']:null);
$bp= $_POST['bp'];
$id=$_POST['id'];
$age=$_POST['age'];
$user=$_SESSION['user_no'];

if (!empty($urine)&& !empty($ultra)&& !empty($rh)&&
 !empty($hiv)&& !empty($hiv_re)&& !empty($arv)&& !empty($bp)&&
 !empty($id)&& !empty($age)){

  
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


  $sql1= $db->prepare("SELECT ANC_no from test where ANC_no=? ");
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
  $sql="INSERT INTO test (ANC_no, hiv, test_hiv, bp, rh, ultra, ARV,user_no,age) 
  VALUES(?,?,?,?,?,?,?,?,?)";
 $query= $db->prepare($sql);
 
  $query->bind_param("ssssssssi",$id,$hiv,$hiv_re,$bp,$rh,$ultra,$arv,$user,$age);
  
  $query->execute();
 
  if($sql){

   

   echo "
   <div style='margin-top:10px; margin-left:200px; padding:7px; background-color:white'>

   The data are successfully submitted  
 <a href='rk.php'> click here</a> to move to next page
 </div>
 
 ";
}else {echo "<div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
  canot be added'.mysqli_error($db)</div>";
}
    }
   } }else{
   
echo "<div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
All fields are required!!</div>";
 }}
 
 $db->close();
 ?>
</td>


</tr>



</table>
</div>
</div>
</form>
</div>
</div>
<?php include('includes/footer.php');?>
<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>