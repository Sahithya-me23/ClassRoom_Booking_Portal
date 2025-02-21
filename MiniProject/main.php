<?php
session_start(); // Start the session

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
  header("Location: SignUp.html");
  exit();
}

$username = $_SESSION['username'];


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Classroom Booking Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    .card {
      border: 5px solid #66FCF1;
      color: #66FCF1;
      background-color: #1F2833;
    }

    .btn {
      background-color: #66FCF1;
      border: #C5C6C7;
    }

    .card-link {
      color: #C5C6C7;
    }

    .custom-signin-btn {
      background-color: #1F2833;
      /* Dark background */
      color: #45A29E;
      /* White text */
      margin-left: 430px;
      /* Adjust the spacing as needed */
      padding: 8px 16px;
      /* Padding for the button */
      border-radius: 5px;
      /* Rounded corners */
      text-decoration: none;
      /* Remove underline */
      position: fixed;
    }

    .custom-signin-btn:hover {
      background-color: #495057;
      /* Slightly lighter shade on hover */
      color: #66FCF1;
    }

    .weltext {
      margin-left: 300px;
      font-style: italic;
      margin-top: 5px;
    }

    /* Style for the overlay text with a box */
.overlay-text {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 36px; /* Adjust the font size as needed */
  font-weight: bold;
  color: #66FCF1;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for readability */
  padding: 10px 20px; /* Space around the text inside the box */
  border: 2px solid aqua; /* Aqua border */
  border-radius: 10px; /* Rounded corners for the box */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Optional: add shadow for better readability */
  text-align: center;
}

  </style>

</head>

<body style="background-image: url('AquaBlkBG.jpg');">


  <nav class="navbar navbar-expand fixed-top" style="background-color: #66FCF1;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Classroom Booking Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <!--Offcanvas-->
          <li class="nav-item">
            <a href="#" class="nav-link">Features</a>
          </li>
          <li class="nav-item">
            <p class="weltext">Welcome, <?php echo htmlspecialchars($username); ?>!</p>
          </li>
          <li class="nav-item">
            <a class="btn custom-signin-btn" href="Logout.php">LogOut</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card text-center mt-5">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Cloud Computing Workshop</h5>
        <p class="card-text">By an ex-Microsoft employee with 10+years experience</p>
        <a href="Featured.html" class="btn">Book ur Seat</a>
      </div>
      <div class="card-footer text-body-secondary">
        2 days ago
      </div>
    </div>


    <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
      <div class="col">
        <div class="card">
          <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">Big Seminar Hall</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">Big Seminar Hall</h5>
            <p class="card-text">This is the largest room available with 200+ seats.Best suited for combined classes and Guest lectures.</p>
            <a href="scheduler.html" class="card-link">Book Now</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
        <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">Small Seminar Hall</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">Small Seminar Hall</h5>
            <p class="card-text">This is the second largest room available with 100+ seats.Best suited for combined classes and Guest lectures.</p>
            <a href="SSscheduler.html" class="card-link">Book Now</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
        <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">GF009</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">GF009</h5>
            <p class="card-text">This room has capacity of 90+.Its Best Suited for either one or two sections</p>
            <a href="SSscheduler.html" class="card-link">Card link</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
        <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">GF010</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">GF10</h5>
            <p class="card-text">This room has capacity of 90+.Its Best Suited for either one or two sections</p>
            <a href="SSscheduler.html" class="card-link">Card link</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
      <div class="col">
        <div class="card">
        <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">GF008</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">GF008</h5>
            <p class="card-text">This room has capacity of 90+.Its Best Suited for either one or two sections.</p>
            <a href="SSscheduler.html" class="card-link">Card link</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
        <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">GF003</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">GF003</h5>
            <p class="card-text">This room has capacity of 90+.Its Best Suited for either one or two sections.</p>
            <a href="SSscheduler.html" class="card-link">Card link</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
        <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">GF004</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">GF004</h5>
            <p class="card-text">This room has capacity of 90+.Its Best Suited for either one or two sections.</p>
            <a href="SSscheduler.html" class="card-link">Card link</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
        <div class="card-image-container">
            <img src="AquaBlkBG.jpg" class="card-img-top" alt="...">
            <div class="overlay-text">GF005</div>
          </div>
          <div class="card-body">
            <h5 class="card-title">GF005</h5>
            <p class="card-text">This room has capacity of 90+.Its Best Suited for either one or two sections.</p>
            <a href="SSscheduler.html" class="card-link">Card link</a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container">
    <div class="card text-center mt-5">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Complaint's Corner</h5>
        <p class="card-text">Complain about the room conditions and Find Your lost things </p>
        <a href="Complaint.html" class="btn">HERE</a>
        <a href="feedback.html" class="btn">FEEDBACK</a>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>