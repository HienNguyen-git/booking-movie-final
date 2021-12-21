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
    <link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM movieTable";
    $sql2 = "SELECT * FROM movieTable";
    ?>
    <header></header>
    <section id="home-section-1" class="movie-show-container">
        <h1>Recommend for you</h1>
        <h3>Book a movie now</h3>

        <div class="movies-container">
            <?php
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        for ($i = 0; $i <= mysqli_num_rows($result)-1 ; $i++){
                            $row = mysqli_fetch_array($result);
                            echo '<div class="movie-box">';
                            echo '<img src="'. $row['movieImg'] .'" alt=" ">';
                            echo '<div class="movie-info ">';
                            echo '<h3>'. $row['movieTitle'] .'</h3>';
                            // echo '<div class="movie-btn">';
                            echo '<a style="display: block;" href="viewdetail.php?id='.$row['movieID'].'"><i class="fas fa-eye"></i> View detail</a>';
                            echo '<a style="display: block;" href="booking.php?id='.$row['movieID'].'"><i class="fas fa-ticket-alt"></i> Book now</a>';
                            // echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        mysqli_free_result($result);
                    } else{
                        echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                // Close connection
                mysqli_close($link);
            ?>
        </div>
    </section>

    <section id="home-section-2" class="movie-show-container-hot">
        <h1>Hot movie</h1>
        <h3>Choose your favorite movie</h3>

        <div class="movies-container">
            <div class="movie-box">
                <img src="img/movie-poster-1.jpg" alt=" " />
                <div class="movie-info">
                <h3>Captain Marvel</h3>
                <a href="viewdetail.php?id=1"><i class="fas fa-eye"></i> View detail</a>
                </div>
            </div>
            <div class="movie-box">
                <img src="img/movie-poster-1.jpg" alt=" " />
                <div class="movie-info">
                <h3>Captain Marvel</h3>
                <a href="viewdetail.php?id=1"><i class="fas fa-eye"></i> View detail</a>
                </div>
            </div>
            <div class="movie-box">
                <img src="img/movie-poster-1.jpg" alt=" " />
                <div class="movie-info">
                <h3>Captain Marvel</h3>
                <a href="viewdetail.php?id=1"><i class="fas fa-eye"></i> View detail</a>
                </div>
            </div>
            <div class="movie-box">
                <img src="img/movie-poster-1.jpg" alt=" " />
                <div class="movie-info">
                <h3>Captain Marvel</h3>
                <a href="viewdetail.php?id=1"><i class="fas fa-eye"></i> View detail</a>
                </div>
            </div>
            <div class="movie-box">
                <img src="img/movie-poster-1.jpg" alt=" " />
                <div class="movie-info">
                <h3>Captain Marvel</h3>
                <a href="viewdetail.php?id=1"><i class="fas fa-eye"></i> View detail</a>
                </div>
            </div>
            <div class="movie-box">
                <img src="img/movie-poster-1.jpg" alt=" " />
                <div class="movie-info">
                <h3>Captain Marvel</h3>
                <a href="viewdetail.php?id=1"><i class="fas fa-eye"></i> View detail</a>
                </div>
            </div>
            <?php
            
            ?>
        </div>
    </section>

    
    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>
</html>