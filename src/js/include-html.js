// Simple HTML Include System
function includeHTML() {
    let elements = document.querySelectorAll('[data-include]');
    for (let i = 0; i < elements.length; i++) {
        const file = elements[i].getAttribute('data-include');
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    elements[i].innerHTML = this.responseText;
                } else if (this.status == 404) {
                    elements[i].innerHTML = 'Datei nicht gefunden';
                }
            }
        };
        xhttp.open('GET', file, true);
        xhttp.send();
    }
}

// Include HTML when page loads
document.addEventListener('DOMContentLoaded', includeHTML);
