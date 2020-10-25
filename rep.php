
<?php  session_start();
if(!isset($_SESSION['user_no'])){
  header('location:logout.php');
  exit();
}

$session= $_SESSION['role'];

include('includes/header.php');

include('includes/config.php');
?>
<style>

@media print{
#top_bar,form{

  display:none;
}

table{
font-family:Times New Roman;
font-size: 11pt;
margin:0px;
padding: 0px; 
width:100%;

}
#dd{
  display: initial;
}

}









</style>

<div class="container-fluid">

<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
<h1 class="text-center"> REPORTS</h1>
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
<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="  margin:20px 20px 10px 10px">
<form method="post" action="rep.php">  
<div  class="col-xs-5 col-sm-3 col-md-2 col-lg-2">
<select class="mdb_select md-form form-control"  name="ro">
<option disabled selected>Range</option>
<option>Daily</option>
<option>Weekly</option>
<option>Monthly</option>
</select>
</div>
<div  class="col-xs-10 col-sm-3 col-md-3 col-lg-3">
 
               <table><tr><td>  <label> From:</label></td>
                <td>  <input type="date" name="first" class="form-control"></td></tr>
         </table>
</div>

                  <div  class="col-xs-10 col-sm-3 col-md-3 col-lg-3">
         
                  <table><tr><td>             <label> To:</label></td>
               <td>   <input type="date" name="second" class="form-control"></td></tr>
         </table>
                  </div>
                  <div  class="col-xs-7 col-sm-1 col-md-1 col-lg-1">
             
                  <table><tr><td>   <button class="btn btn-primary" name="fetch">
                    <span class="glyphicon glyphicon-stats" ></span>fetch</button></td></tr></table>
                  
</div>  
<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'>
<button class='btn btn-danger pull-right' onclick='window.print()' style='padding:3px'><span class='glyphicon glyphicon-print' ></span> print</button>
</div>

</div>
</form>
</div>
         
</div></div><hr/>



