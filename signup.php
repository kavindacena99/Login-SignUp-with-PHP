<?php
    require_once 'connection.php';
?>
<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mails'];
    $password = $_POST['pswd'];
    $cpassword = $_POST['cpswd'];
    $signup = isset($_POST['signup']);


    //You should check that email was used or not.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{margin: 0;box-sizing: border-box;}
        .form{
            padding-left: 50%;
            padding-top: 40vh;
        }
    </style>
</head>
<body>
    <form action="signup.php" method="POST" class="form">
        First Name: <input type="text" name="fname" id=""><br><br>
        Last Name: <input type="text" name="lname" id=""><br><br>
        Email: <input type="email" name="mails" id=""><br><br>
        Password: <input type="password" name="pswd" id=""><br><br>
        Confirm Password: <input type="password" name="cpswd" id=""><br><br>
        <input type="submit" value="Sign Up" name="signup">
    </form>
</body>
</html>