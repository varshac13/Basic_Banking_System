<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $from = $_GET['ID'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from userdetails where ID=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from userdetails where ID=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE userdetails set balance=$newbalance where ID=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE userdetails set balance=$newbalance where ID=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['NAME'];
        $receiver = $sql2['NAME'];
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO transaction_history(`sno`,`sender`, `receiver`, `balance`,`datetime`) VALUES ('sno','$sender','$receiver','$amount','$date')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction Details</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/ss.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">


        <style type="text/css">

            button{
                border:none;
                background: #d9d9d9;
            }
            button:hover{
                background-color:#777E8B;
                transform: scale(1.1);
                color:white;
            }

        </style>
    </head>

    <body>

<?php
include 'navbar.php';
?>

        <div class="container">
            <h2 class="text-center pt-4">Transaction Details</h2>
<?php
include 'connection.php';
$sID = $_GET['ID'];
$sql = "SELECT * FROM  userdetails where ID=$sID";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
}
$rows = mysqli_fetch_assoc($result);
?>
            <form method="post" name="tcredit" class="tabletext" >
                <br><br>
                <div>
                    <center>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Account Type</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-2"><?php echo $rows['ID'] ?></td>
                                        <td class="py-2"><?php echo $rows['NAME'] ?></td>
                                        <td class="py-2"><?php echo $rows['EMAIL'] ?></td>
                                        <td class="py-2"><?php echo $rows['PHONE_NO'] ?></td>
                                        <td class="py-2"><?php echo $rows['ACC_TYPE'] ?></td>
                                        <td class="py-2"><?php echo $rows['balance'] ?></td>


                                    </tr>
                                </tbody>
                            </table>
                    </center>
                </div><br>                             
                <center>
                    <label><b>Transfer To: </b></label>

                    <select name="to" class="form-control" required>
                        <option value="" disabled selected><b>Choose </b></option>
<?php
include 'connection.php';
$sid = $_GET['ID'];
$sql = "SELECT * FROM userdetails where ID!=$sID";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error " . $sql . "<br>" . mysqli_error($conn);
}
while ($rows = mysqli_fetch_assoc($result)) {
    ?>
                            <option class="table" value="<?php echo $rows['ID']; ?>" >

                            <?php echo $rows['NAME']; ?> (Balance: 
                            <?php echo $rows['balance']; ?> ) 

                            </option>
                            <?php
                        }
                        ?>
                        <div>
                    </select>
                    <br>
                    <label><b>Amount: </b></label>
                    <input type="number" class="form-control" name="amount" required>   
                    <br>
                    <div class="text-center" >
                        <button class="btn mt-3" name="submit" type="submit" id="myBtn"><b>Transfer </b></button>
                    </div>
                </center>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
</html>