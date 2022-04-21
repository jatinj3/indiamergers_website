<?php 
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set ("Asia/Calcutta");
include "config.php";
// require_once('vendor/php-excel-reader/excel_reader2.php');
// require_once('vendor/SpreadsheetReader.php');

if(!isset($_SESSION['sess_user'])){
    header('location:customer.php');
}
 // require("vcounter.php"); 

  // $text = explode("Unique Visits:", $info);
  // $newinfo=$text[1];
  


?>
<style>
  th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 1200px;
        margin: 0 auto;
    }

.footer {
  position: fixed;
  left: 0;
  bottom: -20;
  width: 100%;
 
  
  
}

	.dataTables_wrapper .dt-buttons {
  float:right;  
  margin-left:50px;
 //width:400px;
  //text-align:center;
}


</style>
<html>
<head>


<!--<a href="delete.php?id=<?=$row['id'];?>&name=tableview" >-->
<script>
function ConfirmDelete(row_id)
{
var x = confirm("Are you sure you want to delete?");
if (x)
{
approve(row_id);

return ture;
}
else
return false;
}

function approve(row_id){
	//var page='tableview';
window.location.href = "deleteone.php?id="+row_id;
	
}
</script>

<script>
function ConfirmEdit(row_id)
{
var x = confirm("Are you sure you want to edit?");
if (x)
{
approvetwo(row_id);

return ture;
}
else
return false;
}

function approvetwo(row_id){
	//var page='tableview';
window.location.href = "entry_edit_one.php?id="+row_id;
	
}
</script>




<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<!--<link rel="stylesheet" type="text/css" href="../../extensions/Editor/css/editor.dataTables.min.css"/>-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>
 <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<br/>
<br/>
<br/><br/>
<header>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(30, 139, 195, 1);">
  <div class="container-fluid">
    <div class="navbar-header">
   <h1><a href="#" style="color:white;line-height: 1;font-family: 'Montserrat', sans-serif;font-weight: 700;font-size: 28px; text-decoration: none;">India Mergers</a></h1>
    <!--<a href="http://servicebazar.org/index.php">  <img src="https://gtrac.in/newtracking/images/gtrac-logo.png" alt=""></a>-->
    </div>
    <ul class="nav navbar-nav">
	
	
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="" style="color:white;margin-top:10px;">
<?php 
 if($_SESSION['sess_user']!="")
	{
		echo "Welcome"." ".$_SESSION['sess_user'];
	}
		?> 
<span class="caret"></span>
</a>
       <ul class="dropdown-menu">
          <li><a href="logout.php?role=cust" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	</ul>
</li>
 <li><a href="import_data.php" style="color:white;margin-top:10px;margin-left:20px;">Import Data</a></li>
   <!--  <li><a href="admintask.php">Import CCTV Data</a></li>
	  <li><a href="gpsexcel.php">Import GPS Data</a></li>
	   <li><a href="itexcel.php">Import IT Data</a></li>
	   <li><a href="othersexcel.php">Import Others Data</a></li>
	   <li><a href="viewusersdata.php">Users Data</a></li>
	   <li><a href="downloadusers.php">Download Users Data </a></li>
	   
		<li><a href="#" style="margin-top: -3px;">Visitor Count:&nbsp;&nbsp;&nbsp;&nbsp;<button><?php echo $newinfo;?></button></a></li>
	   -->
    </ul>
	
    
  </div>
</nav>


   </header> 
    


<?php include "config.php";


if(isset($_POST["submit"]))
{

    $filename="uploads/".$_FILES["file"]["name"] ;
   
	$path_info = pathinfo($filename);
	
	 /*echo "<pre>";
print_r($filename);
	die;*/

    if($path_info['extension']=="csv" || $path_info['extension']=="CSV")
    {
        move_uploaded_file($_FILES['file']['tmp_name'],"$filename");
        $handle = fopen("$filename", "r");

        $Error=false;
        $msgshow = false;
        $count=0;
		$msg='';
		$first=true;
		
		$truncate_hops="truncate table hopes_mater";
		mysqli_query($conn, $truncate_hops);
		
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
              
 if ($first) {
        $first = false;
        continue;
    }



	 $insert_query_hops = "INSERT into hopes_mater(id,route_name,Mode_Name,origin,destination,kms,hrs,tat_current,std,sta,Hops,hops_order,hops_kms,hops_hrs,hops_std,hops_sta) values('".$id."','".$route_name."','".$Mode_Name."','".$origin."','".$destination."','".$kms."','".$hrs."','".$tat_current."','".$std."','".$sta."','".$Hops."','".$hops_order."','".$hops_kms."','".$hops_hrs."','".$hops_std."','".$hops_sta."')";
                    
					
				if($result = mysqli_query($conn, $insert_query_hops))
				{
					//echo "<script>alert('Success');</script>";
				}

    
    
            $count++;
    
        }


        if($Error==false && $msgshow == false)
        {
            $msg="Sheet file imported successfully";
			
        }

    }
    else
    {
        $Error=true;
        $msg ="Oops! your uploading file is not csv file. Please check.<br/>";
    }


}
	?>
	

 <form method="post" enctype="multipart/form-data">

              <div class="col-lg-7 rpt-datepic" >

                <input type="file" name="file" class="btn btn-default btn-file" style="width: 100%; text-align: left;" />

              </div>

              <div class="col-lg-4" style=" padding: 4px 2px">
                <input value="Submit" name="submit" style="width: 80px; margin: 0px 4px 0px 3px; height: 32px; background: rgb(0, 172, 237) none repeat scroll 0% 0%; color: rgb(255, 255, 255); border: medium none; border-radius: 2px;" class=" form-control" type="submit">
              </div>
            </form>






	
	
<footer class="footer">
<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background-color: rgba(30, 139, 195, 1);margin-bottom: -20px;">
<div class="container-fluid">
<!--<p class="text-muted">2015 © by G-Trac.</p> -->
</div>
</nav>
</footer>
		
</body>
</html>
