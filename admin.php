<?php 
//administrator dashboard
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
<li><span class="glyphicon glyphicon-stats" style=" font-size:40px; color:black"></span><a href="table.php">Registration History</a></li>
<li><span class="glyphicon glyphicon-hourglass" style=" font-size:40px; color:darkolivegreen"></span><a href="rep.php">Reports</a></li>
<li class="pull-right" style="font-size:33px"><div id="time_span"></div></li>
</div>
</div>
</li>
</ul>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 " style="height:30px" ></div>
 
<div class="col-sm-12 col-md-12 col-lg-12 " style=" margin-top:30px">
  <form method="post" action="profile.php" id="search"class="pull-right" style=" margin-right:30px">
  <input type="text" name="search1" style="padding:4px; border:2px solid green"> 
  <button class="btn-small btn-success"  name="search" style="padding:4px">
  <span class="glyphicon glyphicon-search" style="color:white" ></span>Search</button>
  </form> 
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
 <b style="padding:10px"> Administrator <?php echo $_SESSION['name']; ?><b>


</div>
<div class="panel-body">
  
<img src="
<?php echo 'images/'.$_SESSION['image'];?>" style=" height:100px; width:100px ; border-radius:30px 30px" id="image" />

<b style="padding:10px">ID:<?php echo $_SESSION['user_no']; ?><b>
 

  <div id="list">
<ul>
<li> <span class="glyphicon glyphicon-plus-sign" style="background-color:rgb(51, 192, 51)"></span><a href="new_user.php">Add new User</a><hr/></li>
<li> <span class="glyphicon glyphicon-remove" style="background-color:red"></span><a href="delete.php">
  Click to Remove User</a><hr/></li>

  <li> <span class="glyphicon glyphicon-remove" style="background-color:red"></span><a href="delete1.php">
  Click to Remove Data</a><hr/></li>

<li><span class="glyphicon glyphicon-off" style="color:red" ></span><a href="logout.php">Logout</a></li>
</div>

</ul>
</div>
</div>

</div>


<?php


include('includes/config.php');
$query= $db->prepare("SELECT * from user_all");
 $query->execute();
 echo $db->error;
$result= $query->get_result();

if($result->num_rows > 0){
  

 
  echo "
 
<div class='col-xs-7 col-sm-7 col-md-7 col-lg-7' style='margin:50px  10px 10px'>
  <table id='table'>
  <thead>
 <tr>
 <th>SN</th>
 <th>USER NO</th>
 <th>NAME</th>
 <th>ROLE</th>
 <th>GENDER</th>
 <th>MARITAL STATUS</th>
 <th>PHONE NO</th>
 </thead><tbody>
 ";
 while($row=$result->fetch_object()){
   $_SESSION['user_no']= $row->user_no;

echo"
<tr>
<td>".$row->user_id."</td>
<td>".$row->user_no."</td>
<td>".$row->name."</td>
<td>".$row->role."</td>
<td>".$row->gender."</td>
<td>".$row->status."</td>
<td>".$row->phone."</td>
<td><button class='btn btn-success'><a href ='user_v.php?id=".$_SESSION['user_no']."' name='view'>
<span class='glyphicon glyphicon-eye-open' ></span>
view</a></button></td>
<td><button class='btn btn-danger'><a href ='edit.php?ide=".$_SESSION['user_no']."' name='edit'><span class='glyphicon glyphicon-edit' ></span>Edit</a></button></td>
</tr>
  ";
}
}
else{

  echo "<h2 class='text-center'> no  record in the database for now </h2>";
}
?>
</tbody>
</table>
</div>





<?php include('includes/footer.php');?>
<script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }
  
  </script>