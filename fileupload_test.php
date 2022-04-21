<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Custom File</h2>
  <p>To create a custom file upload, wrap a container element with a class of .custom-file around the input with type="file". Then add the .custom-file-input to the file input:</p>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Custom file:</p>
	<div class="row">
    <div class="custom-file mb-3 col-md-3">
	
      <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
      <label class="custom-file-label" for="customFile">Choose file</label>
	  
    </div>
	<div class="col-md-1">
	<input type="submit" value="Upload Image" name="submit">
	</div>
	
	</div>
    
   <!-- <p>Default file:</p>
    <input type="file" id="myFile" name="filename2">-->
  
   <!-- <div class="mt-3">
	 <input type="submit" value="Upload Image" name="submit">
      <!--<button type="submit" class="btn btn-primary">Submit</button>
    </div>-->
  </form>
</div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileToUpload = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileToUpload);
});
</script>

</body>
</html>
