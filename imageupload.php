<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet"
		type="text/css"
		href="style.css" />
</head>

<body>
	<div id="content">

		<form method="POST"
			action=""
			enctype="multipart/form-data">
			<input type="file"
				name="uploadfile"
				value="" />

			<div>
				<button type="submit"
						name="upload">
				UPLOAD
				</button>
			</div>
		</form>
	</div>
</body>

</html>
<?php
error_reporting(0);
?>
<?php
$msg = "";
$id = $_GET['id'];
// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "uploads/".$filename;
		
        include 'conn.php';

		// Get all the submitted data from the form
		$sql = "INSERT INTO pimages (code , imgname) VALUES ('$id','$filename')";

		// Execute query
		mysqli_query($conn, $sql);
		
		// Now let's move the uploaded image into the folder: image
		echo $folder;
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
echo $msg;
?>


<?php
include 'conn.php';
$sql = "SELECT * pimages where code = p45";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo"
    <img src='uploads/$row[imgname]' alt=''>
    
    ";
}
?>