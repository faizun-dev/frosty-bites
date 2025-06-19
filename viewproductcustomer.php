<html>
 <head>
  <title>View Product</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link href="table.css" rel="stylesheet">
  <link rel="stylesheet" href="adminforms.css">
 </head>
<body>
<div class="header-container">
<h1> Welcome <?php 
session_start();
echo "$_SESSION[username]";
?> 
</h1>
<a href="userprofile.php" class="logout-btn">Profile</a>
<a href="logout.php" class="logout-btn">Logout</a>
</div>
<style>
.header-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.header-container h1 {
  margin-right: auto;
}
.header-container h1 {
  margin-left:200px;
  text-align: center;
  flex-grow: 1;
  padding-right: 100px; /* Add padding to shift text more to the right */
}

.logout-btn {
  margin-left: 10px;
}
</style>
<h2>The Cupcake Menu</h2>

</body>
</html>



<?php
include "dbconn.php";
//fetching the data from the product table
$sql="SELECT * FROM producttbl";
$stmt=$conn->query($sql);
$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
$n=$stmt->rowCount();

//checking the no.of roww
if($n>0){
	echo"<table border=2>";
	  echo"<tr>";
	    echo"<th>Name</th>";
		echo"<th>Picture</th>";
		echo"<th>Details</th>";
		echo"<th>Price</th>";
		echo"<th>Action</th>";
	  echo"</tr>";
	  foreach($rows as $row){
		  echo"<tr>";
		   echo"<td>{$row['pname']}</td>";
		   echo "<td><a href='admin folder/'".$row['ppic']."'><img src='admin folder/".$row['ppic']."' height='300' width='300'></a></td>";
		   echo"<td>{$row['pdetail']}</td>";
	       echo"<td>"."$".$row['pprice']."</td>";
		   echo"<td><a href='Cart.php?id={$row['pid']}'><button>Order</button></a></td>";
		  echo"</tr>";
	  }
	echo"</table>";
}





?>