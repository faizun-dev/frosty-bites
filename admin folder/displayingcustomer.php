<html>
  <head>
    <title>Registered Customer</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link href="adminviewtable.css" rel="stylesheet">
  </head>
  <body><h1>Registered Customer</h1></body>
</html>

<?php
include "../dbconn.php";
//goes to previous folder

//fetching the customer data from customertbl
$sql="SELECT * FROM customertbl";
$stmt=$conn->query($sql);
$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

//diplaying the customer data in a table for the admin
echo"<table border=2>";
 echo"<tr>";
  echo"<th>Customer ID</th>";
  echo"<th>Customer Name</th>";
  echo"<th>Customer Email</th>";
  echo"<th>Customer Phone</th>";
  echo"<th>Customer Address</th>";
  echo"<th>Customer Status</th>";
  echo"<th>Customer Username</th>"; 
  echo"<th>Actions</th>";
 echo"</tr>";
  foreach($rows as $row){
	echo"<tr>";                             //ucid-update customer cid dcid-delete customer cid
	echo"<td>{$row['cid']}</td>";
	echo"<td>{$row['cname']}</td>";
	echo"<td>{$row['cemail']}</td>";
	echo"<td>{$row['cphone']}</td>";
	echo"<td>{$row['caddress']}</td>";
	echo"<td>{$row['cstatus']}</td>";
	echo"<td>{$row['username']}</td>";
	echo"<td><a href='updatecustomer.php?ucid={$row['cid']}'class='update-btn'>Update</a><a href='deletecustomer.php?dcid={$row['cid']}'onclick=\"return confirm('Are you sure want to delete this Customer?'); \" class='delete-btn'>Delete</a></td>";
	echo"</tr>";
	
 }
echo"</table>";








?>