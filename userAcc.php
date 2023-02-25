<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prototype";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$count=0;
?>

<!DOCTYPE html>
<html>
<head>
    <title> Table of Users Account Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="UAcontainer">
        <div class = "AccList">
            <table width="900px" border="1" cellpadding="2" cellspacing="2"> 
                <caption> List of Users Account Information </caption>
                <tr>
                    <th>AccNo</th>
                    <th>UserID</th>
                    <th>AccType</th>
                    <th>BranchID</th>
                    <th>Balance</th>
                    <th>Password</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM `useracc`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo '
                        <tr>
                            <td>'.$row['AccNo'].'</td>
                            <td>'.$row['UserID'].'</td>
                            <td>'.$row['AccType'].'</td>
                            <td>'.$row['BranchID'].'</td>
                            <td>'.$row['Balance'].'</td>
                            <td>'.'******'.'</td>
                        </tr> ';
                    }
                ?>

            </table>
        </div>

    </div>
            <center><p> Do you need to see the home page? Click here <a href="users.php">Register Users</a>.</p></center>
            <center><p> Do you need to make a transaction? Click here <a href="transaction.php">Transactions</a>.</p></center>
            <center><p> Do you need to add a second account for a user? Click here <a href="OtherAcc.php">Second Account</a>.</p></center>
            <center><p> If you are done using the system you can logout here <a href="logout.php">Logout</a>.</p></center>
</body>

</html>