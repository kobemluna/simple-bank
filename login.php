<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prototype";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()){
    echo "failed to connect";
    exit();
}

echo "Connected successfully, Welcome to the Big Banking Bros admin login page";
echo"<br>";

if(isset($_POST["submit"]))
{
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $sql = mysqli_query($conn, "SELECT count(*) as total from Login where LoginID = '".$uname."' and Password = '".$pass."'") or die(mysqli_error($conn));
    $rw = mysqli_fetch_array($sql);

    if($rw['total']>0)
    {
        echo "<script>alert('username and password are correct')</script>";
        $intime = "INSERT INTO `login`(`LoginDate`) VALUES (now())";
        $check = mysqli_query($conn, $intime);
        header("Location: users.php");
    }
    else
    {
        echo "<script>alert('username and password are incorrect')</script>";
    }
    
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>

<form method="post">
    <label> Username </label>
    <input type="text" name="uname">
    <label>Password</label>
    <input type="text" name="pass">
    <input type="submit" name="submit">
</form>
</body>
</html>