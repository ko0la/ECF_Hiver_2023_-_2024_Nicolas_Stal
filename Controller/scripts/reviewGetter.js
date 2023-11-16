var xhr = new XMLHttpRequest();
xhr.open('GET', 'localhost/garageVparrot/Model/Entity/reviewFeedback', true);
xhr.withCredentials = true; // Send credentials
xhr.onload = function() {
    if (this.status == 200) {
        document.getElementById('feedback-container').innerHTML = this.responseText;
    }
};
xhr.send();