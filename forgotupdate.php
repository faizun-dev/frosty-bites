<?php
include "dbconn.php";

if (isset($_GET['usn'])) {
    $usn = $_GET['usn'];

    // Correctly quote the username value
    $sql = "SELECT * FROM usertbl WHERE username = :usn";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':usn' => $usn]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $n = $stmt->rowCount();

    if ($n > 0) {
        echo "<br> We found the username $usn";
    } else {
        echo "<br> No user found with the username $usn";
    }
} else {
    echo "No username provided.";
}
?>
<html>
<head>
    <title>Update Password</title>
    <link rel="stylesheet" href="admin folder/adminforms.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h1 class="page-title">Update Password</h1>
            <div class="form-groups">
                <label>Username</label>
                <input type="text" name="uname" disabled value="<?php echo isset($row['username']) ? $row['username'] : ''; ?>" class="form-input"><br><br>
                <label>Password</label>
                <input type="text" name="pwd" class="form-input"><br><br>

                <input type="submit" name="sub" value="UPDATE">
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['sub'])) {
    if (!empty($_POST['pwd'])) {
        $pwd = $_POST['pwd'];

        // Ensure $usn is available for the update query
        if (isset($usn)) {
            $sql = "UPDATE usertbl SET password = :pwd WHERE username = :usn";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':pwd' => $pwd, ':usn' => $usn]);

            header("Location: form.php");
            exit;
        } else {
            echo "No username to update.";
        }
    } else {
        echo "Password field cannot be empty.";
    }
}
?>
