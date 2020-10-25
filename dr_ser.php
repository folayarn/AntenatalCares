<?php

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
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black">
<span class="glyphicon glyphicon-home"></span>Home</button>
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
  <form class="form-horizontal" role="form" action="dr_ser.php" method="post">
  <div class="col-sm-2 col-md-2 col-lg-2"></div>
  <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:rgb(51, 192, 51); padding:6px" >
  <h3 class="text-center">DRUGS AND SERVICES</h3>
  <hr/>
  
  <div class="col-sm-3 col-md-3 col-lg-3"  >


  <label>choose the dose of titenous toxoid (TT)</label><br/>

<select class="mdb_select md-form form-control"   name="tt">
<option disabled selected>Select option</option>
<?php $com= array(1,2,3,4,5);
    foreach( $com as $value){ ?>

<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php }?>
</select>
<br/>
  
<label>Date</label><br/>
<input type="date" class="form-control" name="tt_date"><br/>
<label >Patient ID</LABEL><br/>

<input type="text" class="form-control" name="id" />
      


</div>

<div class="col-sm-3 col-md-3 col-lg-3" >


<label>choose the dose of fansider</label>

<select class="mdb_select form-control md-form "  name="fansider">
<option disabled selected>Select option</option>
<?php $com= array(2,3);
  foreach( $com as $value){ ?>

<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
  <?php }?>
</select>
<br/>

<label>Date</label><br/>
<input type="date" class="form-control" name="fan_date">
</div>


  <div class="col-sm-3 col-md-3 col-lg-3" >

<label>Date of a dose Mebend issued </label>
<input type="date" class="form-control" name="meb_date"><br/>
<label >ITN</LABEL><br/>

<input type="date" class="form-control" name="itn" />
        </td>
    </tr><br/>
    <tr>

  
<label  >AGE</label>
<input type="number" class="form-control"  name="age" >

</td>
</tr>

</table>

</div>


<div class="col-sm-3 col-md-3 col-lg-3" >

<label>Date of a dose Deworming issued </label><br/>
<input type="date" class="form-control" name="deworm"><br/>
<label >Iron/Folates</LABEL><br/>

<input type="date" class="form-control" name="iron" />
        </td>
    </tr>
</table>

</div>



<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:40px">

<button type="submit" class="btn btn-default" name="save"  style="margin-left:200px" >Save</button>

</div>

<div class="col-sm-12 col-md-12 col-lg-12" >
<table>
<tr>
<td></td>
<td>
  <?php
  include('includes/config.php');
  if(isset($_POST['save'])){
$tt=$_POST['tt'];
$tt_date=$_POST['tt_date'];
$fansider=$_POST['fansider'];
$fan_date=$_POST['fan_date'];
$itn=$_POST['itn'];
$deworm=$_POST['deworm'];
$iron=$_POST['iron'];
$meb_date=$_POST['meb_date'];
$id=$_POST['id'];
$age=$_POST['age'];
$user=$_SESSION['user_no'];

if(!empty($tt)&& !empty($tt_date)&& !empty($fansider)&& !empty($fan_date)
&& !empty($itn)&& !empty($deworm)&& !empty($iron)&& !empty($id)&& !empty($meb_date)&& !empty($age)){
    
  
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


    
  $sql1= $db->prepare("SELECT ANC_no from drugs  where ANC_no=? ");
  $sql1->bind_param("s",$id);
  $sql1->execute();
  $da1=$sql1->get_result();

  if($da1->num_rows >0){
    echo "
    <div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
    this data  already exist in the database
  </div>
  
  ";
  

  }else{
 
    $sql="INSERT INTO drugs(ANC_no, tt_dos, tt_date, fan_q, fan_date, 
    meb, itn, deworm, iron,user_no,age) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
   $query= $db->prepare($sql);
   
    $query->bind_param("sisissssssi",$id,$tt,$tt_date,$fansider,
    $fan_date,$meb_date,$itn,$deworm,$iron,$user,$age);
    
    $query->execute();
    echo $db->error;
   
    if($sql){
  
     
  
     echo "
     <div style='margin-top:10px; margin-left:200px; padding:7px; background-color:white'>
  
     The data are successfully submitted...!!
   </div>
   
   ";
  }else {echo "<div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
    canot be added'.mysqli_error($db)</div>";
  }
    }}
  }else{
        
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