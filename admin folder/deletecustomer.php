<?php
include "../dbconn.php";
if(isset($_GET['dcid'])){
	$dcid=$_GET['dcid'];
	
	// getting the customer username to delet username from usertable
	$sql="SELECT username from customertbl WHERE cid=$dcid";
	$stmt=$conn->query($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$n=$stmt->rowCount();
	if($n>0){
		$dcusername=$row['username'];
	//deleting the username from usertable
	    $sql="DELETE FROM usertbl WHERE username='$dcusername'";
		$stmt=$conn->query($sql);
		$stmt->execute();
	//deleting records from customertbl
	    $sql="DELETE FROM customertbl WHERE cid=$dcid";
		$stmt=$conn->query($sql);
		$stmt->execute();
		
		header("Location:displayingcustomer.php");
		
	
	}
	
}
else{
     echo "No records with customer ID $dcid found";
	 
	}

?>