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
  </div>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="UserReg.php">
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
  <div style="background-color:rgb(51, 192, 51) " class="col-sm-12 col-md-12 col-lg-12" >
  <form class="form-horizontal" role="form" action="UserReg.php" enctype="multipart/form-data" method="post" >
  <div class="col-sm-2 col-md-2 col-lg-2"></div>
  <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:rgb(51, 192, 51); padding:6px" >
  <h3 class="text-center"> BIO DATA</h3>
  <hr/>
  <?php
?>
  <div class="col-sm-4 col-md-4 col-lg-4" style="border-right:1px solid white" >
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

  <td>
<label>WEIGHT<i>(kg/g)</i></label>
</td>
<td>
<input type="number" class="form-control"  name="weight" >
</td>
</tr>
<tr>

  <td>
<label>HEIGHT<i>(cm)</i></label>
</td>
<td>

<input type="number" class="form-control"  name="height" > 
</td>
</tr>


<tr>

  <td>
<label >MARITAL STATUS</label>
</td>
<td>
<select class=" mdb_select form-control md-form" name="status">
<option disabled selected >select option</option>
<option>divorced</option>
<option>single</option>
<option>complicated</option>
<option>married</option>
<option>separated</option>
</select>
</td>
</tr>

</table>
</div>
<div class="col-sm-4 col-md-4 col-lg-4"  style="border-right:1px solid white">
<table>
<tr>

<td>
<label>PHONE NUNBER</label>
</td>
<td>
<input type="phone" class="form-control" name="phone_no" id="phone_no"
placeholder="xxxxxxx">
</td>
</tr>
<tr>

  <td>

<label >STATE</label>
</td>
<td>
<select class="mdb_select form-control md-form" name="state" id="state">
<option disabled selected>select option</option>
<option>LAGOS</option>
<option>ABUJA</option>
<option>OYO</option>
<option>OSUN</option>
<option>OGUN</option>
<option>EKITI</option>
<option>ONDO</option>
<option>KWARA</option>
<option>DELTA</option>
<option>RIVERS</option>
<option>KANO</option>
<option>EDO</option>
<option>AKWA IBOM</option>
<option>MADUGURI</option>
</select>
</td>
</tr>
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
<td></td>
<td>
<button type="submit" class="btn btn-default" name="save" >Save</button>

</td>
</tr> 
</table>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">


<table><tr><td>
  <input type="file" class="form-control" name="file"
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
   $user=$_SESSION['user_no'];
  $name=$_POST['name'];
  $name= strtoupper($name);
  $age=$_POST['age'];
  $weight=$_POST['weight'];
  $height=$_POST['height'];
  $phone=$_POST['phone_no'];
  $sex="FEMALE";
  $state=$_POST['state'];
  $status=$_POST['status'];
  $address=$_POST['address'];
$password='1234567';
$password=md5($password);
  if(!empty($name)&&!empty($age)&& !empty($weight)&& !empty($height)
  && !empty($phone)&& !empty($sex)&& !empty($state)&& !empty($status)&& 
  !empty($address))
  {

    
$file_tmp_name=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$target_dir="images/";
$target_file=$target_dir.basename($file_name);
$upload=1;
$imageType=pathinfo($target_file,PATHINFO_EXTENSION);
$check=getimagesize($file_tmp_name);
if(file_exists($target_file)){
  echo " <p style='color: red; margin-left:200px; background-color:#FAC0C6; padding:8px'><span style='color:red' 
  class='glyphicon glyphicon-exclamation-sign'></span>image is already in the database</p> ";

}else{
  

  if($_FILES["file"]["size"] <= 200000){
 
    if ($check != false){

      if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"
      && $imageType != "gif"){
        echo "<p style='color: red; margin-left:200px; background-color:#FAC0C6; padding:8px'><span style='color:red' 
        class='glyphicon glyphicon-exclamation-sign'></span>sorry file must be an image</p> ";
      
      }else{
     if($upload==0){
     echo "<p style='color: red; margin-left:200px; background-color:#FAC0C6; padding:8px'><span style='color:red' 
     class='glyphicon glyphicon-exclamation-sign'></span>your image was not uploaded, try again</p> ";
   
     }else{
       
    $sql1= $db->prepare("SELECT name1 from anc_reg where name1=? ");
    $sql1->bind_param("s",$name);
    $sql1->execute();
    $da1=$sql1->get_result();
    if($da1->num_rows >0){
      echo "
      <p style='color: red; margin-left:200px; background-color:#FAC0C6; padding:8px'><span style='color:red' 
         class='glyphicon glyphicon-exclamation-sign'></span>  this name is already in the database</p> ";

    
    
    

    }else{

   $sql="INSERT INTO anc_reg (name1,age,address1,marital_status,phone,weight1,height,sex,state1,image,user_no,pass) 
   VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
  $query= $db->prepare($sql);
  echo $db->error;
   $query->bind_param("sisssiisssss", $name,$age,$address,$status,$phone,$weight,$height,$sex,
   $state,$file_name,$user,$password);
   
   $query->execute();

   
       move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
     $upload=1;
   


     if($sql && $upload ==1){


      $sql=$db->prepare("SELECT ANC_id,name1 from anc_reg where name1=? ");
      $da=$sql->bind_param('s',$name);
      echo $db->error;
      $sql->execute();
       $da=$sql->get_result();
      while($row=$da->fetch_object())
      {
      $id=$row->ANC_id;
      $date=Date('y');
      $iid='ANC'.'/'.$date.'/'.$id;
      $sql= $db->query("UPDATE anc_reg SET ANC_no='$iid' where ANC_id='$id' ");
      echo "
      <div style='margin-top:10px; margin-left:200px; padding:7px; background-color:white'>
      <b>NB:</b> your ID is"." ".$iid." "."
  
      The data are successfully submitted  
    <a href='bo.php'> click here</a> to move to next page
    </div>
    
    ";
    
     } }else {
          echo 'canot be added'.mysqli_error($db).'and check if the image size exceeds 200kb ';
        }
      }


   
      }
   
     }
     
   }
   
else{
  echo "<p style='color: red; margin-left:200px; background-color:#FAC0C6; padding:8px'><span style='color:red' 
  class='glyphicon glyphicon-exclamation-sign'></span>file is not an image</p> ";

  $upload=0;
  }
  }else{
    echo "<p style='color: red; margin-left:200px; background-color:#FAC0C6; padding:8px'><span style='color:red' 
    class='glyphicon glyphicon-exclamation-sign'></span>image is too large</p> ";
  
  }
  }
  
       
    
    }else{
    
    echo "<p style='color: red; margin-left:200px; background-color:#FAC0C6; padding:8px'><span style='color:red' 
    class='glyphicon glyphicon-exclamation-sign'></span>All fields are required!!</p> ";
  
  }
  }
  $db->close();
  
?>

  </td>
</tr>
</table>
</div>

</div>
</form>  
</div>

<?php 
include('includes/footer.php');
?>
<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  
  </script>