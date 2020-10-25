<?php 
session_start();
if(!isset($_SESSION['ANC_no'])){
header('location: logout2.php');
exit();
}
include('includes/header.php');


?>

<div class="container-fluid">
    <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12 " id="navbar" >
<ul class="nav nav-pills">
  <a href="what_to.php"><h2 style="color:white"> what you should know...<h2></a>
<li class="pull-right" style="font-size:33px"><div id="time_span"></div></li>
</div>
</div>
</li>
</ul>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 " style="height:30px" ></div>
 
<div class="col-sm-12 col-md-12 col-lg-12 " style=" margin-top:30px">
</div>


<div class="col-sm-3 col-md-4 col-lg-4" id='panel'>

 <div class="panel">
<div class="panel-heading " style="background-color:rgb(51, 192, 51); padding:6px" >
 
<script>

function timer(){
 var now     = new Date,
     hours   = now.getHours(),
     ampm    = hours<12 ? ' AM' : ' PM',
     minutes = now.getMinutes(),
     seconds = now.getSeconds(),
     t_str   = [hours-12, //otherwise: what's the use of AM/PM?
                (minutes < 10 ? "0" + minutes : minutes),
                (seconds < 10 ? "0" + seconds : seconds)]
                 .join(':') + ampm;
 document.getElementById('time_span').innerHTML = t_str;
 setTimeout(timer,1000);
}


  </script>

 <h2> OVERVIEW</h2>
 <hr/>
 <b style="padding:10px"> Registered Mother: <?php echo $_SESSION['name1']; ?><b>


</div>
<div class="panel-body">
  
<img src="
<?php echo 'images/'.$_SESSION['image'];?>" style=" height:100px; width:100px ; border-radius:30px 30px" id="image" />

<b style="padding:10px">ID:<?php echo $_SESSION['ANC_no']; ?><b>
 

  <div id="list">
<ul>
<li> <span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)">
</span><a href ="patient.v.php?id=<?php echo $_SESSION['ANC_no'];?>">View my Data</a><hr/></li>
<li> <span class="glyphicon glyphicon-remove" style="background-color:red"></span><a href="patient_pass.php">
  Click to change password</a><hr/></li>
<li><span class="glyphicon glyphicon-off" style="color:red" ></span><a href="logout2.php">Logout</a></li>
</div>

</ul>
</div>
</div>

</div>

</div>
<?php include('includes/footer.php');?>

<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>