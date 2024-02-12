<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        header('Content-Type: application/json');
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);

        $name = $input['name'];
        $guestsCount = $input['guestsCount'];
        $date = $input['bookingDate'];
        $email = $input['email'];

        include 'db.php';

    $sql = "INSERT INTO jinLu_reservationInfo (name, guestNumber, date, email)
            VALUES ('$name', '$guestsCount', '$date', '$email')";

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

<?php $pageTitle = "Reservation";
$pageDescription = "Reserve table for your dinner at Midnight Sun Bistro.";
$pageCssFilename = "reservation";
$pageJs = "reservation";
include "layout/header.php"; ?>
  
<main>
    <div class = "container row">
    <form id="reservationForm" class="col-lg-6 bookform custom-padding" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <h1>Reserve a seat</h1>
            <div>
                <label for="name" class="form-label fs-5">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Please provide your first name" required>
            </div>
            <div class="mb-3">
                <label for="guestsCount" class="form-label fs-5">Number of Guests</label>
                <input type="number" name="guestsCount" class="form-control" id="guestsCount" placeholder="5" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fs-5">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="carol@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label fs-5">Date</label>
                <input type="date" name="bookingDate" class="form-control" id="date" placeholder="21/01/2024" required>
            </div>
            <div class="d-grid">
                <button type="submit" id="submitForm" name="submit" class="btn btn-primary d-grid">Confirm</button>
            </div>
        </form>
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
        <div id="userSubmitConfirm-container" class="submitConfirm-container">
            <div class="confirmBookingU">                
                <p>Thank you for your reservation. We will email you two days before your booking time.</p>
                <button id="confirmButtonU" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>         
</main>
<?php  include "layout/footer.php"; ?>