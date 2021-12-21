<?php
    require_once('db.php')
?>
<DOCTYPE html>
<html lang="en">
<head>
    <title>Reset user password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
<?php
    $error = '';
    $email = '';
    $message = 'Enter your email';
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        if (empty($email)) {
            $error = 'Please enter your email';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'This is not a valid email address';
        }
        else {
            // reset password
            $result = reset_password($email);
            if($result['code']==0){
                $message = 'If your email exists in the database, you will receive an email containing the reset password instructions.';
            }else{
                $message = $result['error'];
            }
        }
    }
?>
<div class="container custom-container">
    <h1>Reset Password</h1>
    <form method="post">
        <div class="custom-form">
            <input name="email" id="email" type="text" class="form-control" placeholder="Email address">
        </div>
        <div class="form-group">
            <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }else{
                    echo "<div class='alert alert-primary' style='max-width: 300px;'>$message</div>";
                }
            ?>
            <button class="btn btn-success px-5" >Reset password</button>
        </div>
    </form>
</div>

</body>
</html>
