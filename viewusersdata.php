<?php 
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set ("Asia/Calcutta");
include "config.php";
// require_once('vendor/php-excel-reader/excel_reader2.php');
// require_once('vendor/SpreadsheetReader.php');

if(!isset($_SESSION['sess_user'])){
    header('location:admin.php');
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
          <li><a href="logout.php?role=admin" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	</ul>
</li>
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




	$sql= mysqli_query($link,"SELECT * FROM users");
	?>
	<table border="0" cellspacing="5" cellpadding="5" style="margin-left:40px;">
        <tbody>
            <tr>
                <td><b>Start Date:&nbsp;</b></td>
                <td><input name="min" id="min" type="text" value=""></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				 <td><b>End Date:&nbsp;</b></td>
                <td><input name="max" id="max" type="text" value=""></td>
            </tr>
            
        </tbody>
    </table>

<br/>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
				<th>ID</th>
                <th>Name</th>
                <th>Email</th>
				<th>Phone</th>
				<th>City</th>
				<th>Pincode</th>
				<th>category</th>
				<th>col_1</th>
				<th>col_2</th>
				<!--<th>Image Name</th>-->
                <th>DateTime</th>
                <th>Action</th>
                
				<!--<th>Delete Record</th>-->
            </tr>
        </thead>
        <tbody>
  <?php while( $row = mysqli_fetch_array($sql))
	{?> 
  	<tr>
	<td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo $row['phone']; ?></td>
	<td><?php echo $row['city']; ?></td>
	<td><?php echo $row['pincode'];?></td>
	<td><?php echo $row['category'];?></td>
	<!--<td><a href="uploads/<?=$row['img_name'];?>" download>
  <img src="uploads/<?=$row['img_name'];?>" width="70" height="70">
</a><?php echo $row['img_name'];?></td>-->
<td><?php echo "";?></td>
	<td><?php echo "";?></td>
	<td><?php echo $row['current_time']; ?></td>
	<td><button onclick="ConfirmEdit(<?=$row['id'];?>)">Edit</button></td>
	</tr>
	
	   <?php } ?>
        </tbody>
		   <tfoot>
            <tr>
				<th>ID</th>
                <th>Name</th>
                <th>Email</th>
				<th>Phone</th>
				<th>City</th>
				<th>Pincode</th>
				<th>category</th>
				<th>col_1</th>
				<th>col_2</th>
				<!--<th>Image Name</th>-->
				<th>DateTime</th>
				<th>Action</th>
				
				</tr>
			</tfoot>

    </table>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="application/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>




	 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>-->
    <script>
     $(document).ready(function() {
		 
		 
		  $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
			//alert(min);
            var max = $('#max').datepicker("getDate");
			//alert(max);
			var d = data[9].split(" ");
			//alert(d[0]);
			var newd=d[0].split("-");
			//alert(newd);
			//m-d-Y
            var startDate = new Date(newd[1]+ "/" +  newd[2] +"/" + newd[0]);	
			//alert(startDate);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );
		
		    $("#min").datepicker({  onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true ,dateFormat:"dd/mm/yy"});
            $("#max").datepicker({  onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true,dateFormat:"dd/mm/yy" });
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
    var table = $('#example').DataTable( {

        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
           leftColumns: 2
       },
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	
		dom: 'lBfrtip',
		buttons: [
		{
     	 extend: 'excelHtml5',
            text: 'Export',
			filename: 'Users data datewise',
            exportOptions: {
                modifier: {
                page: 'current'
               },
			 //columns: ':visible'
              columns: [0, 1, 2, 3,4,5,6,7]
              
			}
		}
    ]
    } );

	
	//$('#example').on( 'click', function () {
    //example.row( this ).delete();

	
	
$('#min, #max').change(function () {
                table.draw();
            });

} );


    </script>
	
	
<footer class="footer">
<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background-color: rgba(30, 139, 195, 1);margin-bottom: -20px;">
<div class="container-fluid">
<!--<p class="text-muted">2015 © by G-Trac.</p> -->
</div>
</nav>
</footer>
		
</body>
</html>
