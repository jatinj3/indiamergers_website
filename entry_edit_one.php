<?php 
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
date_default_timezone_set('Asia/Calcutta');
include "config.php";


$id=$_GET['id'];
 
 
 $sql= mysqli_query($link,"SELECT * FROM `users` WHERE id='".$id."'");



$row = mysqli_fetch_array($sql);
if(isset($_POST['submit']))
{
	//echo "<pre>"; print_r($_POST);
	$tripno=$_POST['tripno'];
$startdatetemp=$_POST['startdate'];
if(!empty($startdatetemp))
   {
	    $startdatetemp=$_POST['startdate'];  
   }
   else
   {
	   $startdatetemp='0000-00-00';
	   
   }
$enddatetemp=$_POST['enddate'];

if(!empty($enddatetemp))
   {
	    $enddatetemp=$_POST['enddate']; 
   }
   else
   {
	   $enddatetemp='0000-00-00';
   }
   
// $startdate=date_create($_POST['startdate']);
// $enddate=date_create($_POST['enddate']);
  function date_diffnew($date1, $date2) {
        $diff = abs(strtotime($date2) -strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
        return $days;
    }


$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];



//$date1=date_create("2013-03-15");
//$date2=date_create("2013-12-12");
 // $diff=date_diff($startdate,$enddate);
 // $triptemp= $diff->format("%a");
 
	
 
 $triptemp=date_diffnew($startdate,$enddate);
 
 
 $tripdays=$triptemp+1; 
//echo "<pre>"; print_r($_POST);die;


   $fromone=$_POST['fromone'];
  $to=$_POST['to'];
  $fromtwo=$_POST['fromtwo'];
  $startodokm=$_POST['startodokm'];
   $endodokm=$_POST['endodokm'];
   $tripkm=abs($startodokm-$endodokm);
 
	
  $volvono=$_POST['volvono'];
   $firstdrivername=$_POST['firstdrivername'];
   $firstdriverno=$_POST['firstdriverno'];
   $secdrivername=$_POST['secdrivername'];
   $secdriverno=$_POST['secdriverno'];
   $billingkm=$_POST['billingkm'];
   
   $rate=$_POST['rate']; 
   $freight=$billingkm*$rate;
    $df=$_POST['df'];
   $abf=$_POST['abf'];
   $gf=$_POST['gf'];
   $nf= $freight+$df+$abf+$gf;
   $tyre=6.10*$tripkm;
   //$fixexp=16800*$tripdays;
   $fixexp=10800*$tripdays;
   //$tripexp=$_POST['tripexp']; 
	$tyrefix=$tyre+$fixexp;
   //$profit=$tyrefix-$nf;
   $profit=$nf-$tyrefix;
   // $tripexp=$_POST['tripexp']; 
   // $profit=$freight-$tripexp;
   $invoicedate=$_POST['invoicedate'];
   
   if(!empty($invoicedate))
   {
	  echo   $invoicedate=$_POST['invoicedate'];
	   
   }
   else
   {
	   $invoicedate='0000-00-00';
	   
   }
//echo $dest;die;
	$invoiceno=$_POST['invoiceno'];
	 //echo "<pre>"; print_r($_POST);die;
 mysqli_query( $link,"UPDATE `trip_entry_one` SET `tripno`='$tripno',`startdate`='$startdatetemp',`enddate`='$enddatetemp', `tripdays`='$tripdays',`ship_to_party`='BSRTC', `fromone`='$fromone',`to`='$to',`fromtwo`='$fromtwo',`start_odo_km`='$startodokm',`end_odo_km`='$endodokm',`trip_km`='$tripkm',`volvo_no`='$volvono',`first_driver_name`='$firstdrivername',`first_driver_no`='$firstdriverno',`sec_driver_name`='$secdrivername',`sec_driver_no`='$secdriverno',`billing_km`='$billingkm',`rate`='$rate',`freight`='$freight',`df`='$df',`abf`='$abf',`gf`='$gf',`nf`='$nf',`tyre`='$tyre',`fixexp`='$fixexp',`trip_exp`='$tripexp',`profit`='$profit',`invoice_date`='$invoicedate',`invoice_no`='$invoiceno'  WHERE `id`='$id' ");
 // echo "UPDATE `trip_entry_one` SET `tripno`='$tripno',`startdate`='$startdatetemp',`enddate`='$enddatetemp', `tripdays`='$tripdays',`ship_to_party`='BSRTC', `fromone`='$fromone',`to`='$to',`fromtwo`='$fromtwo',`start_odo_km`='$startodokm',`end_odo_km`='$endodokm',`trip_km`='$tripkm',`volvo_no`='$volvono',`first_driver_name`='$firstdrivername',`first_driver_no`='$firstdriverno',`sec_driver_name`='$secdrivername',`sec_driver_no`='$secdriverno',`billing_km`='$billingkm',`rate`='$rate',`freight`='$freight',`df`='$df',``='',`abf`='$abf',`gf`='$gf',`nf`='$nf',`tyre`='$tyre',`fixexp`='$fixexp',`trip_exp`='$tripexp',`profit`='$profit',`invoice_date`='$invoicedate',`invoice_no`='$invoiceno'  WHERE `id`='$id' ";die;
 //echo "UPDATE `trip_entry_one` SET `tripno`='$tripno',`startdate`='$startdatetemp',`enddate`='$enddatetemp', `ship_to_party`='BSRTC', `fromone`='$fromone',`to`='$to',`fromtwo`='$fromtwo',`start_odo_km`='$startodokm',`end_odo_km`='$endodokm',`trip_km`='$tripkm',`volvo_no`='$volvono',`first_driver_name`='$firstdrivername',`first_driver_no`='$firstdriverno',`sec_driver_name`='$secdrivername',`sec_driver_no`='$secdriverno',`billing_km`='$billingkm',`rate`='$rate',`freight`='$freight',`trip_exp`='$tripexp',`profit`='$profit',`invoice_date`='$invoicedate',`invoice_no`='$invoiceno'  WHERE `id`='$id' ";

 //header('Location: tableview.php');
echo '<script language="javascript">';
echo 'alert("Entry Updated Successfully!!")';
echo '</script>';
 


 
}
 
 if(isset($_POST['cancel']))
 {
 header('Location: viewusersdata.php');
 }
 
 
 
 ?>
 



