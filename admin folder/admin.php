<html>
 <head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background: white;
            padding: 30px 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            position: fixed;
            height: 100vh;
        }

        .logo {
            font-size: 24px;
            font-weight: 600;
            color: #ff0080;
            margin-bottom: 35px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f5f5f5;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 30px;
        }

        /* Welcome Section */
        .welcome-section {
            background: #ff0080;
            padding: 25px 30px;
            border-radius: 12px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(255, 0, 128, 0.15);
        }

        .welcome-section h1 {
            font-size: 22px;
            font-weight: 500;
        }

        /* Navigation Links */
        .admin-links {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .admin-links a {
            display: block;
            padding: 12px 15px;
            text-decoration: none;
            color: #444;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .admin-links a:hover {
            background: #fff0f7;
            color: #ff0080;
            transform: translateX(5px);
        }

        /* Logout Button */
        a[href="../logout.php"] {
            margin-top: 20px;
            background: #ff0080;
            color: white !important;
            text-align: center;
            padding: 12px !important;
            border-radius: 8px;
            font-weight: 500;
        }

        a[href="../logout.php"]:hover {
            background: #e5006f;
            transform: translateY(-2px) !important;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 20px;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .admin-container {
                flex-direction: column;
            }

            .logo {
                margin-bottom: 20px;
            }
        }
    </style>
<head>
 <body>
   <div class="admin-container">
    <div class="main-content">
     <div class="welcome-section">
	<h1>Welcome
		<?php 
		session_start();
		echo "$_SESSION[username]";
		?></h1>
	 </div>
	</div>
   <div class="sidebar">
        <div class="logo">Admin Panel</div>
        <div class="admin-links">
            <a href="addproduct.php">Add Product</a>
            <a href="admindisplayproduct.php">View Product</a>
            <a href="ViewOrder.php">View Order</a>
            <a href="displayingcustomer.php">View Customer</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>
 </div>
 </body>
</html>

