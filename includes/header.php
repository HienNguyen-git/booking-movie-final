<?php
    session_start();
?>

<div class="header-container">
    <div class="navbar-brand">
        <a href="./">
            <h1 class="navbar-heading">Mlem Cinema</h1>
        </a>
    </div>
    <div class="navbar-container">
        <nav class="navbar">
            <ul class="navbar-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="user_booking.php">Your booking</a></li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<li><a href='logout.php'>Logout</a></li>";
                    echo "<li><a href='account.php'>Account</a></li>";
                }else{
                    echo "<li><a href='login.php'>Login</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</div>