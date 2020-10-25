<?php 
session_start();
if(!isset($_SESSION['ANC_no'])){
header('location: logout2.php');
exit();
}
include('includes/header.php');


?>
<?php include('includes/header.php'); ?>

<div class="container-fluid">
    <div class="row">
 <div class="col-sm-12 col-md-12 col-lg-12" id="top_bar">
<ul>
         <li class="pull-right"> 
<img src="
<?php echo 'images/'.$_SESSION['image'];?>" style=" height:50; width:50px ; border-radius:50px 50px" id="image" />

<a href="women.php" style="padding:10px"><?php echo $_SESSION['name1']; ?></a>
 
</li>
</ul>
 </div>


 <div class="col-sm-12 col-md-12 col-lg-12" style="height:auto; background-color:cyan">
        
<h1 class="text-center"> your pregnancy and baby guide</h1>

</div>
<div class="col-sm-2 col-md-2 col-lg-2"></div>
<div class="col-sm-9 col-md-9 col-lg-9" style="height:auto; background-color:#D9F3DE; margin-top:20px">

<h4>
         <p>
Am I pregnant? What should I be eating? Is it normal to be this tired? How can I help my partner during labour?

Whatever you want to know about getting pregnant, being pregnant or caring for your new baby, you should find it
 here.</p></h4>
<h4> <p>
You'll find week-by-week guides, health advice and information about your pregnancy journey.</p></h4>
<h4>
<p>Before you start, why not:</p></h4> <br/>

<h4><ul style="list-style:upper-alpha">
         <li>
work out when your baby is due with our <a>due date calculator</a></li>   
<li> a birth<a> plan template </a> fill in and save</li></ul>
<h2>Want to know if you're really pregnant?</h2>
<h4>Find out about:</h4>
<h4><ul> <li><a>
signs and symptoms of pregnancy</a></li>
<li> <a>pregnancy tests</a><li>
<li>what to do if you've had a<a> positive pregnancy test</a></li>
<li><a>help if you're not getting pregnant</a></li></ul></h4>
<h3>Keeping well in pregnancy</h3> <br/>

<ul>
       <h4>  <li><p>everything you need to know about a<a> healthy pregnancy diet</a> and<a>
                 supplements in pregnancy</a></p></li>
        <li><p>smoking and drinking can harm an unborn baby – read our<a> stop smoking</a> and
<a>alcohol</a> pages for help quitting</p></li></h4>
         </ul>
<h3>pregnancy (antenatal) care and the baby's development</h3>
<ul>
       <h4>  <li><p>find out as much as you can about what's happening inside you in 
                the<a> first few weeks of pregnancy</a></p></li>

  <li><p>how to cope with<a> common pregnancy problems</a>, like morning sickness and tiredness</p></li>
  <li><p>find out what <a>NHS pregnancy appointments</a> you'll be offered</p></li>
  <li><p>what you'll be offered at your appointments, including <a>ultrasound scans</a> and <a>checks and
            tests,</a> including <a>screening for Down's syndrome</a></p></li></h4></ul>
<h3>Vaccinations in pregnancy</h3>
<h4><p>Why it's recommended that women have the:</p></h4>
<ul>
         <h4>
<li><a>flu vaccine in pregnancy</a></li>
<li><a>whooping cough vaccine in pregnancy</a></li></h4></ul>
<h3>Labour and birth</h3>
<h4><p> out all you need to know about labour and birth, including:</p></h4>
<ul>
         <h4>
                  <li>
<a>where you can have your baby </a>– for example, in a hospital, midwife-led unit, or at home</li>
<li><a>what pain relief in labour is available</\, such as gas and air (entonox) and epidural</li>
<li><a>signs that labour might be starting</a></li>
<h3>Your new baby</h3>
<h4><p>When your baby arrives, you can find advice on baby care, including:</p></h4>
<ul> <h4>
         <li>
<a>breastfeeding</a><li>
<li><a>>bottle feeding</a></li>
<li><a>changing nappies</a></li>
<li><a>washing your baby</a></li>
<h3>Plus:</h3>
<ul>
         <h4>
                  <li>
how to cope with a<a> crying baby</a> and settling your baby into a<a> good sleep routine</a></li>
<li>possible changes to your<a> body after pregnancy </a> and <a> your relationships after a baby</a>,
          and the <a>symptoms of postnatal depression</a></li>
<li><a>feeding twins and multiples</a> and<a> sleep issues with twins and multiples</a></li></h4></ul>
<h3>Feeding, teething and tantrums</h3>
<ul>
<h4>         
<li>
find out about<a> parenting</a>, including <a>support and services for parents</a>, keeping fit, and going back to work</li>
<li>know the <a>signs of serious illness in babies</a> and the <a>symptoms of infectious illnesses</a> such as chickenpox</li>
<li>find out how to keep your baby safe and what to do if<a> your baby has an accident</a>
<li>at 6 months old your baby will need to start<a> solid foods,</a> so be prepared with our
          weaning tips and first food ideas</li>
as your baby becomes a toddler, get tips on<a> teething,</a> the importance of play,<a> temper tantrums</a> and
<a> potty training</a></li></h4></ul>
</div>
<div class="col-sm-1 col-md-1 col-lg-1"></div>