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

function encripta(arxiu){
    var encrypted = String(CryptoJS.MD5(document.getElementById("pass").value));
    var nom = document.getElementById("name").value;
    if (arxiu == 'compruebaLogin'){
        compruebaLogin(nom, encrypted);
    } else if (arxiu == 'compruebaRegistro'){
        post("compRegistre.php", {name:nom, pass:encrypted});
    }
}

function compruebaLogin(user, password){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let personas = JSON.parse(this.responseText);
            for (p in personas) {
                let nom = personas[p].nom;
                let pass = personas[p].password;
                if (user == nom){
                    if (pass == password){
                        $("#incorrectUser").empty();
                        $("#incorrectPass").empty();
                        post("iniciSessio.php", {name:user});
                    } else {
                        $("#incorrectUser").empty();
                        $("#incorrectPass").text("La contraseña no coincide");
                    }
                    break;
                } else {
                    $("#incorrectPass").empty();
                    $("#incorrectUser").text("El usuario no coincide");
                }
            }
        }
    };
    xhttp.open("GET", "excursionistas.php");
    xhttp.send();
}

function compruebaRegistro(){
    let user = document.getElementById("name").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let personas = JSON.parse(this.responseText);
            if (personas.length < 1){
                $("#incorrectUser").empty();
                compruebaContraseña(user);
            } else{
                $("#incorrectUser").text("El usuario ya existe");
            }
        }
    };
    xhttp.open("GET", "excursionistas.php?name=" + user);
    xhttp.send();
}

function compruebaContraseña(user) {
    let pass = document.getElementById("pass").value;
    let pass2 = document.getElementById("pass2").value;
    if (user.length > 3){
        $("#incorrectUser").empty();
        if (pass.length > 2){
            if (pass == pass2){
                $("#incorrectPass").empty();
                $("#incorrectPass2").empty();
                encripta("compruebaRegistro");
            } else {
                $("#incorrectPass").empty();
                $("#incorrectPass").text("Las contraseñas no coinciden");
                $("#incorrectPass2").text("Las contraseñas no coinciden");
            }
        } else {
            $("#incorrectPass").text("La contraseña es demasiado corta");
        }
    } else {
        $("#incorrectPass").empty();
        $("#incorrectPass2").empty();
        $("#incorrectUser").text("El usuario es demasiado corto");
    }
}