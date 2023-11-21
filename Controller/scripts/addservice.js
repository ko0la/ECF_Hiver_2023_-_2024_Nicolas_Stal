var ajout = document.getElementById('addservice');

ajout.addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('renvoiBDD').textContent = '';
    var nom = document.getElementById('name').value;
    var options = document.getElementById('options').value;
    var prix = document.getElementById('prix').value
    document.getElementById('ajoutreussi').textContent = "";
    var feedbacknom = document.getElementById('feedbackname');
    var feedbackprix= document.getElementById('feedbackprix');
    var feedbackoptions= document.getElementById('feedbackoptions')
    feedbacknom.textContent="";
    feedbackoptions.textContent="";
    feedbackprix.textContent="";
    var patternnom = /^[a-zA-Z0-9À-ÖØ-öø-ÿ :"'']{1,75}$/;
    var patternPrix = /^\d{1,6}([.,]\d{1,2})?$/;
    var patternOptions =/^[^<>]{0,1500}$/;
    
    let succesRegex = true;
    
    if(!patternnom.test(nom)) {
        feedbacknom.textContent = 'Longueur maximale du nom de 75 caractères, ne pas utiliser < ou > et autres';
        succesRegex = false;
    }
    
    if(!patternPrix.test(prix)) {
        feedbackprix.textContent = 'Le prix ne peut être composé que de 8 caractères, et seulement 2 après la virgule, uniquement des chiffres, pas besoin de taper euros';
        succesRegex = false;
    }
    
    if(!patternOptions.test(options)){
        feedbackoptions.textContent = "Votre lot d'options ne peut pas inclure les caractères < ou > et ne doit pas dépasser 1500 caractères";
        succesRegex = false;
    }
    if(succesRegex==true) {
            fetch('http://localhost/garageVparrot/Model/Entity/add_service.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `nom=${encodeURIComponent(nom)}&prix=${encodeURIComponent(prix)}&options=${encodeURIComponent(options)}`,
                credentials: 'include'
            })
            .then(response => response.text())
            .then(data => {
                console.log(data)
                console.log(data.trim)
                if (data.trim() ==="Ce service a bien été ajouté") {
                    document.getElementById('ajoutreussi').textContent = "Le service à bien été ajouté"; 
                    document.getElementById("nom").textContent="";
                    document.getElementById("prix").textContent="";
                    document.getElementById("options").textContent="";
                } else {
                    document.getElementById('renvoiBDD').textContent = "Nous nous excusons, un problème technique est survenu, veuillez réessayer plus tard.";
                }
            })
            .catch(error => {
                console.log(error);
            });
        } else {;
        } })