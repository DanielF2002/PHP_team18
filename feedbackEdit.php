<?php 
include "db.php";
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message'];
 
    //update the feedback in the database
    $query = mysqli_query($conn, "UPDATE muZhao_feedback SET name = '$name', email = '$email', topic = '$topic', message = '$message' WHERE ID='$id'");
 
    if($query){
        $msg = "feedback updated successfully.";
    }else{
        $msg = "Error updating" . $conn->error;
    }
    $conn->close();
    return;
 }
    
    $searchsql = "SELECT * FROM muZhao_feedback WHERE ID = $id";
    $result = $conn->query($searchsql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $fillName = $row["name"];
        $fillEmail = $row["email"];
        $fillTopic = $row["topic"];
        $fillMessage = $row["message"];
    }

    $conn->close();
    ?>
<?php 
$pageTitle = "Feedback";
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
                    value="<?php echo $fillName; ?>"placeholder="Please enter your name.">
            </div>
            <div class="form-group">
                <label for="email" class="fs-5">Email</label>
                <input type="email" name = "email" class="form-control" id="email" autocomplete="email"
                value="<?php echo $fillEmail; ?>" placeholder="yourname@email.com">
            </div>
            <div class="form-group">
                <label for="topic" class="fs-5">Topic</label>
                <input type="text" name = "topic" class="form-control" id="topic" 
                value="<?php echo $fillTopic; ?>" placeholder="Please enter the topic.">
            </div>
            <div class="form-group">
                <label for="message" class="fs-5">Message</label>
                <textarea class="form-control" name = "message" id="message" rows="3"
             placeholder="Leave your feedback here."><?php echo $fillMessage; ?></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
</main>
<script>
//function to validate name
function validateName() {
const name=document.getElementById("name").value;
const nameError = document.getElementById("nameError");
if (name.length < 2 || name.length > 20){
    nameError.innerHTML = "Name must be between 2 & 20 characters";
    return false;
}else{
    nameError.innerHTML="";
    return ture;
}

}

//function to validate email
function validateEmail(){
    const email=document.getElementById("email").value;
    const emailError = document.getElementById("emailError");
    if (email==""|| !email.includes("@")){
        emailError.innerHTML = "Please enter a valid email address";
        return false;
    }
    else {
        nameError.innerHTML="";
        return true;
    }
}


//event listeners for real time validation
document.getElementById("name").addEventListener("input", validateName);
document.getElementById("email").addEventListener("input", validateEmail);
</script>

<?php
include 'layout/footer.php';
?>