<html>
 <head>
  <title>Cart</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link href="table.css" rel="stylesheet">
  </head>
  <body>
   <div class="header-container">
   <h1>Place your Order</h1>
  <a href="logout.php" class="logout-btn">Logout</a>
  </div>
  </body>

</html>
<?php
include "dbconn.php";
session_start();
$username=$_SESSION['username'];



//fetching the customer data from the customertbl based on username
$sql="SELECT * FROM customertbl WHERE username='$username'";
$stmt=$conn->query($sql);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$cid=$row['cid'];  //used for order table
$cname=$row['cname'];
$address=$row['caddress'];
$phone=$row['cphone'];
$email=$row['cemail'];
echo "<h3 class='shipmentaddtitle'>Dear <b>$cname</b> Your Shipment Address:</h3>";
echo"<h3 class='info-ship'>";
echo "Address: $address<br>";
echo "Contact No: $phone<br>";
echo "Email: $email<br>";
echo"</h3>";

//getting the product id from product table
if(isset($_GET['id'])){
	
	$pid=$_GET['id'];
	$sql="SELECT * FROM producttbl WHERE pid =$pid";
	$stmt=$conn->query($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	//displaying in table
	echo "<table border='2'>";
	 echo'<tr>';
	   echo"<th>Name</th>";
	   echo"<th>Picture</th>";
	   echo"<th>Details</th>";
	   echo"<th>Price</th>";
	 echo'</tr>';
	 echo'<tr>';
	   echo"<td>{$row['pname']}</td>";
	   echo "<td><a href='admin folder/'".$row['ppic']."'><img src='admin folder/".$row['ppic']."' height='200' width='200'></a></td>";
	   echo"<td>{$row['pdetail']}</td>";
	   echo"<td>"."$".$row['pprice']."</td>"; 
	 echo'</tr>';
	echo "</table>";
	
	$price=$row['pprice'];
	
}

?>
<html>
  <head> 
  <link rel="stylesheet" href="admin folder/adminforms.css">
  </head>
  <body>
    <div class="form-container">
	<h1 class="page-title">Shopping Cart</h1>
	<form action="" method="post">
	<div class="form-groups">
	  <label>Product ID </label><input type="number" name="pid" disabled value="<?php if(!empty($pid)){echo "$pid";}
	  ?>" class="form-input"><br><br>
	  <label>Quantity </label> <input type="number" name="oqty" value="1" class="form-input"><br><br>
	  <label>Credit Card No </label>  <input type="text" name="ccno" value="1234567891011121" class="form-input"><br><br>
	  <label>CVC Code </label>  <input type="text" name="cvc" value="345" class="form-input"><br><br>
	  <label>Expiry Date</label>  <input type="date" name="expdate" class="form-input"><br><br>
	  <input type="submit" name="sub"value="Place Order" class="form-input">
    </div>	  
	</form>
	</div>
  </body>
</html>

<?php
$qty=$row['pqty'];
if(isset($_POST['sub'])){
  
	
	if(!empty($_POST['oqty'])&&
	!empty($_POST['ccno'])&&
	!empty($_POST['cvc'])&&
	!empty($_POST['expdate'])){
		if($qty >$_POST['oqty']){
		
		//inserting data into order table
		$tdate=date("Y-m-d");
		$sql="INSERT INTO ordertbl(cid,pid,odate,oqty,oprice)
		 VALUES(:a,:b,:c,:d,:e)";
		$stmt=$conn->prepare($sql);
		$stmt->execute(
		  array(
		  ':a'=>$cid,
		  ':b'=>$pid,
		  ':c'=>$tdate,
		  ':d'=>$_POST['oqty'],
		  ':e'=>$price));
		echo"Inserted successfully into order table";
		
		
		
		
		//selecting the order id from ordertbl
		$sql="SELECT oid FROM ordertbl WHERE cid=$cid AND pid=$pid AND odate='$tdate'";
		$stmt=$conn->query($sql);
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		$n=$stmt->rowCount();

		if($n>0){
			//inserting the data into payment table
			$oid=$row['oid'];
			$totalbill=$_POST['oqty']*$price;
			
			$sql="INSERT INTO paymenttbl(oid,paydate,paycardno,cvc,expdate,payamount)VALUES
			(:a,:b,:c,:d,:e,:f)";
	       
			$stmt=$conn->prepare($sql);
			$stmt->execute(
			  array(
			   ':a'=>$oid,
			   ':b'=>$tdate,
			   ':c'=>$_POST['ccno'],
			   ':d'=>$_POST['cvc'],
			   ':e'=>$_POST['expdate'],
			   ':f'=>$totalbill));
			 echo"data inserted successfully into paymenttbl;";
			 
			//updating the quantity in producttbl
			$qty=$qty-$_POST['oqty'];
			$sql="UPDATE producttbl SET pqty=:a where pid=$pid";
			$stmt=$conn->prepare($sql);
			$stmt->execute(
			  array(
			    ':a'=>$qty));
				echo "<script>alert('Your total bill is $$totalbill. Thank you for your order!');</script>";

                
                //echo "<h3 style='color: green; text-align: center;'>Your total bill is $$totalbill. Thank you for your order!</h3>";
               header('Refresh:2; url=Thanks.php');
			
			
		}
		
	}
	else{
	  echo"<script>alert('Apologies, we're out of stock for today');</script>";
  }
  }
  
}
?>