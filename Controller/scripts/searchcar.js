/*
Heures passés ici => 37
*/ 


let currentPage = 1;
let entriesPerPage = 4;
let totalPageCount = 1;
let formInput = null;

window.onload = function() {
    const previousButton = document.getElementById('before');
    const nextButton = document.getElementById('next');
    let form = document.getElementById('carsearchform');

    function loadPage() {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/garageVparrot/Model/Entity/search_car.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.status == 200) {
                let data = JSON.parse(this.responseText);
                displayCars(data.cars);
                document.getElementById('pageCount').innerText = currentPage + "/" + data.totalPages;
                totalPageCount = data.totalPages;
                previousButton.disabled = currentPage <= 1;
                nextButton.disabled = currentPage >= totalPageCount;
            }
        };

        if (formInput) {
            formInput.set('page', currentPage);
            formInput.set('resultatsPerPage', entriesPerPage);
            xhr.send(new URLSearchParams(formInput).toString());
        } else {
            xhr.send('page=' + currentPage + '&resultatsPerPage=' + entriesPerPage);
        }
    }

    previousButton.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            loadPage();
        }
    });

    nextButton.addEventListener('click', function() {
        if (currentPage < totalPageCount) {
            currentPage++;
            loadPage();
        }
    });

  
    loadPage();

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log("Form submitted");

        formInput = new FormData(form);
        formInput.set('page', currentPage);

        let motCléValue = document.getElementById('motClé').value;
        let sortValue = document.getElementById('sort').value;
        entriesPerPage = document.getElementById('resultatsPerPage').value;

        formInput.set('motClé', motCléValue);
        formInput.set('sort', sortValue);
        formInput.set('resultatsPerPage', entriesPerPage);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/garageVparrot/Model/Entity/search_car.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        console.log("Sending ajax request");  
        xhr.onload = function() {
            if (this.status == 200) {
                let data = JSON.parse(this.responseText);
                currentPage = 1;
                displayCars(data.cars);
                document.getElementById('pageCount').innerText = currentPage + '/' + data.totalPages;
                totalPageCount = data.totalPages;  
                previousButton.disabled = currentPage <= 1; 
                nextButton.disabled = currentPage >= totalPageCount; 
            }
        };
        xhr.send(new URLSearchParams(formInput).toString());
    });
};

function displayCars(cars) {
    let resultsDiv = document.getElementById('carResults');
    resultsDiv.innerHTML = '';
    let rowDiv = document.createElement('div');
    rowDiv.className = 'row';

    for (let i = 0; i < cars.length; i++) {
        let car = cars[i];
        let carDiv = document.createElement('div');
        carDiv.className = 'col-md-5 col-sm-12 justify-text-center smaller-font mr-3 ml-3 mt-3 mb-3';

        carDiv.innerHTML = `<p>Modèle: ${car.carName}</p>
                            <p>Marque: ${car.brand}</p>
                            <p>Kilométrage: ${car.mileage}</p>
                            <p>Prix: ${car.price}€</p>`;

        let detailsBtn = document.createElement('button');
        detailsBtn.className = 'btn-primary';
        detailsBtn.textContent = 'Plus de détails';
        detailsBtn.addEventListener('click', () => {
            openModal(car);
        });

        carDiv.appendChild(detailsBtn);

        if (car.photoNames) {
            let img = document.createElement('img');
            img.className = 'car-image';
            let photoNames = car.photoNames.split(',');
            img.src = '/garageVparrot/Model/Entity/uploadedfiles/' + photoNames[0].trim();
            carDiv.appendChild(img);
        }

        rowDiv.appendChild(carDiv);
        if (i % 2 == 1 || i == cars.length - 1) {
            resultsDiv.appendChild(rowDiv);
            if (i != cars.length - 1) {
                rowDiv = document.createElement('div');
                rowDiv.className = 'row';
            }
        }
    }
}
/*
Note : penser a regarder comment styliser ce genre de problêmes depuis un js.innerhtml, je dois avouer sécher complet c'est en dessous de cette ligne que tout part en saucisse 
---------------------------------------------------------------------------
--------------------------------------------------------------------------
*/
function refairemarcherlesbouttons(car) {
    let fullscreen = document.getElementById('fsdisp')
    let motCléValue = document.getElementById('motClé').value;
    let sortValue = document.getElementById('sort').value;
    entriesPerPage = document.getElementById('resultatsPerPage').value;
    let resultsDiv = document.getElementById('carResults');
    const previousButton = document.getElementById('before');
    const nextButton = document.getElementById('next');
    let form = document.getElementById('carsearchform')
    let detailsBtn = document.createElement('button');
    previousButton.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            loadPage();
        }
    });

    nextButton.addEventListener('click', function() {
        if (currentPage < totalPageCount) {
            currentPage++;
            loadPage();
        }
    });
    detailsBtn.addEventListener('click', () => {
        openModal(car);
    });
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log("Form submitted");

        formInput = new FormData(form);
        formInput.set('page', currentPage);

        let motCléValue = document.getElementById('motClé').value;
        let sortValue = document.getElementById('sort').value;
        entriesPerPage = document.getElementById('resultatsPerPage').value;

        formInput.set('motClé', motCléValue);
        formInput.set('sort', sortValue);
        formInput.set('resultatsPerPage', entriesPerPage);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/garageVparrot/Model/Entity/search_car.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        console.log("Sending ajax request");  
        xhr.onload = function() {
            if (this.status == 200) {
                let data = JSON.parse(this.responseText);
                currentPage = 1;
                displayCars(data.cars);
                document.getElementById('pageCount').innerText = currentPage + '/' + data.totalPages;
                totalPageCount = data.totalPages;  
                previousButton.disabled = currentPage <= 1; 
                nextButton.disabled = currentPage >= totalPageCount; 
            }
        };
        xhr.send(new URLSearchParams(formInput).toString());
    });
};

