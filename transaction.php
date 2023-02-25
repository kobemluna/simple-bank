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
    <title> Table of Transactions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="Tcontainer">
        <div class="Transform">
            <table ><form action="insertTransaction.php" method="post">
                <caption> Enter any transactions here </caption>
                <tr>
                    <th>Deposit</th>
                    <td><input type="text" placeholder="Deposit" name="Deposit"></td>
                    <th>Withdraw</th>
                    <td><input type="text" placeholder="Withdraw" name="Withdraw"></td>
                </tr>
                <tr>
                    <th>AccNo</th>
                    <td><input type="text" placeholder="AccNo" name="AccNo"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type = "submit">Submit Transaction</button></td>
                </tr>
                </form>
            </table>
        </div>

    </div>

    <div class="containerT">
        <div class = "TransList">
            <table width="900px" border="1" cellpadding="2" cellspacing="2"> 
                <caption> List of all Users </caption>
                <tr>
                    <th>Transaction ID</th>
                    <th>Deposit</th>
                    <th>Withdraw</th>
                    <th>AccNo</th>
                    <th>Date</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM `transactions`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo '
                        <tr>
                            <td>'.$row['TransID'].'</td>
                            <td>'.$row['Deposit'].'</td>
                            <td>'.$row['Withdraw'].'</td>
                            <td>'.$row['AccNo'].'</td>
                            <td>'.$row['Date'].'</td>
                        </tr> ';
                    }
                ?>
            </table>
        </div>

    </div>
            <center><p> Do you need to go back to the main users page? Click here <a href="users.php">Register Users</a>.</p></center>
            <center><p> Do you need to see the users account information? Click here <a href="userAcc.php">Users Account</a>.</p></center>
            <center><p> Do you need to add a second account for a user? Click here <a href="OtherAcc.php">Second Account</a>.</p></center>
            <center><p> If you are done using the system you can logout here <a href="logout.php">Logout</a>.</p></center>
</body>

</html>