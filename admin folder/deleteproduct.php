<?php

include "../dbconn.php";
if(isset($_GET['upid'])){
	$upid=$_GET['upid'];
	$sql="DELETE FROM producttbl WHERE pid=$upid";
	$stmt=$conn->query($sql);
	$stmt->execute();
	header("Location:admindisplayproduct.php");
}
else{
	echo "No records with Product ID $upid";
}



?>