<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prototype";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $AccNo = $_POST['AccNo'];
    $Deposit = $_POST['Deposit'];
    $Withdraw = $_POST['Withdraw'];
    //$AccNo2 = $_POST['AccNo2'];
    //$Date = $_POST['Date'];


    $sql = "INSERT INTO `transactions`(`Deposit`, `Withdraw`, `AccNo`, `Date`) VALUES ('$Deposit','$Withdraw', '$AccNo',now())";
    $insert = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (!$insert){
        echo "error";
    }
    else{
        header("Location: transaction.php");
        echo "Data entered successfully";
    }
?>