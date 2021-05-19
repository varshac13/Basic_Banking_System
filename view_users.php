<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/ss.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">


</head>

<body>
<?php
    include 'connection.php';
    $sql = "SELECT * FROM userdetails";
    $result = mysqli_query($conn,$sql);
?>

<?php
  include 'navbar.php';
?>

<div class="container">
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
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['ID'] ?></td>
                        <td class="py-2"><?php echo $rows['NAME']?></td>
                        <td class="py-2"><?php echo $rows['EMAIL']?></td>
                        <td class="py-2"><?php echo $rows['PHONE_NO']?></td>
                        <td class="py-2"><?php echo $rows['ACC_TYPE']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
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
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
</body>
</html>