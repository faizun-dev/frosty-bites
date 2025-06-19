<!DOCTYPE html>
<html lang="en">
	<head>
	   <title>Add Product Page</title>
	   <link rel="stylesheet" href="adminforms.css">
	</head>
	<body>
	   
	   <div class="form-container">
	   <h1 class="page-title">Add New Product</h1>
	   <form action="" method="post" enctype="multipart/form-data">
	    <div class="form-group">
	      <label>Product Name </label>  <input type="text" name="pname" class="form-input"><br><br>
		  <label>Product Details </label> <input type="text" name="pdetail" class="form-input"><br><br>
		  <label>Product Quantity </label> <input type="number" name="pqty" class="form-input"><br><br>
		 <label>Product Price </label> <input type="number" name="pprice" class="form-input"><br><br>
		  <label>Product Picture </label>  <input type="file" name="ppic" class="form-input"><br><br>
		  <input type="submit" name="sub" value="Add Product" class="header-button">
		</div>
	   </form>
	   </div>
	</body>
</html>
<?php
include "../dbconn.php";
if(isset($_POST['sub'])){
   if(!empty($_POST['pname'])&&
	 !empty($_POST['pdetail'])&&
	 !empty($_POST['pqty'])&&
	 !empty($_POST['pprice'])&&
	 !empty($_FILES['ppic']['name']))
	 
	 {
	    $pname=$_POST['pname'];
		$pdetail=$_POST['pdetail'];
		$pqty=$_POST['pqty'];
		$pprice=$_POST['pprice'];
		//picture inserting code
		$filename=$_FILES['ppic']['name'];
		$filetemp=$_FILES['ppic']['tmp_name'];
		$folder="uploaded_product_pic/".$filename;
		move_uploaded_file($filetemp,$folder);
		
        
		
		//inserting the product details into the producttbl
		$sql = "INSERT INTO producttbl(pname,pdetail,pqty,pprice,ppic) VALUES (:a, :b, :c, :d, :e)";
		$stmt=$conn ->prepare($sql);
		$stmt ->execute(
		   array(
		    ':a'=>$pname,
			':b'=>$pdetail,
			':c'=>$pqty,
			':d'=>$pprice,
			':e'=>$folder));
		header("Location:admindisplayproduct.php");
		
		
   
   }






}else{
    
	echo "<br><br>Please fill your product details";

}