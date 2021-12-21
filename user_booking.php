<?php
    session_start();
    $user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mlem Cinema</title>
    </head>
    <!-- <link rel="icon" href="logo.png" type="image/gif" sizes="16x16"> -->
<body>
    <?php
    
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM bookingTable where bookingPNumber = (select sdt from account WHERE username='$user')";
    $result = mysqli_fetch_assoc(mysqli_query($link, $sql));
    print_r($result);

    ?>
    <header></header>
    <section class="user-booking-container">
        
    </section>

    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>
</html>