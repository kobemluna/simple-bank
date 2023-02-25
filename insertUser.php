<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prototype";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $UserID = $_POST['UserID'];
    $name = $_POST['UserName'];
    $address = $_POST['Address'];
    $dob = $_POST['DOB'];
    $Number = $_POST['Number'];
    $email = $_POST['Email'];

    $passUser = $_POST['Password'];
    $BranchID = $_POST['BranchID'];
    $AccType = $_POST['AccType'];


    $sql = "INSERT INTO `users`(`UserID`, `UserName`, `Address`, `DOB`, `Number`, `Email`) VALUES ('$UserID','$name','$address','$dob','$Number','$email')";
    $insert = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($insert==1)
    {
        $sql2 = "INSERT INTO `useracc` (`UserID`, `AccType`, `BranchID`, `Password`) VALUES ('$UserID', '$AccType', '$BranchID', '$passUser')";
        $ins = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        header("Location: userAcc.php");
    }


    if (!$insert){
        echo "error";
    }
    else{
        header("Location: users.php");
        echo "Data entered successfully";
    }
?>