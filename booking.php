<?php

include 'includes/db.php';

$message = "";

if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pickup = mysqli_real_escape_string($conn,$_POST['pickup']);
    $drop = mysqli_real_escape_string($conn,$_POST['drop']);
    $travel_date = $_POST['travel_date'];
    $vehicle = $_POST['vehicle'];
    $message_text = mysqli_real_escape_string($conn,$_POST['message']);

    if(empty($name) || empty($phone))
    {
        $message = "Please fill required fields";
    }
    else
    {
        $sql = "INSERT INTO bookings
        (
        name,
        phone,
        email,
        pickup,
        drop_location,
        travel_date,
        vehicle,
        message
        )

        VALUES
        (
        '$name',
        '$phone',
        '$email',
        '$pickup',
        '$drop',
        '$travel_date',
        '$vehicle',
        '$message_text'
        )";

        if(mysqli_query($conn,$sql))
        {
            $message = "Booking Submitted Successfully";
        }
        else
        {
            $message = "Database Error";
        }
    }
}

include 'includes/header.php';
?>

<section>

<div class="container">

<div class="section-title">
<h2>Book Your Taxi</h2>
</div>

<?php if($message!=""){ ?>

<div class="success-message">
<?php echo $message; ?>
</div>

<?php } ?>

<form method="POST" class="booking-form">

<input type="text"
name="name"
placeholder="Full Name"
required>

<input type="text"
name="phone"
placeholder="Phone Number"
required>

<input type="email"
name="email"
placeholder="Email">

<input type="text"
name="pickup"
placeholder="Pickup Location">

<input type="text"
name="drop"
placeholder="Drop Location">

<input type="date"
name="travel_date">

<select name="vehicle">

<option value="Sedan">
Sedan
</option>

<option value="Innova Crysta">
Innova Crysta
</option>

<option value="Tempo Traveller">
Tempo Traveller
</option>

</select>

<textarea
name="message"
placeholder="Additional Message">
</textarea>

<button type="submit"
name="submit">
Submit Booking
</button>

</form>

</div>

</section>

<?php include 'includes/footer.php'; ?>