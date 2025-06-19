<html>
  <head>
    <title>View Order</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link href="adminviewtable.css" rel="stylesheet">
  </head>
  <body><h1>View Order</h1></body>
</html>


<?php
include "../dbconn.php";

$sql="SELECT * FROM ordertbl";
$stmt=$conn->query($sql);
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
$n=$stmt->rowCount();
if($n>0){
	
	echo"<table border=1>";
	 echo"<tr>";
	  echo"<th>Order ID</th>";
	  echo"<th>Customer ID</th>";
	  echo"<th>Product ID</th>";
	  echo"<th>Order Date</th>";
	  echo"<th>Order Quantity</th>";
	  echo"<th>Order Price</th>";
	 echo"</tr>";
	 
	 //table data
	 foreach($rows as $row){
		 echo"<tr>";
		   echo"<td>{$row['oid']}</td>";
		   echo"<td>{$row['cid']}</td>";
		   echo"<td>{$row['pid']}</td>";
		   echo"<td>{$row['odate']}</td>";
		   echo"<td>{$row['oqty']}</td>";
		   echo "<td>{$row['oprice']}</td>";
		echo"</tr>";
	 }
	echo"</table>";
}
else{
	echo "No Order details in the Order Table";
	}








?>