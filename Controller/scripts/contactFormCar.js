var signup = document.getElementById('signupsubmit');

signup.addEventListener('click', function (event) {
    event.preventDefault();
    var carid = document.getElementById('carid25').value;
    var name = document.getElementById('name25').value;
    var firstname = document.getElementById('firstName25').value;
    var phoneNumber = document.getElementById('phoneNumber25').value;
    var email = document.getElementById('email25').value;
    var contact = document.getElementById('contact25').value;
    var feedbackcomment= document.getElementById("feedbackcomment")
    document.getElementById('nameError').textContent = "";
    document.getElementById('firstnameError').textContent = "";
    document.getElementById('phoneNumberError').textContent = "";
    document.getElementById('emailError').textContent = "";
    var patternEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var patternComment = /^[\s\S]{1,1500}$/
    var patternName=/^[A-Za-z-]{1,50}$/;
    var patternPhoneNumber=/^\d{10}$/;
    if(!patternComment.test(contact)){
        feedbackcomment.textContent = 'Votre demande de contact ne peut pas dépasser 1500 caractères et ne doit pas être vide'; 
        return false}
    if(!patternName.test(name)){
        document.getElementById('nameError').textContent = "Nom incorrect, il doit contenir que des lettres et peut avoir une longueur d'au plus 50 caractères";
        return false;
    }
    if(!patternName.test(firstname)){
        document.getElementById('firstnameError').textContent = "Prénom incorrect, il doit contenir que des lettres et peut avoir une longueur d'au plus 50 caractères";
        return false;
    }
    if(!patternPhoneNumber.test(phoneNumber)){
        document.getElementById('phoneNumberError').textContent = "Numéro de téléphone incorrect, il doit contenir exactement 10 chiffres";
        return false;
    }
    if(!patternEmail.test(email)){
        document.getElementById('emailError').textContent = "Email incorrect, il doit avoir un format valide (exemple: exemple@domaine.com)";
        return false;
    }

    fetch('http://localhost/garageVparrot/Model/Entity/contact.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `&name=${encodeURIComponent(name)}&firstName=${encodeURIComponent(firstname)}&phoneNumber=${encodeURIComponent(phoneNumber)}&email=${encodeURIComponent(email)}&contact=${encodeURIComponent(contact)}&carid=${encodeURIComponent(carid)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if (data.trim() === 'Connection autorisée') {
            document.getElementById('form25').textContent = "Votre demande de contact a bien été prise en compte, notre personnel va vous recontacter au plus vite";
        } else {
            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
