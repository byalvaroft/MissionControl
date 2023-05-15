<html>

<head>
    <title>Apollo Airways</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <style>
        .card {
            margin-top: 20px;
            -webkit-user-select: none;
            /* Safari */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* IE10+/Edge */
            user-select: none;
            /* Standard */
        }

        #addTripModal .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        #addTripModal .modal-header {
            padding: 12px 16px;
            border-bottom: 1px solid #888;
        }

        #addTripModal .modal-title {
            font-size: 18px;
        }

        #addTripModal .modal-body {
            padding: 12px 16px;
            font-size: 14px;
        }

        #addTripModal .modal-footer {
            padding: 12px 16px;
            border-top: 1px solid #888;
        }

        .close {
            right: 16px;
            top: 5px;
            position: absolute;
        }

        .boton-tabla {
            width: 70px;
        }

        .trips:hover,
        .bookings:hover,
        .customers:hover {
            background-color: #ccc;
            color: #333;
            -webkit-user-select: none;
            /* Safari */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* IE10+/Edge */
            user-select: none;
            /* Standard */
        }

        .btn-add {
            color: white !important;
            font-weight: bold;
            background-color: green;
        }

        .btn-add:hover {
            background-color: #004d00;
        }

        .fade-in-item {
            opacity: 0;
            animation: fade-in 1s;
            animation-delay: 0.5s;
            animation-fill-mode: forwards;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .filter-inputs {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .filter-inputs label {
            font-weight: bold;
            margin-right: 5px;
        }

        .filter-inputs input,
        .filter-inputs select {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.15s ease-in-out;
        }

        .filter-inputs input:focus,
        .filter-inputs select:focus {
            border-color: #66afe9;
        }
    </style>
</head>

<body>

    <img src="src/capas/capa6.gif" style="height: 20%;" class="img-fluid mx-auto d-block" alt="Your logo">

    <!-- Add/Edit Trip Modal  -->
    <div class="modal" id="addTripModal" tabindex="-1" role="dialog" aria-labelledby="addTripModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTripModalLabel">Add New Trip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="panel_admin_proc.php" id="formTrips">
                        <input type="hidden" name="operacion" id="operation-formTrips" value="addTrip">
                        <input type="hidden" id="idTrip" name="idTrip" value="">
                        <div class="form-group">
                            <label for="program">Program</label>
                            <select class="form-control" name="program" id="program">
                                <?php
                                $programs = _cPrograms::selectAll();
                                foreach ($programs as $program) {
                                    echo "<option value='" . $program['program_id'] . "'>" . $program['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="number" class="form-control" name="duration" id="duration" placeholder="Enter duration (days)" readonly>
                        </div>
                        <div class="form-group">
                            <label for="departureDate">Departure Date</label>
                            <input type="date" class="form-control" name="departureDate" id="departureDate" placeholder="Enter departure date" onchange="updateDuration()">
                        </div>
                        <div class="form-group">
                            <label for="returnDate">Return Date</label>
                            <input type="date" class="form-control" name="returnDate" id="returnDate" placeholder="Enter return date" onchange="updateDuration()">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option disabled selected>Select Status</option>
                                <option>scheduled</option>
                                <option>in progress</option>
                                <option>completed</option>
                            </select>
                        </div>


                        <div class="modal-footer">
                            <input type="button" value="Cancel" class="btn btn-secondary" class="close" data-dismiss="modal">
                            <input type="submit" id="submit-trips" value="Add" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- Add/Edit User Modal -->
    <div class="modal" id="addEditUserModal" tabindex="-1" role="dialog" aria-labelledby="addEditUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEditUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="panel_admin_proc.php" id="formUsers">
                        <input type="hidden" name="operacion" id="operation-formUsers" value="editUser">
                        <input type="hidden" id="id_user" name="id_user" value="">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Enter Nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Enter Apellidos">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control" name="rol" id="rol">
                                <option disabled>Select Role</option>
                                <option value=<?= _cUsers::CLIENTE ?>>Cliente</option>
                                <option value=<?= _cUsers::ADMIN ?>>Admin</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="button" value="Cancel" class="btn btn-secondary" class="close" data-dismiss="modal">
                            <input type="submit" id="submit-users" value="Save Changes" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal addBooking -->
    <div class="modal" id="addBookingModal" tabindex="-1" role="dialog" aria-labelledby="addBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookingModalLabel">Add New Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to insert a new booking -->
                    <form method="post" action="panel_admin_proc.php" id="formBookings">
                        <input type="hidden" name="operacion" id='operation-formBookings' value="addBooking">
                        <div class="form-group">
                            <label for="customer_id">Customer ID:</label>

                        </div>
                        <div class="form-group">
                            <label for="trip_id">Trip ID:</label>
                            <select class="form-control" id="trip_id" name="trip_id">
                                <?php
                                $trips = _cSpaceTrips::selectScheduled();

                                foreach ($trips as $trip) {
                                    echo '<option value="' . $trip['id'] . '">' . $trip['id'] . " " . $trip['destination'] . ' (' . $trip['departure_date'] . ')' . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="booking_date">Customer:</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <?php
                                $users = _cUsers::selectAll();

                                foreach ($users as $user) {
                                    echo '<option value="' . $user['id'] . '">' . $user['username'] . " " . _cUsers::formatUserID($user['id'])  . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="num_travelers">Number of Travelers:</label>
                            <input type="number" class="form-control" id="num_travelers" name="num_travelers" min="1" step="1" required>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-link" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Book">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eraseTrip -->
    <div class="modal" id="erase_trip" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: calc(50vh - 50px);">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addTripModalLabel">Are you sure you want to delete the trip?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_erase_trip" method="post" action="panel_admin_proc.php">
                        <input type='hidden' name='operacion' value='delTrip' />
                        <input type='hidden' id='tripid_erase_trip' name='tripid' value='' />
                        <div class="text-center">
                            <input type="button" class="btn btn-link" data-dismiss="modal" value="Cancel">
                            <input type="submit" id="btn_erase_trip" class="btn btn-danger" value="Erase Trip">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal eraseBooking -->
    <div class="modal" id="erase_booking" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: calc(50vh - 50px);">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addTripModalLabel">Are you sure you want to delete the booking?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_erase_booking" method="post" action="panel_admin_proc.php">
                        <input type='hidden' name='operacion' value='delBooking' />
                        <input type='hidden' id='bookingid_erase_booking' name='bookingid' value='' />
                        <div class="text-center">
                            <input type="button" class="btn btn-link" data-dismiss="modal" value="Cancel">
                            <input type="submit" id="btn_erase_booking" class="btn btn-danger" value="Erase Booking">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal eraseUser -->

    <div class="modal" id="erase_user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: calc(50vh - 50px);">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="delUserModalLabel">Are you sure you want to delete this User?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_erase_user" action="panel_admin_proc.php" method="post">
                        <input type="hidden" name="operacion" value="delUser">
                        <input type="hidden" name="userid" id="userid_erase_user">
                        <div class="text-center">
                            <input type="button" class="btn btn-link" data-dismiss="modal" value="Cancel">
                            <input type="submit" id="btn_erase_booking" class="btn btn-danger" value="Erase User">
                        </div>
                    </form>
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
                    <ul class="list-group list-group-flush" id="navMenu">
                        <li style="opacity: 0%" class="list-group-item trips" onclick="showTrips()">Trips</li>
                        <li style="opacity: 0%" class="list-group-item bookings" onclick="showBookings()">Bookings</li>
                        <li style="opacity: 0%" class="list-group-item customers" onclick="showCustomers()">Customers</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <!-- Main content -->
                <div class="card" id="trips">
                    <div class="card-header">
                        <h4>Trips <a style="display: flex" type="button" class="btn btn-primary btn-add float-right" data-toggle="modal" data-target="#addTripModal" onclick="cleanModal()">Add New Trip<i class="material-icons">add</i></a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Trip ID</th>
                                        <th>Program</th>
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
                                    $trips = _cSpaceTrips::selectAllXPrograms();


                                    foreach ($trips as $trip) {

                                        echo "<tr>";
                                        echo "<td>" . _cSpaceTrips::formatTripID($trip['id']) . "</td>";
                                        echo "<td><span id='programName" . $trip['id'] . "'>" . $trip['name'] . "</span>";
                                        echo "<input type='hidden' value='" . $trip['program_id'] . "' id='program_id" . $trip['id'] . "'></td>";
                                        echo "<td value='" . $trip['duration'] . "' id='duration" . $trip['id'] . "'>" . $trip['duration'] . "</td>";
                                        echo "<td value='" . $trip['departure_date'] . "' id='departureDate" . $trip['id'] . "'>" . $trip['departure_date'] . "</td>";
                                        echo "<td value='" . $trip['return_date'] . "' id='returnDate" . $trip['id'] . "'>" . $trip['return_date'] . "</td>";

                                        echo "<td style='position: relative; border-radius: 5px;'>";

                                        switch ($trip['status']) {
                                            case "in progress":
                                                echo "<span id='status" . $trip['id'] . "' style='position: absolute; top: 50%; transform: translateY(-50%); left: -6px; border: 2px solid yellow; border-radius: 5px; padding: 2px 6px; background-color: rgba(255, 255, 0, 0.2);'>" . $trip['status'] . "</span>";
                                                break;
                                            case "scheduled":
                                                echo "<span id='status" . $trip['id'] . "' style='position: absolute; top: 50%; transform: translateY(-50%); left: -6px; border: 2px solid blue; border-radius: 5px; padding: 2px 6px; background-color: rgba(0, 0, 255, 0.2);'>" . $trip['status'] . "</span>";
                                                break;
                                            case "completed":
                                                echo "<span id='status" . $trip['id'] . "' style='position: absolute; top: 50%; transform: translateY(-50%); left: -6px; border: 2px solid green; border-radius: 5px; padding: 2px 6px; background-color: rgba(0, 255, 0, 0.2);'>" . $trip['status'] . "</span>";
                                                break;
                                        }

                                        echo "</td>";

                                        // Acciones
                                        echo "<td><input id='" . $trip['id'] . "' class='boton-tabla btn btn-primary' onClick='editTrip(this.id)' value='Edit'></td>";
                                        echo "<td><input id='" . $trip['id'] . "' class='boton-tabla btn btn-danger' onClick='eraseTrip(this.id)' value='Erase'></td>";
                                        echo "</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div style="display: none" class="card" id="bookings">
                    <div class="card-header">
                        <h4>Bookings <a style="display: flex" type="button" class="btn btn-primary btn-add float-right" data-toggle="modal" data-target="#addBookingModal" onclick="cleanModal()">Add New Booking<i class="material-icons">add</i></a></h4>
                    </div>
                    <div class="card-body">


                        <!-- Filter inputs -->
                        <div class="filter-inputs">
                            <label for="filter-program">Program:</label>
                            <select id="filter-program">

                                <option selected value="">All Programs</option>
                                <?php

                                $programs = _cPrograms::selectAll();

                                foreach ($programs as $program) {
                                    echo '<option value="' . $program['program_id'] . '">' . $program['name'] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="filter-user">User:</label>
                            <input type="text" id="filter-user" placeholder="Search by user">
                            <label for="filter-date">Booking Date:</label>
                            <input type="date" id="filter-date" placeholder="Search by booking date">
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped" id="bookings-table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Trip ID</th>
                                        <th>Program ID</th>
                                        <th>User ID</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Username</th>
                                        <th>Booking Date</th>
                                        <th>Travelers</th>
                                        <th>Erase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bookings = _cBookings::selectAllxUserData();



                                    foreach ($bookings as $booking) {

                                        echo "<tr>";
                                        echo "<td>" . _cBookings::formatBookingID($booking['booking_id']) . "</td>";
                                        echo "<td>" . _cSpaceTrips::formatTripID($booking['trip_id']) . "</td>";
                                        echo "<td>" . _cPrograms::formatProgramID($booking['program_id']) . "</td>";
                                        echo "<td>" . _cUsers::formatUserID($booking['id']) . "</td>";
                                        echo "<td>" . $booking['nombre'] . "</td>";
                                        echo "<td>" . $booking['apellidos'] . "</td>";
                                        echo "<td>" . $booking['username'] . "</td>";
                                        echo "<td>" . $booking['booking_date'] . "</td>";
                                        echo "<td>" . $booking['num_travelers'] . "</td>";

                                        // Acciones
                                        echo "<td><input id='" . $booking['booking_id'] . "' class='boton-tabla btn btn-danger' onClick='eraseBooking(this.id)' value='Erase'></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div style="display: none" class="card" id="costumers">
                    <div class="card-header">
                        <h4>Customers</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Email</th>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th>Edit</th>
                                        <th>Erase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $users = _cUsers::selectAll();
                                    foreach ($users as $user) {
                                        echo "<tr>";
                                        echo "<td>" . _cUsers::formatUserID($user['id']) . "</td>";
                                        echo "<td value='" . $user['nombre'] . "' id='nombre" . $user['id'] . "'>" . $user['nombre'] . "</td>";
                                        echo "<td value='" . $user['apellidos'] . "' id='apellidos" . $user['id'] . "'>" . $user['apellidos'] . "</td>";
                                        echo "<td value='" . $user['email'] . "' id='email" . $user['id'] . "'>" . $user['email'] . "</td>";
                                        echo "<td value='" . $user['username'] . "' id='username" . $user['id'] . "'>" . $user['username'] . "</td>";
                                        echo "<td value='" . $user['authtipo'] . "'>";
                                        switch ($user['authtipo']) {
                                            case "10":
                                                echo "<span id='authtipo" . $user['id'] . "' style='top: 50%; transform: translateY(-50%); left: -6px; border: 2px
                                                 solid grey; border-radius: 5px; padding: 2px 6px; background-color: rgba(108, 122, 137, 0.2);'>" . "CLIENTE" . "</span>";
                                                break;
                                            case "20":
                                                echo "<span id='authtipo" . $user['id'] . "' style='top: 50%; transform: translateY(-50%); left: -6px; border: 2px
                                                 solid red; border-radius: 5px; padding: 2px 6px; background-color: rgba(255, 0, 0, 0.2);'>" . "ADMIN" . "</span>";
                                                break;
                                        }
                                        echo "</td>";
                                        // Acciones
                                        echo "<td><input id='" . $user['id'] . "' class='boton-tabla btn btn-primary' onClick='editUser(this.id)' value='Edit'></td>";
                                        echo "<td><input id='" . $user['id'] . "' class='boton-tabla btn btn-danger' onClick='eraseUser(this.id)' value='Erase'></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('li').each(function(index) {
                // Store a reference to the current element
                var currentElement = $(this);
                // Set a timeout to fade in the current element after a certain delay
                setTimeout(function() {
                    // Use the stored reference to the current element
                    currentElement.addClass('fade-in-item');
                }, index * 250); // 500ms delay between each element
            });
        });

        window.addEventListener('load', function() {
            const urlSearchParams = new URLSearchParams(window.location.search);

            const trp = urlSearchParams.get('trp');
            const bk = urlSearchParams.get('bk');
            const usr = urlSearchParams.get('usr');

            if (trp) {
                showTrips();
            }
            if (bk) {
                showBookings();
            }
            if (usr) {
                showCustomers();
            }

        });

        const formTrips = document.querySelector('#formTrips');

        formTrips.addEventListener('submit', function(event) {

            event.preventDefault();

            const destination = document.querySelector('#destination');
            const duration = document.querySelector('#duration');
            const departureDate = document.querySelector('#departureDate');
            const returnDate = document.querySelector('#returnDate');
            const status = document.querySelector('#status');


            if (program.value.trim() === '') {
                alert('Please select a program');
                return;
            }

            if (departureDate.value.trim() === '') {
                alert('Please enter a departure date');
                return;
            }

            if (returnDate.value.trim() === '') {
                alert('Please enter a return date');
                return;
            }


            if (duration.value < 0) {
                alert('The return date must be after the departure date');
                return;
            }


            if (status.value === 'Select Status') {
                alert('Please select a valid status');
                return;
            }

            formTrips.submit();
        });


        function editTrip(idTrip) {
            document.getElementById("idTrip").value = idTrip;
            document.getElementById("program").value = document.getElementById("program_id" + String(idTrip)).getAttribute('value');
            document.getElementById("duration").value = document.getElementById("duration" + String(idTrip)).getAttribute('value');
            document.getElementById("departureDate").value = document.getElementById("departureDate" + String(idTrip)).getAttribute('value');
            document.getElementById("returnDate").value = document.getElementById("returnDate" + String(idTrip)).getAttribute('value');
            document.getElementById("operation-formTrips").value = "editTrip";
            document.getElementById("submit-trips").value = "Edit";
            document.getElementById("addTripModalLabel").innerHTML = "Edit Trip " + String(idTrip);
            $('#status').val(document.getElementById("status" + String(idTrip)).innerHTML);
            $('#status').change();

            $("#addTripModal").modal();
        }

        function editUser(id) {
            document.getElementById("operation-formUsers").value = "editUser";
            document.getElementById("id_user").value = id;
            document.getElementById("nombre").value = document.getElementById("nombre" + id).innerHTML;
            document.getElementById("apellidos").value = document.getElementById("apellidos" + id).innerHTML;
            document.getElementById("email").value = document.getElementById("email" + id).innerHTML;
            document.getElementById("username").value = document.getElementById("username" + id).innerHTML;

            // Get the role value from the table and trim any extra whitespace
            var rol = document.getElementById("authtipo" + id).innerHTML.trim();

            // Set the preselected value for the 'rol' dropdown
            var rolSelect = document.getElementById("rol");
            for (var i = 0; i < rolSelect.options.length; i++) {
                if (rolSelect.options[i].text.trim().toUpperCase() === rol.toUpperCase()) {
                    rolSelect.selectedIndex = i;
                    break;
                }
            }

            $("#addEditUserModal").modal("show");

        }

        function addUser() {
            $('#id_user').val('');
            $('#nombre').val('');
            $('#apellidos').val('');
            $('#email').val('');
            $('#username').val('');
            $('#rol').val('');

            $('#operation-formUsers').val('addUser');
            $('#submit-users').val('Add User');
            $('#editUserModalLabel').text('Add User');
            $('#editUserModal').modal('show');
        }



        function cleanModal() {
            document.getElementById("program").value = "";
            document.getElementById("duration").value = "";
            document.getElementById("departureDate").value = "";
            document.getElementById("operation-formTrips").value = "addTrip";
            document.getElementById("submit-trips").value = "Add";
            document.getElementById("addTripModalLabel").innerHTML = "Add New Trip";
            document.getElementById("returnDate").value = "";
            $('#status').val();
            $('#status').change;
        }



        function eraseTrip(idTrip) {
            $("#erase_trip").modal();
            document.getElementById("tripid_erase_trip").setAttribute("value", idTrip);
        }

        function eraseBooking(idBooking) {

            $("#erase_booking").modal();
            document.getElementById("bookingid_erase_booking").setAttribute("value", idBooking);
        }

        function eraseUser(idUser) {

            $("#erase_user").modal();
            document.getElementById("userid_erase_user").setAttribute("value", idUser);

        }



        function updateDuration() {
            // Get the values of the departure date and return date fields
            var departureDate = document.querySelector('input[name="departureDate"]').value;
            var returnDate = document.querySelector('input[name="returnDate"]').value;

            // Calculate the difference between the departure date and return date in days
            var duration = Math.round((new Date(returnDate) - new Date(departureDate)) / (1000 * 60 * 60 * 24));

            // Set the value of the duration field to the calculated number of days
            document.querySelector('input[name="duration"]').value = duration;
        }


        function showTrips() {
            $('#trips').show();
            $('#bookings').hide();
            $('#costumers').hide();
        }

        function showBookings() {
            $('#trips').hide();
            $('#bookings').show();
            $('#costumers').hide();
        }

        function showCustomers() {
            $('#trips').hide();
            $('#bookings').hide();
            $('#costumers').show();
        }

        function filterBookingsTable() {
            let programSelect = document.getElementById("filter-program");
            let userInput = document.getElementById("filter-user");
            let dateInput = document.getElementById("filter-date");
            let rows = document.querySelectorAll("#bookings-table tr");

            for (let i = 1; i < rows.length; i++) {
                let programCell = rows[i].getElementsByTagName("td")[2];
                let userCell = rows[i].getElementsByTagName("td")[6];
                let dateCell = rows[i].getElementsByTagName("td")[7];

                let shouldShow = true;

                if (programSelect.value && !programCell.innerHTML.includes(programSelect.value)) {
                    shouldShow = false;
                }

                if (userInput.value && !userCell.innerHTML.toLowerCase().includes(userInput.value.toLowerCase())) {
                    shouldShow = false;
                }

                if (dateInput.value && !dateCell.innerHTML.startsWith(dateInput.value)) {
                    shouldShow = false;
                }

                rows[i].style.display = shouldShow ? "" : "none";
            }
        }


        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("filter-program").addEventListener("change", filterBookingsTable);
            document.getElementById("filter-user").addEventListener("keyup", filterBookingsTable);
            document.getElementById("filter-date").addEventListener("change", filterBookingsTable);
        });
    </script>

</body>

</html>