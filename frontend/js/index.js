const urlApi = "http://localhost/API_INVENTARIO/Api_inventario/Backend/personas";
let ListaPersonas = [];
let idPersona = 0;
let persona = null;

function indexApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            ListaPersonas  = response.data;
            asignarDatosTablaHtml();
        }
    };
    xhttp.open("GET", urlApi, true);
    xhttp.send();
}
indexApi();

function asignarDatosTablaHtml() {
    let html = '';
    for (let item of ListaPersonas) {
        console.log(item);
        html += '<tr>';
        html += '    <td>' + item.id + '</td>';
        html += '    <td>' + item.tipo_identificacion + '</td>';
        html += '    <td>' + item.numero_identificacion + '</td>';
        html += '    <td>' + item.nombres + '</td>';
        html += '    <td>';
        html += '        <div class="contentButtons">';
        html += '           <button class="contentButtons__button contentButtons__button-verde" onclick="ver(' + item.id + ')">Ver detalle</button>';
        html += '           <button class="contentButtons__button contentButtons__button-azul" onclick="modificar(' + item.id + ')">Modificar</button>';
        html += '           <button class="contentButtons__button contentButtons__button-rojo" onclick="eliminar(' + item.id + ')">Eliminar</button>';
        html += '        <div>';
        // html += '        <div class="contentButtons">';
        // html += '           <button class="button verde" onclick="ver(' + item.id + ')">Ver detalle</button>';
        // html += '           <button class="button azul" onclick="modificar(' + item.id + ')">Modificar</button>';
        // html += '           <button class="button rojo" onclick="eliminar(' + item.id + ')">Eliminar</button>';
        // html += '        <div>';
        html += '    </td>';
        html += '</tr>';
    }
    if (html == '') {
        html += '<tr>';
        html += '    <td class="3">No hay datos registrados</td>';
        html += '</tr>';
    }
    const element = document.getElementById('ListaPersonas').getElementsByTagName('tbody')[0];
    element.innerHTML = html;
}

function datailApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            persona = response.data;
        }
    };
    xhttp.open("GET", urlApi + '/' + idPersona, false);
    xhttp.send();
}


function saveDataForm(event) {
    event.preventDefault();
    let data = 'id=' + document.getElementById('id').value;
    data += '&tipo_identificacion=' + document.getElementById('tipo_identificacion').value;
    data += '&numero_identificacion=' + document.getElementById('numero_identificacion').value;
    data += '&nombres=' + document.getElementById('nombres').value;
    save(data);
}

function save(data) {
    let reponse = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            reponse = JSON.parse(this.response);
            console.log(reponse);
            indexApi();
        }
    };
    let param = idPersona > 0 ? '/' + idPersona : '';
    let metodo = idPersona > 0 ? 'PUT' : 'POST';
    xhttp.open(metodo, urlApi + param, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
}

function crear() {
    idPersona = 0;
    persona = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Registrar datos persona';
    document.getElementById('id').value = '';
    document.getElementById('tipo_identificacion').value = '';
    document.getElementById('numero_identificacion').value = '';
    document.getElementById('nombres').value = '';
}

function modificar(id) {
    console.log(id);
    idPersona = id;
    persona = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Modificar datos persona';
    datailApi();
    if (persona != null) {
        document.getElementById('id').value = persona.id;
        document.getElementById('tipo_identificacion').value = persona.tipo_identificacion;
        document.getElementById('numero_identificacion').value = persona.numero_identificacion;
        document.getElementById('nombres').value = persona.nombres;
    }
}

function eliminar(id) {
    console.log(id);
    idPersona = id;
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            idPersona = 0;
            persona = null;
            indexApi();
        }
    };
    xhttp.open("DELETE", urlApi + '/' + idPersona, false);
    xhttp.send();
}

function ver(id) {
    console.log(id);
    idPersona = id;
    persona = null;
    datailApi();
    if (persona != null) {
        document.getElementById('idLb').innerText = persona.id;
        document.getElementById('tipo_identificacionLb').innerText = persona.tipo_identificacion;
        document.getElementById('numero_identificacionLb').innerText = persona.numero_identificacion;
        document.getElementById('nombresLb').innerText = persona.nombres;
    }
}
