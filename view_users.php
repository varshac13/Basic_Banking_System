<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transfer Money</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/ss.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <style type="text/css">


            button{
                position: relative;
                display: inline-block;
                margin: 10px 0;
                padding: 6px 18px;
                color: #FFFFFF;
                text-decoration: none;
                text-transform: uppercase;
                font-size: 17px;
                letter-spacing: 2px;
                border-radius: 8px;
                background-color: #212121;
                opacity: 0.9;

            }
        </style>
    </head>           

    <body>
        <?php
        include 'connection.php';
        $sql = "SELECT * FROM userdetails";
        $result = mysqli_query($conn, $sql);
        ?>

        <?php
        include 'navbar.php';
        ?>

        <div class="container">
            <div class="text-center">
                <a href="index.php"><button><b>Main Menu</b></button></a>
                <a href="transfermoney.php"><button><b>Transfer Money</b></button></a>
                <a href="transactionhistory.php"><button><b>Transaction History</b></button></a>

            </div>


            <h2 class="text-center pt-4"><b>User Details</b></h2>
            <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Phone Number</th>
                                    <th>Account Type</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td class="py-2"><?php echo $rows['ID'] ?></td>
                                        <td class="py-2"><?php echo $rows['NAME'] ?></td>
                                        <td class="py-2"><?php echo $rows['EMAIL'] ?></td>
                                        <td class="py-2"><?php echo $rows['PHONE_NO'] ?></td>
                                        <td class="py-2"><?php echo $rows['ACC_TYPE'] ?></td>
                                        <td class="py-2"><?php echo $rows['balance'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>