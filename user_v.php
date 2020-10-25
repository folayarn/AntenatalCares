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
  <h1 class="text-center"> MY PROFILE</h1>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="table.php">
<button class="btn-small btn-success" name="go"style="padding:4px"><span class="glyphicon glyphicon-home"></span>Home</button>
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
  <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:40px">
 <div class="col-sm-11 col-md-11 col-lg-11" >
  <?php 
  include('includes/config.php');
  if(!isset($_GET['id'])){
    header('location:admin.php');
    exit();
  }else{
$search=$_GET['id'];

$sql="SELECT * FROM user_all WHERE user_no=? ";
$query=$db->prepare($sql);
 $query->bind_param("s",$search);
 $query->execute();
 echo $db->error;
 
$result= $query->get_result();
if($result->num_rows > 0){
while($row=$result->fetch_object()){

echo "
  
    
<div class='col-sm-10 col-md-10 col-lg-10' style='border:2px solid green ; margin-left:90px; background-color:white; margin-bottom:40px'  >
  
  <div class='col-sm-10 col-md-10 col-lg-10'  > 
  <img src='images/".$row->image."' width='120' height='120' class='pull-right' style='margin:10px' />
   </div>
   <div class='col-sm-10 col-md-10 col-lg-10'  > 
     <table id='user'>

   <tr>
   <td><label>USER ID:<label></td>
   <td>".$row->user_no."</td>
   </tr>
   <tr>
   <td><label>FULL NAME:</label></td>
   <td>".$row->name."</td>
   </tr>
   <tr>
   <td><label>AGE:</label></td>
   <td>".$row->age."</td>
   </tr>
   <tr>
   <td><label>ADDRESS:</label></td>
   <td>".$row->address."</td>
   </tr>
   <tr>
   <td><label>MARITAL STATUS:</label></td>
   <td>".$row->status."</td>
   </tr><tr>
   <td><label>PHONE NUMBER</label>:</td>
   <td>".$row->phone."</td>
   </tr>
   <tr>
   <td><label>GENDER:</label></td>
   <td>".$row->gender."</td>
   </tr>
   </table>";
}
}else{
    echo "<h2 class='text-center'> no data recored for this user </h2>";


}


}
   ?>
 </div>
  </div></div></div>
   <?php include('includes/footer.php'); ?>
    
    </div>
</div>



<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>