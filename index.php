<?php 
include 'includes/db.php';
include 'includes/header.php'; 
?>

<!-- HERO -->

<section class="hero"
style="background-image:url('assets/images/hero.jpg');">

<div class="hero-content">

<h1>Premium Taxi Service In Kochi</h1>

<p>Airport Transfers • Local Trips • Kerala Tours</p>

<a href="booking.php" class="hero-btn">
Book Your Taxi
</a>

</div>

</section>

<!-- SERVICES -->

<section>

<div class="container">

<div class="section-title">
<h2>Our Services</h2>
</div>

<div class="services-grid">

<div class="service-card">
<i class="fas fa-plane-arrival"></i>
<h3>Airport Transfer</h3>
<p>Cochin Airport pickup and drop services.</p>
</div>

<div class="service-card">
<i class="fas fa-route"></i>
<h3>Outstation Taxi</h3>
<p>Comfortable long-distance travel.</p>
</div>

<div class="service-card">
<i class="fas fa-map-marked-alt"></i>
<h3>Kerala Tours</h3>
<p>Customized holiday packages.</p>
</div>

<div class="service-card">
<i class="fas fa-city"></i>
<h3>Local Sightseeing</h3>
<p>Explore Kochi and nearby attractions.</p>
</div>

</div>

</div>

</section>

<!-- WHY CHOOSE US -->

<section class="why-us">

<div class="container">

<div class="section-title">
<h2>Why Choose Us</h2>
</div>

<div class="why-grid">

<div>
<h3>Professional Drivers</h3>
<p>Experienced and courteous drivers.</p>
</div>

<div>
<h3>24/7 Availability</h3>
<p>Always available when you need us.</p>
</div>

<div>
<h3>Affordable Rates</h3>
<p>Transparent pricing with no hidden charges.</p>
</div>

<div>
<h3>Clean Vehicles</h3>
<p>Well-maintained and sanitized fleet.</p>
</div>

</div>

</div>

</section>

<!-- FLEET -->

<section>

<div class="container">

<div class="section-title">
<h2>Our Fleet</h2>
</div>

<div class="fleet-grid">

<div class="fleet-card">

<img src="assets/images/sedan.jpg">

<h3>Sedan</h3>

<p style="padding:15px;">
Comfortable for 4 passengers.
</p>

</div>

<div class="fleet-card">

<img src="assets/images/innova.jpg">

<h3>Innova Crysta</h3>

<p style="padding:15px;">
Ideal for families and business travel.
</p>

</div>

<div class="fleet-card">

<img src="assets/images/traveller.jpg">

<h3>Tempo Traveller</h3>

<p style="padding:15px;">
Best for group tours and events.
</p>

</div>

</div>

</div>

</section>

<!-- COUNTERS -->

<section class="counter-section">

<div class="container">

<div class="counter-grid">

<div>
<h2>5000+</h2>
<p>Happy Customers</p>
</div>

<div>
<h2>100+</h2>
<p>Tour Packages</p>
</div>

<div>
<h2>50+</h2>
<p>Vehicles</p>
</div>

<div>
<h2>24/7</h2>
<p>Support</p>
</div>

</div>

</div>

</section>

<!-- TESTIMONIALS -->

<section>

<div class="container">

<div class="section-title">

<h2>
Customer Testimonials
</h2>

</div>

<?php

$avg = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT AVG(rating) as avg_rating
FROM reviews"
)
);

?>

<div class="rating-summary">

<h1>
<?php echo round($avg['avg_rating'],1); ?>
⭐
</h1>

<p>
Based on Customer Reviews
</p>

</div>

<div class="testimonial-grid">

<?php

$result = mysqli_query(
$conn,
"SELECT * FROM reviews
ORDER BY id DESC
LIMIT 6"
);

while($row=mysqli_fetch_assoc($result))
{

?>

<div class="testimonial-card">

<h3>
<?php echo $row['customer_name']; ?>
</h3>

<div class="stars">

<?php

for($i=1;$i<=$row['rating'];$i++)
{
echo "⭐";
}

?>

</div>

<p>

"<?php echo $row['comment']; ?>"

</p>

</div>

<?php

}

?>

</div>

</div>

</section>


<!-- TOUR PACKAGES -->

<section>

<div class="container">

<div class="section-title">
<h2>Popular Kerala Packages</h2>
</div>

<div class="package-grid">

<div class="package-card">

<img src="assets/images/munnar.jpg">

<h3>Munnar</h3>

<p>2 Nights / 3 Days</p>

</div>

<div class="package-card">

<img src="assets/images/alleppey.jpg">

<h3>Alleppey</h3>

<p>Houseboat Package</p>

</div>

<div class="package-card">

<img src="assets/images/thekkady.jpg">

<h3>Thekkady</h3>

<p>Wildlife Experience</p>

</div>

</div>

</div>

</section>

<!-- CTA -->

<section class="cta-section">

<div class="container">

<h2>Need A Taxi Right Now?</h2>

<p>
Book your ride in minutes.
</p>

<a href="booking.php"
class="hero-btn">
Book Taxi
</a>

</div>

</section>

<?php include 'includes/footer.php'; ?>