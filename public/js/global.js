function post(path, params, method='post') {

    const form = document.createElement('form');
    form.method = method;
    form.action = path;

    for (const key in params) {
        if (params.hasOwnProperty(key)) {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

function canviaIdioma(){
    selector = document.getElementById('language').value;
    post("sesioIdioma.php",{language:selector});
}

function encripta(){
    var encrypted = String(CryptoJS.MD5(document.getElementById("pass").value));
    var nom = document.getElementById("name").value;
    post("comp.php",{pass:encrypted, name:nom});
}