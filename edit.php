
<?php
error_reporting(E_ALL);
ini_set('dispaly_errors',1); 
session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}


 include('includes/header.php'); 
include('includes/config.php');

?>

<div class="container-fluid">
    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
  <h1 class="text-center">UPDATE DETAILS </h1>
 </div>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET">
<button class="btn btn-lg  btn-success" name="go" style="padding:7px; color:black"><span class="glyphicon glyphicon-home"></span>Home</button>
  </form>

  <?php

if(isset($_GET['go'])){
echo $session;
  if( $_SESSION['role']== "Administrator"){
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
  <div class="col-sm-11 col-md-11 col-lg-11" >
  <?php 
    

    include('includes/config.php');
  if (isset($_GET['ide'])){
    $search=$_GET['ide'];
    
    if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $name= strtoupper($name);
    $age=$_POST['age'];
    $phone=$_POST['phone_no'];
    $status=$_POST['status'];
    $address=$_POST['address'];
    $file_name=$_FILES['file']['name'];    
    if(!empty($name)&&!empty($age)
    && !empty($phone)&& !empty($status)&& 
    !empty($address))
    {
      
    $sql1=$db->query(" UPDATE user_all SET name='$name',
    address='$address', phone='$phone',
      image='$file_name', age='$age', status='$status'
       WHERE user_no='$search' ");
  
     if($sql1){
  include('upload.php');
      echo "
      <div style='margin-top:10px; margin-left:200px; padding:7px; background-color:white'>
      
  
      The data for this USER(".$search.") are successfully modified and submitted  
    <a href='admin.php'> click here</a> to the administrator page
    </div>
    
    ";
    }else {
          echo 'canot be added'.mysqli_error($db);
        }}else{
      
      echo "<div style='margin-top:10px; margin-left:200px; padding:7px; color:red; 
      background-color:white'>All fields are required!!</div>";
    }
    }
    $sql="SELECT * FROM user_all WHERE user_no=? ";
    $query=$db->prepare($sql);
     $query->bind_param("s",$search);
     $query->execute(); 
    $result= $query->get_result();
    if($result->num_rows > 0){
    $row=$result->fetch_object();
  ?>
  




  
  <div style="background-color:rgb(51, 192, 51) " class="col-sm-12 col-md-12 col-lg-12" >
  <form class="form-horizontal" role="form" action="" enctype="multipart/form-data" method="POST" >
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
<input type="text" class="form-control" value="<?php echo $row->name; ?>" name="name" >
</td>
</tr>
<tr>

  <td>
<label  >AGE</label>
</td>
<td>
<input type="number" class="form-control" value="<?php echo $row->age; ?>" name="age" >

</td>
</tr>
<tr>

<tr>

  <td>
<label >MARITAL STATUS</label>
</td>
<td>
<select class=" mdb_select md-form form-control" name="status">
<option disabled selected ><?php echo $row->status; ?></option>
<option>Divorced</option>
<option>Single</option>
<option>Complicated</option>
<option>Married</option>
<option>Separated</option>
</select>
</td>
</tr>
<tr>

  <td>

<label >ROLE</label>
</td>
<td>
<select class="mdb_select md-form form-control" name="role" disabled>
<option disabled selected><?php echo $row->role; ?></option>
<option value="Administrator">ADMIN</option>
<option value="Doctor">DOCTOR</option>
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
<input type="phone" class="form-control" value="<?php echo $row->phone; ?>" name="phone_no" 
placeholder="xxxxxxx">
</td>
</tr>
<tr>

  <td>
<label >GENDER</label>
</td>
<td>
<select class=" mdb_select md-form form-control" name="sex" disabled>
<option disabled selected ><?php echo $row->gender; ?></option>
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
<textarea rows="2" id="address" class="form-control"  name="address">
    <?php echo $row->address; ?></textarea>

</td>

</tr>

<tr>
<tr>
<td>  
<label>USER ID</label>
</td>

<td>
<input type="text" name="ide" class="form-control" value="<?php echo $row->user_no; ?>"  disabled />
</td>
</tr>

<td></td>
<td>
<button type="submit" class="btn btn-default" name="submit" >Save</button>

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

<img src="<?php echo 'images/'.$row->image;}

$db->close();?>  " style=" height:100px; width:100px" id="image" />
</div>
</div>
<?php }?>
</form>
</div></div></div>
   <?php include('includes/footer.php'); ?>
</div>

  </div>
  <script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
</script>