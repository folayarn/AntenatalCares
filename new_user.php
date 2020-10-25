
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
  <h1 class="text-center" >USER REGISTRATION PAGE </h1>
 </div>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="new_user.php">
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black"><span class="glyphicon glyphicon-home"></span>Home</button>
  </form>

  <?php
if(isset($_GET['go'])){

  if($_SESSION['role']== "Administrator"){
    header('location: admin.php ');
    exit();
    }elseif( $_SESSION['role'] =="Doctor"){
    header('location: doctor.php ');
    exit();
    
    }else{
          header('location:recept.php ');
        exit(); } 
    
}

?>

  </div>

  <div class="col-sm-12 col-md-12 col-lg-12" >


  <div style="background-color:rgb(51, 192, 51) " class="col-sm-12 col-md-12 col-lg-12" >
  <form class="form-horizontal" role="form" action="new_user.php" enctype="multipart/form-data" method="post" >
  <div class="col-sm-2 col-md-2 col-lg-2"></div>
  <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:rgb(51, 192, 51); padding:6px" >
  <h3 class="text-center">OPERATOR DETAILS</h3>
  <hr/>
  <?php
?>
  <div class="col-sm-4 col-md-4 col-lg-4"  >
<table>

<tr>
<td>  
<label>FULL NAME</label>
</td>

<td>
<input type="text" class="form-control" name="name" >
</td>
</tr>
<tr>

  <td>
<label  >AGE</label>
</td>
<td>
<input type="number" class="form-control" name="age" >

</td>
</tr>
<tr>

<tr>

  <td>
<label >MARITAL STATUS</label>
</td>
<td>
<select class=" mdb_select md-form form-control" name="status">
<option disabled selected >select option</option>
<option>divorced</option>
<option>single</option>
<option>complicated</option>
<option>married</option>
<option>separated</option>
</select>
</td>
</tr>
<tr>

  <td>

<label >ROLE</label>
</td>
<td>
<select class="mdb_select md-form form-control" name="role">
<option disabled selected>select option</option>
<option value="administrator">ADMIN</option>
<option value="doctor">DOCTOR</option>
<option value="Receptionist">RECEPTIONIST</option>
</select>
</td>
</tr>
<tr>


</table>
</div>
<div class="col-sm-4 col-md-4 col-lg-4"  style="border-left:1px solid white">
<table>
<tr>

<td>
<label>PHONE NUNBER</label>
</td>
<td>
<input type="phone" class="form-control" name="phone_no" 
placeholder="e.g 080-xxxxxxxx">
</td>
</tr>
<tr>

  <td>
<label >GENDER</label>
</td>
<td>
<select class=" mdb_select md-form form-control" name="sex">
<option disabled selected >select option</option>
<option value="MALE">male</option>
<option value="FEMALE">female</option>
</select>
</td>
</tr>
<tr>

<tr>

<td>
<label>ADDRESS</label>
</td>
<td>

<textarea rows="2" id="address" class="form-control" name="address"></textarea>
</div>
</td>
</div>
</tr>

<tr>
<tr>
<td>  
<label>PASSWORD</label>
</td>

<td>
<input type="password" class="form-control" name="pass" >
</td>
</tr>

<td></td>
<td>
<button type="submit" class="btn btn-default" name="save" >submit</button>

</td>
</tr> 
</table>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">


<table>
    
<tr><td>
  <input type="file" name="file" class="form-control"
   onchange="document.getElementById('image').src=window.URL.createObjectURL
   (this.files[0]);"/>
  
  </td></tr>
</table>

<img style="min-height:100px; min-width:100px;max-height:100px; max-width:100px" id="image" />
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
<table>
<tr>
  <td></td>
  <td>

<?php
  include('includes/config.php');
  
  if (isset($_POST['save'])){
   
  $name=$_POST['name'];
  $name= strtoupper($name);
  $age=$_POST['age'];
  $phone=$_POST['phone_no'];
  $sex=$_POST['sex'];
  $status=$_POST['status'];
  $address=$_POST['address'];
  $role=$_POST['role'];
  $pass=$_POST['pass'];
$pass=md5($pass);
  if(!empty($name)&&!empty($age)&& !empty($pass)
  && !empty($phone)&& !empty($sex)&& !empty($status)&& 
  !empty($address)&& !empty($role))
  {
    $file_name=$_FILES['file']['name'];
    $sql1= $db->prepare("SELECT name from user_all where name=? ");
    $sql1->bind_param("s",$name);
    $sql1->execute();
    $da1=$sql1->get_result();
    if($da1->num_rows >0){
      echo "
      <div style='margin-top:10px; margin-left:200px; color:red; padding:7px; background-color:white'>
      this name is already in the database
    </div>
    
    ";
    

    }else{

   $sql="INSERT INTO user_all(name, address, role, phone, pass, image,age,status,gender)
   VALUES(?,?,?,?,?,?,?,?,?)";
  $query= $db->prepare($sql);
  echo $db->error;
   $query->bind_param("sssississ", $name,$address,$role,$phone,$pass
   ,$file_name,$age,$status,$sex);
   
   $query->execute();
   
  

   if($sql){
include('upload.php');

    $sql=$db->prepare("SELECT user_id,name from user_all where name=? ");
    $da=$sql->bind_param('s',$name);
    echo $db->error;
    $sql->execute();
     $da=$sql->get_result();
    while($row=$da->fetch_object())
    {
    $id=$row->user_id;
    $date=Date('y');
    $iid='OPT'.'20'.$date.'0'.$id;
    $sql= $db->query("UPDATE user_all SET user_no='$iid' where user_id='$id' ");
    echo "
    <div style='margin-top:10px; margin-left:200px; padding:7px; background-color:white'>
    <b>NB:</b> your ID is"." ".$iid." "."

    The data are successfully submitted  
  <a href='bo.php'> click here</a> to move to next page
  </div>
  
  ";
  
   } }else {
        echo 'canot be added'.mysqli_error($db);
      }
    }
    
    }else{
    
    echo "<div style='margin-top:10px; margin-left:200px; padding:7px; color:red; background-color:white'>All fields are required!!</div>";
  }
  }
  $db->close();
  
?>

  </td>
</tr>
</table>

<?php include('includes/footer.php'); ?>
</div>

  </div>
  <script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
</script>