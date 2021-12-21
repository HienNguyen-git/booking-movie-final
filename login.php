<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }

    require_once("db.php");

    $error = '';

    $user = '';
    $pass = '';

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else {
            $result = login($user,$pass);
            if($result['code']==0){
                $data = $result['data'];
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $data['firstname']. ' '.$data['lastname'];

                if(isset($_SESSION['bookingID'])){
                    $bookingID = $_SESSION['bookingID'];
                    header("Location: booking.php?id=$bookingID");
                }else{
                    header('Location: index.php');
                }
                exit();
            }else{
                $error = $result['error'];
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
<div class="custom-container">
    <h1>User Login</h1>
    <form method="post" action="">
        <div class="custom-form">
            <input value="<?= $user ?>" name="user" id="user" type="text" >
            <label for="username">Username</label>
        </div>
        <div class="custom-form">
            <input name="pass" value="<?= $pass ?>" id="password" type="password" >
            <label for="password">Password</label>
        </div>
        <div class="form-group">
            <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            ?>
            <button class="btn btn-success px-5">Login</button>
        </div>
        <div class="form-group">
            <p>Don't have an account yet? <a href="register.php">Register now</a>.</p>
            <p>Forgot your password? <a href="forgot.php">Reset your password</a>.</p>
            <p>Return <a href="./">Home page</a>.</p>
        </div>
    </form>
</div>
<script>
    const labels = document.querySelectorAll('.custom-form label')

    labels.forEach(label => {
        label.innerHTML = label.innerText
            .split('')
            .map((letter, idx) => `<span style="transition-delay:${idx * 50}ms">${letter}</span>`)
            .join('')
    })  
</script>
</body>
</html>
