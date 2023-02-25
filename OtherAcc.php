<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prototype";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html>
<head>
    <title> Table of Other Accounts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="OAcontainer">
        <div class="Otherform">
            <table ><form action="insertOther.php" method="post">
                <caption> Enter a second account for existing user </caption>
                <tr>
                    <th>UserID</th>
                    <td><input type="text" placeholder="UserID" name="UserID"></td>
                </tr>
                <tr>
                    <th>BranchID</th>
                    <td><input type="text" placeholder="BranchID" name="BranchID"></td>
                </tr>
                <tr>
                    <th>Account Type</th>
                    <td><input type="text" placeholder="AccType" name="AccType"></td>
                </tr>
                <tr>
                    <th>User Name</th>
                    <td><input type="text" placeholder="UserName" name="UserName"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type = "submit">Submit other account</button></td>
                </tr>
                </form>
            </table>
        </div>

    </div>

    <div class="containerOA">
        <div class = "OtherList">
            <table width="900px" border="1" cellpadding="2" cellspacing="2"> 
                <caption> List of all Users with a second account </caption>
                <tr>
                    <th>UserID</th>
                    <th>AccNo2</th>
                    <th>BranchID</th>
                    <th>UserName</th>
                    <th>Balance</th>
                    <th>AccType</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM `otheracc`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo '
                        <tr>
                            <td>'.$row['UserID'].'</td>
                            <td>'.$row['AccNo2'].'</td>
                            <td>'.$row['BranchID'].'</td>
                            <td>'.$row['UserName'].'</td>
                            <td>'.$row['Balance'].'</td>
                            <td>'.$row['AccType'].'</td>
                        </tr> ';
                    }
                ?>
            </table>
        </div>

    </div>
            <center><p> Do you need to go back to the main users page? Click here <a href="users.php">Register Users</a>.</p></center>
            <center><p> Do you need to see the users account information? Click here <a href="userAcc.php">Users Account</a>.</p></center>
            <center><p> Do you need to make an transaction? Click here <a href="transaction.php">Transaction</a>.</p></center>
            <center><p> If you are done using the system you can logout here <a href="logout.php">Logout</a>.</p></center>
</body>

</html>