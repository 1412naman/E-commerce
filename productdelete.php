<?php
include('conn.php');
$code = $_GET['product'];
$sql = "DELETE FROM producttable WHERE code='$code'";
$result = $conn->query($sql);
if($result){
echo 'Deleted';
}
else{
     echo'Cannot delete';
}

