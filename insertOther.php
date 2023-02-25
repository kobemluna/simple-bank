<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prototype";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $UserID = $_POST['UserID'];
    $BranchID = $_POST['BranchID'];
    $name = $_POST['UserName'];
    $AccType = $_POST['AccType'];

    $Deposit = $_POST['Deposit'];
    $Withdraw = $_POST['Withdraw'];


    $sql = "INSERT INTO `otheracc`(`UserID`, `BranchID`, `UserName`, `AccType`) VALUES ('$UserID','$BranchID','$name','$AccType')";
    $insert = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (!$insert){
        echo "error";
    }
    else{
        header("Location: OtherAcc.php");
        echo "Data entered successfully";
    }
?>