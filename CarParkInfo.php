<!DOCTYPE html>
<head>
  <title>CarParkInformation</title>
  <?php include('Header.php');?> 
  <link rel="stylesheet" href="css/style.css">
  </head>
<body>
    <section id="Welcome">
        <div class="banner">
            <div class="wrapper">
        <h1>Sack of Potatoes Car Park</h1>
    </div>
</div>
</section>
  <div class="container">
    <div class="left-section">
        <div class="image-container">
            <img src="img/AstonCarPark1.png" alt="Car Park Image 1">
        </div>
        <div class="image-container">
            <img src="img/AstonCarPark2.png" alt="Car Park Image 2">
        </div>
    </div>
    <div class="right-section">
      <h1>Car Park Overview</h1>
      <div class="info-container">
        <div class="price">
          <div class="info-value-wrapper">
            <img src="img/PoundIcon.png" alt="Price Icon">
            <div class="info-content">
              <span class="info-value">£3 per hour</span>
              <span class="info-description">Parking Price</span>
            </div>
          </div>
        </div>
        <div class="walking-distance">
      <div class="info-value-wrapper">
        <img src="img/WalkingIcon.png" alt="Walking Icon">
        <div class="info-content">
          <span class="info-value">5 minutes walking distance</span>
          <span class="info-description">To destination</span>
        </div>
      </div>
    </div>
    <div class="openingtime">
      <div class="info-value-wrapper">
        <img src="img/ClockIcon.png" alt="Clock Icon">
        <div class="info-content">
          <span class="info-value">7am-7pm</span>
          <span class="info-description">Car Park Opening times</span>
        </div>
      </div>
    </div>
  </div>
  <div class="description">
    <h2>Description</h2>
    <p>Located in the heart of the city centre, giving you access to our secure facility for 12 hours day.Our facility is equiped with security cameras, giving you that peace of mind<br></br> whilst you explore the city, run errands.
       You will spend less time commuting and more time enjouing the day with our reliable and convienct car park </p>
      </div>
      <div class="rating-section">
        <h4>Ratings and Reviews</h4>
        <div class="rating">
          <div class="stars">
            <p>&#9733; &#9733; &#9733; &#9733;</p>
          </div>
          <div class="rating-info">
            <span class="average-rating">4.0</span>
            <span class="reviews">(5 reviews)</span>
          </div>
        </div>
        <div class="review">
           <span class="reviewer-name">Zeeshan</span>
           <span class="review-date"> 1st February 2024</span>
           <div class="review-header">
            <div class="review-rating">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
            <div class="review-info">
            </div>
          </div>
          <p>Car Park was easy to find.Highly reccommend</p>
        </div>
        <div class="review">
          <span class="reviewer-name">Ali</span>
          <span class="review-date">12 January 2024</span>
          <div class="review-header">
            <div class="review-rating">&#9733; &#9733; &#9733; &#9733; &#9734;</div>
            <div class="review-info">
            </div>
          </div>
          <p>Decent size car park. No problems, will be using it again.</p>
        </div>
        <div class="review">
          <span class="reviewer-name">John</span>
          <span class="review-date">1 January 2024</span>
          <div class="review-header">
            <div class="review-rating">&#9733; &#9733; &#9733; &#9733; &#9734;</div>
            <div class="review-info">
            </div>
          </div>
          <p>Everything went well</p>
        </div>
      </div>
    </div>
</div>

<div class="book-button">
<button type="submit" name="submit" onclick="window.location.href='ConfirmBooking.php'">Book Now</button>
</div>
  <!-- footer-->
<?php include('Footer.php');?>

</body>

</html>