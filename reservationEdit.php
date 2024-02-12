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

        $sql = "UPDATE jinLu_reservationInfo SET name = '$name', guestNumber = '$guestsCount', `date` = '$date', email = '$email' WHERE id = $modifiedId";

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

    $searchSql = "SELECT * FROM jinLu_reservationInfo WHERE id = $modifiedId";
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
$pageJs = "reservation"; 
include "layout/header.php"; ?>
  
<main>
    <div class = "container row">
    <form id="reservationForm" class="col-lg-6 bookform custom-padding" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
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
        <div id="adminSubmitConfirm-container" class="submitConfirm-container">
            <div class="confirmBookingA">  
                <input type="hidden" name="adminSubmitConfirm" value="adminSubmitConfirm">              
                <p>Edit successfully.</p>
                <button id="confirmButtonA" class="btn btn-primary">OK</button>
            </div>
    </div>     
</main>
<?php include "layout/footer.php"; ?>