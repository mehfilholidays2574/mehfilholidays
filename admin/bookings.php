<?php

include 'session.php';
include '../includes/db.php';

if(isset($_GET['search']) && !empty($_GET['search']))
{
    $search = mysqli_real_escape_string(
        $conn,
        $_GET['search']
    );

    $result = mysqli_query(
        $conn,
        "SELECT * FROM bookings
        WHERE name LIKE '%$search%'
        OR phone LIKE '%$search%'
        OR pickup LIKE '%$search%'
        OR drop_location LIKE '%$search%'
        ORDER BY id DESC"
    );
}
else
{
    $result = mysqli_query(
        $conn,
        "SELECT * FROM bookings
        ORDER BY id DESC"
    );
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Bookings</title>


<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Taxi Bookings</h2>

<form method="GET" style="margin-bottom:20px;">

<input
type="text"
name="search"
placeholder="Search by Name, Phone, Pickup or Drop"
value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

<button type="submit">
Search
</button>

<a href="bookings.php">
Clear
</a>

</form>

<table border="1"
width="100%"
cellpadding="10">

<tr>

<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Pickup</th>
<th>Drop</th>
<th>Date</th>
<th>Vehicle</th>
<th>Status</th>
<th>Actions</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['pickup']; ?></td>

<td><?php echo $row['drop_location']; ?></td>

<td><?php echo $row['travel_date']; ?></td>

<td><?php echo $row['vehicle']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>



<a href="edit-booking.php?id=<?php echo $row['id']; ?>">
Edit
</a>


<a href="delete-booking.php?id=<?php echo $row['id']; ?>">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>