var connection = document.getElementById('connectionsubmit');

connection.addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('erreuriden').textContent = '';
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var feedbackpassword = document.getElementById('feedbackpassword');

    var patternUsername =/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var patternPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    if(patternUsername.test(username)){
        document.getElementById('feedbackusername').textContent=("");
        if(patternPassword.test(password)) {
            feedbackpassword.textContent = '';
            
            fetch('http://localhost/garageVparrot/Model/Entity/login.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`,
                credentials: 'include'
            })
            .then(response => response.text()) 
            .then(data => {
                if (data.trim() === 'Connection autorisée') {
                    
                    window.location.href = "/garageVparrot/index.php";
                } else {
                    
                    document.getElementById('erreuriden').textContent = data;
                }
            })
            .catch(error => {
                console.log(error);
            });
        } else {
            feedbackpassword.textContent = 'Le mot de passe doit contenir au moins 8 charactères dont un chiffre et une lettre, espace non autorisé';
        }
    } else {
        feedbackusername.textContent = "Ceci n'est pas une adresse email valide";
    }
});