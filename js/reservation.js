// reservation form validation and submission
function formValidation(){
    event.preventDefault();
    console.log("Form submitted");
    var name = document.getElementById('name').value;
    var guestsCount = document.getElementById('guestsCount').value;
    console.log(typeof guestsCount)
    var bookingDate = document.getElementById('date').value;
    var email = document.getElementById('email').value;
    if (name.trim() === "" || /[^a-zA-Z]/.test(name)) {
        alert("Name can't be blank and must contain only letters");
        return false;
    } else if (!/^[1-9]\d*$/.test(guestsCount)) {
        alert("Guests count must be a positive integer");
        return false;
    }else if(email.trim().split("@").length !== 2){
        alert("Invalid email address");
        return false;
    }
 
    var formData = new FormData(document.getElementById("reservationForm"));
    var formDataJSON = {}; 
    formData.forEach((value, key) => { 
        formDataJSON[key] = value; 
    })
    element = document.querySelector('input[name="id"]');
    fetchUrl = "reservation.php";
    refreshUrl = "reservation.php";
    if (element) {
        fetchUrl = "reservationEdit.php";
        refreshUrl = "reservationAdmin.php";
    }
    fetch(fetchUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(formDataJSON), 
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        if(data.status === "success" && fetchUrl === "reservation.php"){
            let showContainer = document.getElementById('userSubmitConfirm-container');
            showContainer.style.display = "block";
            let closeButton = document.getElementById('confirmButtonU');  
            closeButton.onclick = function() {
                showContainer.style.display = "none";
                window.location.href = refreshUrl; 
            };
        } else if(data.status === "success" && fetchUrl === "reservationEdit.php") {
            let showContainer = document.getElementById('adminSubmitConfirm-container');
            showContainer.style.display = "block";
            let closeButton = document.getElementById('confirmButtonA');
            closeButton.onclick = function() {
                showContainer.style.display = "none";
                window.location.href = refreshUrl; 
            };
        }
         
    })
    .catch((error) => {
        console.error('Error:', error);
    });
};

var form = document.getElementById('reservationForm');
form.addEventListener('submit', formValidation);