<html>



<head>

	

	<title>Trip Entry</title>

	<!--<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">-->
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
 <link rel="stylesheet" href="assets/form-basic.css">
  <link rel="stylesheet" href="css/jquery.datetimepicker.min.css">    
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.full.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
 
 <style>
 
 .form-basic{
    max-width: 675px;
    margin-top:-10px;
	//margin: 0 auto;
    padding: 10px;
    box-sizing: border-box;

    background-color:  #ffffff;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);

    font: bold 12px sans-serif;
    text-align: center;
	overflow-y: scroll;
	 overflow-x: hidden;
	 height:500px;
}

 .form-basic .form-row{
    text-align: left;
    margin-bottom: 0px !important;
}

.form-basic button {
    display: block;
    border-radius: 2px;
    background-color: #6caee0;
    color: #ffffff;
    font-weight: bold;
    box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
    padding: 14px 22px;
    border: 0;
    margin: 2px 260px ;
}
.form-basic .form-row > label span {
   
  
    padding: 5px 25px;
		width: 258px;
}
.form-basic input {
   
    padding: 5px;
    
}
 .form-basic .form-button button{
    display: block;
    border-radius: 2px;
    background-color: #6caee0;
    color: #ffffff;
    font-weight: bold;
    box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
    padding: 14px 22px;
    border: 0;
    margin: 2px 183px 0;
	    margin-top: -43;
    margin-left: 385;
}



 </style>
</head>


<body>
<br/><br/><br/><br/>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="https://gtrac.in/newtracking/images/gtrac-logo.png" alt="">
    </div>
    <ul class="nav navbar-nav">
	
	
	<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="">
<?php 
 if($_SESSION['sess_user']!="")
	{
		echo "Welcome"." ".$_SESSION['sess_user'];
	}
		?> 
<span class="caret"></span>
</a>
      <ul class="dropdown-menu">
          <li><a href="logout.php?role=admin" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	</ul>
      </li>
     
    </ul>
    
  </div>
</nav>


  
<!--<link rel="stylesheet" href="assets/demo.css">-->
	
<!--<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">-->
    <div class="main-content" >

        <!-- You only need this form and the form-basic.css -->

       <form class="form-basic" method="post" >

            <!--<div class="form-title-row">
                <h1>Trip Entry</h1>
            </div>-->
			
					<div class="form-row">
                <label>
                    <span>Name</span>
                    <input type="text" name="name" value="<?php echo $row['name'];?>">
                </label>
            </div>
		
			
			<div class="form-row">
                <label>
                    <span>Email</span>
                    <input type="text" name="email"  value="<?php echo $row['email'];?>">
                </label>
            </div>
			
			<div class="form-row">
              <label>
                <span>Phone</span>
                <input type="text" name="phone"  value="<?php echo $row['phone'];?>">
              </label>
			</div>
			
			<div class="form-row">
                <label>
                    <span>City</span>
                    <input type="text" name="city"  value="<?php echo $row['city'];?>">
                </label>
            </div>
			
			
			
			
			<div class="form-row">
                
              <label>
                    <span>Pincode</span>
                     <input type="text" name="pincode" value="<?php echo $row['pincode'];?>" >
               </label>
            </div>
			<div class="form-row">
                
              <label>
                    <span>Category</span>
                     <input type="text" name="category" value="<?php echo $row['category'];?>" >
                </label>
            </div>
			<div class="form-row">
                
              <label>
                    <span>Col_1</span>
                     <input type="text" name="col1" value="<?php echo $row['col_1'];?>" >
                </label>
            </div>
			<div class="form-row">
                
              <label>
                    <span>Col_2</span>
                     <input type="text" name="col2" value="<?php echo $row['col_2'];?>" >
                </label>
            </div>
		
			
		
			 <div class="form-row">
               <button type="submit" name="submit" >Update Form</button> 
				
            </div>
			 <div class="form-button">
			<button type="submit" name="cancel" value="cancel">Cancel</button>
			 </div>
			

  
			
			
			

           

        </form>
		
	</div>

<footer class="footer">
<nav class="navbar navbar-inverse navbar-fixed-bottom">
<div class="container-fluid">
<p class="text-muted">2015 © by G-Trac.</p> 
</div>
</nav>
</footer>
</body>

</html>



