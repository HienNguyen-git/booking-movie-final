<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <title>Mlem Cinema</title>
    </head>
    <!-- <link rel="icon" href="logo.png" type="image/gif" sizes="16x16"> -->
<body>
    <?php
    
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM bookingTable where bookingPNumber = (select sdt from account WHERE username='$user')";
    ?>
    <header></header>
    <section class="account-info-container">
    <h1>Hello <?=$firstname?> <?=$lastname?></h1>
        <h3>Your account info</h3>
        <div class="account-container">
            <table class="table table-bordered customer-booking-form">
                <tr>
                    <th>ID</th>
                    <th>Movie name</th>
                    <th>Theatre</th>
                    <th>Booking date</th>
                    <th>Booking time</th>
                </tr>
                <?php
                
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            ?>
                                <tr>
                                    <td><?=$row['bookingID']?></td>
                                    <td><?=$row['movieName']?></td>
                                    <td><?=$row['bookingTheatre']?></td>
                                    <td><?=$row['bookingDate']?></td>
                                    <td><?=$row['bookingTime']?></td>
                                </tr>
                            <?php
                        }
                    } else{
                    }
                } else{
                    echo '<p>You have not booking any ticket yet!</p>';
                }
                ?>
            </table>
        </div>
    </section>

    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>
</html>