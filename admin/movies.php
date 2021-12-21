<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="admin-section-header">
        <div class="admin-logo">
            <i class="fas fa-video"></i>
            Mlem Cinema System
        </div>
        <div class="admin-login-info">
            <a href="#">Welcome, Admin</a>
            <img class="admin-user-avatar" src="../img/avatar.png" alt="">
        </div>
    </div>
    <div class="admin-container">
    <div class="admin-section admin-section1 ">
            <ul>
                <a href="admin.php"><li><i class="fas fa-sliders-h"></i>Dashboard</li></a>
                <a href="bookings.php"><li><i class="fas fa-ticket-alt"></i>Bookings </i></li></a>
                <li class="admin-navigation-schedule"><i class="fas fa-calendar-alt"></i>Schedule 
                </li>
                <ul class="admin-navigation-schedule-dropdwn hidden-div">
                    <li>View Schedule</li>
                    <li>Edit Schedule</li>
                </ul>
                <a href="movies.php"><li class="active-menu"><i class="fas fa-film"></i>Movies </li></a>
                <a href="hall.php"><li><i class="fas fa-video"></i>Hall</li></a>
                <a href="employee.php"><li><i class="fas fa-user-tie"></i>Employee</li></a>
            </ul>
        </div>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">
                <div class="admin-section-panel admin-section-panel4">
                    <div class="admin-panel-section-header">
                        <h2>List Movies</h2>
                    </div>
                    <table cellpadding="10" cellspacing="10" border="1" style="width: 100%;">
                        <tr class="header">
                            <td>ID</td>
                            <td>Title</td>
                            <td>Genre</td>
                            <td>Date</td>
                            <td>Director</td>
                            <td>Actors</td>
                            <td>Image</td>
                            <td>Action</td>
                        </tr>
                        <tbody id="tbody" class="p-3">
                            <tr class="item mt-5" >
                                <td>1</td>
                                <td>Captain Marvel</td>
                                <td>Action</td>
                                <td>11/11/2021</td>
                                <td>Marvel</td>
                                <td>Captain</td>
                                <td>Image</td>
                                <td ><a href="" class="btn btn-primary">Edit</a> | 
                                <a href="#" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <tr class="item" >
                                <td>1</td>
                                <td>Captain Marvel</td>
                                <td>Action</td>
                                <td>11/11/2021</td>
                                <td>Marvel</td>
                                <td>Captain</td>
                                <td>Image</td>
                                <td ><a href="" class="btn btn-primary">Edit</a> | 
                                <a href="#" class="btn btn-danger">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="admin-section-column">
                
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Movies</h2>
                    </div>
                    <form action="" method="POST">
                        <label for="movieTitle">Title: </label>
                        <input placeholder="Title" type="text" name="movieTitle" required>
                        <label for="movieTitle">Genre: </label>
                        <input placeholder="Genre" type="text" name="movieGenre" required>
                        <label for="movieTitle">Duration: </label>
                        <input placeholder="Duration" type="number" name="movieDuration" required>
                        <label for="movieTitle">Date: </label>
                        <input placeholder="Release Date" type="date" name="movieRelDate" required>
                        <label for="movieTitle">Director: </label>
                        <input placeholder="Director" type="text" name="movieDirector" required>
                        <label for="movieTitle">Actors: </label>
                        <input placeholder="Actors" type="text" name="movieActors" required>
                        <label for="movieTitle">Image: </label>
                        <input type="file" name="movieImg" accept="image/*">
                        <button type="submit" value="submit" name="submit" class="form-btn">Add Movie</button>
                        <?php
                            $link = mysqli_connect("localhost", "root", "", "cinema_db");
                            $sql = "SELECT * FROM bookingTable";
                        if(isset($_POST['submit'])){
                            $insert_query = "INSERT INTO 
                            movieTable (  movieImg,
                                            movieTitle,
                                            movieGenre,
                                            movieDuration,
                                            movieRelDate,
                                            movieDirector,
                                            movieActors)
                            VALUES (        'img/".$_POST['movieImg']."',
                                            '".$_POST["movieTitle"]."',
                                            '".$_POST["movieGenre"]."',
                                            '".$_POST["movieDuration"]."',
                                            '".$_POST["movieRelDate"]."',
                                            '".$_POST["movieDirector"]."',
                                            '".$_POST["movieActors"]."')";
                            mysqli_query($link,$insert_query);}
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>