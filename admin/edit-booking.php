<?php

include '../includes/db.php';

$id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM bookings WHERE id='$id'"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
$status = $_POST['status'];

mysqli_query(
$conn,
"UPDATE bookings
SET status='$status'
WHERE id='$id'"
);

header("Location: bookings.php");
exit;
}

?>

<form method="POST">

<h2>Update Booking</h2>

<p>
Customer:
<?php echo $row['name']; ?>
</p>

<select name="status">

<option>Pending</option>

<option>Confirmed</option>

<option>Completed</option>

<option>Cancelled</option>

</select>

<button name="update">
Update Status
</button>

</form>