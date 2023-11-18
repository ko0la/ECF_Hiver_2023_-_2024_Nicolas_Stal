var connection = document.getElementById('submitreview');

connection.addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('renvoiBDD').textContent = '';
    var titre = document.getElementById('name').value;
    var comment = document.getElementById('comment').value;
    var note = document.getElementById('note').value

    var feedbacktitre = document.getElementById('feedbacktitre');
    var feedbacknote = document.getElementById('feedbacknote');
    var feedbackcomment= document.getElementById('feedbackcomment')

    var patternTitre = /^[a-zA-Z0-9À-ÖØ-öø-ÿ :]{1,35}$/ ;
    var patternNote = /^[0-5]$/;
    var patternComment = /^[\s\S]{1,750}$/

    if(patternTitre.test(titre)) {
        feedbacktitre.textContent = '';
        if(patternNote.test(note)) {
            feedbacknote.textContent = '';
            if(patternComment.test(comment)){
                feedbackcomment.textContent = ''; 
            fetch('http://localhost/garageVparrot/Model/Entity/review_add.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `titre=${encodeURIComponent(titre)}&note=${encodeURIComponent(note)}&comment=${encodeURIComponent(comment)}`,
                credentials: 'include'
            })
            .then(response => response.text()) 
            .then(data => {
                if (data.trim() === 'Commentaire ajouté') {
                    document.getElementById('successReview').textContent = "Nous vous remercions d'avoir ajouté un commentaire, il sera publié sur notre page d'accueil après vérification."; 
                } else {
                    document.getElementById('renvoiBDD').textContent = "Nous nous excusons, un problème technique est survenu, veuillez réessayer plus tard.";
                }
            })
            .catch(error => {
                console.log(error);
            });
        } else {
            feedbackcomment.textContent = 'Veuillez entrer un commentaire entre 1 et 750 caractères maximum.';
        }
    } else {
        feedbacknote.textContent = 'Veuillez entrer un seul chiffre entre 0 et 5.';
    }
} else {
    feedbacktitre.textContent = "Votre titre ne peut comporter que des lettres, des chiffres ou des espaces et ne peut pas dépasser 35 caractères.";
} 
});