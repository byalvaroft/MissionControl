<!DOCTYPE html>
<html>
<head>
    <title>Apollo Airways</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        nav {
            background-color: #eee;
            display: flex;
            justify-content: center;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        li {
            margin: 0 10px;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        .trip {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding-top: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
        }

        .trip:hover {
            cursor: pointer;
            background-color: #f5f5f5;
        }

    </style>
</head>
<body>
<img src="src/capas/capa6.gif" style="height: 20%;" class="img-fluid mx-auto d-block" alt="Your logo">
<header>
    <h1>Apollo Airways</h1>
</header>

<div id="bookTrip" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Booking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="panel_admin_proc.php" method="post">

                    <input type="hidden" name="operacion" value="addBooking">
                    <input type="hidden" value="<?php echo  $_SESSION['id']?>" name="user_id">
                    <input type="hidden" value="" class="form-control" id="trip_id" name="trip_id">

                    <div class="form-group">
                        <label>Number of Travelers</label>
                        <input type="number" class="form-control" name="num_travelers" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Book">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<main>
    <ul>
        <?php
        $trips = _cSpaceTrips::selectScheduled();
        while ($trip = $trips->fetch_assoc()) {
            echo "<li onclick='selectTrip(".$trip['id'].")' class='trip'>";
            echo "<h3>" . $trip['destination'] . "</h3>";
            echo "<p>Duration: " . $trip['duration'] . "</p>";
            echo "<p>Departure Date: " . $trip['departure_date'] . "</p>";
            echo "<p>Return Date: " . $trip['return_date'] . "</p>";
            echo "<button class='info-btn' data-id='" . $trip['id'] . "'>More Info</button>";
            echo "</li>";
        }
        ?>
    </ul>
</main>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <div id="modal-body">

        </div>
    </div>
</div>
<script>

    function selectTrip(idTrip) {

        document.getElementById("trip_id").value = idTrip;

        $("#bookTrip").modal();

    }


</script>
</body>
</html>