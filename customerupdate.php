<?php
include "dbconn.php";

if (isset($_GET['ucid'])) {
    $ucid = $_GET['ucid'];
    $sql = "SELECT * FROM customertbl WHERE cid = $ucid";
    $stmt = $conn->query($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $n = $stmt->rowCount();
    if ($n <= 0) {
        echo "No Product record with $ucid found.";
    }
}
?>

<html>
<head>
   <title>Update Profile Details</title>
   <link rel="stylesheet" href="admin folder/adminforms.css">
</head>
<body>
    <div class="form-container">
    <form action="" method="post">
        <h1 class="page-title">Update Profile</h1>
        <div class="form-groups">
            <label>Name</label><input type="text" name="ucname" value="<?php echo $row['cname']; ?>" class="form-input" disabled><br><br>
            <label>Email</label><input type="text" name="ucemail" value="<?php echo $row['cemail']; ?>" class="form-input"><br><br>
            <label>Phone</label><input type="text" name="ucphone" value="<?php echo $row['cphone']; ?>" class="form-input"><br><br>
            <label>Address</label><input type="text" name="ucaddress" value="<?php echo $row['caddress']; ?>" class="form-input"><br><br>
            <input type="submit" name="sub" value="UPDATE">
        </div>
    </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['sub'])) {
    if (!empty($_POST['ucemail']) && !empty($_POST['ucphone']) && !empty($_POST['ucaddress'])) {
        $ucemail = $_POST['ucemail'];
        $ucphone = $_POST['ucphone'];
        $ucaddress = $_POST['ucaddress'];

        // Updating the database
        $sql = "UPDATE customertbl SET cemail=:a, cphone=:b, caddress=:c WHERE cid=:ucid";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':a' => $ucemail,
            ':b' => $ucphone,
            ':c' => $ucaddress,
            ':ucid' => $ucid
        ));

        echo "<script>alert('Thank you! Your details are successfully updated');</script>";
    } else {
        echo "<script>alert('Please fill all details.');</script>";
    }
}
?>
