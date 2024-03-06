<?php
    require_once 'connection.php';
?>
<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
    }

    $sql2 = "SELECT fname FROM mytable WHERE sid = '{$_SESSION['user_id']}'";
    $result2 = $connection->query($sql2);

    $fname = "";

    while($row1 = mysqli_fetch_assoc($result2)){
        $fname = $row1["fname"];
    }
?>
<?php
    $sql3 = "SELECT * FROM mytable";

    if($result_set = $connection->query($sql3)){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        *{margin: 0;box-sizing: border-box;}
        nav{
            background-color: lightblue;
            display: flex;
        }
        nav ul{
            display: flex;
            list-style: none;
        }
        nav h1{
            padding: 10px;
        }
        nav ul li{
            padding: 15px;
        }
        nav ul li a{
            text-decoration: none;
        }
        #h1{
            padding: 20px;
        }
        .table{
            padding: 10px;
        }
        .table td,table th{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <nav>
        <h1>Welcome <?php echo $fname; ?></h1>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <h1 id="h1">DAshBOard</h1>

    <table class="table">
        <tr><th>First Name</th><th>Last Name</th><th>Email</th></tr>
        <?php
                while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
                    echo "<tr>" . "<td>" . $row['fname'] . "</td>" . "<td>" . $row['lname'] . "</td>" . "<td>" . $row['mails'] . "</td>" . "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>