function openModal(car) {
    let fullscreen= document.getElementById("fsdisp");
    let thiswork = document.getElementById("thiswork?")
    fullscreen.style.display ="none";
    let newElement = document.createElement('div');
    newElement.setAttribute("id", "thisisworking?")
newElement.innerHTML = `<div id="thisismydumbestideayet"><div id="carouselExampleControls" class="carousel slide col-md-5 col sm-6" data-ride="carousel">  <div id="JEVEUXFOUTTRE UNE GALERIE DIMAGE A CET ENDROIT PRECIS"> </div></div>
    <h2>${car.carName}</h2>
    <button id="retour" class="btn-primary">Revenir au résultats</button>
    <p>Modèle: ${car.carName}</p>
    <p>Marque: ${car.brand}</p>
    <p>Kilométrage: ${car.mileage}</p>
    <p>Prix: ${car.price}€</p>
    <p>Description: ${car.options}</p>
    <div id="form25">
    <form class="vertical-form" action="" method="POST" >
                        <label for="name25">Nom :</label>
                        <div id='nameError'></div>
                        <input type="text25" name="name25" id="name25" required placeholder="Nom">
                        <label for="firstName25">Prenom :</label>
                        <div id='firstnameError'></div>
                        <input type="text" name="firstName25" id="firstName25" required placeholder="Prenom">
                        <label for="email25">Adresse mail :</label>
                        <div id='emailError'></div>
                        <input type="email" name="email" id="email25" required placeholder="email@mail.com">
                        <label for="phoneNumber25">Numéro de téléphone :</label>
                        <div id='phoneNumberError'></div>
                        <input type="text" name="phoneNumber25" id="phoneNumber25">
                        <label for="contact25">Votre demande porte sur  : </label>
                <div id="feedbackcomment"></div>
                        <textarea class="col-12"  name="contact" id="contact25" placeholder="Tapez ici la raison de votre demande de contact"></textarea>
                        <input type="hidden" name="carid25" id="carid25" value="${car.id}">
                        <button id="signupsubmit" type="submit">Nous contacter</button>
                        <div id="test1250" > </div>
                         </div>
</div>
    </div>`;
    
    /*<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" ></script><script src="/garageVparrot/Controller/scripts/contactFormCar.js"</script>*/
 ;carouselExampleControls = document.getElementById("carouselExampleControls");
    thiswork.prepend(newElement);
    let carousel = document.getElementById("carouselExampleControls");
    let carouselInner = document.createElement('div');
    carouselInner.className = 'carousel-inner';
    

    if (car.photoNames) {
        let photoNames = car.photoNames.split(',');
        for (let i = 0; i < photoNames.length; i++) {
            let img = document.createElement('img');
            img.classList.add('d-block', 'w-100');
            img.src = '/garageVparrot/Model/Entity/uploadedfiles/' + photoNames[i].trim();

            let carouselItem = document.createElement('div');
            carouselItem.classList.add('carousel-item');
            if (i === 0) carouselItem.classList.add('active');
            carouselItem.appendChild(img);

            carouselInner.appendChild(carouselItem);
        }
    }
    console.log(car.id)

    let prev = document.createElement('a');
    prev.className = 'carousel-control-prev';
    prev.href = '#carouselExampleControls';
    prev.role = 'button';
    prev.dataset.slide = 'prev';

    let prevIcon = document.createElement('span');
    prevIcon.className = 'carousel-control-prev-icon';
    prevIcon.setAttribute('aria-hidden', 'true');
    prev.appendChild(prevIcon);

    let prevText = document.createElement('span');
    prevText.className = 'sr-only';
    prevText.textContent = 'Previous';
    prev.appendChild(prevText);

    let next = document.createElement('a');
    next.className = 'carousel-control-next';
    next.href = '#carouselExampleControls-next';
    next.setAttribute('id','next');
    next.role = 'button';
    next.dataset.slide = 'next';

    let nextIcon = document.createElement('span');
    nextIcon.className = 'carousel-control-next-icon';
    nextIcon.setAttribute('aria-hidden', 'true');
    next.appendChild(nextIcon);

    let nextText = document.createElement('span');
    nextText.id
    nextText.className = 'sr-only';
    nextText.textContent = 'Next';
    next.appendChild(nextText);

    carousel.appendChild(prev);
    carousel.appendChild(next);
    carousel.appendChild(carouselInner);
    var script1 = document.createElement('script');
    var script2 = document.createElement('script');
    var script3 = document.createElement('script');
    script2.src = "https://code.jquery.com/jquery-3.5.1.slim.min.js";
    script3.src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    script1.src = "/garageVparrot/Controller/scripts/contactFormCar.js";
    test1250 = document.getElementById("test1250")
test1250.appendChild(script1);
script1.appendChild(script2);

script2.appendChild(script3);

    
    document.getElementById('retour').addEventListener('click', () => {
        fullscreen.style.display = "block";
        newElement.innerHTML="";
        /*
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"; (src="/garageVparrot/Controller/scripts/contactFormCar.js");)*/
    });}

                              
