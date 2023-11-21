window.addEventListener('DOMContentLoaded', (event) => {
    var form = document.getElementById("carform");
    
    function validateField(inputId, feedbackId, regex, errorMessage) {
        var inputValue = document.getElementById(inputId).value;
        if (!regex.test(inputValue)) {
            document.getElementById(feedbackId).textContent = errorMessage;
            return false;
        } else {
            document.getElementById(feedbackId).textContent = "";
            return true;
        }
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        var validations = [
            validateField('carName', 'feedbackcarName', /^[\p{Letter}0-9- ]{1,70}$/u, "Le nom de la voiture ne doit pas dépasser 70 caractères et ne peut contenir que des lettres, des chiffres, des tirets et des espaces."),
            validateField('brand', 'feedbackbrand', /^[\p{Letter}0-9- ]{1,70}$/u, "La marque ne doit pas dépasser 70 caractères et ne peut contenir que des lettres, des chiffres, des tirets et des espaces."),
            validateField('price', 'feedbackprice', /^\d{1,7}([.,]\d{0,2})?$/, "Le prix ne peut avoir que 2 chiffres après la virgule et faire 7 chiffres avant au maximum"),
            validateField('mileage', 'feedbackmileage', /^\d{1,8}$/, "Le kilométrage doit être un nombre entre 1 et 8 chiffres."),
            validateField('firstCirculation', 'feedbackfirstCirculation', /^\d{4}$/, "L'année de mise en circulation doit être un nombre de 4 chiffres."),
            validateField('options', 'feedbackoptions', /^[^;></]{0,2500}$/u, "Les détails de la voiture ne doivent pas contenir de ; > </ et ne doivent pas dépasser 2500 caractères")
        ];

        if (validations.every(Boolean)) {
            form.submit();
        }
    });
});