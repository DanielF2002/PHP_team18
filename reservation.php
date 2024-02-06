<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- describe the page -->
    <meta name="description" content="Embark on a culinary journey at Midnight Sun Bistro in Helsinki - an oasis of fine dining where every meal is a masterpiece.." />
    <!-- import Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Freehand&family=Island+Moments&family=Karla&family=Markazi+Text&display=swap"
    rel="stylesheet">

    <link rel="apple-touch-icon" href="images/slogo192.png"/>
    <link rel="manifest" href="manifest.json" />
    <!-- below three: when people share this page to others, what would be displayed -->
    <meta property=”og:title” content="Reserve Your Culinary Adventure at Midnight Sun Bistro" />
    <meta property=”og:description” content="Discover Helsinki's hidden gem. Join us at Midnight Sun Bistro for an unforgettable dining experience that tantalizes your taste buds and ignites your senses." />
    <meta property=”og:image” content="images/logo192.png"/>
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="reservation.css">

</head>

<body>
    <div class="container">
        <header>
            <div class="container header-logo text-center">
                <a href="index.html" class="brand-section">
                    <p class="logo-part-1">The pure taste of</p>
                    <p class="logo-part-2">Midnight Sun Bistro</p>
                </a>
                <nav class="navbar navbar-expand">
                    <ul class="navbar-nav d-flex justify-content-between w-100">
                        <li class="nav-item fs-4"><a href="index.html" class="nav-link">Home</a></li>
                        <li class="nav-item fs-4"><a href="menu.html" class="nav-link">Menu</a></li>
                        <li class="nav-item fs-4"><a href="reservation.html" class="nav-link">Reservation</a></li>
                        <li class="nav-item fs-4"><a href="feedback.html" class="nav-link">Feedback</a></li>
                    </ul>
                </nav>
            </div>
        </header>
  
    <main>
        <div class = "container row">
            <form id="reservationForm" class="col-lg-6 bookform custom-padding" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <h1>Reserve a seat</h1>
                <div>
                    <label for="name" class="form-label fs-5">Name</label>
                    <input type="text" name="nimi" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Please enter your name">
                </div>
                <div class="mb-3">
                    <label for="guestNumber" class="form-label fs-5">Number of Guests</label>
                    <input type="number" name="guestsCount" class="form-control" id="guestNumber" placeholder="5">
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label fs-5">Phone number</label>
                    <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="09 310 10023">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label fs-5">Date</label>
                    <input type="date" name="bookingDate" class="form-control" id="date" placeholder="21/01/2024">
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label fs-5">Time</label>
                    <input type="text" name="arrivalTime" class="form-control" id="time" placeholder="18:30">
                </div>
                <div class="d-grid">
                    <button type="submit" id="submitForm" class="btn btn-primary d-grid">Confirm</button>
                </div>
            </form>  
            <?php 
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['guestsCount'], $_POST['date'], $_POST['time'], $_POST['phone'])) {
                    // getting data from JS
                    $name = $_POST['name'];
                    $guestsCount = $_POST['guestsCount'];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $phone = $_POST['phone'];
                    $mydata = array('name'=> $name,''=> $guestsCount, 'date'=> $date,'time'=> $time,'phone'=> $phone);
                    $response = array('message' => 'Reservation is okay.');
                    echo json_encode($mydata);
                }
            ?> 
            <div class = "col-lg-6 working-hours">
                <section>
                    <div class = "hours">
                        <h2>Office Hours</h2>
                        <p>Monday - Friday: <time datetime="17:00">17:00</time> - <time datetime="23:00">23:00</time></p>
                        <p>Saturday: <time datetime="10:00">10:00</time> - <time datetime="17:00">17:00</time></p>
                        <p>Sunday: Closed</p>
                        <address>
                            <p>Telephone: <a href="tel:0931010023">09 310 10023</a></p>
                            <p>Email: <a href="mailto:info@midnightsun.fi">info@midnightsun.fi</a></p>
                            <p>Address: <a href="#">Linnankatu 3 Hämeenlinna Helsinki</a></p>
                        </address>
                    </div>
                    <div class = "seatings">
                        <h2>Dinning Seatings</h2>
                        <p>Monday - Friday: <time datetime="17:00">17:00</time> - <time datetime="23:00">23:00</time></p>
                        
                    </div>
                    <div class ="additional-info">
                        <p>The cost of our tasting menu is 430 EURO, plus tax. Service and wine are not included. For inquiries regarding event booking, please contact us via email.</p>
                    </div>
                </section>
                <aside class = "aside">
                    <p>* All reservations will require a €200 non-refundable deposit per person. We accept modifications up to eight days prior to your reservation.</p>
                </aside>
            </div>
        </div>         
    </main>
    <footer class="row text-center">
        <div class="col-12 col-lg-4">
            <h3>HOURS</h3>
            <p>Mon--Sat 17-23</p>
            <p>Sunday Closed</p>
        </div>
        <div class="col-12 col-lg-4">
            <h3>LOCATION</h3>
            <p>Linnankatu 9</p>
            <p>13100</p>
            <p>Helsinki</p>
        </div>
        <div class="col-12 col-lg-4">
            <h3>CONTACT</h3>
            <p><a href="mailto:info@midnightsun.fi">info@midnightsun.fi</a></p>
            <div id="social-media">
                <a href="https://www.facebook.com" target="_blank"><img src="images/facebook.png"
                        alt="facebook logo" /></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png"
                        alt="instagram logo" /></a>
                <a href="https://www.tiktok.com" target="_blank"><img src="images/tiktok.png"
                        alt="tiktok logo" /></a>
            </div>
        </div>
    </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="reservation.js"></script>
</body>
</html>