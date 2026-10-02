<?php

include 'includes/db.php';

if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $rating = $_POST['rating'];
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);

    mysqli_query(
        $conn,
        "INSERT INTO reviews(customer_name,rating,comment)
         VALUES('$name','$rating','$comment')"
    );

    echo "<script>alert('Review Submitted Successfully');</script>";
}

?>

<?php include 'includes/header.php'; ?>

<section class="review-section">

<div class="container">

<h2>Customer Reviews</h2>

<?php

if(isset($_POST['submit']))
{
$name = mysqli_real_escape_string($conn,$_POST['name']);
$rating = $_POST['rating'];
$comment = mysqli_real_escape_string($conn,$_POST['comment']);

mysqli_query(
$conn,
"INSERT INTO reviews(customer_name,rating,comment)
VALUES('$name','$rating','$comment')"
);

echo "<div class='success-message'>
Thank you! Your review has been submitted.
</div>";
}

?>

<form method="POST" class="modern-review-form">

<input
type="text"
name="name"
placeholder="Your Name"
required>

<select name="rating" required>
<option value="">⭐ Select Rating</option>
<option value="5">⭐⭐⭐⭐⭐ Excellent</option>
<option value="4">⭐⭐⭐⭐ Very Good</option>
<option value="3">⭐⭐⭐ Good</option>
<option value="2">⭐⭐ Fair</option>
<option value="1">⭐ Poor</option>
</select>

<textarea
name="comment"
placeholder="Share your travel experience..."
required>
</textarea>

<button
type="submit"
name="submit">
Submit Review
</button>

</form>

</div>

</section>

<?php include 'includes/footer.php'; ?>