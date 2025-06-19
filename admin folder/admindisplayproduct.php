<html>
    <head>
	<title>Admin View products</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link href="adminviewtable.css" rel="stylesheet">
	<body>
	<h1>Product Table</h1>
	</body>
</html>


<?php
include "../dbconn.php";


$sql="SELECT * FROM producttbl";
$stmt=$conn->query($sql);
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
$n=$stmt->rowCount();
if($n>0){
	
	echo"<table border=1>";
	 echo"<tr>";
	  echo"<th>Product ID</th>";
	  echo"<th>Product Name</th>";
	  echo"<th>Product Details</th>";
	  echo"<th>Product Quantity</th>";
	  echo"<th>Product Price</th>";
	  echo"<th>Product Picture</th>";
	  echo"<th>Actions</th>";
	 echo"</tr>";
	 
	 //table data
	 foreach($rows as $row){
		 echo"<tr>";
		   echo"<td>{$row['pid']}</td>";
		   echo"<td>{$row['pname']}</td>";
		   echo"<td>{$row['pdetail']}</td>";
		   echo"<td>{$row['pqty']}</td>";
		    echo"<td>"."$".$row['pprice']."</td>";
		   echo "<td>
               <img src='" . $row['ppic'] . "' height='100' width='100'/>
            </td>";

		  echo "<td>
         &nbsp;&nbsp;
         <a href='updateproduct.php?upid={$row['pid']}' class='update-btn'>Update</a>
         
         <a href='deleteproduct.php?upid={$row['pid']}'onclick=\"return confirm('Are you sure want to delete this Product?'); \" class='delete-btn'>Delete&nbsp;&nbsp;</a>
         </td>";

		   
		 echo"</tr>";
	 }
	echo"</table>";
}
else{
	echo "No Product details in the Product Table";
	}








?>