<!DOCTYPE html>
<style>

/*.navbar-fixed-bottom {
    bottom: 0;
    margin-bottom: -30px;
    border-width: 1px 0 0;
}*/

input[type=checkbox], input[type=radio] {
    margin: 5px 0 0;
    margin-top: 1px\9;
    line-height: normal;
    width: 30px;
    height: 30px;
}



/*.footer {
  position: fixed;
  left: 0;
  bottom: -20;
  width: 100%;
 
  
  
}*/


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


.navbar-inverse {
    background-color: rgba(30, 139, 195, 1);
    border-color: #080808;
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
    <div class="navbar-header" style="margin-top: -11px;">
	<h1><a href="index.html" style="color:white;line-height: 1;font-family: 'Montserrat', sans-serif;font-weight: 700;font-size: 28px; text-decoration: none;">India Mergers</a></h1>
    </div>
  <!-- <ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
                </ul>-->
    
  </div>
  
     
</nav>






   </header> 
<body>




<br/><br/><br/>
<div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title" style="color:red; animation:bringback 1s  0s forwards;">
              Tell us more about you!
            </h1>
           
         </div>
      </div>
<br/>

      <div class="row">
         <div class="col-md-6 mx-auto">
            <div class="myform form ">
               <form method="post" name="login" action="save_data.php" enctype="multipart/form-data" onsubmit="if(document.getElementById('agree').checked && document.getElementById('agreetwo').checked ) { return true; } else { alert('Please indicate that you have read and agree to the Legal Disclaimer and Non Disclosure Agreement'); return false; }">
                  <div class="form-group">
                     <input type="text" name="name"  class="form-control my-input" id="name" placeholder="Name:" required>
                  </div>
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email:" required>
                  </div>
                  <div class="form-group">
                     <input type="tel" maxlength="10" name="phone" id="phone"  class="form-control my-input" placeholder="Mobile No :" required>
                  </div>
				   <div class="form-group">
                     <input type="text" name="city"  class="form-control my-input" id="city" placeholder="City:" required>
                  </div>
				   <div class="form-group">
                     <input type="number" name="pincode"  class="form-control my-input" id="pincode" placeholder="Pincode:" required>
                  </div>
				  <div class="form-group">
						<select class="form-control" id="category" name="category">
							<option value="">Select Category</option>
							<option value="abc">abc</option>
							<option value="def">def</option>
							<option value="ghi">ghi</option>
							<option value="jkl">jkl</option>
						</select>
				   </div>
				   <div class="form-group row">
    <div class="custom-file mb-3 col-md-4">
	
    
      <label class="custom-file-label" for="customFile">Upload Adhaar Image:</label>
	  
    </div>
	<div class="col-md-2">
	<input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload" required>
	</div>
	<!--<div class="col-md-2">
	<input type="submit" value="Upload Image" name="submit">
	</div>-->
	
	</div>
				  
				   <div class="form-group">
                     <input type="checkbox" name="checkbox" value="check" id="agree" /><span style="font-size:25px;"> I have read and agree to the <a href="legaldisclaimer.php" target="_blank">Legal Disclaimer</a></span>
                  </div>
				   <div class="form-group">
                     <input type="checkbox" name="checkbox" value="check" id="agreetwo" /><span style="font-size:25px;"> I have read and agree to the <a href="nda.php" target="_blank">Non Disclosure Agreement</a></span>
                  </div>
				 
				  
                  <div class="text-center ">
                     <button type="submit" name="submit" value="submit" class=" btn btn-block send-button tx-tfm">Submit</button>
                  </div>
				  <br/><br/>
    
                  </div>
          
               </form>
            </div>
         </div>
      </div>
   



<div>

<footer class="footer">
<nav class="navbar navbar-inverse navbar-fixed-bottom" style=" margin-bottom: -32px;background-color: rgba(30, 139, 195, 1);">
<div class="container-fluid">
<!--<p class="text-muted">2015 © by G-Trac.</p>-->
</div>
</nav>
</footer>
</div>

</body>
</html>