/*J'arrive pas a fouttre le formulaire proprement là dedans sans faire du foin, à revoir si temps disponible , + carousel
<form class="vertical-form" action="" method="POST" >
                        <label for="name">Nom :</label>
                        <div id='nameError'></div>
                        <input type="text" name="name" id="name" required placeholder="Nom">
                        <label for="firstName">Prenom :</label>
                        <div id='firstnameError'></div>
                        <input type="text" name="firstName" id="firstName" required placeholder="Prenom">
                        <label for="email">Adresse mail :</label>
                        <div id='emailError'></div>
                        <input type="email" name="email" id="email" required placeholder="email@mail.com">
                        <label for="phoneNumber">Numéro de téléphone :</label>
                        <div id='phoneNumberError'></div>
                        <input type="text" name="phoneNumber" id="phoneNumber">
                        <label for="contact">Votre demande porte sur  : </label>
                <div id="feedbackcomment"></div>
                        <textarea class="col-12"  name="contact" id="contact" placeholder="Tapez ici la raison de votre demande de contact"></textarea>
                        <input type="hidden" name="carId" id="carid" value="${car.id}">
                        <button id="signupsubmit" type="submit">Nous contacter</button>
</div>
                        <div id="erreur">
                    </form> */ 
/*
                              if (car.photoNames) {
                                let photoNames = car.photoNames.split(',');
                                for (let i = 0; i < photoNames.length; i++) {
                                    let img = document.createElement('img');
                                    img.className = 'car-image';
                                    img.src = '/garageVparrot/Model/Entity/uploadedfiles/' + photoNames[i].trim();
                                    fullscreen.appendChild(img);
                                }}}
                                   /* var form = document.querySelector('.vertical-form');

                                    form.addEventListener('submit', function (event) {
                                        event.preventDefault();
                                    
                                        var carid = document.getElementById('carid')
                                        var name = document.getElementById('name').value;
                                        var firstname = document.getElementById('firstName').value;
                                        var phoneNumber = document.getElementById('phoneNumber').value;
                                        var email = document.getElementById('email').value;
                                        var contact = document.getElementById('contact').value;
                                        var feedbackcomment= document.getElementById('feedbackcomment')
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
                                            body: `&name=${encodeURIComponent(name)}&firstName=${encodeURIComponent(firstname)}&phoneNumber=${encodeURIComponent(phoneNumber)}&email=${encodeURIComponent(email)}&contact=${encodeURIComponent(contact)}$carid=${encodeURIComponent(carid.value)}`
                                        })
                                        .then(response => response.text())
                                        .then(data => {
                                            console.log(data);
                                            if (data.trim() === 'Connection autorisée') {
                                                document.getElementById('erreur').textContent = "Votre demande de contact a bien été prise en compte, notre personnel va vous recontacter au plus vite";
                                                document.getElementById("form").textContent= "";
                                            } else {
                                                document.getElementById('erreur').textContent = data;
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                        });
                                    });
                                */
  
