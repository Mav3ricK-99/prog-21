function AdministrarValidaciones(e) {
    var campos = ['txtDni', 'txtApellido', 'txtNombre', 'txtLegajo', 'txtSueldo'];
    var camposNumericos = ['txtDni', 'txtLegajo', 'txtSueldo'];
    var flagVacios = false, flagValorInvalido = false;
    var camposVacios = [];
    var camposValorInvalido = [];
    var errorMsg = "";
    var turnoElegido;
    turnoElegido = ObtenerTurnoSeleccionado();
    document.getElementById('txtSueldo').setAttribute('max', ObtenerSueldoMaximo(turnoElegido).toString());
    campos.forEach(function (element) {
        if (!ValidarCamposVacios(element)) {
            flagVacios = true;
            camposVacios.push(element);
        }
        campos.forEach(function (element) {
            AdministrarSpanError(element + "Span", true);
        });
    });
    if (flagVacios) {
        errorMsg += "Campos " + camposVacios.toString() + " se encuentra vacio.";
        camposVacios.forEach(function (element) {
            AdministrarSpanError(element + "Span", false);
        });
    }
    campos.forEach(function (campoNumerico) {
        var element = document.getElementById(campoNumerico);
        var minValue = Number(element.getAttribute('min'));
        var maxValue = Number(element.getAttribute('max'));
        var value = Number(element.value);
        if (!ValidarRangoNumerico(value, maxValue, minValue)) {
            flagValorInvalido = true;
            camposValorInvalido.push(campoNumerico);
        }
    });
    if (flagValorInvalido) {
        camposValorInvalido.forEach(function (element) {
            AdministrarSpanError(element + "Span", false);
        });
    }
    if (!ValidarCombo('cboSexo', '---')) {
        flagValorInvalido = true;
        AdministrarSpanError("cboSexoSpan", false);
    }
    else {
        AdministrarSpanError("cboSexoSpan", true);
    }
    if (!flagVacios && !flagValorInvalido) {
        return true;
    }
    e.preventDefault();
    return false;
}
function ValidarCamposVacios(idCampo) {
    var element = document.getElementById(idCampo);
    if (element.value != null && element.value != "") {
        return true;
    }
    return false;
}
function ValidarRangoNumerico(nroValidar, nroMax, nroMin) {
    if (nroValidar > nroMax || nroValidar < nroMin) {
        return false;
    }
    return true;
}
function ValidarCombo(idCampo, valueInvalido) {
    var element = document.getElementById(idCampo);
    if (element.value == valueInvalido)
        return false;
    return true;
}
function ObtenerTurnoSeleccionado() {
    var radioChecked = "";
    if (document.getElementById("radioMañana").checked) {
        radioChecked = 'Mañana';
    }
    if (document.getElementById("radioTarde").checked) {
        radioChecked = 'Tarde';
    }
    if (document.getElementById("radioNoche").checked) {
        radioChecked = 'Noche';
    }
    return radioChecked;
}
function ObtenerSueldoMaximo(turnoElegido) {
    switch (turnoElegido) {
        case 'Mañana':
            return 20000;
            break;
        case 'Tarde':
            return 18500;
            break;
        case 'Noche':
            return 25000;
            break;
    }
    return 0;
}
function AdministrarValidacionesLogin() {
    var campos = ['txtDni', 'txtApellido'];
    var camposNumericos = ['txtDni'];
    var flagVacios = false, flagValorInvalido = false;
    var camposVacios = [];
    var camposValorInvalido = [];
    var errorMsg = "";
    campos.forEach(function (element) {
        if (!ValidarCamposVacios(element)) {
            flagVacios = true;
            camposVacios.push(element);
        }
    });
    if (flagVacios) {
        errorMsg += "Campos " + camposVacios.toString() + " se encuentra vacio.";
        camposVacios.forEach(function (element) {
            AdministrarSpanError(element + "Span", false);
        });
    }
    campos.forEach(function (campoNumerico) {
        var element = document.getElementById(campoNumerico);
        var minValue = Number(element.getAttribute('min'));
        var maxValue = Number(element.getAttribute('max'));
        var value = Number(element.value);
        if (!ValidarRangoNumerico(value, maxValue, minValue)) {
            flagValorInvalido = true;
            camposValorInvalido.push(campoNumerico);
        }
    });
    if (flagValorInvalido) {
        AdministrarSpanError('txtDniSpan', false);
        errorMsg += "\nCampos " + camposValorInvalido.toString() + " no tienen un valor valido.";
    }
    if (flagVacios || flagValorInvalido) {
        alert(errorMsg);
    }
    else {
        AdministrarSpanError('txtDniSpan', false);
        AdministrarSpanError('txtApellidoSpan', false);
    }
    return true;
}
function AdministrarSpanError(idSpan, ocultar) {
    var element = document.getElementById(idSpan);
    if (ocultar) {
        element.style.setProperty('display', 'none');
    }
    else {
        element.style.setProperty('display', 'block');
    }
}
