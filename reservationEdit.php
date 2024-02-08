<?php 
    include 'db.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        header('Content-Type: application/json');
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE);

        $name = $input['name'];
        $guestsCount = $input['guestsCount'];
        $date = $input['bookingDate'];
        $email = $input['email'];
        $modifiedId = $input['id'];

        $sql = "UPDATE jinLu_bookinginfo 
            SET name = '$name', guestNumber = '$guestsCount', date = '$date', email = '$email'
            WHERE id = $modifiedId";

        if ($conn->query($sql) === TRUE) {
            $response = array('message' => 'sucessfully edit!','status' => 'success');
            echo json_encode($response);
        } else {
            $response = array('error' => 'Error: ' . $sql . ' - ' . $conn->error); 
            echo json_encode($response);
        }
        $conn->close(); 
        return; 
    }  

    $modifiedId = $_GET['id'];

    $searchSql = "SELECT * FROM jinLu_bookinginfo WHERE id = $modifiedId";
    $result = $conn->query($searchSql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fillName = $row["name"];
        $fillGuestNumber = $row["guestNumber"];
        $fillDate = $row["date"];
        $fillEmail = $row["email"];
        
    } else {
        echo "Record not found";
    }
    $conn->close();
?>

<?php $pageTitle = "Reservation";
$pageDescription = "Reserve table for your dinner at Midnight Sun Bistro.";
$pageCssFilename = "reservation";
$pageAdmin = true;
include "layout/header.php"; ?>
  
<main>
    <div class = "container row">
    <form id="reservationEditForm" class="col-lg-6 bookform custom-padding" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <input type="hidden" name="id" value=<?php echo $modifiedId; ?>>
            <h1>Reserve a seat</h1>
            <div>
                <label for="name" class="form-label fs-5">Name</label>
                <input type="text" name="name" value=<?php echo $fillName; ?> class="form-control" id="name" aria-describedby="nameHelp" placeholder="Please enter your name" required>
            </div>
            <div class="mb-3">
                <label for="guestsCount" class="form-label fs-5">Number of Guests</label>
                <input type="number" name="guestsCount" value=<?php echo $fillGuestNumber; ?> class="form-control" id="guestsCount" placeholder="5" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fs-5">Email</label>
                <input type="email" name="email" value=<?php echo $fillEmail; ?> class="form-control" id="email" placeholder="carol@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label fs-5">Date</label>
                <input type="date" name="bookingDate" value=<?php echo $fillDate; ?> class="form-control" id="date" placeholder="21/01/2024" required>
            </div>
            <div class="d-grid">
                <button type="submit" id="submitForm" name="submit" class="btn btn-primary d-grid">Confirm</button>
            </div>
        </form>      
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
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="reservation.js"></script>
</body>
</html>