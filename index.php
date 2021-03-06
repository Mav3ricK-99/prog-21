<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Formulario alta Empleado</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .spanError
            {
                float:right;font-size:20px;color:rgba(240,0,0,0.7)
            }
        </style>
    </head>
    <script src="javascript/funciones.js" async defer></script>
    <body>
        <h2>Alta de Empleados</h2>
        <section style="margin:auto;width:300px">
            <br><br>
            
            <h4>Datos Personales</h4>
            <br>
            <hr>
            <form action="backend/administracion.php" method="POST" id="formAlta" onsubmit="AdministrarValidaciones(event);">
                <table>
                <label>DNI:</label><input type="number" name="txtDni" min="1000000" max="55000000" style="margin-left: 50px;" id="txtDni"><span id="txtDniSpan" class="spanError" style="display:none">*</span><br>
                <label>Apellido:</label><input type="text" name="txtApellido" style="margin-left: 23px;" id="txtApellido"><span id="txtApellidoSpan" class="spanError" style="display:none">*</span><br>
                <label>Nombre:</label><input type="text" name="txtNombre" style="margin-left: 26px;" id="txtNombre"><span id="txtNombreSpan" class="spanError" style="display:none">*</span><br>
                <label>Sexo:</label>
                <select name="cboSexo" style="margin-left: 47px;" id="cboSexo">
                    <option value="---" selected>Seleccione</option>
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select><span id="cboSexoSpan" class="spanError" style="display:none">*</span>
            </table>
                <h4>Datos laborales</h4>
                <br><br>
                <hr>
                <label>Legajo: </label><input type="number" name="txtLegajo" min="100" max="550" style="margin-left: 35px;" id="txtLegajo"><span id="txtLegajoSpan" class="spanError" style="display:none">*</span><br>
                <label>Sueldo: </label><input type="number" name="txtSueldo" style="margin-left: 35px;" id="txtSueldo" min="8000" max="25000"><span id="txtSueldoSpan" class="spanError" style="display:none">*</span><br>
                <label>Turno:</label>
                <div style="display:flex;flex-direction: column;margin-left:50px;">
                    <div>
                        <input type="radio" name="rdoTurno" value="ma??ana" id="radioMa??ana" checked>
                        <label for="ma??ana">Ma??ana</label>
                    </div>
                    <div>
                        <input type="radio" name="rdoTurno" value="tarde" id="radioTarde">
                        <label for="tarde">Tarde</label>
                    </div>
                    <div>
                        <input type="radio" name="rdoTurno" value="noche" id="radioNoche">
                        <label for="noche">Noche</label>
                    </div>
                </div>
                <hr>
                <input type="submit" value="Enviar" style="float: right;">
            </form>
        </section>    
    </body>
</html>