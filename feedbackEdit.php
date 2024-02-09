<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    header('Content-Type: application/json');
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);

    $name = $input['name'];
    $email = $input['email'];
    $topic = $input['topic'];
    $message = $input['message'];

    include 'db.php';

    // Define an SQL query to insert data into the 'studentsinfo' table
    $sql = "INSERT INTO muZhao_feedback (name, email, topic, message)
            VALUES ('$name', '$email', '$topic', '$message')";

    // Execute the SQL query using the database connection
    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'New record added','status' => 'success');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Error: ' . $sql . ' - ' . $conn->error); 
        echo json_encode($response);
    }
    $conn->close(); 
    return; 
    }  
?>

<?php $pageTitle = "Feedback";
$pageDescription = "Feedback at Midnight Sun Bistro.";
$pageCssFilename = "feedback";
include "layout/header.php"; 
?>
<main>
    <div class="container row">
        <form name="feedbackForm" class="col-12 col-lg-6" method="post" id = "feedbackForm" action="">
            <h1>Please leave your feedback:</h1>
            <div class="form-group">
                <label for="name" class="fs-5">Name</label>
                <input type="text" name = "name" class="form-control" id="name" autocomplete="name"
                    placeholder="Please enter your name.">
            </div>
            <div class="form-group">
                <label for="email" class="fs-5">Email</label>
                <input type="email" name = "email" class="form-control" id="email" autocomplete="email"
                    placeholder="yourname@email.com">
            </div>
            <div class="form-group">
                <label for="topic" class="fs-5">Topic</label>
                <input type="text" name = "topic" class="form-control" id="topic" placeholder="Please enter the topic.">
            </div>
            <div class="form-group">
                <label for="message" class="fs-5">Message</label>
                <textarea class="form-control" name = "message" id="message" rows="3"
                    placeholder="Leave your feedback here."></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
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
                    <a href="https://www.facebook.com" target="_blank"><img src="layout/images/facebook.png"
                            alt="facebook logo" /></a>
                    <a href="https://www.instagram.com/" target="_blank"><img src="layout/images/instagram.png"
                            alt="instagram logo" /></a>
                    <a href="https://www.tiktok.com" target="_blank"><img src="layout/images/tiktok.png"
                            alt="tiktok logo" /></a>
                </div>
            </div>
        </footer>
        </div> <!-- container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="feedback.js"></script>
</body>
</html>