<?php
// fectching report
if(isset($_POST['fetch'])){
$first=$_POST['first'];
$second=$_POST['second'];
$ro=$_POST['ro'];
$date=Date('d-m-y');


if(!empty($first)&& !empty($second)&& !empty($ro)){
  
  $sql=$db->prepare("SELECT COUNT(abortion)as total FROM obsectric WHERE date(date_of_visit) BETWEEN '$first' and '$second' AND age < 18");
 $sql->execute();
  $res=$sql->get_result();
  $row=$res->fetch_assoc();
  $sql1=$db->prepare("SELECT COUNT(abortion)as total FROM obsectric WHERE date(date_of_visit) BETWEEN '$first' and '$second' AND age >= 18");
  $sql1->execute();
   $res1=$sql1->get_result();
   $row1=$res1->fetch_assoc();
   $sql2=$db->prepare("SELECT COUNT(visit_week)as total FROM risk_factors WHERE date(date_of_visit) 
   BETWEEN '$first' and '$second' AND age < 18");
   $sql2->execute();
    $res2=$sql2->get_result();
    $row2=$res2->fetch_assoc();
   
    $sql3=$db->prepare("SELECT COUNT(visit_week)as total FROM risk_factors WHERE date(date_of_visit) 
    BETWEEN '$first' and '$second' AND age >= 18");
    $sql3->execute();
     $res3=$sql3->get_result();
     $row3=$res3->fetch_assoc();
    
 
     $sql4=$db->prepare("SELECT COUNT(visit_week)as total FROM risk_factors WHERE date(date_of_visit) 
     BETWEEN '$first' and '$second' AND age >= 18 AND gestation_age < 12");
     $sql4->execute();
      $res4=$sql4->get_result();
      $row4=$res4->fetch_assoc();
    
      $sql5=$db->prepare("SELECT COUNT(visit_week)as total FROM risk_factors WHERE date(date_of_visit) 
      BETWEEN '$first' and '$second' AND age >= 18 AND gestation_age < 12");
      $sql5->execute();
       $res5=$sql5->get_result();
       $row5=$res5->fetch_assoc();

       $sql6=$db->prepare("SELECT COUNT(ANC_RF)as total FROM risk_factors WHERE date(date_of_visit) 
       BETWEEN '$first' and '$second' AND age < 18 AND ANC_RF='H' ");
       $sql6->execute();
        $res6=$sql6->get_result();
        $row6=$res6->fetch_assoc();
          
   
        $sql7=$db->prepare("SELECT COUNT(gestation_age)as total FROM risk_factors WHERE date(date_of_visit) 
        BETWEEN '$first' and '$second' AND age >= 18 AND ANC_RF='H' ");
        $sql7->execute();
         $res7=$sql7->get_result();
         $row7=$res7->fetch_assoc();
           
   
         $sql8=$db->prepare("SELECT COUNT(hiv)as total FROM test WHERE date(date_of_visit) 
          BETWEEN '$first' and '$second' AND age < 18 AND hiv='yes' ");
         $sql8->execute();
        $res8=$sql8->get_result();
          $row8=$res8->fetch_assoc();
            
     
          $sql9=$db->prepare("SELECT COUNT(hiv)as total FROM test WHERE date(date_of_visit) 
          BETWEEN '$first' and '$second' AND age >= 18 AND hiv='yes' ");
          $sql9->execute();
           $res9=$sql9->get_result();
           $row9=$res9->fetch_assoc();
    
 
           $sql10=$db->prepare("SELECT COUNT(test_hiv)as total FROM test WHERE date(date_of_visit) 
           BETWEEN '$first' and '$second' AND age < 18 AND test_hiv='positive' ");
            $sql10->execute();
            $res10=$sql10->get_result();
            $row10=$res10->fetch_assoc();
     
  
            $sql11=$db->prepare("SELECT COUNT(test_hiv)as total FROM test WHERE date(date_of_visit) 
            BETWEEN '$first' and '$second' AND age >= 18 AND test_hiv='positive' ");
            $sql11->execute();
             $res11=$sql11->get_result();
             $row11=$res11->fetch_assoc();

             $sql12=$db->prepare("SELECT COUNT(test_hiv)as total FROM test WHERE date(date_of_visit) 
             BETWEEN '$first' and '$second' AND age < 18 AND test_hiv='negative' ");
             $sql12->execute();
              $res12=$sql12->get_result();
              $row12=$res12->fetch_assoc();
       
              $sql13=$db->prepare("SELECT COUNT(test_hiv)as total FROM test WHERE date(date_of_visit) 
              BETWEEN '$first' and '$second' AND age >= 18 AND test_hiv='negative' ");
              $sql13->execute();
               $res13=$sql13->get_result();
               $row13=$res13->fetch_assoc();
        
               $sql13=$db->prepare("SELECT COUNT(test_hiv)as total FROM test WHERE date(date_of_visit) 
              BETWEEN '$first' and '$second' AND age >= 18 AND test_hiv='negative' ");
              $sql13->execute();
               $res13=$sql13->get_result();
               $row13=$res13->fetch_assoc();
        
               $sql14=$db->prepare("SELECT COUNT(itn)as total FROM drugs WHERE date(date_of_visit) 
               BETWEEN '$first' and '$second' AND age < 18 ");
               $sql14->execute();
                $res14=$sql14->get_result();
                $row14=$res14->fetch_assoc();
         
                $sql15=$db->prepare("SELECT COUNT(itn)as total FROM drugs WHERE date(date_of_visit) 
                BETWEEN '$first' and '$second' AND age >= 18 ");
                $sql15->execute();
                 $res15=$sql15->get_result();
                 $row15=$res15->fetch_assoc();
          
                 $sql16=$db->prepare("SELECT COUNT(meb)as total FROM drugs WHERE date(date_of_visit) 
                 BETWEEN '$first' and '$second' AND age < 18 ");
                 $sql16->execute();
                  $res16=$sql16->get_result();
                  $row16=$res16->fetch_assoc();
           

                  $sql17=$db->prepare("SELECT COUNT(meb)as total FROM drugs WHERE date(date_of_visit) 
                  BETWEEN '$first' and '$second' AND age >= 18 ");
                  $sql17->execute();
                   $res17=$sql17->get_result();
                   $row17=$res17->fetch_assoc();
            

                   $sql18=$db->prepare("SELECT COUNT(fan_q)as total FROM drugs WHERE date(date_of_visit) 
                   BETWEEN '$first' and '$second' AND age < 18 AND fan_q=2 ");
                   $sql18->execute();
                    $res18=$sql18->get_result();
                    $row18=$res18->fetch_assoc();

                    
                   $sql19=$db->prepare("SELECT COUNT(fan_q)as total FROM drugs WHERE date(date_of_visit) 
                   BETWEEN '$first' and '$second' AND age >= 18 AND fan_q=2 ");
                   $sql19->execute();
                    $res19=$sql19->get_result();
                    $row19=$res19->fetch_assoc();

                  $sql20=$db->prepare("SELECT COUNT(tt_dos)as total FROM drugs WHERE date(date_of_visit) 
                  BETWEEN '$first' and '$second' AND age < 18 AND tt_dos > 1 ");
                  $sql20->execute();
                   $res20=$sql20->get_result();
                   $row20=$res20->fetch_assoc();

                   $sql21=$db->prepare("SELECT COUNT(tt_dos)as total FROM drugs WHERE date(date_of_visit) 
                   BETWEEN '$first' and '$second' AND age >= 18 AND tt_dos > 1 ");
                   $sql21->execute();
                    $res21=$sql21->get_result();
                    $row21=$res21->fetch_assoc();
                    
                   $sql22=$db->prepare("SELECT COUNT(visit_week)as total FROM risk_factors WHERE date(date_of_visit) 
                   BETWEEN '$first' and '$second' AND age >= 18 AND visit_week >= 4 ");
                   $sql22->execute();
                    $res22=$sql22->get_result();
                    $row22=$res22->fetch_assoc();
    
                    $sql23=$db->prepare("SELECT COUNT(visit_week)as total FROM risk_factors WHERE date(date_of_visit) 
                    BETWEEN '$first' and '$second' AND age >= 18 AND visit_week >= 4 ");
                    $sql23->execute();
                     $res23=$sql23->get_result();
                     $row23=$res23->fetch_assoc();
   
echo"
<div  class='col-xs-12 col-sm-12 col-md-12 col-lg-12' >
<img src='images/UP.jpg' id='dd' />
</div>
<div  class='col-xs-12 col-sm-12 col-md-12 col-lg-12' style='  margin:10px 10px 10px 10px'>
<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-left' id=dd >
  <h4  >FROM: <i>".$first."</i> </h4>
  <h4  >TO: <i>".$second."</i> </h4>

</div>

<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right' id=dd >
  <h4  >DATE <i>".$date."</i> </h4></div>
</div>
<div  class='col-xs-12 col-sm-12 col-md-12 col-lg-12' style='  margin:10px 10px 10px 10px'>

<h3 id='dd' > This is the ".$ro." Reports Generated  On Antenatal Care Activities 
of the Hospital And this was generated by <b>".$_SESSION['name']."</b> the ".$_SESSION['role']." </h3>

  
</div>

<div  class='col-xs-12 col-sm-12 col-md-12 col-lg-12' style='border-top:5px solid green'  id='drop'>

<table id='we'>
<tr >
  <th></th>
  <th colspan='2'> OPERATION STATISTICS</th>
</tr>
<tr>
  <td ></td>
  <td>< 18</td>
  <td>>=18</td>
  
</tr>
</tr>

<tr>
  <td > number of antenatal visit < 1st trimester </td>
  <td>". $row4['total']."</td>
  <td>". $row5['total']."</td>
  
</tr><tr>
  <td > number of antenatal visit > 1st trimester </td>
  <td>". $row2['total']."</td>
  <td>".$row2['total']."</td>
  
</tr>
<tr>
  <td > number of antenatal visits </td>
  <td>". $row2['total']."</td>
  <td>".$row3['total']."</td>
  
</tr>

<tr>
  <td > number of abortions </td>
  <td>". $row['total']."</td>
  <td>". $row1['total']."</td>
  
</tr>
<tr>
  <td > number of hight rish prenagnacy detected </td>
  <td>". $row6['total']."</td>
  <td>". $row7['total']."</td>

  
</tr>
<tr>
  <td > number of HIV test conducted </td>
  <td>".$row8['total']."</td>
  <td>". $row9['total']."</td>
  
  
</tr>
<tr>
  <td > number of HIV test positive </td>
  <td>".$row10['total']."</td>
  <td>". $row11['total']."</td>
  
  
  
</tr>
<tr>
  <td > number of HIV test negative </td>
  <td>". $row12['total']."</td>
  <td>". $row13['total']."</td>
  
  
</tr>
<tr>
  <td > received 1 insecticide treated net </td>
  <td>". $row14['total']."</td>
  <td>". $row15['total']."</td>
  
  
  
</tr>
<tr>
  <td > recieved one dose of mebendazole </td>
  <td>". $row16['total']."</td>
  <td>". $row17['total']."</td>
  
  
  
</tr>
<tr>
  <td > recieved 4 or more antenatal visit </td>
  <td>".$row22['total']."</td>
  <td>". $row23['total']."</td>
  
</tr>
<tr>
  <td > recieved 2 or more doses of tetanus taxoid vaccine </td>
  <td>". $row20['total']."</td>
  <td>". $row21['total']."</td>
  
  
  
</tr>
<tr>
  <td > recieved atleast 2 doses of fansider </td>
  <td>". $row18['total']."</td>
  <td>". $row19['total']."</td>
    
</tr>

</table>
</div>
";
}else{
  $show="<h5 style='color:red; margin-left:100px'><span class='glyphicon glyphicon-exclamation-sign' 
  style='color:red'></span>All field are required!!<h5>";
echo $show;
}



}

?>





<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>








