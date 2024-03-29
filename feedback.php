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
</main>
<?php
$pageJs="feedback"; include 'layout/footer.php';
?>