<html>
<head>

    <style>
        .card {
            margin-top: 20px;
        }
        /* Modal styles */
        #addTripModal .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        /* Modal header */
        #addTripModal .modal-header {
            padding: 12px 16px;
            border-bottom: 1px solid #888;
        }

        /* Modal title */
        #addTripModal .modal-title {
            font-size: 18px;
        }

        /* Modal body */
        #addTripModal .modal-body {
            padding: 12px 16px;
            font-size: 14px;
        }

        /* Modal footer */
        #addTripModal .modal-footer {
            padding: 12px 16px;
            border-top: 1px solid #888;
        }

        .close{
            right: 16px;
            top: 12px;
            position: absolute;
        }

    </style>
</head>
<body>

<!-- Modal addTrip -->
<div class="modal fade" id="addTripModal" tabindex="-1" role="dialog" aria-labelledby="addTripModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTripModalLabel">Add New Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="close" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to insert a new trip -->
                <form>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" class="form-control" id="destination" placeholder="Enter destination">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="number" class="form-control" id="duration" placeholder="Enter duration (days)">
                    </div>
                    <div class="form-group">
                        <label for="departureDate">Departure Date</label>
                        <input type="date" class="form-control" id="departureDate" placeholder="Enter departure date">
                    </div>
                    <div class="form-group">
                        <label for="returnDate">Return Date</label>
                        <input type="date" class="form-control" id="returnDate" placeholder="Enter return date">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status">
                            <option>scheduled</option>
                            <option>in progress</option>
                            <option>completed</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Trip</button>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">

    <div class="row">
        <div class="col-sm-3">
            <!-- Sidebar -->
            <div class="card">
                <div class="card-header">
                    Space Trip Admin Panel
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#trips">Trips</a></li>
                    <li class="list-group-item"><a href="#bookings">Bookings</a></li>
                    <li class="list-group-item"><a href="#customers">Customers</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9">
            <!-- Main content -->
            <div class="card">
                <div class="card-header">
                    <h4>Trips <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTripModal">Add New Trip</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <thead>
                            <tr>
                                <th>Trip ID</th>
                                <th>Destination</th>
                                <th>Duration</th>
                                <th>Departure Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Erase</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php


                            $trips = cSpaceTrips::selectAll();

                            foreach ($trips as $trip) {
                                echo "<tr>";
                                echo "<td>".$trip['id']."</td>";
                                echo "<td>".$trip['destination']."</td>";
                                echo "<td>".$trip['duration']."</td>";
                                echo "<td>".$trip['departure_date']."</td>";
                                echo "<td>".$trip['return_date']."</td>";
                                echo "<td>".$trip['status']."</td>";

                                // Acciones
                                echo "<td><a href='edit.php?id=".$trip['id']."' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete.php?id=".$trip['id']."' class='btn btn-danger'>Erase</a></td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Bookings</h4>
                </div>
                <div class="card-body">
                    <!-- Booking data goes here -->
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Customers</h4>
                </div>
                <div class="card-body">
                    <!-- Customer data goes here -->
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>