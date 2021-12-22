<section class="account-info-container">
    <h1>Your booking list</h1>
        <h3>Here you are</h3>
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