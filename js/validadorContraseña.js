function validar() {
    let contraseña1 = document.getElementById("contraseña").value;
    let contraseña2 = document.getElementById("contraseña2").value;
    let valid = document.getElementById('validacion');
    console.log(contraseña1, contraseña2)
    if (contraseña1 != contraseña2) {
        valid.innerHTML = "La contraseñas no son iguales";


    }
}