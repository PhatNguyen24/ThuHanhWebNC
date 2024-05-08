<?php
    include_once('../model/CalcModel.php');
    session_start();
    $calc = $_SESSION['calc'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calcution using MVC Model</title>
        <style type="text/css">
            .box{
                width:300px;
                padding:20px;
                border:4px solid #279;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <h2>Calculation using MVC Model</h2>
            <p>Result: <?php echo $calc->result; ?></p>
        </div>
    </body>
</html>

