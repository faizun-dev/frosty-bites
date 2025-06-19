<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/logout.css">
    <title>Logout</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.logout-container {
    background-color: white;
    padding: 2rem 3rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.logout-message {
    color: #333;
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
}

.login-link {
    display: inline-block;
	padding: 12px 24px;
	background: #f72585;
	color: white;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
	transition: all 0.3s ease;
	margin: 10px;
	transition: background-color 0.3s;
	text-decoration: none;   
}

.login-link:hover {
     background: #fe036a;
	transform: translateY(-2px);
	box-shadow: 0 6px 20px rgba(247, 37, 133, 0.2);
}
</style>
</head>
<body>
    <div class="logout-container">
        <p class="logout-message">Thank you for visiting us! - Stay connected.</p>
        <?php
        session_unset();
        session_destroy();
        ?>
        <a href="form.php" class="login-link">Click to Login Again</a>
    </div>
</body>
</html>