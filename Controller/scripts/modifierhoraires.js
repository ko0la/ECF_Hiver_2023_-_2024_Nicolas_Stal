function manageTimeFields(i) {
    var openCheckbox = document.getElementById(`open${i}`);
    var timeFields = document.getElementById(`timeFields${i}`);
    var secondPeriodLabel = document.getElementById(`secondperiodLabel${i}`);   
    var openingTime = document.getElementById(`opening_time${i}`);
    var closingTime = document.getElementById(`closing_time${i}`);
    
    if (openCheckbox.checked) {
        timeFields.style.display = "block";
        secondPeriodLabel.style.display = 'inline';
    } else {
        timeFields.style.display = "none";
        secondPeriodLabel.style.display = 'none';

        openingTime.value = "";
        closingTime.value = "";
    }
}

function manageBreakTimeFields(i) {
    var breakCheckbox = document.getElementById(`secondperiod${i}`);
    var breakTimeFields = document.getElementById(`breakTimeFields${i}`);
    var afternoonOpeningTime = document.getElementById(`afternoon_opening_time${i}`);
    var afternoonClosingTime = document.getElementById(`afternoon_closing_time${i}`);
    
    if (breakCheckbox.checked) {
        breakTimeFields.style.display = "block";
    } else {
        breakTimeFields.style.display = "none";

        afternoonOpeningTime.value = "";
        afternoonClosingTime.value = "";
    }
}

function isEarlier(time1, time2) {
    var [hours1, minutes1] = time1.split(':').map(Number);
    var [hours2, minutes2] = time2.split(':').map(Number);


    return hours1 < hours2 || (hours1 === hours2 && minutes1 < minutes2);
}

function validateTimes(i) {
    var openingTime = document.getElementById(`opening_time${i}`);
    var closingTime = document.getElementById(`closing_time${i}`);
    var afternoonOpeningTime = document.getElementById(`afternoon_opening_time${i}`);
    var afternoonClosingTime = document.getElementById(`afternoon_closing_time${i}`);

    function isValidTimeFormat(time) {
        return /^([0-1][0-9]|2[0-3]):[0-5][0-9]$/.test(time);
    }


    if (Boolean(openingTime.value) !== Boolean(closingTime.value)) {
        alert(`Veuillez entrer l'horaire de fermeture`);
        return false;
    }


    if (Boolean(afternoonOpeningTime.value) !== Boolean(afternoonClosingTime.value)) {
        alert(`Veuillez entrer l'horaire de fermeture`);
        return false;
    }

  
    if (openingTime.value && closingTime.value) {

        if (!isValidTimeFormat(openingTime.value) || !isValidTimeFormat(closingTime.value)) {
            alert(`Format invalide`);
            return false;
        }


        if (isEarlier(closingTime.value, openingTime.value)) {
            alert(`Erreur : L'heure de fermeture ne peut pas être avant l'heure d'ouverture`);
            return false;
        }
    }


    if (afternoonOpeningTime.value && afternoonClosingTime.value) {

        if (!isValidTimeFormat(afternoonOpeningTime.value) || !isValidTimeFormat(afternoonClosingTime.value)) {
            alert(`Format Invalide`);
            return false;
        }


        if (isEarlier(afternoonOpeningTime.value, closingTime.value)) {
            alert('Erreur : Les périodes se chevauchent, veuillez décocher "ferme le midi" ');
            return false;
        }
        if (isEarlier(afternoonClosingTime.value, afternoonOpeningTime.value)) {
            alert(`Erreur : L'heure de fermeture ne peut pas être avant l'heure d'ouverture`);
            return false;
        }
    }

    return true;
}