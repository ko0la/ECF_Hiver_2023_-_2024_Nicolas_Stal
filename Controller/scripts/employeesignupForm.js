var signup = document.getElementById('signupsubmit');

signup.addEventListener('click', function (event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    document.getElementById('usernameError').textContent = "";
    document.getElementById('passwordError').textContent = "";
    var patternPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var patternUsername =/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(!patternUsername.test(username)){
        document.getElementById('usernameError').textContent=("Nom d'utilisateur incorrect, il doit être au format d'une adresse email")
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
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if (data.trim() === 'Compte créé avec succès') {
            document.getElementById('employeesignupform').textContent = "";
            document.getElementById('feedbackBDD').textContent = "Le compte employé a bien été crée, il peut dès a présent se connecter sur le site";
        } 
         else if (data.trim() ==="Ce nom d\'utilisateur est déja utilisé" ) {
            document.getElementById('erreur').textContent="Nom d'utilisateur déja utilisé"
        } else {
            document.getElementById('erreur').textContent = "Une erreur est parvenue, veuillez réssayer plus tard"
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
