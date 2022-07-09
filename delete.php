<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete</title>
</head>
<body>

<?php
$var = $_GET['id'];
echo $var ;
include('conn.php');
$sql = "DELETE FROM `saleimgs` WHERE saleimg = '$var'";
$result =  $conn->query($sql);
if($result){
    echo"was deleted";
}else{
    echo" can not be deleted please try later";
}

?>

</body>
</html>