<?php include('includes/header.php');
session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}

?>

<div class="container-fluid">
    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
  <h1 class="text-center">REGISTRATION PAGE </h1>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="table.php">
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black"><span class="glyphicon glyphicon-home"></span> Home</button>
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
  <form class="form-horizontal" role="form" action="bo.php" method="post">
 
<div class="col-sm-12 col-md-12 col-lg-12 " style="background-color:rgb(51, 192, 51); padding:6px" >
<h3 class="text-center">OBSTETRIC HISTORY</h3>
<hr/>
<div class="col-sm-5 col-md-5 col-lg-5" >
<table>


<tr>

<td>
  
<label>PATIENT ID</label>
</td>
<td>

<input type="text" class="form-control" name="id" 
>
</td>
</tr>

  <tr>

  <td>
    
<label>GRAVITY</label>
</td>
<td>

<input type="number" class="form-control" name="gravity" id="gravity"
>
</td>
</tr>
<tr>

  <td>
<label >PARITY</label>
</td>
<td>
<input type="number" class="form-control" name="parity" id="lastname">

</td>
<tr>
<td>
<label>NO: OF CHILDREN</label>
</td>
<td>
<input type="number" class="form-control" id="no_child" name="no_child">
</td>
</tr>      
<td>
                          <label>LMP</label>
</td>
<td> 
                  

                            
                 
                <input  type="date" class="form-control" name="lmp" >
				
       
</td>
</tr>

<tr>

  <td>

<label >GESTATION AGE (<small>in weeks</small>)</label>
</td>
<td>

<input type="number" class="form-control"  name="gest_age" id="gest_age">

</td>

</tr>
</table>
</div>
<div class="col-sm-5 col-md-5 col-lg-5" >
<table>
<tr>

  <td>

<label >STILLBIRTH </label>
</td>
<td>
<input type="number"  class="form-control" name="stillbirth" id="stillbirth">
</td>
</tr>
<tr>

  <td>

<label >ABORTION</small>)</label>
</td>
<td>

<input type="number" class="form-control" name="abortion" id="abortion">
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

<label >CAESARIAN SECTION (<small>in weeks</small>)</label>
</td>
<td>

<input type="number" class="form-control" name="c_section" id="c_section">

</td>
</tr>
<tr>
<td>
</td>
<td >
</tr>
</table>

<h3><b>NOTE:</b></h3><b>LMP=:</b><p>Last mestrutration period</P>
</div>

<div class="col-sm-12 col-md-12 col-lg-12" >

  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
  </div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
  
<button type="submit" class="btn btn-default" name="submit" style="margin-top:30px">Save</button>

  </div>

</div>
</div> 
<div class="col-sm-7 col-sm-7 col-md-7 col-lg-7">
  <?php
  error_reporting(E_ALL);
  ini_set('dispaly_errors',1); 
  
  include('includes/config.php');

if (isset($_POST['submit'])){
$id=$_POST['id'];
$gradity=$_POST['gravity'];
$parity=$_POST['parity'];
$no_child=$_POST['no_child'];
$gest_age=$_POST['gest_age'];
$lmp=$_POST['lmp'];
$age=$_POST['age'];
$date= strtotime($lmp);
$date= date('w', $date);
$edd= $date + 40;
$abortion=$_POST['abortion'];
$stillbirth=$_POST['stillbirth'];
$c_section =$_POST['c_section'];
$user=$_SESSION['user_no'];

if(!empty($id)&& !empty($gradity)&& !empty($parity)&& !empty($no_child)
&& !empty($gest_age)&& !empty($lmp)&& !empty($abortion)&& !empty($stillbirth)
&& !empty($c_section)&& !empty($age)){
  
  
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

  $sql1= $db->prepare("SELECT ANC_no from obsectric where ANC_no=? ");
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
  $sql="INSERT INTO obsectric( ANC_no, gradity, parity, no_child,
  lmp, edd, gest_age, stillbirth, abortion, c_section,user_no,age)
  VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
 $query= $db->prepare($sql);
  $query->bind_param("siiisiiiiisi",$id,$gradity,$parity,$no_child,$lmp,$edd,$gest_age,$stillbirth,
  $abortion,$c_section,$user,$age);
$sql=$query->execute();

if($sql){
    echo "
    <div style='margin-top:10px; margin-left:200px; color:green; padding:7px; background-color:white'>
 
    The data are successfully submitted  
  <a href='rk.php'> click here</a> to move to next page
  </div>
  
  ";

}else {
  echo "<div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
  canot be added'.mysqli_error($db)</div>";
}
}}
}else{

echo "<div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
All fields are required!!</div>";
}
}
$db->close();








?>
</div>
</form>
</div>  
<?php include('includes/footer.php'); 
?>
<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>