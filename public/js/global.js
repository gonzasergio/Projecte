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

function comprovaContrasenya(){
    user = document.getElementById("name").value;
    pass = document.getElementById("pass").value;
    pass2 = document.getElementById("pass2").value;
    if (user.length > 3){
        if (pass == pass2){
            encripta('compRegistre.php');
        } else {
            alert('Las contraseñas no coinciden');
        }
    } else {
        alert('El usuario es demsiado corto');
    }
}

function encripta(arxiu){
    var encrypted = String(CryptoJS.MD5(document.getElementById("pass").value));
    var nom = document.getElementById("name").value;
    post(arxiu,{pass:encrypted, name:nom});
}