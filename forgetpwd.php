<!DOCTYPE html>
<html>
<head>
    <title>View Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link href="table.css" rel="stylesheet">
</head>
<body>
<div class="header-container">
<script>prompt('What is the name of your first pet?');</script>
</div>
</body>
</html>

<?php
session_start(); // Start the session
include "dbconn.php";

// Check if the username exists in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

		$sql="select * from usertbl where username='$username'";
		$stmt = $conn-> query($sql);
		$row = $stmt-> fetch(PDO::FETCH_ASSOC);
		$n=$stmt->rowCount();
		if($n==1){
        echo "<table border=2>";
        echo "<tr>";
        echo "<th>Username</th>";
        echo "<th>New Password</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>{$row['username']}</td>";
        echo "<td></td>";
        echo "<td><a href='forgotupdate.php?usn={$row['username']}' class='update-btn'>Update</a></td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "<script>alert('No user found.');</script>";
    }
}
?>
