function sololetras(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmnñopqrstuvwxyz1234567890!#$%&/()=?¿*_-,<>;+";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (let i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {

        return false;
    }


}
