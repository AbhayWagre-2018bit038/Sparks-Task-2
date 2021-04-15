<?php
$insert=false;
if(isset($_POST['debiters_acc_no']))
{
    $server="localhost";
    $username="root";
    $password="";
    $database="sparktask1";
    $con=mysqli_connect($server,$username,$password,$database);
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo"Sucess connect to db";
    $debiters_acc_no = $_POST['debiters_acc_no'];
    $crediters_acc_no= $_POST['crediters_acc_no'];
    $amount = $_POST['amount'];
    $sql="SELECT `balance` FROM `account_user_list`WHERE `account_user_list`.`sno/acc_no` = $debiters_acc_no" ;
    $resul=mysqli_query($con,$sql);
    $result=mysqli_fetch_assoc($resul);
    $new_debiters_bal=$result['balance']-$amount;
    $sql="SELECT `balance` FROM `account_user_list`WHERE `account_user_list`.`sno/acc_no` = $crediters_acc_no" ;
    $resul=mysqli_query($con,$sql);
    $result=mysqli_fetch_assoc($resul);
    $new_crediters_bal=$result['balance']+$amount;
    $sql="UPDATE `account_user_list` SET `balance` = '$new_debiters_bal' WHERE `account_user_list`.`sno/acc_no` = $debiters_acc_no";
    $result=mysqli_query($con,$sql);
    $sql="UPDATE `account_user_list` SET `balance` = '$new_crediters_bal' WHERE `account_user_list`.`sno/acc_no` = $crediters_acc_no";
    $result=mysqli_query($con,$sql);

    $sql="INSERT INTO `transaction_table` ( `sender`, `recever`, `amount`, `date_time`) VALUES ('$debiters_acc_no', '$crediters_acc_no', '$amount', current_timestamp());";
    //echo $sql;
    if($con->query($sql)==true){
        //echo"Sycessfully inserted";
        $insert=true;
    }
    else{
        echo"Error:$sql <br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bank Management System </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/formstyle.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm my-2">
            <a class="navbar-brand ml-1" href="#"><img src="assets/Scribe-Logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <i class="fas fa-bars" style="color: #fff;font-size: 150%;"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active ml-3"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item  ml-3"><a class="nav-link" href="user_list.php">User List</a></li>
                    <li class="nav-item  ml-3"><a class="nav-link" href="history.php">Transaction History</a></li>
                    <li class="nav-item ml-3"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
            </div>
            <a class="navbar-brand mr-5" href="profile.html">ABHAY WAGRE</a>
        </nav>
        <div class="container">
            
        <h3>Welcome to Bank transaction </h3>
        <p>Enter your details and submit this form for completing the Transaction</p>
        <?php
            if($insert==true){
                echo "<p>The Transaction is Done !!!!!!</p>";
            }
        ?>
        <form action="transcation.php" method="post">
            <input type="text" name="debiters_acc_no" id="debiters_acc_no" placeholder="Enter the Debiters  Account number">
            <input type="text" name="crediters_acc_no" id="crediters_acc_no" placeholder="Enter the Crediters Account number">
            <input type="text" name="amount" id="amount" placeholder="Enter amount to transfer">
            <button class="btn">submit</button>
        </form>
        <script src="index.js"></script>
        </div>
         <!-- jQuery library -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/c252d9c8b4.js" crossorigin="anonymous"></script>
    </body>
</html>