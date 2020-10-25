


<?php  session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}

$session= $_SESSION['role'];

include('includes/header.php');

?>
<div class="container-fluid">

<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
<h1 class="text-center"> PATIENT RECORDS</h1>
</div>
<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:40px">
<div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="table.php">
<button class="btn-small btn-success" name="go"style="padding:4px"><span class="glyphicon glyphicon-home"></span>Home</button>
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
<?php


include('includes/config.php');

$sql="SELECT * FROM
anc_reg a
JOIN obsectric b ON a.ANC_no=b.ANC_no
";
$query=$db->prepare($sql);
 $query->execute();
 echo $db->error;
$result= $query->get_result();

if($result->num_rows > 0){
  echo"<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
 
  <table id='table'>
  <thead>
 <tr>
 <th>SN</th>
 <th>ANC NO.</th>
 <th>NAME</th>
 <th>AGE</th>
 <th>ADDRESS</th>
 
 <th>DATE OF VISIT</th>
 <th>MARITAL STATUS</th>
 <th>GRAVIDITY</th>
 <th>PARITY</th>
 <th>NO OF CHILDREN</th>
 <th>LMP</th>
 
 <th>EDD</th>
 
 </thead><tbody>
 ";
 
while($row=$result->fetch_object()){
  

  echo "

<tr>
<td>".$row->ANC_id."</td>
<td>".$row->ANC_no."</td>
<td>".$row->name1."</td>
<td>".$row->age."</td>
<td>".$row->address1."</td>
<td>".$row->date_of_visit."</td>
<td>".$row->marital_status."</td>
<td>".$row->gradity."</td>
<td>".$row->parity."</td>
<td>".$row->no_child."</td>
<td>".$row->lmp."</td>
<td>".$row->edd."</td>";

if($session == "Administrator"){
echo "
  <td><button class='btn btn-success'><a href ='tab_v.php?id=".$row->ANC_no."' name='view'><span class='glyphicon glyphicon-eye-open' ></span>view</a></button></td>
  </tr>
    ";
  
  }elseif( $session =="Doctor"){
echo "
<td><button class='btn btn-success' disabled>view</button></td>
</tr>
  
";
  
  }else{
      echo "
      <td><button class='btn btn-success' disabled>view</button></td>
      </tr>
        ";
      
  } 
  
}}

else{

  echo "<h2 class='text-center'> no complete record in the database for now </h2>";
}
?>
</tbody>
</table>
</div>
  


<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>