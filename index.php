<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        
        <title>Basic Bank System</title>
        <style type="text/css">
            
            
  button{
                position: relative;
                display: inline-block;
                padding: 12px 36px;
                margin: 10px 0;
                color: #FFFFFF;
                text-decoration: none;
                text-transform: uppercase;
                font-size: 20px;
                letter-spacing: 2px;
                border-radius: 8px;
                background-color: #292826;
                opacity: 0.9;
                
        }
        </style>
    </head>
    <body>
        <?php
        include 'navbar.php';
        ?>
       
        <div class="container-fluid">
        <!-- Introduction section -->
        <div class="intro py-1">
            <div >
                
                <div >
                    <center> <h1>Welcome to Basic Banking System</h1></center>
                </div>
            </div>
        </div>
        <!-- Activity section -->
        <div class="row activity text-center">

            <div class="col-lf-md-act">
                <br><br>
                <br><br>
                <a href="view_users.php"><center><button><b>View all Users</b></button></center></a>
            </div>
            <div class="col-lf-md-act">
                <br>
                <a href="transfermoney.php"><center><button><b>Transfer Money</b></button></center></a>
            </div>
            <div class="col-lf-md-act">
                <br>
                <a href="transactionhistory.php"><center><button><b>View Transfer History</b></button></center></a>
            </div>
        </div>
    </div>
    
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
</html>
