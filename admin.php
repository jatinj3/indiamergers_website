<?php
session_start(); 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "config.php";

if(isset($_POST["submit"]))
{
	//echo "<pre>"; print_r($_POST);die;
if(!empty($_POST['email']) && !empty($_POST['password']))
{
 $username= $_POST['email'];
 $pass= $_POST['password'];

	$query="SELECT * FROM `admin` WHERE username='".$username."' and password='".$pass."' ";
$sql= mysqli_query($link,$query);
 $num_rows=mysqli_num_rows($sql);  	
// $num_rows;
if($num_rows!=0)
{
while($row=mysqli_fetch_assoc($sql))
{
 $dbusername=$row['username'];
$dbpassword=$row['password'];
}
if($username == $dbusername &&  $pass == $dbpassword)
{
$_SESSION['sess_user']=$username;
header("Location: viewusersdata.php");
}
else
{
echo '<script language="javascript">';
echo 'alert("Username & Password is incorrect")';
echo '</script>';
}


}

}
}

?>


<!DOCTYPE html>
<style>


.footer {
  position: fixed;
  left: 0;
  bottom: -20;
  width: 100%;
 
  
  
}


.check{
	

  font:bold italic 24px  "palatino linotype";
  background: url("") 0 0/688px no-repeat;}
li{
  opacity:0;
  background:rgba(255,255,255,.4);
  text-shadow: 1px 1px white;
  white-space:nowrap;
  
}
li:first-child{ animation:bringback 1s 0s forwards;}
li:nth-child(2){animation:bringback 1s  1s forwards;}
li:nth-child(3){animation:bringback 1s  2s forwards;}




@keyframes bringback{
  to{opacity:1;text-indent:25px; }
  }
  
  .button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 800px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


</style>
<html lang="en">
<head>
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







<header>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(30, 139, 195, 1);">
  <div class="container-fluid">
    <div class="navbar-header">
<h1><a href="index.html" style="color:white;line-height: 1;font-family: 'Montserrat', sans-serif;font-weight: 700;font-size: 28px; text-decoration: none;">India Mergers</a></h1>
    </div>

    
  </div>
  
     
</nav>



<div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                <h4>Login</h4>
            </div>
            <div class="modal-body">
                   <form class="form-inline">
                   <div class="form-group">
                       <label class="sr-only" for="email">Email</label><input type="text" class="form-control input-sm" placeholder="Email" id="email" name="email">
                       </div>
                        <div class="form-group">  
                          
                           <label class="sr-only" for="password">Password</label>
                                     <input type="password" class="form-control input-sm" placeholder="Password" id="password" name="password"></div>
                     <!--  <div class="checkbox">
                       <label>
                       <input type="checkbox"> Remember me
                       </label>
                         </div>-->
                    
                      
                        
                       <button type="submit" name="submit" class="btn btn-info btn-xs">Sign in</button>
                       <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button> 
                    
                   
                     
               
                    </form>
            </div>
<!--
            <div class="modal-footer">
                <div style="padding:10px"></div>
            </div>
-->
        </div>
        </div>
    </div>


   </header> 
<body>




<br/><br/><br/><br/>
<div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title" style="color:red; animation:bringback 1s  0s forwards;">
              India Mergers Admin Login
            </h1>
           
         </div>
      </div>
<br/>
<br/>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form method="post" name="login">
            
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                     <input type="password"  name="password" id="password"  class="form-control my-input" placeholder="Password" required>
                  </div>
                  <div class="text-center ">
                     <button type="submit" name="submit" class=" btn btn-block send-button tx-tfm">Login</button>
                  </div>
    
                  </div>
          
               </form>
            </div>
         </div>
      </div>
   </div>





<footer class="footer">
<nav class="navbar navbar-inverse navbar-fixed-bottom" style="background-color: rgba(30, 139, 195, 1);">
<div class="container-fluid">
<!--<p class="text-muted">2015 © by G-Trac.</p>--> 
</div>
</nav>
</footer>


</body>
</html>
