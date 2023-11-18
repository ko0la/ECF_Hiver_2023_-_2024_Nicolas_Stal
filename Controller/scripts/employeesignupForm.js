var signup = document.getElementById('signupsubmit');

signup.addEventListener('click', function (event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var name = document.getElementById('name').value;
    var firstname = document.getElementById('firstName').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    document.getElementById('usernameError').textContent = "";
    document.getElementById('nameError').textContent = "";
    document.getElementById('firstnameError').textContent = "";
    document.getElementById('phoneNumberError').textContent = "";
    document.getElementById('emailError').textContent = "";
    document.getElementById('passwordError').textContent = "";
    var patternEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var patternPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var patternUsername =/^[A-Za-z0-9]{4,}$/;
    var patternName=/^[A-Za-z-]{1,50}$/;
    var patternPhoneNumber=/^\d{10}$/;

    if(!patternUsername.test(username)){
        document.getElementById('usernameError').textContent=("Nom d'utilisateur incorrect, il doit contenir que des lettres et/ou des chiffres faire une longueur d'au moins  4 caractères")
        return false;
    }
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
    if(!patternPassword.test(password)){
        document.getElementById('passwordError').textContent = "Mot de passe incorrect, il doit contenir au moins une lettre, un chiffre, et faire une longueur d'au moins 8 caractères";
        return false;
    }
    fetch('http://localhost/garageVparrot/Model/Entity/employeeSignup.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        credentials: 'include', 
        body: `username=${encodeURIComponent(username)}&name=${encodeURIComponent(name)}&firstName=${encodeURIComponent(firstname)}&phoneNumber=${encodeURIComponent(phoneNumber)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if (data.trim() === 'Compte créé avec succès') {
            document.getElementById('employeesignupform').textContent = "";
            document.getElementById('feedbackBDD').textContent = "Le compte employé a bien été crée, il peut dès a présent se connecter sur le site";
        } else if (data.trim() === 'Cette email n\'est pas disponible') 
        {
            document.getElementById('erreur').textContent ="Adresse mail déja utilisée";
        } else if (data.trim() ==="Ce nom d\'utilisateur est déja utilisé" ) {
            document.getElementById('erreur').textContent="Nom d'utilisateur déja utilisé"
        } else {
            document.getElementById('erreur').textContent = "Une erreur est parvenue, veuillez réssayer plus tard"
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
