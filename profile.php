<?php
 session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}



include('includes/header.php');
?>


<style>

@media print{
#top_bar,button{

  display:none;
}

table{
font-family:Times New Roman;
font-size: 11pt;
margin:0px;
padding: 0px; 
width:100%;

}

#ajaxDiv{

  width: 100%;
  height: auto;
  margin: 0px;
  padding: 0px;
  border: 0px;
}

#dd{
  display: initial;
}
#table tr th{
font-size: 14pt;


}

}









</style>

<div class="container-fluid">

    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
  <h1 class="text-center"> PATIENT INFORMATIONS</h1>
  <div class="col-sm-12 col-md-12 col-lg-12" >
  <form method="GET" action="table.php">
<button class="btn-small btn-success" name="go"style="padding:4px"><span class="glyphicon glyphicon-home"></span>Home</button>

<button class='btn btn-danger  btn-md pull-right ' onclick=window.print(); style='margin-top:20px'>
<span class='glyphicon glyphicon-print' ></span> print</button>
      
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
  if(isset($_POST['search'])){
    $search=$_POST['search1'];

   if (empty($search)){

    if($_SESSION['role'] == "Administrator")
    {
      header('location: admin.php ');
    
      }elseif( $_SESSION['role'] =="Doctor"){
      header('location: doctor.php ');
    
      
      }else{
            header('location:recept.php ');
         } 
      
  

   }else{

   
  

$sql="SELECT * FROM anc_reg WHERE ANC_no=? ";
$query=$db->prepare($sql);
 $query->bind_param("s",$search);
 $query->execute();
 echo $db->error;
 $date=Date('d/m/y');
$result= $query->get_result();
if($result->num_rows > 0){
while($row=$result->fetch_object()){

echo "
  <div class='col-sm-10 col-md-10 col-lg-10' id='ajaxDiv'  >


  <img src='images/UP.jpg' id='dd' />
  <div class='col-sm-10 col-md-10 col-lg-10'  >
     
  <h4 class='pull-left' id='dd' style='margin-top:70px' >DATE <i>".$date."</i> </h4>

  <img src='images/".$row->image."' width='120' height='120' class='pull-right' style='margin:20px' />
  </div>  
     <div class='col-sm-5 col-md-5 col-lg-5'>
     <table id='table'>
   <tr>
    <th></th>
    <th>BIO DATA</th>   
   </tr>
   <tr>
   <td>PATIENT ID:</td>
   <td>".$row->ANC_no."</td>
   </tr>
   <tr>
   <td>FULL NAME:</td>
   <td>".$row->name1."</td>
   </tr>
   <tr>
   <td>AGE:</td>
   <td>".$row->age."</td>
   </tr>
   <tr>
   <td>ADDRESS:</td>
   <td>".$row->address1."</td>
   </tr>
   <tr>
   <td>MARITAL STATUS:</td>
   <td>".$row->marital_status."</td>
   </tr><tr>
   <td>PHONE NUMBER:</td>
   <td>".$row->phone."</td>
   </tr><tr>
   <td>WEIGHT:</td>
   <td>".$row->weight1."</td>
   </tr>
   <tr>
   <td>HEIGHT:</td>
   <td>".$row->height."</td>
   </tr>
   <tr>
   <td>DATE OF ADMISSION:</td>
   <td>".$row->date_of_visit."</td>
   </tr>
   <tr>
   <td>SEX:</td>
   <td>".$row->sex."</td>
   </tr>
   <tr>
   <td>STATE:</td>
   <td>".$row->state1."</td>
   </tr>";

   $sql1=$db->prepare("SELECT ANC_no, date1, gestation_age, hb, ANC_RF, visit_week FROM risk_factors WHERE ANC_no= ? AND visit_week=1 ");
   $sql1->bind_param("s",$search);
   $sql1->execute();
  $result1= $sql1->get_result();
  while($row1=$result1->fetch_object()){
  $sql0=$db->prepare("SELECT COUNT(visit_week) as num FROM risk_factors WHERE ANC_no=?");
$sql0->bind_param("s",$search);
$sql0->execute();
$result0=$sql0->get_result();
$row0= $result0->fetch_assoc();
echo" <tr>
<th></th>
<th>RISK FACTORS</th>   
</tr>
<tr>
<td>NUMBER OF VISITS</td>
<td>".$row0['num']."</td>
</tr>
";

echo "
   
   <tr>
    <th></th>
    <th>1ST WEEK</th>   
   </tr>
   <tr>
   <td>DATE:</td>

   <td>".$row1->date1."</td>
   </tr>
   <tr>
   <td>GESTATTION AGE:</td>
   <td>".$row1->gestation_age."</td>
   </tr>
   <tr>
   <td>HAEMOGLOBIN:</td>
   <td>".$row1->hb."</td>
   </tr>
   <tr>
   <td>RISK FACTORS:</td>
   <td>".$row1->ANC_RF."</td>
   </tr>
   <tr>
    <th></th>
    <th>2ND WEEK</th>   
   </tr>
   ";
  }

  $sql2=$db->prepare("SELECT ANC_no, date1, gestation_age, hb, ANC_RF, visit_week FROM risk_factors WHERE ANC_no= ? AND visit_week=2 ");
  $sql2->bind_param("s",$search);
  $sql2->execute();
 $result2= $sql2->get_result();
while( $row2=$result2->fetch_object())
{ echo "
   <tr>
   <td>DATE:</td>
   <td>".$row2->date1."</td>
   </tr>
   <tr>
   <td>GESTATTION AGE:</td>
   <td>".$row2->gestation_age."</td>
   </tr>
   <tr>
   <td>HAEMOGLOBIN:</td>
   <td>".$row2->hb."</td>
   </tr>
   <tr>
   <td>RISK FACTORS:</td>
   <td>".$row2->ANC_RF."</td>
   </tr>";}

   $sql3=$db->prepare("SELECT ANC_no, date1, gestation_age, hb, ANC_RF, visit_week FROM risk_factors WHERE ANC_no= ? AND visit_week=3 ");
   $sql3->bind_param("s",$search);
   $sql3->execute();
  $result3= $sql3->get_result();
  while($row3=$result3->fetch_object()){
echo " 

   <tr>
    <th></th>
    <th>3RD WEEK</th>   
   </tr>
   <tr>
   <td>DATE:</td>
   <td>".$row3->date1."</td>
   </tr>
   <tr>
   <td>GESTATTION AGE:</td>
   <td>".$row3->gestation_age."</td>
   </tr>
   <tr>
   <td>HAEMOGLOBIN:</td>
   <td>".$row3->hb."</td>
   </tr>
   <tr>
   <td>RISK FACTORS:</td>
   <td>".$row3->ANC_RF."</td>
   </tr>";}

   $sql4=$db->prepare("SELECT ANC_no, date1, gestation_age, hb, ANC_RF, visit_week FROM risk_factors WHERE ANC_no= ? AND visit_week=4 ");
   $sql4->bind_param("s",$search);
   $sql4->execute();
  $result4= $sql4->get_result();
  while($row4=$result4->fetch_object()){
  

   echo "
   <tr>
    <th></th>
    <th>4TH WEEK</th>   
   </tr>
   <tr>
   <td>DATE:</td>
   <td>".$row4->date1."</td>
   </tr>
   <tr>
   <td>GESTATTION AGE:</td>
   <td>".$row4->gestation_age."</td>
   </tr>
   <tr>
   <td>HAEMOGLOBIN:</td>
   <td>".$row4->hb."</td>
   </tr>
   <tr>
   <td>RISK FACTORS:</td>
   <td>.$row4->ANC_RF.</td>
   </tr>
     </table>
     </div>
     <div class='col-sm-6 col-md-5 col-lg-6'>
     <table id='table'>
     ";

  }

     
$sql="SELECT * FROM obsectric WHERE ANC_no=? ";
$query=$db->prepare($sql);
 $query->bind_param("s",$search);
 $query->execute();

$result= $query->get_result();
while($row=$result->fetch_object()){

     echo "
     <tr>
    <th></th>
    <th> OBSTETRIC HISTORY
    
   </th>   
   </tr>
   <tr>
   <td>GRAVIDITY:</td>
   <td>".$row->gradity."</td>
   </tr>
   <tr>
   <td>PARITY:</td>
   <td>".$row->parity."</td>
   </tr>
   <tr>
   <td>NUMBER OF CHILDREN:</td>
   <td>".$row->no_child."</td>
   </tr>
   <tr>
   <td>LMP:</td>
   <td>".$row->lmp."</td>
   </tr>
   <tr>
   <td>EDD:</td>
   <td>".$row->edd."</td>
   </tr><tr>
   <td>GESTATION AGE:</td>
   <td>".$row->gest_age."</td>
   </tr>
   <tr>
   <td>STILL BIRTH:</td>
   <td>".$row->stillbirth."</td>
   </tr>
   <tr>
   <td>ABORTION:</td>
   <td>".$row->abortion."</td>
   </tr>
   <tr>
   <td>CEASARIAN SECTION:</td>
   <td>".$row->c_section."</td>
   </tr>
   ";
}

   $sql="SELECT * FROM test WHERE ANC_no=? ";
   $query=$db->prepare($sql);
    $query->bind_param("s",$search);
    $query->execute();
    echo $db->error;
    
   $result= $query->get_result();
   while($row=$result->fetch_object()){
   
echo "

   
      <tr>
    <th></th>
    <th> TEST HISTORY
    
   </th>   
   </tr>
   <tr>
   <td>HIV:</td>
   <td>".$row->hiv."</td>
   </tr>
   <tr>
   <td>HIV TEST RESULT:</td>
   <td>".$row->test_hiv."</td>
   </tr>
   
   <tr>
   <td>BLOOD PRESSURE:</td>
   <td>".$row->bp."</td>
   </tr>
   <tr>
   <td>RHESUS FACTOR:</td>
   <td>".$row->rh."</td>
   </tr>
   <tr>
   <td>URINE TEST:</td>
   <td>".$row->urine."</td>
   </tr>
      <tr>
   <td>ARV:</td>
   <td>".$row->ARV."</td>
   </tr>
   <tr>
   <td>ULTRA SOUND SCAN:</td>
   <td>".$row->ultra."</td>
   </tr>
 ";}
 
 
$sql="SELECT * FROM pregna_out WHERE ANC_no=? ";
$query=$db->prepare($sql);
 $query->bind_param("s",$search);
 $query->execute();
 echo $db->error;
 
$result= $query->get_result();
while($row=$result->fetch_object()){

 echo "
   <tr>
    <th></th>
    <th> PREGNANCY OUTCOME
    
   </th>   
   </tr>
   <tr>
   <td>COMPLICATION</td>
   <td>".$row->complication."</td>
   </tr>
   <tr>
   <td>DATE OF DELIVERY:</td>
   <td>".$row->delivery."</td>
   </tr>
   ";}
   
$sql="SELECT * FROM drugs WHERE ANC_no=? ";
$query=$db->prepare($sql);
 $query->bind_param("s",$search);
 $query->execute();
 echo $db->error;
 
$result= $query->get_result();
while($row=$result->fetch_object()){

   
   echo "
   <tr>
    <th></th>
    <th> DRUGS ISSUED
    
   </th>   
   </tr>
   <tr>
   <td>FANSIDAR QUANTITY</td>
   <td>".$row->fan_q."</td>
   </tr>
   <tr>
   <td>DATE:</td>
   <td>".$row->fan_date."</td>
   </tr>
   <tr>
   <td>TT QUANTITY</td>
   <td>".$row->tt_dos."</td>
   </tr>
   <tr>
   <td>DATE:</td>
   <td>".$row->tt_date."</td>
   </tr>
   <tr>
   <td>MEBEND DATE</td>
   <td>".$row->meb."</td>
   </tr>
   <tr>
   <td>DEWORM DATE:</td>
   <td>".$row->deworm."</td>
   </tr>
   <tr>
   <td></td>
   <td></td>
   </tr>
   <tr>
   <td>ITN DATE:</td>
   <td> ".$row->itn."</td>
   </tr>
   <tr>
   <td>IRON/FOLATES:</td>
   <td> ".$row->iron."</td>
   </tr> ";

}
}

   echo "
   </table>
    </div>
  </div>
  </div>";
 
}else 
{
      echo 'No Record Found'.mysqli_error($db);
 
}

}   }
    

  

$db->close();

 


  
  
  
  
  ?>
  
  </div>
  
  
 
  
  </div>

  
  <?php include('includes/footer.php'); ?>


<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
function print(){
window.print();

}
</script>