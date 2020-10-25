<?php 
session_start();
if(!isset($_SESSION['user_no'])){
header('location: login.php');
exit();
}
include('includes/header.php');
include('includes/header.php');


?>

<div class="container-fluid">
    <div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12 " id="navbar" >
<ul class="nav nav-pills">
<li><span class="glyphicon glyphicon-stats"style=" font-size:40px; color:black" ></span><a href="table.php">Registration History</a></li>
<li><span class="glyphicon glyphicon-stats" style=" font-size:40px; color:blueviolet" ></span><a href="p.php">My Works</a></li>
<li class="pull-right" style="font-size:33px"><div id="time_span"></div></li>
</div>
</div>
</li>
</ul>
</div>
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

<div class="col-sm-12 col-md-12 col-lg-12 " style="height:30px" ></div>
 
<div class="col-sm-12 col-md-12 col-lg-12 " style=" margin-top:30px">
  <form method="post" action="profile.php" id="search" class="pull-right" style=" margin-right:30px">
  <input type="text" name="search1" style="padding:4px; border:2px solid green"> 
  <button class="btn-small btn-success"  name="search" style="padding:4px">
  <span class="glyphicon glyphicon-search" style="color:white" ></span>Search</button>
  </form> 
</div>


<div class="col-sm-3 col-md-4 col-lg-4" id='panel'>

 <div class="panel ">
<div class="panel-heading " style="background-color:rgb(51, 192, 51)" >
 <h2> OVERVIEW</h2>
 <hr/>
 <b style="padding:10px">Welcome <?php echo $_SESSION['name']; ?><b>
</div>
<div class="panel-body">
<img src="
<?php echo 'images/'.$_SESSION['image'];?>" style=" height:100px; width:100px ;
 border-radius:30px 30px" id="image" />

<b style="padding:10px">ID:<?php echo $_SESSION['user_no']; ?><b>


 
 
<div id="list">
<ul>

<li><span class="glyphicon glyphicon-eye-open" style="background-color:rgb(51, 192, 51)" ></span><a href="user_v.php?id=<?php echo $_SESSION['user_no'];?>">View My Details</a><hr/></li>
<li><span class="glyphicon glyphicon-pencil" style="background-color:rgb(51, 192, 51)" ></span><a href="home.php">change Password</a><hr/></li>
<li><span class="glyphicon glyphicon-off" style="color:red" ></span><a href="logout.php">Logout</a></li>
</div>

</ul>
</div>
</div>


</div>


<div class="col-sm-4 col-md-4 col-lg-4 pull-right" id='panel'>

 <div class="panel ">
<div class="panel-heading " style="background-color:rgb(51, 192, 51)" >
<h2><span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)"></span>DATA REGISTRATION<h2></div>
<div class="panel-body">
  
  <div id="list">
<ul>
<li><span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)"></span><a href="UserReg.php">Bio Data</a><hr/></li>
<li><span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)" ></span><a href="rk.php" >Risk factors Data </a><hr/></li>
<li><span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)" ></span><a href="bo.php">Obsectrics Data</a><hr/></li>

<li><span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)" ></span><a href="test.php">Tests Data</a><hr/></li>
<li><span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)" ></span><a href="dr_ser.php">Drugs Data </a><hr/></li>
<li><span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)" ></span><a href="pre.php">Pregnancy Outcome Data</a><hr/></li>


</div>

</ul>
</div>

</div>

</div>







<?php include('includes/footer.php');?>
<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>