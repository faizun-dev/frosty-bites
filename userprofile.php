<!DOCTYPE html>
<html>
<head>
    <title>View Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link href="table.css" rel="stylesheet">
</head>
<body>
<div class="header-container">
<h1><?php session_start(); echo $_SESSION['username']; ?>  Profile</h1>
<a href="logout.php" class="logout-btn">Logout</a>
</div>

<?php
include "dbconn.php";

// Get the username from the session

$username = $_SESSION['username'];

// Fetching the data from the customer table

$sql="select * from customertbl where username='$username'";
$stmt = $conn-> query($sql);
$stmt-> execute(); 
$row = $stmt-> fetch(PDO::FETCH_ASSOC);
$n=$stmt->rowCount();
if($n==1){
    echo "<table border=2>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Phone number</th>";
    echo "<th>Address</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>{$row['cname']}</td>";
    echo "<td>{$row['cemail']}</td>";
    echo "<td>{$row['cphone']}</td>";
    echo "<td>{$row['caddress']}</td>";
	echo "<td><a href='customerupdate.php?ucid={$row['cid']}' class='update-btn'>Update</a></td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<script>alert('No user found.');</script>";
}
?>
</body>
</html>
