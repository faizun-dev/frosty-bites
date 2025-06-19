<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .thank-you-container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .button {
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

        .button:hover {
            background: #fe036a;
			transform: translateY(-2px);
			box-shadow: 0 6px 20px rgba(247, 37, 133, 0.2);
        }

        .button.secondary {
            background-color: #666;
        }

        .button.secondary:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <h1>
            Dear <?php echo $_SESSION['username']; ?>,<br>
            Thank you for your order! Your cupcakes will be freshly prepared and delivered within the next 2 hours.<br>
            We appreciate your support!
        </h1>
        
        <a href="viewproductcustomer.php" class="button">More Shopping</a>
        <a href="logout.php" class="button secondary">Logout</a>
    </div>
</body>
</html>

