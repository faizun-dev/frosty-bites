<?php
include "../dbconn.php";

if(isset($_GET['ucid'])){
	$ucid=$_GET['ucid'];
	$sql="SELECT * FROM customertbl WHERE cid=$ucid";
	$stmt=$conn->query($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$n=$stmt->rowCount();
	if($n>0){
		echo "<h1>Update Customer Table</h1>";
	}
	else{
		echo "No customer record with $ucid found.";
	}
	
	
}

?>

<html>
 <head>
   <title>Update Customer Form</title>
   
 </head>
 <body>
    <form action="" method="post">
	  <div class="input-groups">
	      Customer ID: <input type="text" name="ucid" disabled value="<?php echo $row['cid'];?>"><br><br>
		  Customer Name: <input type="text" name="ucname"  value="<?php echo $row['cname'];?>"><br><br>
		  Customer Email: <input type="email" name="ucemail" value="<?php echo $row['cemail'];?>"><br><br>
		  Customer Phone: <input type="number" name="ucphone" value="<?php echo $row['cphone'];?>"><br><br>
		  Customer Address: <input type="text" name="ucaddress" value="<?php echo $row['caddress'];?>"><br><br>
          Customer Username: <input type="text" name="ucusername" value="<?php echo $row['username'];?>"><br><br>
		  Customer Status: <input type="text" name="ucstatus" value="<?php echo $row['cstatus'];?>"><br><br>
		  <input type="submit" name="sub" value="UPDATE">
		  
	  </div>
	</form>
 </body>
</html>

<?php

if (isset($_POST['sub'])){
	if (!empty($_POST['ucname'])&&
	   !empty($_POST['ucemail'])&&
	   !empty($_POST['ucphone'])&&
	   !empty($_POST['ucaddress'])&&
	   !empty($_POST['ucusername'])&&
	   !empty($_POST['ucstatus'])){
		   
		   $ucname=$_POST['ucname'];
		   $ucemail=$_POST['ucemail'];
		   $ucphone=$_POST['ucphone'];
		   $ucaddress=$_POST['ucaddress'];
		   $ucusername=$_POST['ucusername'];
		   $ucstatus=$_POST['ucstatus'];
		   
		   
		   //updating customer data
		   $sql="UPDATE customertbl SET cname=:a,cemail=:b,cphone=:c,caddress=:d,username=:e,cstatus=:f WHERE cid=$ucid";
		   $stmt=$conn->prepare($sql);
		   $stmt->execute(
		     array(
		      ':a'=>$ucname,
			  ':b'=>$ucemail,
			  ':c'=>$ucphone,
			  ':d'=>$ucaddress,
			  ':e'=>$ucusername,
			  ':f'=>$ucstatus));
		   
		   header('Location:displayingcustomer.php');
	   }
}







?>