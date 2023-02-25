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
    <title> Table of all Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="tableform">
            <table ><form action="insertUser.php" method="post">
                <caption> Insert new users here </caption>
                <tr>
                    <th>UserID</th>
                    <td><input type="text" placeholder="UserID" name="UserID"></td>
                    <th>UserName</th>
                    <td><input type="text" placeholder="FullName" name="UserName"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" placeholder="Address" name="Address"></td>
                    <th>DOB</th>
                    <td><input type="text" placeholder="YYYY-MM-DD" name="DOB"></td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td><input type="text" placeholder="Number" name="Number"></td>
                    <th>Email</th>
                    <td><input type="text" placeholder="Email" name="Email"></td>
                </tr>
                <tr>
                    <th>BranchID</th>
                    <td><input type="text" placeholder="BranchID" name="BranchID"></td>
                    <th>AccountType</th>
                    <td><input type="text" placeholder="AccType" name="AccType"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="text" placeholder="Password" name="Password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type = "submit">Insert User into DB</button></td>
                </tr>
                </form>
            </table>
        </div>

    </div>

    <div class="container1">
        <div class = "UserList">
            <table width="900px" border="1" cellpadding="2" cellspacing="2"> 
                <caption> List of all Users </caption>
                <tr>
                    <th>UserID</th>
                    <th>UserName</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Number</th>
                    <th>Email</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $count++;
                        echo '
                        <tr>
                            <td>'.$row['UserID'].'</td>
                            <td>'.$row['UserName'].'</td>
                            <td>'.$row['Address'].'</td>
                            <td>'.$row['DOB'].'</td>
                            <td>'.$row['Number'].'</td>
                            <td>'.$row['Email'].'</td>
                        </tr> ';
                    }
                ?>
                <div class="Totalusers">
                    <div> <?php echo $count; ?> Users</div>
                </div>

            </table>
        </div>

    </div>
            <center><p> Do you need to see the users account information? Click here <a href="userAcc.php">Users Account</a>.</p></center>
            <center><p> Do you need to make a transaction? Click here <a href="transaction.php">Transactions</a>.</p></center>
            <center><p> Do you need to add a second account for a user? Click here <a href="OtherAcc.php">Second Account</a>.</p></center>
            <center><p> If you are done using the system you can logout here <a href="logout.php">Logout</a>.</p></center>
</body>

</html>