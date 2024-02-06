<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Send feedback to Midnight Sun Bistro, the best fine dining restaurant in Helsinki." />
    <!-- import Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Freehand&family=Island+Moments&family=Karla&family=Markazi+Text&display=swap"
        rel="stylesheet">

    <link rel="apple-touch-icon" href="images/logo192.png" />
    <link rel="manifest" href="manifest.json" />
    <meta property=”og:title” content="Send feedback to Midnight Sun Bistro" />
    <meta property=”og:description”
        content="Send feedback to Midnight Sun Bistro, the best fine dining restaurant in Helsinki." />
    <meta property=”og:image” content="images/logo192.png" />
    <title>Send a feedback to Midnight Sun Bistro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="feedback.css">
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
            <div class="container row">
                <form class="col-12 col-lg-6" method="post" action="feedbackprocess.php">
                    <h1>Please leave your feedback:</h1>
                    <div class="form-group">
                        <label for="name" class="fs-5">Name</label>
                        <input type="text" name="nimi" class="form-control" id="name" autocomplete="name"
                            placeholder="Please enter your name." required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="fs-5">Email</label>
                        <input type="email" class="form-control" id="email" autocomplete="email"
                            placeholder="yourname@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="topic" class="fs-5">Topic</label>
                        <input type="text" class="form-control" id="topic" placeholder="Please enter the topic.">
                    </div>
                    <div class="form-group">
                        <label for="message" class="fs-5">Message</label>
                        <textarea class="form-control" id="message" rows="3"
                            placeholder="Leave your feedback here." required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
                <aside class="col-lg-6 d-none d-lg-block">
                    <div class="logo col-12">
                        <p class="logo-part-1">
                            The pure taste of
                        </p>
                        <p class="logo-part-2">
                            Midnight Sun Bistro
                        </p>
                    </div>
                </aside>
            </div>
            
            <div class="d-flex justify-content-between cards">
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <img src="images/profile1.png" class="card-img-top rounded-circle" alt="Mina's avatar">
                    </div>
                    
                    <?php
                    $feedback_array = array(
                        "user1" => array("name" => "1", "feedback" => "I like the food and the service was great. I will definitely come back."),
                        "user2" => array("name" => "2", "feedback" => "I like the food and the service was great. I will definitely come back."),
                        "user3" => array("name" => "3", "feedback" => "I like the food and the service was great. I will definitely come back."),
                        "user4" => array("name" => "4", "feedback" => "I like the food and the service was great. I will definitely come back.")
                    );
                        $user1_name = $feedback_array['user1']['name'];
                        $user1_feedback = $feedback_array['user1']['feedback'];

                    ?>

                    <div class="card-body">
                        <h2 class="card-title"><?php echo  $user1_name; ?></h2>

                        <p class="card-text"><?php  echo $user1_feedback; ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <img src="images/profile2.png" class="card-img-top rounded-circle" alt="Mila's avatar">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Mila</h2>
                        <p class="card-text">The ambiance of this fine dining gem is both intimate and luxurious. Each
                            dish was a culinary masterpiece.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <img src="images/profile3.png" class="card-img-top rounded-circle" alt="Emily's avatar">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Emily</h2>
                        <p class="card-text">The innovative menu, paired with a world-class wine selection, made for an
                            unforgettable evening.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <img src="images/profile4.png" class="card-img-top rounded-circle" alt="James' avatar">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">James</h2>
                        <p class="card-text">Remarkable attention to detail is evident in both the food and the
                            atmosphere of this fine dining establishment.</p>
                    </div>
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
    </div> <!-- container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>