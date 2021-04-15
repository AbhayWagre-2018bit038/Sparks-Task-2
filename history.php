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
$sql="SELECT * FROM `transaction_table` ORDER BY `sno` ASC";
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
                    <li class="nav-item  ml-3"><a class="nav-link" href="user_list.php">User List</a></li>
                    <li class="nav-item  active ml-3"><a class="nav-link" href="history.php">Transaction History</a></li>
                    <li class="nav-item ml-3"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
            </div>
            <a class="navbar-brand mr-5" href="profile.html">ABHAY WAGRE</a>
        </nav>

        <header class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table width="400" border="2" cellpadding="2" cellspacing='1'align="center" bgcolor="#e46f5e">

                            <tr bgcolor="#c8df7b">
                                <th>Sno</th>
                                <th>Debiters_acc_no</th>
                                <th>Crediters_acc_no</th>
                                <th>Amount</th>
                                <th>Time</th>
                            </tr>

                            <!-- We use while loop to fetch data and display rows of date on html table -->

                            <?php

                            while ($course = mysqli_fetch_assoc($result)){

                            echo "<tr>";
                                echo "<td>".$course['sno']."</td>";
                                echo "<td>".$course['sender']."</td>";
                                echo "<td>".$course['recever']."</td>";
                                echo "<td>".$course['amount']."</td>";
                                echo "<td>".$course['date_time']."</td>";

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
        

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/c252d9c8b4.js" crossorigin="anonymous"></script>

   </body>

</html>