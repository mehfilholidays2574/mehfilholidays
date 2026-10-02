<?php

include '../includes/db.php';

/* Total Bookings */
$total = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM bookings"
    )
);

/* Pending Bookings */
$pending = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM bookings
         WHERE status='Pending'"
    )
);

/* Confirmed Bookings */
$confirmed = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM bookings
         WHERE status='Confirmed'"
    )
);

/* Completed Bookings */
$completed = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM bookings
         WHERE status='Completed'"
    )
);

/* Cancelled Bookings */
$cancelled = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT * FROM bookings
         WHERE status='Cancelled'"
    )
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h1>Admin Dashboard</h1>

<br>

<a href="bookings.php" class="hero-btn">
Manage Bookings
</a>

<br><br>

<div class="dashboard-grid">

<div class="dashboard-card">
<h2><?php echo $total; ?></h2>
<p>Total Bookings</p>
</div>

<div class="dashboard-card">
<h2><?php echo $pending; ?></h2>
<p>Pending</p>
</div>

<div class="dashboard-card">
<h2><?php echo $confirmed; ?></h2>
<p>Confirmed</p>
</div>

<div class="dashboard-card">
<h2><?php echo $completed; ?></h2>
<p>Completed</p>
</div>

<div class="dashboard-card">
<h2><?php echo $cancelled; ?></h2>
<p>Cancelled</p>
</div>

</div>

</div>

</body>
</html>