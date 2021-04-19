function AdministrarValidaciones(e : Event) : boolean{

    
    let campos: string[] = ['txtDni', 'txtApellido', 'txtNombre', 'txtLegajo', 'txtSueldo'];
    let camposNumericos: string[] = ['txtDni', 'txtLegajo', 'txtSueldo'];
    let flagVacios: boolean = false, flagValorInvalido: boolean = false;
    let camposVacios: string[] = [];
    let camposValorInvalido: string[] = [];
    let errorMsg: string = "";
    let turnoElegido: string;
    
    turnoElegido = ObtenerTurnoSeleccionado();
   
    (<HTMLInputElement>document.getElementById('txtSueldo')).setAttribute('max', ObtenerSueldoMaximo(turnoElegido).toString());
    
    campos.forEach(element => {
       if(!ValidarCamposVacios(element)){
           flagVacios = true;
           camposVacios.push(element);
        } 
        campos.forEach(element => {
            AdministrarSpanError(element+"Span", true);
        });
    });

    if(flagVacios){
       errorMsg += `Campos ${camposVacios.toString()} se encuentra vacio.`;

       camposVacios.forEach(element => {
        AdministrarSpanError(element+"Span", false);
       });
    }
    
    campos.forEach(campoNumerico => {
        
        let element = (<HTMLInputElement>document.getElementById(campoNumerico));
        let minValue = Number(element.getAttribute('min'));
        let maxValue = Number(element.getAttribute('max'));
        let value = Number(element.value);
        
        if(!ValidarRangoNumerico(value, maxValue, minValue)){
            flagValorInvalido = true;
            camposValorInvalido.push(campoNumerico);
        }
    });
    
    if(flagValorInvalido){
       camposValorInvalido.forEach(element => {
        AdministrarSpanError(element+"Span", false);
       });
    }

    if(!ValidarCombo('cboSexo', '---')){
        flagValorInvalido = true;
        AdministrarSpanError("cboSexoSpan", false);
    }else{
        AdministrarSpanError("cboSexoSpan", true);
    }

    if(!flagVacios && !flagValorInvalido){
        return true;
    }
    e.preventDefault();
    return false;
}

function ValidarCamposVacios(idCampo:string) : boolean{

    let element = (<HTMLInputElement>document.getElementById(idCampo));
    if(element.value != null && element.value != ""){
        return true;
    }
    return false;
}

function ValidarRangoNumerico(nroValidar:number, nroMax:number,nroMin:number) : boolean{

    if(nroValidar > nroMax || nroValidar < nroMin){
        return false;
    }
    return true;
}

function ValidarCombo(idCampo:string, valueInvalido:string) : boolean{

    let element = (<HTMLInputElement>document.getElementById(idCampo));
    if(element.value == valueInvalido)
        return false;

    return true;
}

function ObtenerTurnoSeleccionado() : string{

    let radioChecked : string = "";
    if((<HTMLInputElement>document.getElementById("radioMañana")).checked){
        radioChecked = 'Mañana'
    }
    if((<HTMLInputElement>document.getElementById("radioTarde")).checked){
        radioChecked = 'Tarde'
    }
    if((<HTMLInputElement>document.getElementById("radioNoche")).checked){
        radioChecked = 'Noche'
    }

    return radioChecked;
}

function ObtenerSueldoMaximo(turnoElegido:string) : number{

    switch(turnoElegido){
        case 'Mañana':return 20000;break;
        case 'Tarde':return 18500;break;
        case 'Noche':return 25000;break;
    }

    return 0;
}

function AdministrarValidacionesLogin() : boolean{

    let campos: string[] = ['txtDni', 'txtApellido'];
    let camposNumericos: string[] = ['txtDni'];
    let flagVacios: boolean = false, flagValorInvalido: boolean = false;
    let camposVacios: string[] = [];
    let camposValorInvalido: string[] = [];
    let errorMsg: string = "";

    campos.forEach(element => {
       if(!ValidarCamposVacios(element)){
           flagVacios = true;
           camposVacios.push(element);
        } 
    });

    if(flagVacios){
       errorMsg += `Campos ${camposVacios.toString()} se encuentra vacio.`;
       
       camposVacios.forEach(element => {
        AdministrarSpanError(element+"Span", false);
       });
       
    }
    
    campos.forEach(campoNumerico => {
        
        let element = (<HTMLInputElement>document.getElementById(campoNumerico));
        let minValue = Number(element.getAttribute('min'));
        let maxValue = Number(element.getAttribute('max'));
        let value = Number(element.value);
        
        if(!ValidarRangoNumerico(value, maxValue, minValue)){
            flagValorInvalido = true;
            camposValorInvalido.push(campoNumerico);
        }
    });
    
    if(flagValorInvalido){
        AdministrarSpanError('txtDniSpan', false);
       errorMsg += `\nCampos ${camposValorInvalido.toString()} no tienen un valor valido.`;
    }

    if(flagVacios || flagValorInvalido){
        alert(errorMsg);
        return false;
    }else{
        AdministrarSpanError('txtDniSpan', false);
        AdministrarSpanError('txtApellidoSpan', false);
    }

    
    return true;
}

function AdministrarSpanError(idSpan : string, ocultar : boolean) : void{

    let element = (<HTMLElement>document.getElementById(idSpan));

    if(ocultar){
        element.style.setProperty('display', 'none');
    }else{
        element.style.setProperty('display', 'block');
    }
}