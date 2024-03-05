<?php
    require_once 'connection.php';
?>
<?php
    $login = isset($_POST['login']);
    $signup = isset($_POST['signup']);

    $itIsSet = false;
    $userId ="";

    if($login){
        $username = $_POST['usernames'];
        $pswd = $_POST['pswd'];

        if($username == "" || $pswd == ""){
            echo "Please Insert";
        }else{
            $sql1 = "SELECT * FROM mytable";
            $result = $connection->query($sql1);

            while($row = mysqli_fetch_assoc($result)){
                if($username == $row["mails"] && $pswd == $row["pswds"]){
                    $itIsSet = true;
                    $userId = $row["sid"];
                    header("Location: dashboard.php");
                }else{
                    echo "NO!";
                }
            }
        }
    }

    if($signup){
        header("Location: signup.php");
    }

    session_start();

    if($itIsSet == true){
        $_SESSION["user_id"] = $userId;
    }

    //mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{margin: 0;box-sizing: border-box;}
        .form{
            padding-left: 50%;
            padding-top: 40vh;
        }
    </style>
</head>
<body>
    <form class="form" action="index.php" method="POST">
        Username: <input type="text" name="usernames"><br><br>
        Password: <input type="password" name="pswd"><br><br>
        <input type="submit" value="Login" name="login">
        <input type="submit" value="Sign Up" name="signup">
    </form>

</body>
</html>