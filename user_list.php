<?php

$server="localhost";
$username="root";
$password="";
$database="sparktask1";
$con=mysqli_connect($server,$username,$password,$database);
// if(!$con){
//     die("connection to this database failed due to" . mysqli_connect_error());
// }
// else{
//     echo"Connections was sucessfull";
// }
$sql="SELECT * FROM `account_user_list` ORDER BY `acc_no` ASC";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bank Management System </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-sm my-2">
            <a class="navbar-brand ml-1" href="#"><img src="assets/Scribe-Logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <i class="fas fa-bars" style="color: #fff;font-size: 150%;"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item  ml-3"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item active ml-3"><a class="nav-link" href="user_list.php">User List</a></li>
                    <li class="nav-item  ml-3"><a class="nav-link" href="history.php">Transaction History</a></li>
                    <li class="nav-item ml-3"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
            </div>
            <a class="navbar-brand mr-5" href="profile.html">ABHAY WAGRE</a>
        </nav>
        <header class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <table width="400" border="2" cellpadding="2" cellspacing='1' align="center"bgcolor="#e46f5e">

                        <tr bgcolor="#c8df7b">
                                    <th> Account_no</th>
                                    <th>User_Name</th>
                                    <th>Balance</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                        </tr>

                        <!-- We use while loop to fetch data and display rows of date on html table -->

                        <?php

                        while ($course = mysqli_fetch_assoc($result)){

                        echo "<tr>";
                        echo "<td>".$course['sno/acc_no']."</td>";
                        echo "<td>".$course['name']."</td>";
                        echo "<td>".$course['balance']."</td>";
                        echo "<td>".$course['phone']."</td>";
                        echo "<td>".$course['email']."</td>";

                        echo "</tr>";

                        }
                        ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="transcation.php" class="button">Do Transaction</a>
                    </div>
                </div>
            </div>
        </header>

   </body>

</html>