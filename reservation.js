function formValidation(){
    event.preventDefault();
    var name = document.getElementById('name').value;
    var guestsCount = document.getElementById('guestsCount').value;
    var date = document.getElementById('date').value;
    var time = document.getElementById('time').value;
    var phone = document.getElementById('phoneNumber').value;
    if (name.trim() === "" || /[^a-zA-Z]/.test(name)) {
        alert("Name can't be blank and must contain only letters");
        return false;
    }else if (!Number.isInteger(guestsCount) || guestsCount < 1) {
        alert("Guests count must be a positive integer");
        return false;
    }else if(date.trim() === ""){
        alert("Date can't be blank");
        return false;
    }else if(time.trim() === ""){
        alert("Time can't be blank");
        return false;
    }else if(phone.trim() === "" || !/^\d{10}$/.test(phone)){
        alert("Phone number can't be blank and must contain 10 digits");
        return false;
    }
    fetch("/reservation", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            name: name,
            guestsCount: guestsCount,
            date: date,
            time: time,
            phone: phone
        }),
    })
    .then(response => response.json())
    .then (data => {
        alert("Reservation successful");
        window.location.href = "/reservation";
    })
}
