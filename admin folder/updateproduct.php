<?php
include "../dbconn.php";

if(isset($_GET['upid'])){
	$upid=$_GET['upid'];
	$sql="SELECT * FROM producttbl WHERE pid=$upid";
	$stmt=$conn->query($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$n=$stmt->rowCount();
	if($n>0){
		
	}
	else{
		echo "No Product record with $upid found.";
	}
	
	
}

?>

<html>
 <head>
   <title>Update Product Form</title>
   <link rel="stylesheet" href="adminforms.css">
   
 </head>
 <body>
    <div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
	<h1 class="page-title">Update Product</h1>
	  <div class="form-groups">
	      <label>Product ID</label><input type="text" name="upid" disabled value="<?php echo $row['pid'];?>" class="form-input"><br><br>
		  <label>Product Name</label><input type="text" name="upname"  value="<?php echo $row['pname'];?>"class="form-input"><br><br>
		  <label>Product Details</label><input type="text" name="updetail" value="<?php echo $row['pdetail'];?>"class="form-input"><br><br>
          <label>Product Quantity</label><input type="number" name="upqty" value="<?php echo $row['pqty'];?>"class="form-input"><br><br>
		  <label>Product Price</label>$ <input type="number" name="upprice" value="<?php echo $row['pprice'];?>"class="form-input"><br><br>
		  <label>Product Picture</label><br><br>
		  <?php if (!empty($row['ppic'])): ?>
             <img src="<?php echo $row['ppic']; ?>" alt="Product Picture" height="200" width="200"><br>  <!--displaying the previous product-->
          <?php endif; ?><br>
          

		  <input type="submit" name="sub" value="UPDATE">
		  
	  </div>
	</form>
	</div>
 </body>
</html>

<?php

if (isset($_POST['sub'])){
	if (!empty($_POST['upname'])&&
	   !empty($_POST['updetail'])&&
	   !empty($_POST['upqty'])&&
	   !empty($_POST['upprice'])
	   ){
		   
		   $upname=$_POST['upname'];
		   $updetail=$_POST['updetail'];
		   $upqty=$_POST['upqty'];
		   $upprice=$_POST['upprice'];
	
		   
		   
		   
		   //updating customer data
		   $sql="UPDATE producttbl SET pname=:a,pdetail=:b,pqty=:c,pprice=:d WHERE pid=$upid";
		   $stmt=$conn->prepare($sql);
		   $stmt->execute(
		     array(
		      ':a'=>$upname,
			  ':b'=>$updetail,
			  ':c'=>$upqty,
			  ':d'=>$upprice,
			  ));
		   
		   header('Location:admindisplayproduct.php');
	   }
}







?>