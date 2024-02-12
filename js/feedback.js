function formValidation(){
    event.preventDefault();
    console.log("Form submitted");
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var topic = document.getElementById('topic').value;
    var message = document.getElementById('message').value;
    if (name.trim() === "" || /[^a-zA-Z]/.test(name)) {
        alert("Name can't be blank and must contain only letters");
        return false;

    }else if(email.trim().split("@").length !== 2){
        alert("Invalid email address");
        return false;
    }else if(console.log(topic.length > 100 || topic.length < 0 )) {
        alert("Invalid topic!");
        return false;
    }else if(console.log(message.length > 100 || message.length < 0 )) {
        alert("Invalid message!");
        return false;
    }

    var formData = {
        name: name,
        email: email,
        topic: topic,
        message: message
    }   

    fetch("feedback.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then (data => {
        if(data.status === "success"){
        alert(data.message + ". Thanks for your feedback.");
        window.location.href = "feedback.php";}
    })  
    .catch((error) => {
        console.error('Error:', error);
    });
}

var form = document.getElementById('feedbackForm');
form.addEventListener('submit', formValidation);