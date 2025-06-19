<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="formstyle.css">
    </head>
    <body>
	   <div class="container" id="js-container">
         <!--User registration form-->
         <div class="form-container  sign-up-form"> 
            <form action="" method="post">
                <h1>Create Account</h1>
                <div class="social-media-icons">
                    <a href="https://www.facebook.com/" target="_blank"><i class='bx bxl-facebook-circle facebook'></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png" class="instagram"></a>
                    <a href="https://www.pinterest.com/" target="_blank"><i class='bx bxl-pinterest pinterest' ></i></a>
                </div>
    
				<span>or use your email for registration</span><br>
                <div class="input-groups">
				  <div class="input-fields"><i class='bx bx-user'></i>&nbsp;&nbsp;<input type="text" name="name" placeholder="Name"><br><br></div>
				  <div class="input-fields"><i class='bx bx-envelope' ></i>&nbsp;&nbsp;<input type="email" name="email" placeholder="Email"><br><br></div>
				  <div class="input-fields"><i class='bx bx-phone-call' ></i>&nbsp;&nbsp;<input type="number" name="phone" placeholder="Phone"><br><br></div>
				  <div class="input-fields"><i class='bx bx-current-location' ></i>&nbsp;&nbsp;<input type="text" name="address" placeholder="Address"><br><br></div>
				  <div class="input-fields"><i class='bx bx-user-circle' ></i>&nbsp;&nbsp;<input type="text" name="username" placeholder="Username"><br><br></div>
				  <div class="input-fields"><i class='bx bx-lock'></i></i>&nbsp;<input type="password" name="password" placeholder="Password"></div>
				  
				</div>
                <input type="submit" name="reg-sub" value="SIGN UP" class="sub-button">
            </form>
          </div>
         <!--User Login form-->
         <div class="form-container sign-in-form"> 
            <form action="" method="post">
                <h1>Sign in</h1>
                <div class="social-media-icons">
                    <a href="https://www.facebook.com/" target="_blank"><i class='bx bxl-facebook-circle facebook'></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png" class="instagram"></a>
                    <a href="https://www.pinterest.com/" target="_blank"><i class='bx bxl-pinterest pinterest' ></i></a>
                </div>
                
				<span>or use your account</span><br>
                <div class="input-groups">
				  <div class="input-fields"><i class='bx bx-user'></i>&nbsp;&nbsp;<input type="text" name="username" placeholder="Username"><br><br></div>
				  <div class="input-fields"><i class='bx bx-lock'></i></i>&nbsp;<input type="password" name="password" placeholder="Password"><br><br></div>
				  <p class="forgot"><a href="forgetpwd.php">Forgot your password?</a></p>
				</div>
                
    
                <input type="submit" name="login-sub" value="SIGN IN" class="sub-button">
            </form>
          </div>
		  
         <!--overlay container--> 
        <div class="overlay-container">
		  <div class="overlay">
		     <div class="overlay-panel overlay-left">
			   <h1>Welcome Back!</h1>
			  <p>Craving Cupcakes? We’ve Got You Covered!</p>
              <button class="overlay-button" id="js-overlay-signIn-button">Sign In</button>
			 </div>
            <div class="overlay-panel overlay-right">
              <h1>Hello, Friend!</h1>
			  <p>Enter your personal details and start exploring our cupcakes.</p>
              <button class="overlay-button" id="js-overlay-signUp-button">Sign Up</button>
            </div>
		  </div>
		</div>
	   </div>
		
	<script src="form-js-script.js"></script>
    </body>
</html>
<?php
include "dbconn.php";
session_start();


//Register form coding
if (isset($_POST["reg-sub"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($name && $email && $phone && $address && $username && $password )) {

        // Checking if username exists
        $sql = "SELECT * FROM usertbl WHERE username='$username'";
        $result = $conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $n = $result->rowCount();  // Corrected line
        if ($n == 1) {
            echo "<script>alert('The username you entered already exists. Please choose a different username.')</script>";
        } else {
             //validation of the form
			 
			 $match="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
			 if(preg_match($match,$email)){
				 
				if(is_numeric($phone)){
					if(strlen($phone)== 8){
						
							// Inserting user data into usertbl
							$sql = "INSERT INTO usertbl(username, password) VALUES(:username, :password)";
							$result = $conn->prepare($sql);
							$result->execute(array(
								':username' =>$username,
								':password' =>$password
							));
							echo "Data successfully inserted into usertbl.";

							// Inserting user data into customertbl
							$sql = "INSERT INTO customertbl(cname,cemail,cphone,caddress,username)VALUES(:name,:email,:phone,:address,:username)";
							$result = $conn->prepare($sql);
							$result->execute(array(
								':name' => $name,
								':email' => $email,
								':phone' => $phone,
								':address' =>$address,
								':username' =>$username
							));
							echo "Data inserted into customertbl.";
							
							
							
							
							
							
						
						
						
					}else{
						echo"<script>alert('Phone number should be of 8 characters')</script>";
					}
				}else{
					echo"<script>alert('Invalid phone number')</script>";
				};
			 }
			 else{
				 echo"<script>alert('Please enter a valid email address')</script>";
			 }
			 
			 
			 
			 
			 
			 
            
        }

    } else {
        echo "<script>alert('Please ensure all form fields are filled.')</script>";
    }
}
elseif (isset($_POST["login-sub"])) { // Login form coding
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usertbl WHERE username = '$username'";
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);// Fetch single row
		$n=$stmt->rowCount();
        if ($n==1) { 
            if ($password == $row['password']) { // Verify password
                if ($row['type'] == "C") {
					$_SESSION["username"]=$username; //session defining
                    header('Location: viewproductcustomer.php');
                   
                } else {
					$_SESSION["username"]=$username;
                    header('Location: admin folder/admin.php');
                
                }
            } else {
                echo "<script>alert('Incorrect Password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Username not found. Kindly register first')</script>";
        }
    } else {
        echo "<script>alert('Please fill all the details.')</script>";
    }
}


else{
		echo"<script>alert('Please fill the details');</script>";
	}
						
?>

