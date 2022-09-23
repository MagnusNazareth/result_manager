<?php include 'connect.php';

//Login page code
if (isset($_POST['login'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";
    $user_type = isset($_POST['account_user']) ? $_POST['account_user'] : " ";

    $sql_verify = "SELECT username FROM account_login WHERE password = '$password' AND user_type = '$user_type'";
    $result = mysqli_query($connection, $sql_verify);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        if ($user_type == 'Student') {
            header("location: result.php");
        } else if ($user_type == 'Professor') {
            header("location: professor.php");
        } else {
            header("location: admin.php");
        }
    }

    else{
        ?>
        <script>alert('Username or password is incorrect.');</script>
        <?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> LOGIN </title>
    <link href="stylesheet.css" rel="stylesheet">
    <style>
        body {
            background-image: url("hogwarts.jpeg");
            background-size: 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        form {
            border-radius: 10px;
            background: #FAF5EC;
            padding: 5px;
            text-align: center;
            width: 450px;
            height: 650px;
            position: relative;
            left: 1185px;
            bottom: -50px;
        }

        #logo {
            position: relative;
            z-index: 1;
            left: 0px;
            top: 25px;
        }
    </style>
</head>

<body>

    <form method="post">

        <img id="logo" src="https://logolook.net/wp-content/uploads/2021/11/Hogwarts-Logo.png" height="150px" width="250px"></img>
        <h1 style="font-size:80px; text-shadow: 0 0 10px #4B0150;"> LOGIN </h1>

        <input type="radio" id="account_user" name="account_user" value="Student">
        <label> Student </label>


        <input type="radio" id="account_user" name="account_user" value="Professor">
        <label> Professor </label>


        <input type="radio" id="account_user" name="account_user" value="Admin">
        <label> Admin </label>
        <br><br>

        <label> USERNAME </label><br>
        <input type="text" name="username" id="username">
        <br><br>

        <label> PASSWORD </label><br>
        <input type="password" name="password" id="password">
        <br><br><br>

        <button type="submit" class="btn_login" name="login" value="LOGIN" decoration="none" style="font-size:20px;"> LOGIN </button>

    </form>

</body>

</html>